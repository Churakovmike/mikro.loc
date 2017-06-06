<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Tariffs;
use app\modules\admin\models\User;
use Yii;
use app\modules\admin\models\Requesttarif;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PEAR2\Net\RouterOS;
use app\modules\admin\models\Actionlist;

/**
 * RequesttarifController implements the CRUD actions for Requesttarif model.
 */
class RequesttarifController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Requesttarif models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Requesttarif::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Requesttarif model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Requesttarif model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Requesttarif();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $action = new Actionlist();
            $action->user_id = Yii::$app->user->identity->id;
            $action->action = 'Добавление';
            $action->parameters = $model->id ;
            $action->route = $this->route;
            $action->date = date('Y-m-d H-i-s');
            $action->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Requesttarif model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $action = new Actionlist();
            $action->user_id = Yii::$app->user->identity->id;
            $action->action = 'Обновление';
            $action->parameters = $model->id ;
            $action->route = $this->route;
            $action->date = date('Y-m-d H-i-s');
            $action->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Requesttarif model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $this->findModel($id)->delete();
        $action = new Actionlist();
        $action->user_id = Yii::$app->user->identity->id;
        $action->action = 'Удаление';
        $action->parameters = $model->id ;
        $action->route = $this->route;
        $action->date = date('Y-m-d H-i-s');
        $action->save();

        return $this->redirect(['index']);
    }

    public function actionChange($id) {
        $model = $this->findModel($id);
        $user = User::findOne($model->user_id);
        $tarif = Tariffs::findOne($model->new_tarif);
        $client = new RouterOS\Client('192.168.1.100', 'admin', 'admin');

        $printRequest = new RouterOS\Request('/ppp/secret/print');
        $printRequest->setArgument('.proplist','.id');
        $printRequest->setQuery(RouterOS\Query::where('name', $user->username));
        $id = $client->sendSync($printRequest)->getProperty('.id');
        //$id now contains the ID of the entry we're targeting

        $setRequest = new RouterOS\Request('/ppp/secret/set');
        $setRequest->setArgument('numbers', $id);
        $setRequest->setArgument('profile', $tarif->description);
        $client->sendSync($setRequest);

        $model->status = 1;
        $model->save();

        $action = new Actionlist();
        $action->user_id = Yii::$app->user->identity->id;
        $action->action = 'Смена тарифа';
        $action->parameters = $model->id ;
        $action->route = $this->route;
        $action->date = date('Y-m-d H-i-s');
        $action->save();

        Yii::$app->session->setFlash('response', 'Клиент успешно переведен на новый тарифных план');
        return Yii::$app->response->redirect(['/admin/requesttarif/index']);

    }

    /**
     * Finds the Requesttarif model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Requesttarif the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Requesttarif::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Stations;
use Yii;
use app\modules\admin\models\Mikrotiks;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\Actionlist;
/**
 * MikrotiksController implements the CRUD actions for Mikrotiks model.
 */
class MikrotiksController extends Controller
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
     * Lists all Mikrotiks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
//            'query' => Mikrotiks::find()->with(['stations']),
            'query' => Mikrotiks::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mikrotiks model.
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
     * Creates a new Mikrotiks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mikrotiks();
//        $stations = Stations::find()->all();
//        $data = ArrayHelper::map($stations, 'id', 'namestation');
//        print_r($stations);

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
     * Updates an existing Mikrotiks model.
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
     * Deletes an existing Mikrotiks model.
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

    /**
     * Finds the Mikrotiks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Mikrotiks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mikrotiks::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\User;
use Yii;
use app\modules\admin\models\Pays;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\Actionlist;

/**
 * PaysController implements the CRUD actions for Pays model.
 */
class PaysController extends Controller
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
     * Lists all Pays models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Pays::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pays model.
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
     * Creates a new Pays model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pays();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->type == 'Зачисление') {
                $users = User::find()->where(['username' => $model->username])->one();
                $users->balance += $model->sum;
                $users->save();
            }
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
     * Updates an existing Pays model.
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
     * Deletes an existing Pays model.
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
     * Finds the Pays model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pays the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pays::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

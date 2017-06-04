<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Connection;
use app\modules\admin\models\Devices;
use app\modules\admin\models\Tariffs;
use Yii;
use app\modules\admin\models\User;
use app\modules\admin\models\UsersSearch;
use yii\base\Security;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use PEAR2\Net\RouterOS;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                    'delete' => ['POST', 'GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionEmployee() {
//        $emploees = User::find()->where(['<>', 'role', 'abonent']);
//        return $this->render('employee', compact('emploees'));
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['<>', 'role', 'abonent']),
        ]);

        return $this->render('employee', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateemploye() {
        $model = new User();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            $security = new Security();
            $model->password_hash = $security->generatePasswordHash($model->password_hash);
            $model->auth_key = $security->generateRandomString();
            $model->save();
            return $this->redirect(['viewemploye', 'id' => $model->id]);
        } else {
            return $this->render('createemploye', [
                'model' => $model,
            ]);
        }
    }

    public function actionViewemploye($id)
    {
        return $this->render('viewemploye', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdateemploye($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['viewemploye', 'id' => $model->id]);
        } else {
            return $this->render('updateemploye', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeleteemploye($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['employee']);
    }
    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if (Yii::$app->request->isPost) {
            $tempPassword = '';
            $model->load(Yii::$app->request->post());
            $tempPassword = $model->password_hash;
            $security = new Security();
            $model->password_hash = $security->generatePasswordHash($model->password_hash);
            $model->auth_key = $security->generateRandomString();

            $devices = Devices::findOne($model->devices_id);
            $devices->devicesstatus = 1;
            $devices->save();
            $model->save();
            User::mikrotikAdd($model, $tempPassword);

            /*-----------------------------------------------------------------------------*/
//            $service = Connection::findOne($model->connection_id);
//            $profile = Tariffs::findOne($model->tariffs_id);
//            try {
//                $client = new RouterOS\Client('192.168.1.100', 'admin', 'admin');
//            } catch (Exception $e) {
//                die('Unable to connect to the router.');
//            }
//
//            $addRequest = new RouterOS\Request('/ppp/secret/add');
//
////            $addRequest->setArgument('name', 'MIKROVBROS');
//            $addRequest->setArgument('name', $model->username);
//            $addRequest->setArgument('service', $service->nameconnection);
//            $addRequest->setArgument('profile', $profile->name);
////        $addRequest->setArgument('mac-address', '00:00:00:00:00:01');
//            if ($client->sendSync($addRequest)->getType() !== RouterOS\Response::TYPE_FINAL) {
//                die("Error when creating ARP entry for 'Yii'");
//            }
            /*-----------------------------------------------------------------------------*/



            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }



//                if ($model->load(Yii::$app->request->post())) {
//                    $security = new Security();
//                    $user = new User();
//                    $user->status = '10';
//                    $user->password_hash = $security->generatePasswordHash(Yii::$app->request->post('password_hash'));
//                    $user->auth_key = $user->generateAuthKey();
//
//                    $user->save(); die();
//                    //echo $user->password_hash; die();
//
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }

//        if ($model->load(Yii::$app->request->post())) {
//            $security = new Security();
//            $model->password_hash = $security->generatePasswordHash($model->password_hash);
//            $model->auth_key = $model->generateAuthKey();
//            $model->save();
//            return $this->redirect(['/admin/user/index']);
//            //return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            User::mikrotikUpdate($model);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        User::mikrotikDelete($id);
        $this->findModel($id)->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
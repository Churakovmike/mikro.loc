<?php
/**
 * Created by PhpStorm.
 * User: MikeCh
 * Date: 31.05.2017
 * Time: 20:35
 */

namespace app\controllers;

use app\models\Pays;
use app\models\Requesttarif;
use app\modules\admin\models\Devices;
use app\modules\admin\models\Tariffs;
use app\modules\admin\models\User;
use yii\filters\AccessControl;
use yii\web\Controller;

class CabinetController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

    public function actionIndex() {
        $userInfo = User::findOne(\Yii::$app->user->id);
        $tarif = Tariffs::findOne($userInfo->tariffs_id);
        $device = Devices::findOne($userInfo->devices_id);
        $tarifChangeLists = Requesttarif::find()->where(['user_id' => \Yii::$app->user->id])->orderBy(['id' => SORT_DESC])->limit(10)->all();
        $tariflist = Tariffs::find()->where(['<', 'id', '6'])->all();
        return $this->render('index', compact('userInfo', 'tarif', 'device', 'tariflist', 'tarifChangeLists'));
    }

    public function actionChange() {
        $new_tarif = \Yii::$app->request->get('tarif');
        $user = User::find()->where(['id' => \Yii::$app->user->id])->one();
        $old_tarif  = Tariffs::find()->where(['id' => $user->tariffs_id])->one();

        $requesttarif = new Requesttarif();
        $requesttarif->user_id = \Yii::$app->user->id;
        $requesttarif->old_tarif = $user->tariffs_id;
        $requesttarif->new_tarif = $new_tarif;
        $requesttarif->date = date('Y-m-d h-i');
//        $requesttarif->save();
//        debug($requesttarif);
        if ($requesttarif->save()) {
            \Yii::$app->session->setFlash('tarif', 'Заявка на смену тарифного плана принята! Вы можете отслежить ее статус в личном кабинете.');
        }
        return \Yii::$app->response->redirect(['/cabinet']);
    }

    public function actionPay() {
        $this->enableCsrfValidation = false;
//        echo 'lol'; die();
        $sha1 = sha1( $_POST['notification_type'] . '&'. $_POST['operation_id']. '&' . $_POST['amount'] . '&643&' . $_POST['datetime'] . '&'. $_POST['sender'] . '&' . $_POST['codepro'] . '&' . $secret_key. '&' . $_POST['label'] );

        if ($sha1 != $_POST['sha1_hash'] ) {
            // тут содержится код на случай, если верификация не пройдена
            $f=fopen('notify.txt','w+');
            foreach($_POST as $k=>$row)$dump .="$k => $row\n";
            fwrite($f,$dump);
            fclose($f);
            exit();
        }

        // тут код на случай, если проверка прошла успешно
        $f=fopen('notify.txt','w+');
        foreach($_POST as $k=>$row)$dump .="$k => $row\n";
        fwrite($f,$dump);
        fclose($f);
        $pay = new Pays();
        $pay->username = $_POST['label'];
        $pay->date = date('Y-m-h');
        $pay->sum = $_POST['withdraw_amount'];
        $pay->type = 'Зачисление';
        $pay->save();
        exit();
    }

}
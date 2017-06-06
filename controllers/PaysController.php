<?php
/**
 * Created by PhpStorm.
 * User: MikeCh
 * Date: 04.06.2017
 * Time: 14:06
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Pays;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
use app\modules\admin\models\User;


class PaysController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'pay' => ['post','get'],
                ],
            ],
        ];
    }

    public function actionPay() {
        $this->enableCsrfValidation = false;
//        echo 'lol'; die();
//        $sha1 = sha1( $_POST['notification_type'] . '&'. $_POST['operation_id']. '&' . $_POST['amount'] . '&643&' . $_POST['datetime'] . '&'. $_POST['sender'] . '&' . $_POST['codepro'] . '&' . $secret_key. '&' . $_POST['label'] );
        $request = Yii::$app->request;
        $secret_key = '/SSfXXQ09Pz7fb+rkcb20xoh';
        $notification_type = $request->post('notification_type');
        $operation_id = $request->post('operation_id');
        $amount = $request->post('amount');
        $datetime = $request->post('datetime');
        $sender = $request->post('sender');
        $codepro = $request->post('codepro');
        $label = $request->post('label');
        $withdraw_amount = $request->post('withdraw_amount');
//        $label = $_POST['label'];
        if(isset($_POST['label'])){ $label = $_POST['label']; }
        if(isset($_POST['amount'])){ $amount = $_POST['amount']; }
        if(isset($_POST['email'])){ $email = $_POST['email']; } else { $email = 'no'; }
        if(isset($_POST['withdraw_amount'])){ $withdraw_amount = $_POST['withdraw_amount']; }

//        $withdraw_amount = $_POST['withdraw_amount'];
        $postsha1 = $request->post('sha1_hash');

//        $sha1 = sha1($notification_type . '&'. $operation_id . '&' . $amount . '&643&' . $datetime . '&'. $sender . '&' . $codepro . '&' . $secret_key. '&' . $label);
//        if ($sha1 != $postsha1 ) {
//            // тут содержится код на случай, если верификация не пройдена
////            $f=fopen('notify.txt','w+');
////            foreach($_POST as $k=>$row)$dump .="$k => $row\n";
////            fwrite($f,$dump);
////            fclose($f);
//            echo 'end';
//            exit();
//        }

        // тут код на случай, если проверка прошла успешно
//        $f=fopen('notify.txt','w+');
//        foreach($_POST as $k=>$row)$dump .="$k => $row\n";
//        fwrite($f,$dump);
//        fclose($f);
//        $label = 'azaza';
        //$withdraw_amount = 10.10;
        $pay = new Pays();
        $pay->username = $label;
        $pay->date = date('Y-m-h');
        $pay->sum = $amount;
        $pay->type = 'Зачисление';
        $pay->save();

        $users = User::find()->where(['username' => $label])->one();
        $users->balance += $amount;
        $users->save();
//        echo 'lol';
        exit();
    }


}
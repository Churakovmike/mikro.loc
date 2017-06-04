<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Devices;
use app\modules\admin\models\Request;
use app\modules\admin\models\Requesttarif;
use app\modules\admin\models\User;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        access();
        $countUsers = User::find()->count(); # кол-во абонентов
        $countDevices = Devices::find()->count(); # кол-во оборудования
        $countDevicesFree = Devices::find()->where(['devicesstatus' => '0'])->count(); # количество свободных устройста
        $requestCount = Request::find()->where(['status' => '1'])->count(); # количество новых заявок
        $requestChangeCount = Requesttarif::find()->where(['status' => '0'])->count(); # количество невыполненных заявок по смене тарифного плана
        $userAbonents = User::find()->with('tariffs')->where(['role' => 'abonent'])->orderBy(['id' => SORT_DESC])->limit(10)->all(); # последние 10 добавленных абонентов
        $requestLists = Request::find()->where(['status' => '1'])->orderBy(['id' => SORT_DESC])->limit(10)->all();
//        echo \Yii::$app->controller->action->id;
        //echo $this->route;
        //die();
        //debug($userAbonents);
        return $this->render('index', compact('countUsers', 'countDevicesFree', 'countDevices', 'requestCount', 'requestChangeCount', 'userAbonents', 'requestLists'));
    }
}

<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Devices;
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
        $countUsers = User::find()->count();
        $countDevices = Devices::find()->count();
        $countDevicesFree = Devices::find()->where(['devicesstatus' => '0'])->count();
//        echo \Yii::$app->controller->action->id;
        //echo $this->route;
        //die();
        return $this->render('index', compact('countUsers', 'countDevicesFree', 'countDevices'));
    }
}

<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Devices;
use app\modules\admin\models\Pays;
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
        # круговая диаграмма
        $tarOne = User::find()->where(['tariffs_id' => 1])->count();
        $tarTwo = User::find()->where(['tariffs_id' => 2])->count();
        $tarThree = User::find()->where(['tariffs_id' => 3])->count();
        $tarFour = User::find()->where(['tariffs_id' => 4])->count();
        $tarFive = User::find()->where(['tariffs_id' => 5])->count();
        $tarSix = User::find()->where(['tariffs_id' => 6])->count();
        # конец круговой диаграмыы
        # линия тренда
        $t1 = User::find()->where(['between', 'date_contract', '2017-01-01', '2017-01-31'])->count();
        $t2 = User::find()->where(['between', 'date_contract', '2017-02-01', '2017-02-28'])->count();
        $t3 = User::find()->where(['between', 'date_contract', '2017-03-01', '2017-03-31'])->count();
        $t4 = User::find()->where(['between', 'date_contract', '2017-04-01', '2017-04-30'])->count();
        $t5 = User::find()->where(['between', 'date_contract', '2017-05-01', '2017-05-31'])->count();
        $t6 = User::find()->where(['between', 'date_contract', '2017-06-01', '2017-06-30'])->count();
        # конец линии тренда
        # тариф 3М за январь

        #
//        echo $countTarifsone;
        $countUsers = User::find()->count(); # кол-во абонентов
        $countDevices = Devices::find()->count(); # кол-во оборудования
        $countDevicesFree = Devices::find()->where(['devicesstatus' => '0'])->count(); # количество свободных устройста
        $requestCount = Request::find()->where(['status' => '1'])->count(); # количество новых заявок
        $requestChangeCount = Requesttarif::find()->where(['status' => '0'])->count(); # количество невыполненных заявок по смене тарифного плана
        $userAbonents = User::find()->with('tariffs')->where(['role' => 'abonent'])->orderBy(['id' => SORT_DESC])->limit(10)->all(); # последние 10 добавленных абонентов
        $requestLists = Request::find()->where(['status' => '1'])->orderBy(['id' => SORT_DESC])->limit(10)->all(); # список последних заявокна подключение
        $payLists = Pays::find()->orderBy(['id' => SORT_DESC])->limit(10)->all(); # последние платежи
        $requestChangeLists = Requesttarif::find()->orderBy(['id' => SORT_DESC])->limit(10)->all();

        return $this->render('index', compact('countUsers', 'countDevicesFree', 'countDevices', 'requestCount', 'requestChangeCount', 'userAbonents', 'requestLists', 'payLists', 'requestChangeLists',
            'tarOne', 'tarTwo', 'tarThree', 'tarFour', 'tarFive', 'tarSix',
            't1', 't2', 't3', 't4', 't5', 't6'));
    }
}

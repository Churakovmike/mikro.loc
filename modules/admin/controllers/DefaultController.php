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
        # SELECT user.tariffs_id, count(user.tariffs_id) FROM user GROUP BY tariffs_id ASC
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
        # абоненты по тарифам за январь
        $t11 = User::find()->where(['between', 'date_contract', '2017-01-01', '2017-01-31'])->andWhere(['tariffs_id' => 1])->count();
        $t12 = User::find()->where(['between', 'date_contract', '2017-01-01', '2017-01-31'])->andWhere(['tariffs_id' => 2])->count();
        $t13 = User::find()->where(['between', 'date_contract', '2017-01-01', '2017-01-31'])->andWhere(['tariffs_id' => 3])->count();
        $t14 = User::find()->where(['between', 'date_contract', '2017-01-01', '2017-01-31'])->andWhere(['tariffs_id' => 4])->count();
        $t15 = User::find()->where(['between', 'date_contract', '2017-01-01', '2017-01-31'])->andWhere(['tariffs_id' => 5])->count();
        $t16 = User::find()->where(['between', 'date_contract', '2017-01-01', '2017-01-31'])->andWhere(['tariffs_id' => 6])->count();
        # конец января
        # абоненты по тарифам за февраль
        $t21 = User::find()->where(['between', 'date_contract', '2017-02-01', '2017-02-28'])->andWhere(['tariffs_id' => 1])->count();
        $t22 = User::find()->where(['between', 'date_contract', '2017-02-01', '2017-02-28'])->andWhere(['tariffs_id' => 2])->count();
        $t23 = User::find()->where(['between', 'date_contract', '2017-02-01', '2017-02-28'])->andWhere(['tariffs_id' => 3])->count();
        $t24 = User::find()->where(['between', 'date_contract', '2017-02-01', '2017-02-28'])->andWhere(['tariffs_id' => 4])->count();
        $t25 = User::find()->where(['between', 'date_contract', '2017-02-01', '2017-02-28'])->andWhere(['tariffs_id' => 5])->count();
        $t26 = User::find()->where(['between', 'date_contract', '2017-02-01', '2017-02-28'])->andWhere(['tariffs_id' => 6])->count();
        # конец января
        # абоненты по тарифам за март
        $t31 = User::find()->where(['between', 'date_contract', '2017-03-01', '2017-03-31'])->andWhere(['tariffs_id' => 1])->count();
        $t32 = User::find()->where(['between', 'date_contract', '2017-03-01', '2017-03-31'])->andWhere(['tariffs_id' => 2])->count();
        $t33 = User::find()->where(['between', 'date_contract', '2017-03-01', '2017-03-31'])->andWhere(['tariffs_id' => 3])->count();
        $t34 = User::find()->where(['between', 'date_contract', '2017-03-01', '2017-03-31'])->andWhere(['tariffs_id' => 4])->count();
        $t35 = User::find()->where(['between', 'date_contract', '2017-03-01', '2017-03-31'])->andWhere(['tariffs_id' => 5])->count();
        $t36 = User::find()->where(['between', 'date_contract', '2017-03-01', '2017-03-31'])->andWhere(['tariffs_id' => 6])->count();
        # конец марта
        # абоненты по тарифам за апрель
        $t41 = User::find()->where(['between', 'date_contract', '2017-04-01', '2017-04-30'])->andWhere(['tariffs_id' => 1])->count();
        $t42 = User::find()->where(['between', 'date_contract', '2017-04-01', '2017-04-30'])->andWhere(['tariffs_id' => 2])->count();
        $t43 = User::find()->where(['between', 'date_contract', '2017-04-01', '2017-04-30'])->andWhere(['tariffs_id' => 3])->count();
        $t44 = User::find()->where(['between', 'date_contract', '2017-04-01', '2017-04-30'])->andWhere(['tariffs_id' => 4])->count();
        $t45 = User::find()->where(['between', 'date_contract', '2017-04-01', '2017-04-30'])->andWhere(['tariffs_id' => 5])->count();
        $t46 = User::find()->where(['between', 'date_contract', '2017-04-01', '2017-04-30'])->andWhere(['tariffs_id' => 6])->count();
        # конец апреля
        # абоненты по тарифам за май
        $t51 = User::find()->where(['between', 'date_contract', '2017-05-01', '2017-05-31'])->andWhere(['tariffs_id' => 1])->count();
        $t52 = User::find()->where(['between', 'date_contract', '2017-05-01', '2017-05-31'])->andWhere(['tariffs_id' => 2])->count();
        $t53 = User::find()->where(['between', 'date_contract', '2017-05-01', '2017-05-31'])->andWhere(['tariffs_id' => 3])->count();
        $t54 = User::find()->where(['between', 'date_contract', '2017-05-01', '2017-05-31'])->andWhere(['tariffs_id' => 4])->count();
        $t55 = User::find()->where(['between', 'date_contract', '2017-05-01', '2017-05-31'])->andWhere(['tariffs_id' => 5])->count();
        $t56 = User::find()->where(['between', 'date_contract', '2017-05-01', '2017-05-31'])->andWhere(['tariffs_id' => 6])->count();
        # конец мая
        # абоненты по тарифам за июнь
        $t61 = User::find()->where(['between', 'date_contract', '2017-06-01', '2017-06-30'])->andWhere(['tariffs_id' => 1])->count();
        $t62 = User::find()->where(['between', 'date_contract', '2017-06-01', '2017-06-30'])->andWhere(['tariffs_id' => 2])->count();
        $t63 = User::find()->where(['between', 'date_contract', '2017-06-01', '2017-06-30'])->andWhere(['tariffs_id' => 3])->count();
        $t64 = User::find()->where(['between', 'date_contract', '2017-06-01', '2017-06-30'])->andWhere(['tariffs_id' => 4])->count();
        $t65 = User::find()->where(['between', 'date_contract', '2017-06-01', '2017-06-30'])->andWhere(['tariffs_id' => 5])->count();
        $t66 = User::find()->where(['between', 'date_contract', '2017-06-01', '2017-06-30'])->andWhere(['tariffs_id' => 6])->count();
        # конец июня

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
            't1', 't2', 't3', 't4', 't5', 't6',
            't11', 't12', 't13', 't14', 't15', 't16',
            't21', 't22', 't23', 't24', 't25', 't26',
            't31', 't32', 't33', 't34', 't35', 't36',
            't41', 't42', 't43', 't44', 't45', 't46',
            't51', 't52', 't53', 't54', 't55', 't56',
            't61', 't62', 't63', 't64', 't65', 't66'));
    }
}

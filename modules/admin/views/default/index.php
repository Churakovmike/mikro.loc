<!--<div class="admin-default-index">-->
<!--    <h1>--><?//= $this->context->action->uniqueId ?><!--</h1>-->
<!--    <p>-->
<!--        This is the view content for action "--><?//= $this->context->action->id ?><!--".-->
<!--        The action belongs to the controller "--><?//= get_class($this->context) ?><!--"-->
<!--        in the "--><?//= $this->context->module->id ?><!--" module.-->
<!--    </p>-->
<!--    <p>-->
<!--        You may customize this page by editing the following file:<br>-->
<!--        <code>--><?//= __FILE__ ?><!--</code>-->
<!--    </p>-->
<!--</div>-->
<!-- top tiles -->
<?php
use miloschuman\highcharts\Highcharts;
use  yii\web\JsExpression;

use miloschuman\highcharts\Highstock;
use miloschuman\highcharts\Highmaps;
use miloschuman\highcharts\SeriesDataHelper;

\miloschuman\highcharts\HighchartsAsset::register($this)->withScripts(['highstock', 'modules/exporting', 'modules/drilldown']);
?>
<div class="row tile_count">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-user" style="color:#26b99a"></i>
            </div>
            <div class="count" style="color: #34495E"><?= $countUsers ?></div>

            <h3>Абонентов</h3>
            <p>зарегистрировано в базе данных.</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-hdd-o" style="color:#26b99a"></i>
            </div>
            <div class="count" style="color: #34495E"><?= $countDevicesFree ?></div>

            <h3>Оборудования</h3>
            <p>из <?= $countDevices ?> свободно.</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-sort-amount-desc" style="color:#26b99a"></i>
            </div>
            <div class="count" style="color: #34495E"><?= $requestCount ?></div>

            <h3>Новых заявок</h3>
            <p>на подключение абонентами.</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-check-square-o" style="color:#26b99a"></i>
            </div>
            <div class="count" style="color: #34495E"><?= $requestChangeCount ?></div>

            <h3>Смен</h3>
            <p>тарифных планов на очереди.</p>
        </div>
    </div>
</div>
<!-- /top tiles -->
<!-- main content -->
<div class="row">
    <div class="x_panel">
        <?php
        $i = 22;
//        $tarOne = \app\modules\admin\models\User::find()->where(['tariffs_id' => 1])->count();
//        echo $tarOne;
        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
                'themes/grid-light',
            ],
            'options' => [
                'title' => [
                    'text' => 'Статистика тарифов',
                ],
                'xAxis' => [
                    'categories' => ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь'],
                ],
                'labels' => [
                    'items' => [
                        [
                            'html' => 'Абоненты по тарифам за все время',
                            'style' => [
                                'left' => '50px',
                                'top' => '18px',
                                'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                            ],
                        ],
                    ],
                ],
                'series' => [
                    [
                        'type' => 'column',
                        'name' => '3М',
                        'data' => [ (int) $t11, (int) $t21, (int) $t31, (int) $t41, (int) $t51, (int) $t61 ],
                        'color' => '#34495E',
                    ],
                    [
                        'type' => 'column',
                        'name' => '4М',
                        'data' => [(int) $t12, (int) $t22, (int) $t32, (int) $t42, (int) $t52, (int) $t62],
                        'color' => '#1ABB9C',
                    ],
                    [
                        'type' => 'column',
                        'name' => '5М',
                        'data' => [(int) $t13, (int) $t23, (int) $t33, (int) $t43, (int) $t53, (int) $t63],
                    ],
                    [
                        'type' => 'column',
                        'name' => '6М',
                        'data' => [(int) $t14, (int) $t24, (int) $t34, (int) $t44, (int) $t54, (int) $t64],
                    ],
                    [
                        'type' => 'column',
                        'name' => '8М',
                        'data' => [(int) $t15, (int) $t25, (int) $t35, (int) $t45, (int) $t55, (int) $t65],
                    ],
                    [
                        'type' => 'column',
                        'name' => '10М',
                        'data' => [(int) $t16, (int) $t26, (int) $t36, (int) $t46, (int) $t56, (int) $t66],
                    ],
                    [
                        'type' => 'spline',
                        'name' => 'Абонентов в месяц',
                        'data' => [(int) $t1, (int) $t2, (int) $t3, (int) $t4, (int) $t5, (int) $t6, ],
                        'marker' => [
                            'lineWidth' => 2,
                            'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
                            'fillColor' => 'white',
                        ],
                    ],
                    [
                        'type' => 'pie',
                        'name' => 'Всего абонентов',
                        'data' => [
                            [
                                'name' => '3М',
                                'y' => (int) $tarOne,
                                'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
//                                'color' => 'red',
                            ],
                            [
                                'name' => '4М',
                                'y' => (int) $tarTwo,
                                'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
                            ],
                            [
                                'name' => '5М',
                                'y' => (int) $tarThree,
                                'color' => new JsExpression('Highcharts.getOptions().colors[2]'), // Joe's color
                            ],
                            [
                                'name' => '6М',
                                'y' => (int) $tarFour,
                                'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // Joe's color
                            ],
                            [
                                'name' => '8М',
                                'y' => (int) $tarFive,
                                'color' => new JsExpression('Highcharts.getOptions().colors[4]'), // Joe's color
                            ],
                            [
                                'name' => '10М',
                                'y' => (int) $tarSix,
                                'color' => new JsExpression('Highcharts.getOptions().colors[6]'), // Joe's color
                            ],
                        ],
                        'center' => [100, 80],
                        'size' => 100,
                        'showInLegend' => false,
                        'dataLabels' => [
                            'enabled' => false,
                        ],
                    ],
                ],
            ]
        ]);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Последние добавленные абоненты</h2>
                <div class="clearfix"></div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped jambo_table">
                    <thead>
                    <tr class="headings">
                        <th class="column-title"># </th>
                        <th class="column-title text-center">Абонент</th>
                        <th class="column-title text-center">Дата подключения</th>
                        <th class="column-title text-center">Тариф</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $i = 1; foreach ($userAbonents as $userAbonent) : ?>
                    <tr class="even pointer">
                        <td class=" "><?= $i ?></td>
                        <td class=" "><?= $userAbonent->surname . ' ' . $userAbonent->firstname . ' ' . $userAbonent->secondname ?> </td>
                        <td class="text-center"><?= $userAbonent->date_contract ?></td>
                        <td class="text-center"><?= $userAbonent->tariffs->name ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-right">
                    <a href="/admin/user/index">Перейти ко всем абонентам</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Новые заявки на подключение</h2>
                <div class="clearfix"></div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped jambo_table">
                    <thead>
                    <tr class="headings">
                        <th class="column-title"># </th>
                        <th class="column-title text-center">Абонент</th>
                        <th class="column-title text-center">Дата заявки</th>
                        <th class="column-title text-center">Телефон</th>
                        <th class="column-title text-center">Адрес</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $i = 1; foreach ($requestLists as $requestList) : ?>
                        <tr class="even pointer">
                            <td class=" "><?= $i ?></td>
                            <td class=" "><?= $requestList->surname . ' ' . $requestList->first_name . ' ' . $requestList->second_name ?> </td>
                            <td class="text-center"><?= $requestList->date ?></td>
                            <td class="text-center"><?= $requestList->phone ?></td>
                            <td class="text-center"><?= $requestList->address ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-right">
                    <a href="/admin/reqquest/index">Перейти ко всем заявкам</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Последние платежи абонентов</h2>
                <div class="clearfix"></div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped jambo_table">
                    <thead>
                    <tr class="headings">
                        <th class="column-title"># </th>
                        <th class="column-title text-center">Абонент</th>
                        <th class="column-title text-center">Дата платежа</th>
                        <th class="column-title text-center">Сумма платежа</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $i = 1; foreach ($payLists as $payList) : ?>
                        <tr class="even pointer">
                            <td class=" "><?= $i ?></td>
                            <td class=" "><?= $payList->user->surname . ' ' . $payList->user->firstname . ' ' . $payList->user->secondname ?> </td>
                            <td class="text-center"><?= $payList->date ?></td>
                            <td class="text-center"><?= $payList->sum ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-right">
                    <a href="/admin/pays/index">Перейти ко всем платежам</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Заявки на смену тарифного плана</h2>
                <div class="clearfix"></div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped jambo_table">
                    <thead>
                    <tr class="headings">
                        <th class="column-title"># </th>
                        <th class="column-title text-center">Абонент</th>
                        <th class="column-title text-center">Дата заявки</th>
                        <th class="column-title text-center">Телефон</th>
                        <th class="column-title text-center">Адрес</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $i = 1; foreach ($requestChangeLists as $requestChangeList) : ?>
                        <tr class="even pointer">
                            <td class=" "><?= $i ?></td>
                            <td class=" "><?= $requestChangeList->user->surname . ' ' . $requestChangeList->user->firstname . ' ' . $requestChangeList->user->secondname ?> </td>
                            <td class="text-center"><?= $requestChangeList->date ?></td>
                            <td class="text-center"><?= $requestChangeList->oldtariffs->name ?></td>
                            <td class="text-center"><?= $requestChangeList->newtariffs->name ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-right">
                    <a href="/admin/requesttarif/index">Остальные заявки</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main content -->
<div class="row">
    <?php

    ?>
</div>


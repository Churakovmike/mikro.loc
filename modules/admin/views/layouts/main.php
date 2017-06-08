<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
$bundle = yiister\gentelella\assets\Asset::register($this);

?>
<?php $request = \app\models\Request::find()->where(['status' => 1])->count(); ?>
<?php $user = \app\modules\admin\models\User::find()->where(['id' => Yii::$app->user->id])->one(); ?>
<?php $requests = \app\modules\admin\models\Request::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(5)->all(); ?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-md">
<?php $this->beginBody(); ?>

<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="/admin" class="site_title"><i class="fa fa-asterisk"></i> <span>Админпанель</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
<!--                        <img src="http://placehold.it/128x128" alt="..." class="img-circle profile_img">-->
                        <img src="/images/operator/operator.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Добро пожаловать,</span>
                        <h2><?= $user->firstname . ' ' . $user->surname ?></h2>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3> &nbsp;<?= $user->username ?></h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    [
                                        "label" => "Базовые станции",
                                        "url" => "#",
                                        "icon" => "wrench",
                                        "items" => [
                                            [
                                                "label" => "Список",
                                                "url" => "/admin/stations/index",
                                            ],
                                            [
                                                "label" => "Добавить",
                                                "url" => "/admin/stations/create",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "микротики",
                                        "url" => "#",
                                        "icon" => "hdd-o",
                                        "items" => [
                                            [
                                                "label" => "Список",
                                                "url" => "/admin/mikrotiks/index",
                                            ],
                                            [
                                                "label" => "Добавить",
                                                "url" => "/admin/mikrotiks/create",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Соединения",
                                        "url" => "#",
                                        "icon" => "cube",
                                        "items" => [
                                            [
                                                "label" => "Список",
                                                "url" => "/admin/connection/index",
                                            ],
                                            [
                                                "label" => "Добавить",
                                                "url" => "/admin/connection/create",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Оборудование",
                                        "url" => "#",
                                        "icon" => "plug",
                                        "items" => [
                                            [
                                                "label" => "Список",
                                                "url" => "/admin/devices/index",
                                            ],
                                            [
                                                "label" => "Добавить",
                                                "url" => "/admin/devices/create",
                                            ],
                                            [
                                                "label" => "Замена",
                                                "url" => "#",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Замена оборудования",
                                        "url" => "#",
                                        "icon" => "exchange",
                                        "items" => [
                                            [
                                                "label" => "Список",
                                                "url" => "/admin/changedevices/index",
                                            ],
                                            [
                                                "label" => "Добавить",
                                                "url" => "/admin/changedevices/create",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Тарифы",
                                        "url" => "#",
                                        "icon" => "puzzle-piece",
                                        "items" => [
                                            [
                                                "label" => "Список",
                                                "url" => "/admin/tariffs",
                                            ],
                                            [
                                                "label" => "Добавить",
                                                "url" => "/admin/tariffs/create",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Черный список",
                                        "url" => "#",
                                        "icon" => "exclamation-triangle",
                                        "items" => [
                                            [
                                                "label" => "Список",
                                                "url" => "/admin/blacklist/index",
                                            ],
                                            [
                                                "label" => "Добавить",
                                                "url" => "/admin/blacklist/create",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Абоненты",
                                        "url" => "#",
                                        "icon" => "user",
                                        "items" => [
                                            [
                                                "label" => "Список",
                                                "url" => "/admin/user/index",
                                            ],
                                            [
                                                "label" => "Добавить",
                                                "url" => "/admin/user/create",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Заявки подключение",
                                        "url" => "#",
                                        "icon" => "bell",
                                        "items" => [
                                            [
                                                "label" => "Список",
                                                "url" => "/admin/request/index",
                                            ],
                                            [
                                                "label" => "Добавить",
                                                "url" => "/admin/request/create",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Заявки смена тарифа",
                                        "url" => "#",
                                        "icon" => "history",
                                        "items" => [
                                            [
                                                "label" => "Список",
                                                "url" => "/admin/requesttarif/index",
                                            ],
                                            [
                                                "label" => "Добавить",
                                                "url" => "/admin/requesttarif/create",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Журнал операций",
                                        "url" => "#",
                                        "icon" => "steam",
                                        "items" => [
                                            [
                                                "label" => "Просмотреть",
                                                "url" => "/admin/pays/index",
                                            ],
                                            [
                                                "label" => "Добавить",
                                                "url" => "/admin/pays/create",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Новости",
                                        "url" => "#",
                                        "icon" => "newspaper-o",
                                        "items" => [
                                            [
                                                "label" => "Список",
                                                "url" => "/admin/news/index",
                                            ],
                                            [
                                                "label" => "Добавить",
                                                "url" => "/admin/news/create",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Сотрудники",
                                        "url" => "#",
                                        "icon" => "child",
                                        "items" => [
                                            [
                                                "label" => "Список",
                                                "url" => "/admin/user/employee",
                                            ],
                                            [
                                                "label" => "Добавить",
                                                "url" => "/admin/user/createemploye",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Отложенные задания",
                                        "url" => "#",
                                        "icon" => "tasks",
                                        "items" => [
                                            [
                                                "label" => "Все",
                                                "url" => "/admin/tasks/index",
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Журнал событий",
                                        "url" => "#",
                                        "icon" => "building-o",
                                        "items" => [
                                            [
                                                "label" => "Просмотреть",
                                                "url" => "/admin/actionlist/index",
                                            ],
                                        ],
                                    ],
//                                    ["label" => "Home", "url" => "/", "icon" => "home"],
//                                    ["label" => "Layout", "url" => ["site/layout"], "icon" => "files-o"],
//                                    ["label" => "Error page", "url" => ["site/error-page"], "icon" => "close"],
//                                    [
//                                        "label" => "Widgets",
//                                        "icon" => "th",
//                                        "url" => "#",
//                                        "items" => [
//                                            ["label" => "Menu", "url" => ["site/menu"]],
//                                            ["label" => "Panel", "url" => ["site/panel"]],
//                                        ],
//                                    ],
//                                    [
//                                        "label" => "Badges",
//                                        "url" => "#",
//                                        "icon" => "table",
//                                        "items" => [
//                                            [
//                                                "label" => "Default",
//                                                "url" => "#",
//                                                "badge" => "123",
//                                            ],
//                                            [
//                                                "label" => "Success",
//                                                "url" => "#",
//                                                "badge" => "new",
//                                                "badgeOptions" => ["class" => "label-success"],
//                                            ],
//                                            [
//                                                "label" => "Danger",
//                                                "url" => "#",
//                                                "badge" => "!",
//                                                "badgeOptions" => ["class" => "label-danger"],
//                                            ],
//                                        ],
//                                    ],
                                    # мультиуровневоё меню
//                                    [
//                                        "label" => "Multilevel",
//                                        "url" => "#",
//                                        "icon" => "table",
//                                        "items" => [
//                                            [
//                                                "label" => "Second level 1",
//                                                "url" => "#",
//                                            ],
//                                            [
//                                                "label" => "Second level 2",
//                                                "url" => "#",
//                                                "items" => [
//                                                    [
//                                                        "label" => "Third level 1",
//                                                        "url" => "#",
//                                                    ],
//                                                    [
//                                                        "label" => "Third level 2",
//                                                        "url" => "#",
//                                                    ],
//                                                    [
//                                                        "label" => "Third level 3",
//                                                        "url" => "#",
//                                                    ],
//                                                ],
//
//                                            ],
//                                        ],
//                                    ],
                                ],
                            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Выйти" href="/site/logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">

                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="/images/operator/operator.jpg" alt=""><?= $user->firstname . ' ' . $user->surname ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="/">  На сайт</a></li>
                                <li><a href="/site/logout"><i class="fa fa-sign-out pull-right"></i> Выйти</a>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>


                                <span class="badge bg-green"><?= $request ?></span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <?php foreach ($requests as $item) : ?>
                                <li>
                                    <a href="/admin/request/view?id=<?= $item->id ?>">
                      <span class="image">
                                        <img src="/images/operator/zajavka.png" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span><?= $item->phone ?></span>
                      <span class="time"><?= $item->date ?></span>
                      </span>
                      <span class="message">
                                        <?= $item->surname . ' ' . $item->first_name . ' ' . $item->address ?>
                                    </span>
                                    </a>
                                </li>
                                <?php endforeach; ?>

                                <li>
                                    <div class="text-center">
                                        <a href="/admin/request/index">
                                            <strong>Перейти к заявкам</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li><a href="/admin/analitics/result">Прогноз абонентов</a></li>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">111
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>
            <?= Breadcrumbs::widget([
                'homeLink' => [
                    'label' => Yii::t('yii', 'Главная'),
                    'url' => '/admin',
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
            <div class="clearfix"></div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Елизавета Чуракова
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
<!--<scripts>-->
<!--    $().DataTable();-->
<!--</scripts>-->
<script src="/js/main.js"></script>
</body>
</html>
<?php $this->endPage(); ?>

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


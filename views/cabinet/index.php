<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!--/start-banner-->
<div class="banner two">
    <div class="container">
        <h2 class="inner-tittle">Личный кабинет</h2>
    </div>
</div>
<!--//end-banner-->
<div class="main-content">
    <div class="container">
        <?php Yii::$app->session; ?>
        <?php if( Yii::$app->session->has('tarif') ): ?>
            <div class="row">
            <div class="alert alert-success text-center" role="alert"> <?=  Yii::$app->session->getFlash('tarif'); ?></div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-responsive">
                    <tr>
                        <th colspan="2">Информация о договоре</th>
                    </tr>
                    <tr>
                        <td>Абонент</td>
                        <td><?= $userInfo->surname ?> <?= $userInfo->firstname ?> <?= $userInfo->secondname ?></td>
                    </tr>
                    <tr>
                        <td>Договор</td>
                        <td>№ <?= $userInfo->number_contract ?> от <?= $userInfo->date_contract ?></td>
                    </tr>
                    <tr>
                        <td>Лицевой счет</td>
                        <td>000<?= $userInfo->id ?></td>
                    </tr>
                    <tr>
                        <td>Текущий баланс</td>
                        <td><?= $userInfo->balance ?>.00</td>
                    </tr>
                    <tr>
                        <td>Адрес</td>
                        <td><?= $userInfo->address ?>.00</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-responsive">
                    <tr>
                        <th colspan="2">Дополнительная информация</th>
                    </tr>
                    <tr>
                        <td>Тарифный план</td>
                        <td><?= $tarif->description ?> за <?= $tarif->cost ?> в месяц</td>
                    </tr>
                    <tr>
                        <td>Оборудование</td>
                        <td>Серийный номер: <?= $device->serialnumber ?></td>
                    </tr>
                    <tr>
                        <td>Статус учетной записи</td>
                        <td><?php if (!$userInfo->activity) echo 'неактивна'; else echo 'активная'; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="/cabinet/change" method="get">
                    <div class="form-group">
                        <label for="tarif">Вы можете оставить заявку на смену тарифа</label>
                        <select id="tarif" class="form-control" name="tarif">
                            <?php foreach ($tariflist as $tarifitem) : ?>
                                <option value="<?= $tarifitem->id ?>"><?= $tarifitem->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="submit" value="Сменить тариф" class="btn btn-warning">
                </form>
            </div>
            <div class="col-md-6">
                <form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
                    <div class="form-group">
                        <label for="tarif">Пополнить баланс</label>
                        <input type="hidden" name="receiver" value="41001990623999">
                        <input type="hidden" name="quickpay-form" value="shop">
                        <input type="hidden" name="targets" value="Название товара">
                        <input type="hidden" name="paymentType" value="PC">
                        <input type="hidden" name="successURL" value="http://mikro.kotovolt.ru/cabinet">
                        <div class="form-group">
                        <input type="text" name="label" placeholder="Введите свой логин" required class="form-control" >
                        </div>
                        <div class="form-group">
                        <input type="text" name="sum" placeholder="Сумма" required class="form-control" >
                        </div>
                        <input type="submit" value="Оплатить" class="btn btn-warning">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-responsive table-stripped">
                    <tr>
                        <th>#</th>
                        <th class="text-center">Дата</th>
                        <th class="text-center">Тариф</th>
                        <th class="text-center">Статус</th>
                    </tr>
                    <?php $i = 1; foreach ($tarifChangeLists as $changeList) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td class="text-center"><?= $changeList->date ?></td>
                        <td class="text-center"><?= $changeList->new_tarif ?></td>
                        <td class="text-center"><?= $changeList->status ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
</div>

<iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/quickpay/button-widget?account=41001990623999&quickpay=small&yamoney-payment-type=on&button-text=01&button-size=l&button-color=orange&targets=%D0%90%D0%B1%D0%BE%D0%BD%D0%B5%D0%BD%D1%82%D1%81%D0%BA%D0%B0%D1%8F+%D0%BF%D0%BB%D0%B0%D1%82%D0%B0&default-sum=300&fio=on&mail=on&phone=on&successURL=http%3A%2F%2Fmikro.kotovolt.ru%2Fcabinet" width="238" height="48"></iframe>
<?php
use dosamigos\datepicker\DateRangePicker;

$this->title = 'Отчет по новым абонентам';
$this->params['breadcrumbs'][] = ['label' => 'Абоненты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-otchet">
    <div class="x_panel">
        <div class="row">
            <div class="col-md-3">
            <?= DateRangePicker::widget([
                'language' => 'ru',
                'name' => 'date_from',
                'value' => date('Y-m-d'),
                'nameTo' => 'name_to',
                'valueTo' => date('Y-m-d'),
                'labelTo' => 'по',
                'clientOptions' => [
                    'autoclose' => true,
    //                                                    'format' => 'dd-M-yyyy'
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>
            </div>
            <div class="col-md-1">
                <button class="btn btn-default" onclick="showPeriodAbonents()">Сформировать</button>
            </div>
        </div>
        <div class="row">
            <div class="" id="innerbox"></div>
        </div>
    </div>
</div>

<script>
    function showPeriodAbonents() {
//        alert('lol');
        var start = $('#w0').val();
        var end = $('input[name="name_to"]').val();

//        var id = $('#w1').val();
//        alert($('input[name="name_to"]').val());
        $.ajax ({
            url: '/admin/user/get-users-period',
            data: {start: start, end: end},
            type: 'GET',
            success: function (res) {
                $('#innerbox').html('');
                if (!res) alert('ошибка');
                $('#innerbox').html(res);
            },
            error: function () {
                alert('Ошибка получения данных');
            }
        });
    }
</script>
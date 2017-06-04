<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\DevicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Оборудование';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="devices-index">
    <div class="x_panel">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить устройство', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
//            'station_id',
            'namestation',
            'serialnumber',
            'serial',
            'regnumber',
            [
                'attribute' => 'devicesstatus',
                'format' => 'html',
                'value' => function($data) {
                    return !$data->devicesstatus ? "<span class='label label-success'>Свободно</span>" : "<span class='label label-warning'>У клиента</span>";
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>

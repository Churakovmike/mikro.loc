<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки на подключение';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить заявку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'surname',
            'first_name',
            'second_name',
            'address:ntext',
            'phone',
            'name',
//            'tariff_id',
            'date',
//            'status',
            [
                'attribute' => 'status',
                'value' => function($data) {
                    if ($data->status == 1) return 'Не обработана';
                    if ($data->status == 2) return 'В работе';
                    if ($data->status == 3) return 'Выполнена';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>

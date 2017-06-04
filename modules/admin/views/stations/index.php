<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Базовые станции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stations-index">
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить базовую станцию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php \yii\widgets\Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'namestation',
            'comment',
            //'mikrotiks_id',
            'ip',
//            [
//                'attribute' => 'asd',
//                'value' => function($data) {
//                    return '<a href="index.php">123</a>';
//                },
//                'format' => 'html',
//            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end(); ?>
        </div>
</div>

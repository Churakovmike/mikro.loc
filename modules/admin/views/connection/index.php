<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Соединения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="connection-index">
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить соединение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nameconnection',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>

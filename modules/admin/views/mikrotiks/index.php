<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Микротики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mikrotiks-index">
    <div class="x_panel">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p>
        <?= Html::a('Добавить микротик', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'city',
            'ip',
            'login',
            'password',
            //'namestation',
            // 'basestation_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>

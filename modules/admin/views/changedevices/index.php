<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Замена оборудования';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="changedevices-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая замена', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            [
                'label' => 'Абонент',
                'format' => 'html',
                'value' => function($data) {
                    return "<a href='/admin/user/view?id=" . $data->user_id . "'>" . $data->user->surname . " " .  $data->user->firstname . " " . $data->user->secondname . '</a>';
                }
            ],
            'olddevice_id',
            'newdevice_id',
            'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

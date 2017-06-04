<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки на смену тарифного плана';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requesttarif-index">

    <?php Yii::$app->session; ?>
    <?php if( Yii::$app->session->has('response') ): ?>
        <div class="row">
            <div class="alert alert-success text-center" role="alert"> <?=  Yii::$app->session->getFlash('response'); ?></div>
        </div>
    <?php endif; ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая заявка', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'user_id',
            [
                'label' => 'Логин',
                'value' => function($data) {
                    return $data->user->username;
                }
            ],
            [
                'attribute' => 'user_id',
                'value' => function($data) {
                    return $data->user->surname . ' ' . $data->user->firstname . ' ' . $data->user->secondname;
                }
            ],
//            'old_tarif',
//            'new_tarif',
            [
                'attribute' => 'old_tarif',
                'value' => function($data) {
                    return $data->oldtariffs->name;
                }
            ],
            [
                'attribute' => 'new_tarif',
                'value' => function($data) {
                    return $data->newtariffs->name;
                }
            ],
//            'status',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function($data) {
                    return !$data->status ? "<span class='label label-warning'>В обработке</span>" : "<span class='label label-success'>Выполнена</span>";
                }
            ],
            [
                'label' => 'Перевести',
                'format' => 'html',
                'value' => function($data) {
                    return "<a href='/admin/requesttarif/change?id=" . $data->id . "'>Перевести абонента</a>";
                }
            ],
            // 'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

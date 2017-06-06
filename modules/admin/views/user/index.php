<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Абоненты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php Yii::$app->session; ?>
    <?php if( Yii::$app->session->has('response') ): ?>
    <div class="row">
        <div class="alert alert-success text-center" role="alert"> <?=  Yii::$app->session->getFlash('response'); ?></div>
    </div>
    <?php endif; ?>
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Новый абонент', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
        <?php \yii\widgets\Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
//            'surname',
            [
                'attribute' => 'surname',
                'value' => function($data) {
                    return "<a href='/admin/user/view?id=" . $data->id . "'>" . $data->surname . "</a>";
                },
                'format' => 'html',
            ],
            'firstname',
            'secondname',
            'balance',
            [
                'label' => 'Тариф',
                'value' => function($data) {
                    return $data->tariffs->name;
                }
            ],
            [
//                'attribute' => 'id',
                'label' => 'Стоимость тарифа',
                'value' => function($data) {
                    return $data->tariffs->cost;
                }
            ],
            'username',
            [
                'attribute' => 'activity',
                'format' => 'html',
                'value' => function($data) {
                    return !$data->activity ? "<span class='label label-danger'>деактивирован</span>" : "<span class='label label-success'>активен</span>";
                }
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            // 'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        <?php \yii\widgets\Pjax::end(); ?>
        </div>
</div>
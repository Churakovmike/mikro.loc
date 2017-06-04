<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stations-index">
    <div class="x_panel">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить сотрудника', ['createemploye'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php \yii\widgets\Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'surname',
            'firstname',
            'secondname',
            'username',
//            [
//                'attribute' => 'asd',
//                'value' => function($data) {
//                    return '<a href="index.php">123</a>';
//                },
//                'format' => 'html',
//            ],
            [
                'label' => 'Просмотреть',
                'format' => 'html',
                'value' => function($data) {
                    return "<a href='/admin/user/viewemploye?id=" . $data->id . "' class='label label-success'>Перейти</a>
                            <a href='/admin/user/updateemploye?id=" . $data->id . "' class='label label-warning'>Обновить</a>
                            <a href='/admin/user/deleteemploye?id=" . $data->id . "' class='label label-danger'>Удалить</a>";
                }

            ],
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end(); ?>
    </div>
</div>

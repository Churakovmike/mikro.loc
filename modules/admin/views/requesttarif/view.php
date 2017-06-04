<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Requesttarif */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки на смену тарифного плана', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requesttarif-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить заявку?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'user_id',
//            'old_tarif',
//            'new_tarif',
//            'status',
            [
                'attribute' => 'user_id',
                'value' => function($data) {
                    return $data->user->surname . ' ' . $data->user->firstname . ' ' . $data->user->secondname;
                }
            ],
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
            'date',
        ],
    ]) ?>

</div>

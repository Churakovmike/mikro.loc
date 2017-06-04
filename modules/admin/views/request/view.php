<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Request */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки на подключение', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-view">
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'surname',
            'first_name',
            'second_name',
            'address:ntext',
            'phone',
            'name',
//            'tariff_id',
            'date',
            [
                'attribute' => 'status',
                'value' => function($data) {
                    if ($data->status == 1) return 'Не обработана';
                    if ($data->status == 2) return 'В работе';
                    if ($data->status == 3) return 'Выполнена';
                }
            ],
//            'status',
        ],
    ]) ?>
    </div>
</div>

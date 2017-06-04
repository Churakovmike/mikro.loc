<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Changedevices */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Замена оборудования', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="changedevices-view">

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
            'user_id',
            [
                'label' => 'Абонент',
                'value' => function($data) {
                    return $data->user->username;
                }
            ],
            'olddevice_id',
            'newdevice_id',
            'date',
        ],
    ]) ?>

</div>

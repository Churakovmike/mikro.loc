<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Connection */

$this->title = $model->nameconnection;
$this->params['breadcrumbs'][] = ['label' => 'Соединения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="connection-view">
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить текущее соединение?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nameconnection',
        ],
    ]) ?>
    </div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Stations */

$this->title = $model->namestation;
$this->params['breadcrumbs'][] = ['label' => 'Базовые станции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stations-view">

    <div class="x_panel">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Действительно удалить базовую станцию? Данное дейтсвие может быть выполнено только с правами администратора.',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'namestation',
            'comment',
            'ip',
        ],
    ]) ?>
    </div>
</div>

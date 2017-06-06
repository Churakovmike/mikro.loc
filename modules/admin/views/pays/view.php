<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Pays */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Журнал операций', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pays-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить запись из журнала операций?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'sum',
            'username',
            'date',
        ],
    ]) ?>

</div>

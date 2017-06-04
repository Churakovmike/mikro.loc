<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Mikrotiks */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Микротики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mikrotiks-view">

    <div class="x_panel">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить микротик? После удаления устройства связанные с ним записи останутся в базе.',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'city',
            'ip',
            'login',
            'password',
//            'basestation_id',
            'mikrotik_model',
            'version_os',
        ],
    ]) ?>
    </div>
</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Connection */

$this->title = 'Обновить соединение: ' . $model->nameconnection;
$this->params['breadcrumbs'][] = ['label' => 'Соединения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nameconnection, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="connection-update">
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>

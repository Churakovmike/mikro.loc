<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */

$this->title = 'Обновить сотрудника: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['employee']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="user-update">
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formemployee', [
        'model' => $model,
    ]) ?>
    </div>
</div>

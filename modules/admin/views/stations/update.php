<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Stations */

$this->title = 'Обновить базовую станцию: ' . $model->namestation;
$this->params['breadcrumbs'][] = ['label' => 'Базовые станции', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->namestation, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление данных';
?>
<div class="stations-update">
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>

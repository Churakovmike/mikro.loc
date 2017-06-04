<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Stations */

$this->title = 'Добавить базовую станцию';
$this->params['breadcrumbs'][] = ['label' => 'Базовые станции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stations-create">
    <br>
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */

$this->title = 'Новый сотрудник';
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['employee']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-create">
    <div class="x_panel">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formemployee', [
        'model' => $model,
    ]) ?>
    </div>
</div>

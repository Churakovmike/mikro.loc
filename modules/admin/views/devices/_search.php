<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\DevicesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="devices-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'namestation') ?>

    <?= $form->field($model, 'station_id') ?>

    <?= $form->field($model, 'serialnumber') ?>

    <?= $form->field($model, 'serial') ?>

    <?php // echo $form->field($model, 'regnumber') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

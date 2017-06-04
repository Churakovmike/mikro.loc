<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Mikrotiks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mikrotiks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip')->widget(\yii\widgets\MaskedInput::className(), [
        'name' => 'input-34',
        'clientOptions' => [
            'alias' =>  'ip'
        ],
    ]) ?>
<!--    --><?//= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'basestation_id')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'basestation_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Stations::find()->all(), 'id', 'namestation')) ?>

    <?= $form->field($model, 'mikrotik_model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'version_os')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

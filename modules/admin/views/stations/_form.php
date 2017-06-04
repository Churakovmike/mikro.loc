<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Stations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'namestation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mikrotiks_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Mikrotiks::find()->all(), 'id', 'ip')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

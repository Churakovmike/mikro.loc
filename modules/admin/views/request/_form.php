<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'second_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tariff_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Tariffs::find()->all(), 'id', 'name')) ?>


    <!--    --><?//= $form->field($model, 'tariff_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'date')->textInput() ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'Не обработана',
        '2' => 'В работе',
        '3' => 'Выполнена',

    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

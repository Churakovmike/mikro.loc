<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Requesttarif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requesttarif-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\User::find()->all(), 'id', 'username')) ?>

<!--    --><?//= $form->field($model, 'old_tarif')->textInput() ?>
    <?= $form->field($model, 'old_tarif')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Tariffs::find()->all(), 'id', 'name')) ?>


    <?= $form->field($model, 'new_tarif')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Tariffs::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'status')->dropDownList(['0' => 'В обработке', '1' => 'Выполнена']) ?>

<!--    --><?//= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'date')->widget(
        DatePicker::className(), [
        'model' => $model,
        'attribute' => 'date_contract',
        'language' => 'ru',
        'name' => 'Test',
        'value' => date('Y-m-d h-i'),
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

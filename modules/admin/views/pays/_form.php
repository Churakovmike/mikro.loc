<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Pays */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pays-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList(['Списание' => 'Списание', 'Зачисление' => 'Зачисление']) ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'username')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\User::find()->where(['role' => 'abonent'])->all(), 'username', 'username')) ?>

<!--    --><?//= $form->field($model, 'date')->textInput(['value' => date('Y-m-h')]) ?>

    <?= $form->field($model, 'date')->widget(
        DatePicker::className(), [
        'model' => $model,
        'attribute' => 'date_contract',
        'language' => 'ru',
        'name' => 'Test',
        'value' => date('Y-m-d'),
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

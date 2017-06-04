<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Changedevices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="changedevices-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\User::find()->orderBy(['id' => SORT_DESC])->all(), 'id', 'username')) ?>

<!--    --><?//= $form->field($model, 'olddevice_id')->textInput() ?>

    <?= $form->field($model, 'newdevice_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Devices::find()->where(['devicesstatus' => '0'])->all(), 'id', 'serialnumber')) ?>

<!--    --><?//= $form->field($model, 'newdevice_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'date')->textInput() ?>

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

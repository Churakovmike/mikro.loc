<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\base\Security;
use yii\widgets\MaskedInput;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
//     $security = new Security();
//    echo $randomString = $security->generateRandomString(10);
//    echo $auth = ;
    ?>
<!--    --><?php //$a = generateRandomString(); ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'secondname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
        'name' => 'input-1',
        'mask' => '+7(999) 999-9999'
        ]);
    ?>

    <?= $form->field($model, 'date_contract')->widget(
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

    <?= $form->field($model, 'balance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tariffs_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Tariffs::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'connection_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Connection::find()->all(), 'id', 'nameconnection')) ?>

    <?= $form->field($model, 'number_contract')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'activity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activity')->dropDownList(['1' => 'active', '0' => 'disable']) ?>

    <?= $form->field($model, 'devices_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Devices::find()->where(['devicesstatus' => '0'])->all(), 'id', 'serialnumber')) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'status')->textInput(['value' => '10']) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

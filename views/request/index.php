<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $form ActiveForm */
?>
<!--/start-banner-->
<div class="banner two">
    <div class="container">
        <h2 class="inner-tittle">Личный кабинет</h2>
    </div>
</div>
<!--//end-banner-->
<div class="main-content">
    <div class="container">
        <div class="request-index col-md-6 col-md-offset-3">

            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'surname') ?>
                <?= $form->field($model, 'first_name') ?>
                <?= $form->field($model, 'second_name') ?>
                <?= $form->field($model, 'address') ?>
<!--                --><?//= $form->field($model, 'phone') ?>
                <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                    'name' => 'input-1',
                    'mask' => '+7(999) 999-9999'
                ]);
                ?>
                <?= $form->field($model, 'tariff_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Tariffs::find()->all(), 'id', 'name')) ?>
                <?= $form->field($model, 'status')->hiddenInput(['value' => '1'])->label(false) ?>
<!--                --><?//= $form->field($model, 'date') ?>

                <div class="form-group">
                    <?= Html::submitButton('Подключиться', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>

        </div><!-- request-index -->
    </div>
</div>

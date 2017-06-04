<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Blacklist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blacklist-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->widget(\yii\widgets\MaskedInput::className(), [
        'name' => 'input-35',
        'clientOptions' => [
            'alias' =>  'url'
        ],
    ]) ?>

    <?= $form->field($model, 'reason')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'employee_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Удалить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

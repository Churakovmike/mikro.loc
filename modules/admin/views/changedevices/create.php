<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Changedevices */

$this->title = 'Новая замена';
$this->params['breadcrumbs'][] = ['label' => 'Замена оборудования', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="changedevices-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Requesttarif */

$this->title = 'Новая заявка';
$this->params['breadcrumbs'][] = ['label' => 'Заявки на смену тарифного плана', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requesttarif-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Connection */

$this->title = 'Новое соединение';
$this->params['breadcrumbs'][] = ['label' => 'Соединения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="connection-create">
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>

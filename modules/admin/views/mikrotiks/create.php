<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Mikrotiks */

$this->title = 'Добавить микротик';
$this->params['breadcrumbs'][] = ['label' => 'Микротики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mikrotiks-create">
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>

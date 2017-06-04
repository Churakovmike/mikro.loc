<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Actionlist */

$this->title = 'Create Actionlist';
$this->params['breadcrumbs'][] = ['label' => 'Actionlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actionlist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

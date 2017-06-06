<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Pays */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Журнал операций', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pays-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

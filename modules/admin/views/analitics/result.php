<?php
use yii\helpers\Html;
$this->title = 'Аналитика';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="x_panel">
    <div class="actionlist-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>

        </p>
        <div class="result_str">
        <?php
        echo $myXMLData;
        ?>
        </div>
<!--        <div class="ps">*</div>-->
        <div class="itog"></div>
    </div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['employee']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['updateemploye', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['deleteemploye', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'username',
                'surname',
                'firstname',
                'secondname',
                'address',
                'phone',
//                'date_contract',
                'balance',
//            'tariffs_id',
//            'connection_id',
//                'number_contract',
//                'activity',
//            'devices_id',
                //'auth_key',
//            'password_hash',
//            'password_reset_token',
                'email:email',
                [
                    'attribute' => 'created_at',
                    'label' => 'Дата создания',
                    'value' => function($data) {
                        return date('Y-m-d H:i', $data->created_at);
                    }
                ],
                [
                    'attribute' => 'updated_at',
                    'label' => 'Дата обновления',
                    'value' => function($data) {
                        return date('Y-m-d H:i', $data->updated_at);
                    }
                ],

//            'created_at',
//            'updated_at',
            ],
        ]) ?>
    </div>

</div>

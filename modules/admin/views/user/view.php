<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */

$this->title = $model->surname . ' ' . $model->firstname . ' ' . $model->secondname;
$this->params['breadcrumbs'][] = ['label' => 'Абоненты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <div class="x_panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
            'date_contract',
            'balance',
//            'tariffs_id',
            'nametarif',
            'nameconnection',
//            'connection_id',
            'number_contract',
//            'activity',
            [
                'attribute' => 'activity',
                'format' => 'html',
                'value' => function($data) {
                    return !$data->activity ? "<span class='label label-danger'>деактивирован</span>" : "<span class='label label-success'>активен</span>";
                }
            ],
//            'devices_id',
//            'namedevices',
            [
                'attribute' => 'serialnumber',
                'format' => 'html',
                'value' => function($data) {
                    return "<a href='/admin/devices/view?id=". $data->devices_id ."'>" . $data->serialnumber . "</a>";
                }
            ],
//            'serialnumber',
            //'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
//            'status',
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

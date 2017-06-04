<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property string $id
 * @property string $action
 * @property string $username
 * @property string $password
 * @property string $service
 * @property string $profile
 * @property integer $status
 * @property string $date
 * @property integer $task_status
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'service', 'profile', 'status', 'action'], 'safe'],
            [['status', 'task_status'], 'integer'],
            [['date'], 'safe'],
            [['username', 'password', 'service', 'profile', 'action'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'action' => 'Действие',
            'username' => 'Логин',
            'password' => 'Пароль',
            'service' => 'Подключение',
            'profile' => 'Тариф',
            'status' => 'Состояние',
            'date' => 'Дата',
            'task_status' => 'Статус задания',
        ];
    }
}

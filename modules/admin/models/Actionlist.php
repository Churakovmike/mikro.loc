<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "actionlist".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $action
 * @property string $parameters
 * @property string $route
 * @property  string $date
 */
class Actionlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actionlist';
    }

    /**
     * @inheritdoc
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function rules()
    {
        return [
            [['user_id', 'action', 'parameters', 'route'], 'required'],
            [['user_id'], 'integer'],
            [['action',  'route'], 'string', 'max' => 500],
            [['date', 'parameters'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'action' => 'Действие',
            'parameters' => 'Параметры',
            'route' => 'путь',
            'date' => 'Дата',
        ];
    }
}

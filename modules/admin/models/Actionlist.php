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
    public function rules()
    {
        return [
            [['user_id', 'action', 'parameters', 'route'], 'required'],
            [['user_id'], 'integer'],
            [['action', 'parameters', 'route'], 'string', 'max' => 500],
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
        ];
    }
}

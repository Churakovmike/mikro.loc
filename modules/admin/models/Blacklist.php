<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "blacklist".
 *
 * @property string $id
 * @property string $url
 * @property string $reason
 * @property integer $employee_id
 */
class Blacklist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blacklist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'reason', 'employee_id'], 'required'],
            [['reason'], 'string'],
            [['employee_id'], 'integer'],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Полный URL адрес',
            'reason' => 'Причина',
            'employee_id' => 'Добавил',
        ];
    }
}

<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "changedevices".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $olddevice_id
 * @property integer $newdevice_id
 * @property string $date
 */
class Changedevices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'changedevices';
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'newdevice_id'], 'required'],
            [['user_id', 'olddevice_id', 'newdevice_id'], 'integer'],
            [['date'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Абонент',
            'olddevice_id' => 'Старое устройство',
            'newdevice_id' => 'Новое устройство',
            'date' => 'Дата',
        ];
    }
}

<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "requesttarif".
 *
 * @property string $id
 * @property integer $user_id
 * @property integer $old_tarif
 * @property integer $new_tarif
 * @property integer $status
 * @property string $date
 */
class Requesttarif extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requesttarif';
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getNewtariffs() {
        return $this->hasOne(Tariffs::className(), ['id' => 'new_tarif']);
    }

    public function getOldtariffs() {
        return $this->hasOne(Tariffs::className(), ['id' => 'old_tarif']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'old_tarif', 'new_tarif', 'date'], 'required'],
            [['user_id', 'old_tarif', 'new_tarif', 'status'], 'integer'],
            [['date'], 'safe'],
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
            'old_tarif' => 'Старый тариф',
            'new_tarif' => 'Новый тариф',
            'status' => 'Статус заявки',
            'date' => 'Дата',
        ];
    }
}

<?php

namespace app\models;

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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'old_tarif', 'new_tarif'], 'required'],
            [['user_id', 'old_tarif', 'new_tarif', 'status'], 'integer'],
            [['date', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'old_tarif' => 'Old Tarif',
            'new_tarif' => 'New Tarif',
            'status' => 'Status',
            'date' => 'Date',
        ];
    }
}

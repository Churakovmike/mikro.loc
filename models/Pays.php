<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pays".
 *
 * @property string $id
 * @property string $type
 * @property integer $sum
 * @property string $username
 * @property string $date
 */
class Pays extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pays';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'sum', 'username', 'date'], 'safe'],
//            [['sum'], 'safe'],
//            [['date'], 'safe'],
            [['type', 'username'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'sum' => 'Sum',
            'username' => 'Username',
            'date' => 'Date',
        ];
    }
}

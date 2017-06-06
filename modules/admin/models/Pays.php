<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "pays".
 *
 * @property string $id
 * @property string $type
 * @property double $sum
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

    public function getUser() {
        return $this->hasOne(User::className(), ['username' => 'username']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'sum', 'username', 'date'], 'required'],
            [['sum'], 'number'],
            [['date'], 'safe'],
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
            'type' => 'Тип операции',
            'sum' => 'Сумма',
            'username' => 'Клиент',
            'date' => 'Дата',
        ];
    }
}

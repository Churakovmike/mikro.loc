<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "connection".
 *
 * @property string $id
 * @property string $nameconnection
 */
class Connection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'connection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nameconnection'], 'required'],
            [['nameconnection'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nameconnection' => 'Соединение',
        ];
    }
}

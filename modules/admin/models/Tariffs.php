<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tariffs".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property integer $cost
 * @property string $speed
 */
class Tariffs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tariffs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'cost', 'speed'], 'required'],
            [['description'], 'string'],
            [['cost'], 'integer'],
            [['name', 'speed'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'cost' => 'Стоимость',
            'speed' => 'Скорость',
        ];
    }
}

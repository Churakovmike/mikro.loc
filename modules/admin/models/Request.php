<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property string $id
 * @property string $surname
 * @property string $first_name
 * @property string $second_name
 * @property string $address
 * @property string $phone
 * @property integer $tariff_id
 * @property string $date
 * @property integer $status
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    public function getTariffs() {
        return $this->hasOne(Tariffs::className(), [ 'id' => 'tariff_id' ]);
    }

    public function getName() {
        return $this->tariffs->name;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['surname', 'first_name', 'second_name', 'address', 'phone', 'tariff_id', 'status'], 'required'],
            [['address'], 'string'],
            [['tariff_id', 'status'], 'integer'],
            [['date', 'name'], 'safe'],
            [['surname', 'first_name', 'second_name', 'phone'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Фамилия',
            'first_name' => 'Имя',
            'second_name' => 'Отчество',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'tariff_id' => 'Тариф',
            'name' => 'Тариф',
            'date' => 'Дата заявки',
            'status' => 'Статус',
        ];
    }
}

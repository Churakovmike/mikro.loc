<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "mikrotiks".
 *
 * @property string $id
 * @property string $city
 * @property string $ip
 * @property string $login
 * @property string $password
 * @property string $basestation_id
 * @property string $mikrotik_models
 * @property string $version_os
 */
class Mikrotiks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mikrotiks';
    }

    public function getStations() {
        return $this->hasMany(Stations::className(), [ 'id' => 'basestation_id' ]);
    }

//    public function getNamestation() {
//        return $this->stations->namestation;
//    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city', 'ip', 'login', 'password', 'mikrotik_model', 'version_os'], 'required'],
            [['basestation_id'], 'integer'],
            [['city', 'login', 'password', 'mikrotik_model', 'version_os'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 20],
            [['basestation', 'basestation_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'Город',
            'ip' => 'IP адрес',
            'login' => 'Логин',
            'password' => 'Пароль',
            'basestation_id' => 'Базовая станция',
            'mikrotik_model' => 'Модель оборудования',
            'version_os' => 'Оперционная система и версия',
//            'namestation' => 'Название станции',
        ];
    }
}

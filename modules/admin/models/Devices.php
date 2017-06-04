<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "devices".
 *
 * @property integer $id
 * @property string $name
 * @property integer $station_id
 * @property string $serialnumber
 * @property string $serial
 * @property string $regnumber
 */
class Devices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'devices';
    }

    public function getStations() {
        return $this->hasOne(Stations::className(), ['id' => 'station_id']);
    }

    public function getNamestation() {
        return $this->stations->namestation;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'station_id', 'serialnumber', 'serial', 'regnumber'], 'required'],
            [['station_id'], 'integer'],
            [['name', 'serialnumber', 'serial', 'regnumber', 'namestation'], 'string', 'max' => 255],
            [['devicesstatus'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
//            'station_id' => 'Базовая станция',
            'namestation' => 'Базовая станция',
            'serialnumber' => 'Серийный номер',
            'serial' => 'Серия',
            'regnumber' => 'Регистрационный номер',
            'devicesstatus' => 'Статус оборудования',
        ];
    }
}

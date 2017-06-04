<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "stations".
 *
 * @property string $id
 * @property string $namestation
 * @property string $comment
 * @property integer $mikrotiks_id
 */
class Stations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stations';
    }
    public function getMikrotiks() {
        return $this->hasOne(Mikrotiks::className(), [ 'id' => 'mikrotiks_id' ]);
    }

    public function getIp() {
        return $this->mikrotiks->ip;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['namestation', 'comment'], 'required'],
            [['namestation', 'comment'], 'string', 'max' => 500],
            [['mikrotiks_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'namestation' => 'Название станции',
            'comment' => 'Комментарий',
            'mikrotiks_id' => 'IP mikrotiks',
            'ip' => 'IP mikrotik',
        ];
    }
}

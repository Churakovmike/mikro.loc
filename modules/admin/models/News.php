<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $date
 * @property string $employee_id
 */
class News extends \yii\db\ActiveRecord
{
    public $image;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'content'], 'required'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['employee_id'], 'safe'],
            [['title', 'description'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png,jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'content' => 'Содержание',
            'date' => 'Дата добавления',
            'employee_id' => 'Добавил',
            'image' => 'Изображение',
        ];
    }

    public function upload() {
        if ( $this->validate() ) {
            $path = 'uploads/store/' . $this->image->baseName . '.' .$this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        } else {
            return false;
        }
    }
}

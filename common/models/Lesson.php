<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Lesson model
 *
 * @property integer $id
 * @property string $name
 * @property string $link
 * @property string $description
 * @property bool $show
 */
class Lesson extends ActiveRecord
{
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link', 'description', 'show'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['link'], 'url'],
            [['description'], 'string', 'max' => 2000],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public static function findVisibleLessons()
    {
        return self::find()->where(['show' => true]);
    }
}

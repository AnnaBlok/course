<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $lesson_id
 * @property int $watched_at
 */
class UserLesson extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_lesson';
    }
}

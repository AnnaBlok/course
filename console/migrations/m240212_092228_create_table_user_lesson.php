<?php

use yii\db\Migration;

/**
 * Class m240212_092228_create_table_user_lesson
 */
class m240212_092228_create_table_user_lesson extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_lesson', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'lesson_id' => $this->integer()->notNull(),
            'viewed_at' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-user_lesson-user_id',
            'user_lesson',
            'user_id',
            'user',
            'id',
        );
        $this->addForeignKey(
            'fk-user_lesson-lesson_id',
            'user_lesson',
            'lesson_id',
            'lesson',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_lesson');
    }
}

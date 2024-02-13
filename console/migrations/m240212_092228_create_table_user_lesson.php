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
            'watched_at' => $this->timestamp()->defaultValue('NOW()'),
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

        $this->createIndex(
            'idx-unique-user_lesson-user_id-lesson_id',
            'user_lesson',
            'user_id, lesson_id',
            true
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

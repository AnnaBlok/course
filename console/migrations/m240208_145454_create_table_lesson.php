<?php

use yii\db\Migration;

/**
 * Class m240208_145454_create_table_lesson
 */
class m240208_145454_create_table_lesson extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('lesson', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'link' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'show' => $this->boolean()->defaultValue(true),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('lesson');
    }
}

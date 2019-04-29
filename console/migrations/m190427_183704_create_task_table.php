<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m190427_183704_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'title' => $this->string(),
            'content' => $this->text(),
        ]);
        $this->createIndex('idx-task-user_id', '{{%task}}', 'user_id');

        $this->addForeignKey('fk-task-user_id', '{{%task}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * @return bool|void
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}

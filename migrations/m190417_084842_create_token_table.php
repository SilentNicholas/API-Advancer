<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%token}}`.
 */
class m190417_084842_create_token_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%token}}', [
            'id' => $this->PrimaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'token' => $this->string()->notNull()->unique(),
            'expired_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%token}}');
    }
}

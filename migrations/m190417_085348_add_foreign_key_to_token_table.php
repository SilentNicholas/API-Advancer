<?php

use yii\db\Migration;

/**
 * Class m190417_085348_add_foreign_key_to_token_table
 */
class m190417_085348_add_foreign_key_to_token_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx-token-user_id', '{{%token}}', 'user_id');
        $this->addForeignKey('fk-token-user_id', '{{%token}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%token}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190417_085348_add_foreign_key_to_token_table cannot be reverted.\n";

        return false;
    }
    */
}

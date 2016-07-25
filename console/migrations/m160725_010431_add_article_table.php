<?php

use yii\db\Migration;

class m160725_010431_add_article_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(40)->notNull()->unique(),
            'name' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),

        ]);
    }

    public function down()
    {
        echo "m160725_010431_add_article_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

<?php

use yii\db\Migration;

class m160725_022202_add_article_to_tag_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%article_to_tag}}', [
            'article_id' => $this->integer()->notNull(),
            'article_tag_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex('article_to_tag_article_id_index', '{{%article_to_tag}}', 'article_id');
        $this->createIndex('article_to_tag_article_tag_id_index', '{{%article_to_tag}}', 'article_tag_id');

    }

    public function down()
    {
        echo "m160725_022202_add_article_to_tag_table cannot be reverted.\n";

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

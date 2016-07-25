<?php

use yii\db\Migration;

class m160724_222530_add_article_to_category_table extends \common\ext\models\SimplexMigration
{
    public function up()
    {
        $this->createTable('{{%article_to_category}}', [
            'article_id' => $this->integer()->notNull(),
            'article_category_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex('article_to_category_article_id_index', '{{%article_to_category}}', 'article_id');
        $this->createIndex('article_to_category_article_category_id_index', '{{%article_to_category}}', 'article_category_id');
        
    }

    public function down()
    {
        echo "m160724_222530_add_article_to_category_table cannot be reverted.\n";

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

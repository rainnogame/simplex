<?php

use yii\db\Migration;

class m160725_001750_add_article_tag_table extends \common\ext\models\SimplexMigration
{
    public function up()
    {
        $this->createTable('{{%article_tag}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(40)->notNull(),
            'name' => $this->string(255)->notNull(),
        ]);

        $this->insert('{{%article_tag}}', [
            'title' => 'yii',
            'name' => 'Yii',
        ]);
        $this->insert('{{%article_tag}}', [
            'title' => 'php',
            'name' => 'PHP',
        ]);
        $this->insert('{{%article_tag}}', [
            'title' => 'server',
            'name' => 'Сервер',
        ]);
        $this->insert('{{%article_tag}}', [
            'title' => 'rendering',
            'name' => 'Рендеринг',
        ]);
    }

    public function down()
    {
        echo "m160725_001750_add_article_tag_table cannot be reverted.\n";

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

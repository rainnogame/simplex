<?php

use yii\db\Migration;

class m160724_213510_add_category_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=MyISAM';
        }

        $this->createTable('{{%article_category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(40)->notNull()->unique(),
            'name' => $this->string(255)->notNull(),
           
        ], $tableOptions);
    }

    public function down()
    {
        echo "m160724_213510_add_category_table cannot be reverted.\n";

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

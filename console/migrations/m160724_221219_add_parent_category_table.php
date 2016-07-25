<?php

use yii\db\Migration;

class m160724_221219_add_parent_category_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%article_category}}', 'parent_id', 'int not null');
    }

    public function down()
    {
        echo "m160724_221219_add_parent_category_table cannot be reverted.\n";

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

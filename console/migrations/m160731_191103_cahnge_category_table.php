<?php

use yii\db\Migration;

class m160731_191103_cahnge_category_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%article_category}}', 'alias', $this->string(255)->notNull()->defaultValue('/'));
        $this->dropColumn('{{%article_category}}', 'parent_id');
        
    }

    public function down()
    {
        echo "m160731_191103_cahnge_category_table cannot be reverted.\n";

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

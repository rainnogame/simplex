<?php

use yii\db\Migration;

class m160725_051145_change_article_category_parent_id_column extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%article_category}}', 'parent_id', $this->integer());
    }

    public function down()
    {
        echo "m160725_051145_change_article_category_parent_id_column cannot be reverted.\n";

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

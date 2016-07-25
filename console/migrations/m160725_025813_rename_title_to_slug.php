<?php

use yii\db\Migration;

class m160725_025813_rename_title_to_slug extends Migration
{
    public function up()
    {
        $this->renameColumn('{{%article}}', 'title', 'slug');
        $this->renameColumn('{{%article_category}}', 'title', 'slug');
        $this->renameColumn('{{%article_tag}}', 'title', 'slug');
    }

    public function down()
    {
        echo "m160725_025813_rename_title_to_slug cannot be reverted.\n";

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

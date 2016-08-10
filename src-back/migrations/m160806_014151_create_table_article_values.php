<?php

use yii\db\Migration;

class m160806_014151_create_table_article_values extends Migration
{
    public function up()
    {
        $this->createTable('{{%article_attribute_values}}', [
            'id' => $this->primaryKey(),
            'attribute_id' => $this->integer()->notNull(),
            'value' => $this->string(40)->notNull(),
        ]);
    }
    
    public function down()
    {
        echo "m160806_014151_create_table_article_value cannot be reverted.\n";
        
        return FALSE;
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

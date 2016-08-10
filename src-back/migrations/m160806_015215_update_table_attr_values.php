<?php

use yii\db\Migration;

class m160806_015215_update_table_attr_values extends Migration
{
    public function up()
    {
        
        $this->addColumn('{{%article_attribute_values}}', 'value_type', $this->integer()->notNull());


        
    }
    
    public function down()
    {
        echo "m160806_015215_add_fake_attributes cannot be reverted.\n";
        
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

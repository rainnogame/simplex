<?php

use yii\db\Migration;

/**
 * Handles the creation for table `article_attribute_type`.
 */
class m160805_231804_create_article_attribute_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%article_attribute_type}}', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(40)->notNull(),
            'name' => $this->string(40)->notNull(),
        ]);
    }
    
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article_attribute_type');
    }
}

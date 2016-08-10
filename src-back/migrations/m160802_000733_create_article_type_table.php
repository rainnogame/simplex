<?php

use yii\db\Migration;

/**
 * Handles the creation for table `article_type`.
 */
class m160802_000733_create_article_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%article_type}}', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(200)->notNull(),
            'name' => $this->string(200)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article_type');
    }
}

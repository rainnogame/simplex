<?php

use yii\db\Migration;

/**
 * Handles the creation for table `article`.
 */
class m160802_001309_create_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(200)->notNull(),
            'name' => $this->string(200)->notNull(),
            'content' => $this->text(),
            'category_id' => $this->integer()->notNull(),
            'type_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article');
    }
}

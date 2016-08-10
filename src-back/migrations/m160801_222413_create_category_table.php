<?php

use yii\db\Migration;

/**
 * Handles the creation for table `category`.
 */
class m160801_222413_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%article_category}}', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(120)->notNull()->defaultValue('/'),
            'name' => $this->string(120)->notNull(),
        ]);

        $this->insert('{{%article_category}}', [
            'alias' => 'php/',
            'name' => 'PHP',
        ]);
        $this->insert('{{%article_category}}', [
            'alias' => 'php/yii',
            'name' => 'Yii',
        ]);

        $this->insert('{{%article_category}}', [
            'alias' => 'php/arrays',
            'name' => 'Работа с масивами',
        ]);

        $this->insert('{{%article_category}}', [
            'alias' => 'js/',
            'name' => 'JavaScript',
        ]);
        $this->insert('{{%article_category}}', [
            'alias' => 'js/jquery',
            'name' => 'Jquery',
        ]);

        $this->insert('{{%article_category}}', [
            'alias' => 'js/oop',
            'name' => 'ООП в JavaScript',
        ]);


    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%article_category}}');
    }
}

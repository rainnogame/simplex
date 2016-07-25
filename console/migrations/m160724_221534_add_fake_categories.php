<?php

use yii\db\Migration;

class m160724_221534_add_fake_categories extends Migration
{
    public function up()
    {
        $this->insert('{{%article_category}}', [
            'title' => 'php',
            'parent_id' => '0',
            'name' => 'Язык PHP',
        ]);

        $php_category_id = Yii::$app->db->lastInsertID;

        $this->insert('{{%article_category}}', [
            'title' => 'js',
            'parent_id' => '0',
            'name' => 'Язык JavaScript',
        ]);
        $js_category_id = Yii::$app->db->lastInsertID;

        $this->insert('{{%article_category}}', [
            'title' => 'yii',
            'parent_id' => $php_category_id,
            'name' => 'Yii фреймфорк',
        ]);

        $yii_category_id = Yii::$app->db->lastInsertID;

        $this->insert('{{%article_category}}', [
            'title' => 'jquery',
            'parent_id' => $js_category_id,
            'name' => 'JQuery фреймфорк',
        ]);

        $this->insert('{{%article_category}}', [
            'title' => 'yii-rendering',
            'parent_id' => $yii_category_id,
            'name' => 'Yii рендеринг',
        ]);
        $this->insert('{{%article_category}}', [
            'title' => 'yii-migrations',
            'parent_id' => $yii_category_id,
            'name' => 'Yii миграции',
        ]);

    }

    public function down()
    {
        echo "m160724_221534_add_fake_categories cannot be reverted.\n";

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

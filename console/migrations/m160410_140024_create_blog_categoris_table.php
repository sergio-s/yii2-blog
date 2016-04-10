<?php

use yii\db\Migration;

class m160410_140024_create_blog_categoris_table extends Migration
{
    public function up()
    {
        $this->createTable('blog_categoris_table', [
            'id' => $this->primaryKey(),
            'alias' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('blog_categoris_table');
    }
}

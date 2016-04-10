<?php

use yii\db\Migration;

class m160410_135839_create_blog_posts_table extends Migration
{
    public function up()
    {
        $this->createTable('blog_posts_table', [
            'id' => $this->primaryKey(),
            'alias' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'h1' => $this->string()->notNull(),
            'content' => $this->text(),
            'createdDate' => $this->dateTime(),

        ]);
    }

    public function down()
    {
        $this->dropTable('blog_posts_table');
    }
}

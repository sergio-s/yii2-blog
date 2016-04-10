<?php

use yii\db\Migration;

class m160410_140058_create_blog_categoris_posts_table extends Migration
{
    public function up()
    {
        $this->createTable('blog_categoris_posts_table', [
            'id' => $this->primaryKey()
        ]);
    }

    public function down()
    {
        $this->dropTable('blog_categoris_posts_table');
    }
}

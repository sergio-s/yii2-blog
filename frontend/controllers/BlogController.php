<?php

namespace frontend\controllers;

use Yii;
use app\models\BlogPostsTable;
use app\models\BlogCategorisTable;
/**
 * BlogController
 */
class BlogController extends BaseFront
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        //передаем тайтл
        Yii::$app->view->title .= ': главная блога';

        $posts = BlogPostsTable::getAllPosts();
        $categoris = BlogCategorisTable::getAllCategorisPosts();

        return $this->render('index',[
                                        'posts' =>     $posts,
                                        'categoris' => $categoris,
                                        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionPost($alias = null)
    {

        //передаем тайтл
        Yii::$app->view->title .= ': пост блога';

        $post = BlogPostsTable::getOnePоst($alias);
        $categoris = BlogCategorisTable::getAllCategorisPosts();

        return $this->render('post',[
                                        'post' =>     $post,
                                        'categoris' => $categoris,
                                        ]);
    }

    /**
     * @inheritdoc
     * Получаем все посты данной категории
     */
    public function actionCategory($alias = null)
    {


        //все категории
        $categoris = BlogCategorisTable::getAllCategorisPosts();

        //получаем одну категорию по алиасу
        $currentCategory = BlogCategorisTable::getOneCategory($alias);

        //передаем тайтл
        Yii::$app->view->title .= ": категория блога - '$currentCategory->title' ";

        return $this->render('category',[
                                        'categoris' => $categoris,
                                        'currentCategory' => $currentCategory,
                                        ]);
    }

}

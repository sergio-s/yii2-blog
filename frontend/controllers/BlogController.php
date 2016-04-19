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

    // у раздела Блог шаблон другой, поэтому укажем его
    public $layout = '@app/views/layouts/page/blog';
    private $allCats;


    public function beforeAction($action)
    {
      //все категории
       $this->allCats = BlogCategorisTable::getAllCategorisPosts();

      return parent::beforeAction($action);
    }


    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        //передаем тайтл
        Yii::$app->view->title .= ': главная блога';


        $posts = BlogPostsTable::getAllPosts();


        //будет доступно в layout как $this->params['sidebar']['key']
        $this->passToSidebar(['blog-categoris' => $this->allCats]);

        return $this->render('index',[
                                        'posts' =>     $posts,
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


        //будет доступно в layout как $this->params['sidebar']['key']
        $this->passToSidebar(['blog-categoris' => $this->allCats]);

        return $this->render('post',[
                                        'post' =>     $post,
                                        ]);
    }

    /**
     * @inheritdoc
     * Получаем все посты данной категории
     */
    public function actionCategory($alias = null)
    {
        //получаем одну категорию по алиасу
        $currentCategory = BlogCategorisTable::getOneCategory($alias);

        //передаем тайтл
        Yii::$app->view->title .= ": категория блога - '$currentCategory->title' ";

        //будет доступно в layout как $this->params['sidebar']['key']
        $this->passToSidebar(['blog-categoris' => $this->allCats]);

        return $this->render('category',[
                                        'currentCategory' => $currentCategory,
                                        ]);
    }


    protected function passToSidebar(array $var)
    {
        //будет доступно в layout как $this->params['sidebar']['key']
        foreach($var as $k => $v)
        {
            Yii::$app->view->params['sidebar'][$k] = $v;
        }

    }

}

<?php

namespace frontend\controllers;

use Yii;
use app\models\BlogPostsTable;
use app\models\BlogCategorisTable;
use app\models\authors;
use yii\data\Pagination;
use yii\helpers\Url;
/**
 * BlogController
 */
class BlogController extends BaseFront
{

    // у раздела Блог шаблон другой, поэтому укажем его
    public $layout = '@app/views/layouts/page/blog';

    private $_pageSize = 10;//кол-во материалов на странице пагинации
    private $allCats;


    public function beforeAction($action)
    {
      //все категории
       $this->allCats = BlogCategorisTable::getAllCategorisPosts();

      return parent::beforeAction($action);
    }


    /**
     * @inheritdoc
     * $pageNum  - номер страницы для постраничной навигации
     */
    public function actionIndex($pageNum = null)
    {
        //передаем тайтл
        Yii::$app->view->title .= '- все статьи';
        Yii::$app->view->title .= (isset($pageNum) && NULL != $pageNum) ? ' - страница '.$pageNum : '';

        Yii::$app->view->registerMetaTag(['name' => 'description','content' => 'Все статьи сайта - '.Yii::$app->name]);
        Yii::$app->view->registerMetaTag(['name' => 'keywords','content' => Yii::$app->name]);

        $h1 = "Все статьи";

        $query = BlogPostsTable::getAllPosts();

        $clonePosts = clone $query;//клон всех постов для пагинации
        $totalCount = $clonePosts->count();//кол-во всех постов
        $countPagin = ceil($totalCount / $this->_pageSize);//Количество страниц пагинации = все страницы / заданное число материалов на странице

        //если введена еденица, делаем редирект на без 1
        if($pageNum == 1)
        {
            return $this->redirect(Url::toRoute('/articles'));
        }

        //если в адресной строке введен номер пагинации, котрого нет - выводим
        if($pageNum > $countPagin)
        {
            throw new \yii\web\HttpException(404, 'Такой страницы не существует. ');
        }

        $pagination = new Pagination([  'defaultPageSize' => $this->_pageSize,//кол-во материалов на стр.
                                        'totalCount' => $totalCount,//кол-во всех постов
                                        'pageParam' => 'pageNum',
                                        'forcePageParam' => false,
                            ]);

        $posts = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();


        //будет доступно в layout как $this->params['sidebar']['key']
        $this->passToSidebar(['blog-categoris' => $this->allCats]);

        return $this->render('index',[
                                        'pageNum' => $pageNum,
                                        'h1' => $h1,
                                        'posts' => $posts,
                                        'pagination' => $pagination,
                                        ]);
    }


    /**
     * @inheritdoc
     * Получаем все посты данной категории
     */
    public function actionCategory($alias = null, $pageNum = null)
    {
        //получаем одну категорию по алиасу
        $currentCategory = BlogCategorisTable::getOneCategory($alias);

        //если алиаса нет в базе
        if($currentCategory === NULL)
        {
            throw new \yii\web\HttpException(404, 'Такой страницы не существует. ');
            //throw new \yii\web\NotFoundHttpException;
        }

        $totalCount = count($currentCategory->postsFromCategory);//кол-во всех постов
        $countPagin = ceil($totalCount / $this->_pageSize);//Количество страниц пагинации = все страницы / заданное число материалов на странице

        //если введена еденица, делаем редирект на без 1
        if($pageNum == 1)
        {
            return $this->redirect(Url::toRoute(['blog/category', 'alias' => $alias]));
        }

        //если в адресной строке введен номер пагинации, котрого нет - выводим
        if($pageNum > $countPagin)
        {
            throw new \yii\web\HttpException(404, 'Такой страницы не существует. ');
        }

        $pagination = new Pagination([  'defaultPageSize' => $this->_pageSize,//кол-во материалов на стр.
                                        'totalCount' => $totalCount,//кол-во всех постов
                                        'pageParam' => 'pageNum',
                                        'forcePageParam' => false,
                            ]);

        $posts = $currentCategory->getPostsFromCategory($limit = $pagination->limit, $offset = $pagination->offset);


        //передаем тайтл
        if($currentCategory->title)
        {
            Yii::$app->view->title .= " - $currentCategory->title ";
            Yii::$app->view->title .= (isset($pageNum) && NULL != $pageNum) ? ' - страница '.$pageNum : '';
        }

        if(isset($currentCategory->description) && NULL !== $currentCategory->description)
        {
            \Yii::$app->view->registerMetaTag(['name' => 'description','content' => $currentCategory->description]);
        }

        if(isset($currentCategory->keywords) && NULL !== $currentCategory->keywords)
        {
            \Yii::$app->view->registerMetaTag(['name' => 'keywords','content' => $currentCategory->keywords]);
        }


        $h1 = $currentCategory->h1;



        //будет доступно в layout как $this->params['sidebar']['key']
        $this->passToSidebar(['blog-categoris' => $this->allCats]);

        return $this->render('category',[
                                        'pageNum' => $pageNum,
                                        'h1' => $h1,
                                        'posts' => $posts,
                                        'pagination' => $pagination,
                                        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionPost($alias = null)
    {

        $post = BlogPostsTable::getOnePоst($alias);
        //ставим проверку только в экшкн, где передаются параметры, как $alias
        //если не правильно в адресе указан экшэн,  то на страницу ошибки перебросит автоматом
        if($post === NULL)
        {
            throw new \yii\web\HttpException(404, 'Такой страницы не существует. ');
            //throw new \yii\web\NotFoundHttpException;
        }

        //передаем тайтл
        if($post->title)
        {
            Yii::$app->view->title .= '- '.$post->title;
        }

        if(isset($post->description) && NULL !== $post->description)
        {
            \Yii::$app->view->registerMetaTag(['name' => 'description','content' => $post->description]);
        }

        if(isset($post->keywords) && NULL !== $post->keywords)
        {
            \Yii::$app->view->registerMetaTag(['name' => 'keywords','content' => $post->keywords]);
        }



        //будет доступно в layout как $this->params['sidebar']['key']
        $this->passToSidebar(['blog-categoris' => $this->allCats]);

        return $this->render('post',[
                                        'post' =>     $post,
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

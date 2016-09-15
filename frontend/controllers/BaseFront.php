<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\BlogCategorisTable;
use app\models\BlogCategorisPostsTable;
/**
 * Site controller
 */
class BaseFront extends Controller
{

    // по умолчанию для всего сайта
    public $layout = '@app/views/layouts/page/default';
    public $slider = false;

    //временные данные одной категории для вывода в блоках сайдбара и центрального блока
    public $oneCatBlog;
    public $oneCatBlog1;
    public $oneCatBlog2;
    public $oneCatBlog3;
    public $oneCatBlog4;
    public $dbBlogCatTitlte = false;//во временных блоках заголовок из бд, иначе - что в верстке

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
//            //понадобиться отключить CSRF-проверку Yii2 для OpenID callbacks
//            'eauth' => [
//                // required to disable csrf validation on OpenID requests
//                'class' => \nodge\eauth\openid\ControllerBehavior::className(),
//                'only' => ['login'],
//            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
      //общий для всех тайтл
        Yii::$app->view->title = Yii::$app->name." ";

        //временное сохранение данных категории для заполнения сайдбара и центральных блоков данными 1 категории блога
        $this->oneCatBlog = \app\models\BlogCategorisTable::find()->where(['id' => 1])->one();
        $this->oneCatBlog1 = \app\models\BlogCategorisTable::find()->where(['id' => 2])->one();
        $this->oneCatBlog2 = \app\models\BlogCategorisTable::find()->where(['id' => 3])->one();
        $this->oneCatBlog3 = \app\models\BlogCategorisTable::find()->where(['id' => 4])->one();
        $this->oneCatBlog4 = \app\models\BlogCategorisTable::find()->where(['id' => 5])->one();


      return parent::beforeAction($action);
    }

    public function footerCatsAndPosts($catsId = ['1', '2', '3', '5'], $postsLimit = 5){
        //$catsId = ['2', '1', '3', '4'];
        //сортировка по оприделенным полям как прописано $catsId
        //SELECT * FROM  table WHERE  id IN ( 5, 1, 4, 2 ) ORDER BY FIELD( id, 5, 1, 4, 2 )
        $cats = BlogCategorisTable::find()  ->select(['id', 'title', 'alias'])
                                            ->andWhere(['blog_categoris_table.id' => $catsId])
                                            ->orderBy([new \yii\db\Expression('FIELD (id, ' . implode(',', $catsId) . ')')])
                                            ->indexBy('id')
                                            ->all();
        $resArr = [];

        foreach($cats as $catId => $catVal){

            $resArr[$catId]['category'] = $catVal;

            $posts = BlogCategorisPostsTable::find()
                    ->andWhere(['id_category' => $catId])
                    ->joinWith(['blogPost' => function(\yii\db\ActiveQuery $q){return $q->select(['id', 'title', 'alias', 'createdDate']);}])
                    ->limit($postsLimit)
                    ->orderBy([ 'blog_posts_table.createdDate' => SORT_DESC,
                                'blog_posts_table.id' => SORT_DESC,
                            ])//от последних до старых
                    ->all();

            $resArr[$catId]['posts'] = $posts;


        }

        //var_dump($resArr[3]['posts'][0]->blogPost);
        //var_dump($resArr[3]['posts']);
        return $resArr;
    }

}


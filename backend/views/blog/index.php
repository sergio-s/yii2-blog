<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BlogPostsTableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все посты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-posts-table-index">


    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <p>
        <?= Html::a('Создать новый пост', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<!--    <div class="container">
    <div class="row">
        <div class="col-lg-12">-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'img',
                'format' => 'raw',
                'label' => 'Картинка',
                'value' =>  function ($model)
                            {
                                if($model->img)
                                     return Html::img('@blogImg-web/'.$model->id.'/thumb/'.$model->img, ['style'=>'width:150px']);

                                return 'нет фото';
                            }
             ],

             [
                'attribute' => 'category',
                'format' => 'raw',
                'label' => 'Родительская категория',
                'value' =>  function ($model)
                            {
                                if(isset($model->parentCategoris))
                                {
                                    foreach($model->parentCategoris as $category)
                                    {
                                        $array[] = $category->title.' ';
                                    }
                                    return implode(",", $array);
                                }
                                else
                                {
                                    return 'нет';
                                }




                            }
             ],


            'id',
            'alias',
            'title',
            'description',
            'keywords',
            'h1',
            [
                'attribute' => 'writer_id',
                'format' => 'raw',
                'label' => 'Установленный автор',
                'value' =>  function ($model)
                            {
                                if(isset($model->writer) && null !== $model->writer )
                                {
                                    return $model->writerFullName;
                                }
                            }
             ],

            // 'content:ntext',
            // 'createdDate',

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>
<!--    </div>
    </div>
    </div>-->
</div>

<?php

$script = <<< JS
// инициализировать все элементы на страницы, имеющих атрибут data-toggle="tooltip", как компоненты tooltip
$('[data-toggle="tooltip"]').tooltip()

$('[data-toggle="tooltip"]').click(function( event ) {
  event.preventDefault();
});
JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>
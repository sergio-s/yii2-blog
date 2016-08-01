<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\BlogPostsTable */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Все посты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-posts-table-view">
 Информация о вновь созданной статье ...
    <hr>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Посмотреть', Yii::$app->urlManagerFrontend->createUrl(['articles/post/'.$model->alias]), ['class' => 'btn btn-info', 'onclick' => "return !window.open(this.href)"]) ?>


    </p>

    <div>
        <hr>
        Текущие категории поста:
        <?php if(isset($perent_categoris)):?>
            <?php foreach($perent_categoris as $category):?>
        <i><?=$category->title;?></i>
            <?php endforeach;?>
        <?php endif;?>

    </div>
    <hr>
    <h3>Изображение поста.</h3>
<?=Html::img('@blogImg-web/'.$model->id.'/thumb/'.$model->img,['alt'=> 'нет изображения']);?>
    <hr>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'alias',
            'title',
            'description',
            'keywords',
            'alt',
            'h1',
            'content:ntext',
            'createdDate',
            'updatedDate',
            [
                'label'  => $model->attributeLabels()['writer_id'].' '.Html::a(' (?)', ['#'], ['data-toggle' => 'tooltip','title' => "Это поле содержит установленного, а не фактического автора статьи. Фактический автор статьи устанавливается автоматически."]),
                'value'  => ($model->writer)? $model->writerFullName : 'не известен',

            ],
            [
                'label'  => $model->attributeLabels()['autorId'],
                'value'  => ($userName = User::findByUserId($model->autorId))? $userName->username : 'не известен',

            ],
            [
                'label'  => $model->attributeLabels()['updaterId'],
                'value'  => ($userName = User::findByUserId($model->updaterId))? $userName->username : 'не известен',

            ],

        ],
    ]) ?>

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
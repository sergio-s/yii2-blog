<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\wiki\AdminWikiLettersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории букв';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-wiki-letters-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать категорию буквы', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'letter',
            'alias',
            'title',
            'description',
            'keywords',
            'h1',
            [
                'attribute' => '',
                'format' => 'raw',
                'label' => 'Число записей в категории',
                'value' =>  function ($model)
                            {
                                $countTerms = $model->getWikiTerms()->count();
                                if($countTerms == 0){
                                    return $countTerms.' '.Html::a(' (инфо)', ['#'], ['data-toggle' => 'tooltip','title' => "Если в категории не содержится терминов, то категория выводиться не будет"]);
                                }else{
                                    return $countTerms;
                                }

                            }
            ],

            // 'createdDate',
            // 'updatedDate',
            // 'autorId',
            // 'updaterId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

$script = <<< JS
$('[data-toggle="tooltip"]').click(function( event ) {
  event.preventDefault();
});

// инициализировать все элементы на страницы, имеющих атрибут data-toggle="tooltip", как компоненты tooltip
  $('[data-toggle="tooltip"]').tooltip()
JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>
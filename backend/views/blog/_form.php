<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
//для загрузки картинок
use kartik\file\FileInput;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use app\models\authors\Authors;
use yii\helpers\ArrayHelper;



/* @var $this yii\web\View */
/* @var $model backend\models\BlogPostsTable */
/* @var $form yii\widgets\ActiveForm */

//echo  Yii::getAlias('@web');
//Html::img('@blogImg-web/index.jpg', ['alt'=>'', 'class'=>'img-selection-horizontal']);

?>

<div class="blog-posts-table-form">
    <div>

        <?php if(isset($perent_categoris)):?>
            <?php foreach($perent_categoris as $category):?>
            <hr>
            Текущие категории поста : <strong style="color: green"><?=$category->title;?></strong>
            <hr>
            <?php endforeach;?>
        <?php endif;?>

    </div>

    <?php $form = ActiveForm::begin([
                                    'id' => 'blog-form',
                                    'options' => [
                                        'enctype' => 'multipart/form-data'
                                        ]
                                    ]); ?>

    <?php
        if(isset($selected) && NULL != $selected)
        {
            echo $form->field($model, 'category_id')->textInput()->dropDownList($categoris_name,['options' => [ $selected => ['selected ' => true]]]);// ['prompt' => 'нет',]
        }
        else
        {
            echo $form->field($model, 'category_id')->textInput()->dropDownList($categoris_name);// ['prompt' => 'нет',]
        }
    ?>

    <?= $form->field($model, 'writer_id')->dropDownList(

        ArrayHelper::map(Authors::find()->all(),'id','authorFullName'),
        ['prompt' => $prompt]

    )->label() ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php //работа с изображением
//    if (isset($model->image) && file_exists(Yii::getAlias('@webroot', $model->image)))
//    {
//        echo Html::img($model->image, ['class' => 'img-responsive']);
//        echo $form->field($model, 'del_img')->checkBox(['class' => 'span-1']);
//    }
//
//    echo $form->field($model, 'file')->fileInput() ;

    echo $form->field($model, 'file')
                ->fileInput()
                ->widget(FileInput::classname(), [
                                                    'options' => ['accept' => 'image/*'],
                                                    'pluginOptions'=>[
                                                                        'allowedFileExtensions'=>['jpg','gif','png'],
                                                                        'showUpload' => false,
                                                                        'dropZoneEnabled' => false,
                                                                        'initialPreview'=>[
                                                                            Html::img("@blogImg-web/{$model->id}/thumb/{$model->img}", ['class'=>'file-preview-image', 'alt'=>'нет изображения', 'title'=>'The Moon']),//картинка ,которая уже загружена у обновляемой записи
                                                                        ],
                                                                        'maxFileSize'=>5000,
                                                                        'minImageWidth'=> 1084,
                                                                        'minImageHeight'=> 864,
                                                    ],
                                                ]);


    ?>

    <?= $form->field($model, 'alt',
        [
        'template' =>
                    '<div class="form-group"><label class="control-label">{label}'
                    . Html::a(' (как заполнять)', ['#'], ['data-toggle' => 'tooltip','title' => "Краткое описание картинки. "])
                    . '</label>'
                    .'{input}{error}{hint}'
                    . '</div>',

        ]
        )->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords',
            [
            'template' =>
                        '<div class="form-group"><label class="control-label">{label}'
                        . Html::a(' (как заполнять)', ['#'], ['data-toggle' => 'tooltip','title' => "Перечисление ключевых слов через запятую"])
                        . '</label>'
                        .'{input}{error}{hint}'
                        . '</div>',

            ]
            )->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'content')->textarea(['rows' => 6]) ?>

<!--    ТЕКСТОВЫЙ РЕДАКТОР С ЗАГРУЗКОЙ КАРТИНОК-->
<?php
echo $form->field($model, 'content')->widget(Widget::className(), [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'imageManagerJson' => Url::to(['/blog/redactor-images-get']),
        'imageUpload' => Url::to(['/blog/redactor-image-upload']),
        'plugins' => [
            'imagemanager',
            'clips',
            'fullscreen',
            'fontcolor',
            'fontfamily',
            'fontsize',
            'video',
            'blockwrap',
         ]
    ]
]);
?>
  <!-- ###   ТЕКСТОВЫЙ РЕДАКТОР С ЗАГРУЗКОЙ КАРТИНОК  ### -->

    <?php //echo $form->field($model, 'createdDate')->textInput() ?>

    <?php

//echo $form->field($model, 'createdDate')->widget(\yii\jui\DatePicker::classname(), [
//                                                                                 'language' => 'ru',
//                                                                                 'dateFormat' => 'yyyy-MM-dd',
//                                                                                 ])

    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$script = <<< JS

  // инициализировать все элементы на страницы, имеющих атрибут data-toggle="tooltip", как компоненты tooltip
  $('[data-toggle="tooltip"]').tooltip()
JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>
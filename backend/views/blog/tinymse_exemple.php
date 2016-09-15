<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
//для загрузки картинок
use kartik\file\FileInput;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\BlogPostsTable */
/* @var $form yii\widgets\ActiveForm */

//echo  Yii::getAlias('@blogImg-web');
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
                                                                                                                                        //'uploadAsync' => true,
                                                    ],
                                                ]);


    ?>



    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'content')->textarea(['rows' => 6]) ?>

<!--    ТЕКСТОВЫЙ РЕДАКТОР С ЗАГРУЗКОЙ КАРТИНОК-->

    <?= $form->field($model, 'content')->widget(TinyMce::className(), [
    'options' => ['rows' => 16],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste image",
            "textcolor",
            "fullscreen",
            //"code",
            //"image",
        ],
        //'image_advtab' => true,
        'menubar'=> "insert",
        'toolbar' => "code | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor | fullscreen | link image ",

        'file_browser_callback'=> new yii\web\JsExpression("function(field_name, url, type, win) {
            if(type=='image') $('#my_form input').click();
        }"),
    ]
    ]);?>

    <iframe id="form_target" name="form_target" style="display:none"></iframe>
    <form id="my_form" action="/upload/" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
        <input name="image" type="file" onchange="$('#my_form').submit();this.value='';">
    </form>

  <!-- ###   ТЕКСТОВЫЙ РЕДАКТОР С ЗАГРУЗКОЙ КАРТИНОК  ### -->

    <?php //echo $form->field($model, 'createdDate')->textInput() ?>

    <?= $form->field($model, 'createdDate')->widget(\yii\jui\DatePicker::classname(), [
                                                                                 'language' => 'ru',
                                                                                 'dateFormat' => 'yyyy-MM-dd',
                                                                                 ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

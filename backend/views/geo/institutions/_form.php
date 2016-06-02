<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\geo\GeoCountries;
use backend\models\geo\GeoCities;
//для загрузки картинок
use kartik\file\FileInput;
use vova07\imperavi\Widget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\geo\GeoInstitutions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="geo-institutions-form">

    <?php $form = ActiveForm::begin([
                                    'id' => 'geo-institutions-form',
                                    'options' => [
                                        'enctype' => 'multipart/form-data'
                                        ]
                                    ]); ?>

    <?php //echo $form->field($model, 'country_id')->dropDownList($categoris_name,['options' => [ $selected => ['selected ' => true]]]); ?>

    <?= $form->field($model, 'country_id')->dropDownList(

        ArrayHelper::map(GeoCountries::find()->all(),'id','name'),
        ['options' => [ GeoCountries::find()->rossia()->one()->id => ['selected ' => true]]]// опция по умолчанию

    )->label() ?>

    <?php //echo $form->field($model, 'city_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_id')->dropDownList(

        ArrayHelper::map(GeoCities::find()->all(),'id','name'),
        ['prompt' => 'Выбрать город']

    )->label() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_char')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lng')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'file[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?php   echo $form->field($model, 'file[]') ->fileInput()
                                                ->widget(FileInput::classname(), [
                                                    'options' => [
                                                        'multiple' => true,
                                                        'accept' => 'image/*',

                                                    ],

                                                    'pluginOptions'=>[
                                                        'showPreview' => true,
                                                        'showCaption' => true,
                                                        'showRemove' => true,
                                                        'showUpload' => false,
                                                        'dropZoneEnabled' => true,
                                                        'browseLabel' =>  $model->isNewRecord ? 'Добавить фото' : 'Поменять фото',
                                                        'removeLabel' =>  'Очистить выбранные',
                                                        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                                                        'browseClass' => 'btn btn-success',
                                                        'uploadClass' => 'btn btn-info',
                                                        'removeClass' => 'btn btn-danger',



                                                        'previewFileType' => 'image',
                                                        'initialPreviewAsData'=>true,
                                                        'allowedFileExtensions'=>['jpg','gif','png'],

                                                        'initialPreview'=>[
                                                            //картинка ,которая уже загружена у обновляемой записи

                                                            isset($htmlImg[0])?$htmlImg[0]:'',
                                                            isset($htmlImg[1])?$htmlImg[1]:'',
                                                            isset($htmlImg[2])?$htmlImg[2]:'',
                                                            isset($htmlImg[3])?$htmlImg[3]:'',
//                                                            isset($htmlImg[4])?$htmlImg[4]:'',
//                                                            isset($htmlImg[5])?$htmlImg[5]:'',
//                                                            isset($htmlImg[6])?$htmlImg[6]:'',
//                                                            isset($htmlImg[7])?$htmlImg[7]:'',

                                                         ],

                                                        'showCaption' => false,

                                                        'maxFileCount' => 4,
                                                        'maxFileSize'=>3000,
                                                        //'uploadUrl' => true,//Url::to(['/site/file-upload'])


                                                        'overwriteInitial'=>true,//перезаписывать существующее фото
                                                        'validateInitialCount' => true,

                                                    ],


                                                ]);

//удаляем иконку загрузки на сервер к картинке превью
$script = <<< JS
jQuery(".kv-file-upload,.file-upload-indicator").remove();

$('.file-input :file').on('fileselect', function(event, numFiles, label) {
        jQuery(".kv-file-upload,.file-upload-indicator").remove();
});
    jQuery(".kv-file-upload").remove();
JS;
$this->registerJs($script, yii\web\View::POS_READY);

    ?>


    <?php echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <!--    ТЕКСТОВЫЙ РЕДАКТОР С ЗАГРУЗКОЙ КАРТИНОК-->
<?php
//    echo $form->field($model, 'description')->widget(Widget::className(), [
//        'settings' => [
//            'lang' => 'ru',
//            'minHeight' => 200,
//            //'imageManagerJson' => Url::to(['/blog/redactor-images-get']),
//            //'imageUpload' => Url::to(['/blog/redactor-image-upload']),
//            'plugins' => [
//                //'imagemanager',
//                'clips',
//                'fullscreen',
//                'fontcolor',
//                'fontfamily',
//                'fontsize',
//                'video',
//                'blockwrap',
//             ]
//        ]
//    ]);
    ?>
  <!-- ###   ТЕКСТОВЫЙ РЕДАКТОР С ЗАГРУЗКОЙ КАРТИНОК  ### -->

    <?php //echo $form->field($model, 'rating')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

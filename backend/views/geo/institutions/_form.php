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

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords',
            [
            'template' =>
                        '<div class="form-group"><label class="control-label">{label}'
                        . Html::a(' (как заполнять)', ['#'], ['data-toggle' => 'tooltip','title' => "Перечислите ключевые слова через запятую"])
                        . '</label>'
                        .'{input}{error}{hint}'
                        . '</div>',

            ]
            )->textInput(['maxlength' => true]) ?>

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

    ?>



    <hr style="border: none;color: green;background-color: green;height: 2px;">
    <br><br><br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$script = <<< JS

//удаляем иконку загрузки на сервер к картинке превью
jQuery(".kv-file-upload,.file-upload-indicator").remove();

$('.file-input :file').on('fileselect', function(event, numFiles, label) {
        jQuery(".kv-file-upload,.file-upload-indicator").remove();
});
jQuery(".kv-file-upload").remove();

//////////////////////////////////////////////////////////////////

// инициализировать все элементы на страницы, имеющих атрибут data-toggle="tooltip", как компоненты tooltip
$('[data-toggle="tooltip"]').tooltip()

$('[data-toggle="tooltip"]').click(function( event ) {
  event.preventDefault();
});
JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>
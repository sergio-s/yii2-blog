<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
//для загрузки картинок
use kartik\file\FileInput;
use vova07\imperavi\Widget;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\authors\Authors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="authors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php
        echo $form->field($model, 'file')
                ->fileInput()
                ->widget(FileInput::classname(), [
                                                    'options' => ['accept' => 'image/*'],
                                                    'pluginOptions'=>[
                                                                        'allowedFileExtensions'=>['jpg','gif','png'],
                                                                        'showUpload' => false,
                                                                        'dropZoneEnabled' => false,
                                                                        'initialPreview'=>[
                                                                            Html::img("@authorsImg-web/{$model->id}/{$model->img}", ['class'=>'file-preview-image', 'alt'=>'нет изображения']),//картинка ,которая уже загружена у обновляемой записи
                                                                        ],
                                                                        'maxFileSize'=>5000,
                                                                        'minImageWidth'=> 200,
                                                                        'minImageHeight'=> 200,
                                                    ],
                                                ]);


    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить данные', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

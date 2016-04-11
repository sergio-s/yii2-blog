<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BlogPostsTable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-posts-table-form">
    <div>
        Текущие категории поста:<br>
        <?php if(isset($perent_categoris)):?>
            <?php foreach($perent_categoris as $category):?>
        <h2 style="color: green"><?=$category->title;?></h2>
            <?php endforeach;?>
        <?php endif;?>

    </div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->textInput()->dropDownList($categoris_name);// ['prompt' => 'нет',] ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

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

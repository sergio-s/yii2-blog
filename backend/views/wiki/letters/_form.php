<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\wiki\AdminWikiLetters */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-wiki-letters-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'letter')->textInput(['maxlength' => true, 'class' => 'upperLatter form-control'])->label('Буква в верхнем регистре (отдельная буква для алфавита).') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'createdDate')->textInput() ?>

    <?php //echo $form->field($model, 'updatedDate')->textInput() ?>

    <?php //echo $form->field($model, 'autorId')->textInput() ?>

    <?php //echo $form->field($model, 'updaterId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$script = <<< JS
console.log($(this));
    jQuery(document).on('input', '.upperLatter', function(){
    $(this).val($(this).val().toUpperCase());
        console.log($(this));
  });

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\geo\GeoCities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="geo-cities-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_center')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_code')->textInput(['maxlength' => true]) ?>

    <?php
        if($model->isNewRecord){
            echo $form->field($model, 'country_id')->hiddenInput(['value' => $defaultCountry->id]);
        }
     ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lng')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>

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
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

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
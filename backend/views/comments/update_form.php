<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\comments\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'materialType')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'materialId')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'autorId')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'updaterId')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'parentId')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'level')->textInput() ?>

    <?php //echo $form->field($model, 'createdDate')->textInput() ?>

    <?php echo $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    
    <?php
        if(isset($model->status) && NULL != $model->status)
        {
            echo $form->field($model, 'status')->textInput()
                    ->dropDownList(\common\models\comments\Comments::getStatusList(),
                                                ['options' => 
                                                    [ $model->status => ['selected ' => true]]]);// ['prompt' => 'нет',]
        }
        else
        {
            echo $form->field($model, 'status')->textInput()
                    ->dropDownList(\common\models\comments\Comments::getStatusList());
        }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

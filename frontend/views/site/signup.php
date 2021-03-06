<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

<!--    <p>Please fill out the following fields to signup:</p>-->


    <div class="row">
        <div class="col-md-12 col-md-offset-6 col-xs-20 col-xs-offset-1">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => false]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

            <hr>
            <small>Вход через соц.сеть:</small>
            <hr>
            <?= $this->render('soclogin') ?>
            <hr>

        </div>
    </div>
</div>

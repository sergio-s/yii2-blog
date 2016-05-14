<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


//$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>


    <div class="row">
        <div class="col-md-12 col-md-offset-6 col-xs-20 col-xs-offset-1">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?php //echo $form->field($model, \Yii::t('app', 'username'))->textInput(['autofocus' => true]) ?>
                <?php echo $form->field($model, \Yii::t('app', 'username'))->textInput(['autofocus' => false]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
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

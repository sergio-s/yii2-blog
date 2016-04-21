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

<!--    <p>Please fill out the following fields to login:</p>-->

    <div class="row">
        <div class="col-md-12 col-md-offset-6 col-xs-20 col-xs-offset-1">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, \Yii::t('app', 'username'))->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

            <?php
                if (Yii::$app->getSession()->hasFlash('error')) {
                    echo '<div class="alert alert-danger">'.Yii::$app->getSession()->getFlash('error').'</div>';
                }
            ?>

            <hr>
            <small>Вход через соц.сеть:</small>
            <hr>
            <?php echo \nodge\eauth\Widget::widget(['action' => 'site/login']); ?>
            <hr>
        </div>
    </div>
</div>

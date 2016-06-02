<?php
    use yii\bootstrap\ActiveForm;
    use yii\widgets\Pjax;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\captcha\Captcha;
?>

<?php if(Yii::$app->session->hasFlash($formId) ): ?>
<!--<div id="mes" style="color:green;">
    <?php //echo Yii::$app->session->getFlash($formId); ?>
</div>-->

<div id="mes" class="alert alert-success">
  <?php echo Yii::$app->session->getFlash($formId); ?>
</div>

<?php endif;?>

<?php
$js = " $('#{$pjaxContainerId}').on('pjax:end', function() {
    $('#mes').css('display', 'none');
    $('#mes').fadeIn(1000);


        $('textarea').focus(function() {
            $('#mes').fadeOut(1000);
        });

    })";

  $this->registerJs($js, $this::POS_READY);
?>




<div class="comment-form-container">
    <?php $form = ActiveForm::begin([
        'options' => [
            'id' => $formId,
            'class' => 'comment-box',
            'autocomplete' => 'off',
            'data-pjax' => true,

        ],
        'id' => $formId.'-form',
        'method' => 'POST',
        'action' => '',
        'validateOnChange' => false,
        'validateOnBlur' => false,
        'enableAjaxValidation' => false,
    ]); ?>

    <?php echo $form->field($commentForm, 'message', ['template' => '{input}{error}'])->textarea(['placeholder' => 'Добавить комментарий', 'data' => ['comment' => 'message'], 'id' => 'message_textarea']) ?>

    <?php echo $form->field($commentForm, 'parentId', ['template' => '{input}'])->hiddenInput(['id' => 'hiddenInputParentId']); ?>
<!--    <input type="hidden" name="_csrf" value="<?php //echo Yii::$app->request->getCsrfToken()?>" />-->
    <?php //echo $form->field($commentForm, 'parentId', ['template' => '{input}'])->hiddenInput(['data' => ['comment' => 'parent-id']]); ?>
    <?php //echo $form->field($commentForm, 'captcha')->widget(Captcha::className()) ?>
    <div class="comment-box-partial">
        <div class="button-container show">
            <?php //echo Html::a('Отменить ответ', '#', ['id' => 'cancel-reply', 'class' => 'pull-right', 'data' => ['action' => 'cancel-reply']]); ?>
            <?php echo Html::submitButton('Комментировать', ['class' => 'btn btn-primary comment-submit']); ?>
        </div>
    </div>
    <?php $form->end(); ?>
    <div class="clearfix"></div>
</div>

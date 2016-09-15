<?php
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
//use common\widgets\Alert;

?>
<?php Pjax::begin([
    'enablePushState' => false,
    'timeout' => 10000,
    'id' => $pjaxContainerId,
]); ?>

<hr>
<div class="comments row" data-last-insert-id="<?=$lastInsertID;?>">
    <div class="col-md-24 col-xs-24">
        <div class="title-block clearfix">
            <h3 class="h3-body-title"><?=$title;?> <small>(<?=$totalCount;?>)</small></h3>
            <div class="title-separator"></div>
        </div>
        <ol class="comments-list">
            <?php echo $this->render('_comments', ['comments' => $comments, 'maxLevel' => $maxLevel]) ?>
        </ol>
        <?php if (!Yii::$app->user->isGuest): ?>
            <?php echo $this->render('_form', [
                'commentForm' => $commentForm,
                'formId' => $formId,
                'pjaxContainerId' => $pjaxContainerId,

            ]); ?>
        <?php else:?>
        <!--Если гость, то нужно авторизироваться для комментирования -->
        <div class="commentLogin">
            <div class="pull-left">Чтобы оставить комментарий нужно
                <a href="<?=Url::toRoute(['/site/signup']);?>">зарегистрироваться</a>
                или
                <a href="<?=Url::toRoute(['/site/login']);?>">войти</a> |&nbsp&nbsp
            </div>
            <div class="commentSocLogin">
                <?=$this->render('@app/views/layouts/socloginsmall.php'); ?>
            </div>

            <p class="clearfix"></p>
        </div>


        <?php endif; ?>
    </div>
</div>

<?php Pjax::end(); ?>

<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use common\components\rbac\rbacRoles;

?>

<?php if (!empty($comments)) : ?>
    <?php foreach ($comments as $comment) : ?>

        <li class="comment" id="comment-<?php echo $comment->id ?>">
            <?php if($comment->isActive):?>
                    <!--Активный комментарий-->
                    <div class="comment-content" data-comment-content-id="<?php echo $comment->id ?>">
                        <div class="comment-author-avatar">
                            <?php echo $comment->getAvatar(['title' => $comment->getAuthorName(),'alt' => $comment->getAuthorName()]); ?>
                            <div class="comment-action-buttons">
                                <?php if (!Yii::$app->user->isGuest && ($comment->level < $maxLevel || is_null($maxLevel))): ?>
                                    <?php echo Html::a("<span class='label label-info'>Ответить</span>", '#',   ['class' => 'comment-reply', 'data' => ['action' => 'reply', 'comment-id' => $comment->id]]); ?>
                                    <?php echo Html::a("<span class='label label-warning'>Не отвечать</span>",'#', ['class' => 'comment-no-reply','style' => 'display: none']); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="comment-details">
                            <?php if ($comment->isActive): ?>
                                <div class="comment-actionAdmin-buttons">
                                    <?php if (Yii::$app->getUser()->can(rbacRoles::ROLE_ADMIN)): ?>
                                        <?php //echo Html::a('<span class="glyphicon glyphicon-trash"></span> Отключить', '#', ['data' => ['action' => 'delete', 'url' => Url::to(['/comment/default/delete', 'id' => $comment->id]), 'comment-id' => $comment->id]]); ?>
                                        <?php //echo Html::a('<span class="glyphicon glyphicon-trash"></span> Отключить', '#', ['data' => ['method' => 'POST', 'comment-id' => $comment->id], 'title' => 'Отключить текущий комментарий (не удаляется!)']); ?>
                                    <?php endif; ?>
                                </div>

                            <?php endif; ?>
                            <div class="comment-author-name">
                                <span><?php echo $comment->getAuthorName(); ?></span>
                                <span class="comment-date">
                                    <?php echo $comment->getPostedDate(); ?>
                                </span>
                            </div>
                            <div class="comment-body">
                                <?php echo $comment->getMessage(); ?>
                            </div>
                        </div>
                    </div>

            <?php elseif($comment->isDisabled):?>
                    <!--Отключенный комментарий-->
                    <div class="comment-content isDisabled" data-comment-content-id="<?php echo $comment->id ?>">
                        <?php echo $comment->getMessage("Комментарий отключен администратором"); ?>
                    </div>
            <?php endif;?>

            <?php if ($comment->hasChildren()): ?>
                <ul class="children">
                    <?php echo $this->render('_comments', ['comments' => $comment->children, 'maxLevel' => $maxLevel]) ?>
                </ul>
            <?php endif; ?>
        </li>




    <?php endforeach; ?>

<?php else:?>

    <li class="noComments"><i>Комментариев нет...</i><li>

<?php endif; ?>



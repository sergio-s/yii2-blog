<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use common\components\rbac\rbacRoles;

?>

<?php if (!empty($comments)) : ?>
    <?php foreach ($comments as $comment) : ?>
        <li class="comment" id="comment-<?php echo $comment->id ?>">
            <div class="comment-content" data-comment-content-id="<?php echo $comment->id ?>">
                <div class="comment-author-avatar">
                    <?php echo $comment->getAvatar(['title' => $comment->getAuthorName(),'alt' => $comment->getAuthorName()]); ?>
                </div>
                <div class="comment-details">
                    <?php if ($comment->isActive): ?>
                        <div class="comment-action-buttons">
                            <?php if (Yii::$app->getUser()->can(rbacRoles::ROLE_ADMIN)): ?>
                                <?php //echo Html::a('<span class="glyphicon glyphicon-trash"></span> Отключить', '#', ['data' => ['action' => 'delete', 'url' => Url::to(['/comment/default/delete', 'id' => $comment->id]), 'comment-id' => $comment->id]]); ?>
                            <?php endif; ?>
                            <?php if (!Yii::$app->user->isGuest && ($comment->level < $maxLevel || is_null($maxLevel))): ?>
                                <?php echo Html::a("<span class='glyphicon glyphicon-share-alt'></span> Ответить", '#', ['class' => 'comment-reply', 'data' => ['action' => 'reply', 'comment-id' => $comment->id]]); ?>
<!--                                <a class="reply" data-id="3080" href="#comment-form">Ответить</a>-->
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



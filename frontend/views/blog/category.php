<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use yii\widgets\LinkPager;//для пагинации
use common\models\comments\Comments;

//$this->title = 'Страницы сайта';
$this->params['breadcrumbs'][] = array('label'=> 'Все статьи', 'url'=>Url::toRoute('/blog/index'));
$this->params['breadcrumbs'][] = strip_tags(trim($h1));
?>
<!---------------------------------Секция вертикальная подборка материалов---------------------------------------------->
<!--все материалы категории-->
<div class="row selection">
    <div class="col-xs-24  selection-vertical">
        <!--заголовок-->
        <div class="row">
            <div class="h3-box-selection">
                <span class="sprite sprite-circle-ph"></span>
                <h1 class="h3-selection b-dash-light-red"><?= Html::encode($h1) ?><small><?=($pageNum) ? " ( стр.-{$pageNum} )" : null; ?></small></h1>
<!--                <p class="h3-control">
                    <a class="control-but">Смотреть все</a>
                </p>-->
            </div>
        </div>

        <div id="pagination-box">
            <?= LinkPager::widget(['pagination' => $pagination, 'hideOnSinglePage' => true]) ?>
        </div>

        <div class="row">
            <!--материалы -->
<?php foreach($posts as $post): ?>
            <!--1-->
            <div class="col-md-24 col-sm-24 col-xs-24 selection-vertical-content  block-style-1 block-shadow hover-horder">
                <div class="row box-block-w100-h100">
<!--                    ссылка покрывает весь блок-->
                    <a href="<?=Url::toRoute(['/blog/post', 'alias' => $post->alias]);?>" class="block-w100-h100"></a>
                    <div class="col-md-7 col-sm-7 col-xs-7">
                        <a href="">
                            <?php if(isset($post->img)): ?>
                            <?php echo Html::img('@blogImg-web/'.$post->id.'/thumb/'.$post->img, ['alt'=>'нет изображения', 'class'=>'img-selection-horizontal']);?>
                            <?php endif;?>
                        </a>
                    </div>
                    <div class="col-md-17 col-sm-17 col-xs-17">
                        <div class="textbox-selection-vertical">
                            <h4 class="h4-selection-vertical"><a href="<?=Url::toRoute(['/blog/post', 'alias' => $post->alias]);?>"><?= Html::encode($post->h1); ?></a></h4>
                            <p><?=BaseStringHelper::truncateWords(strip_tags($post->description), 28, $suffix = '...' );?></p>
                            <p><?php //echo$post->createdDate;?></p>
                            <p><?php //echo $post->id;?></p>
                        </div>
                    </div>
                </div>
                <ul class="icon-box">
                    <li><a href=""><span class="sprite sprite-ico-arrow"></span><small>0</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-heart"></span><small>15</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-comment"></span><small><?=Comments::getCount(Comments::TYPE_BLOGPOST, $post->id);?></small></a></li>
                </ul>
            </div>
<?php endforeach; ?>
        </div>
    </div>
</div>

<div id="pagination-box">
    <?= LinkPager::widget(['pagination' => $pagination, 'hideOnSinglePage' => true]) ?>
</div>
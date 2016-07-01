<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use common\models\comments\Comments;

\frontend\assets\WikiAsset::register($this);

$this->params['breadcrumbs'][] = array('label'=> 'Все страницы энциклопедии', 'url'=> Url::toRoute('/wiki/index'));
$this->params['breadcrumbs'][] = Html::encode($this->context->h1);
?>

<h1><?=$this->context->h1;?></h1>

<!--алфавитный указатель-->
<?php if(isset($alphabet) && $alphabet != NULL):?>
    <hr>
        <ul class="lettersList">
            <li class="allLettersList"><a href="<?=Url::toRoute(['/wiki/index']);?>">Все</a></li>
            <?php foreach($alphabet as $letter):?>
                <?php if($letter->id === $curLetter->id):?>
                    <li><strong style="color:green;text-decoration: underline;"><?=$letter->letter;?></strong></li>
                <?php else:?>
                    <li><a href="<?=Url::toRoute(['/wiki/letter', 'alias' => $letter->alias]);?>"><?=$letter->letter;?></a></li>
                <?php endif;?>

            <?php endforeach;?>
        </ul>
    <hr>
<?php endif;?>
<?php //var_dump($termList);?>
<!--конец - алфавитный указатель-->


    <div class="col-md-14">
        <ul class="termList">
            <li class="termListHead"><?=$curLetter->letter;?></li>
            <?php foreach($termList as $term):?>
                <li><a href="<?=Url::toRoute(['/wiki/term', 'alias' => $term->alias]);?>"><?php echo $term->title;?></a></li>
            <?php endforeach;?>
        </ul>

    </div>



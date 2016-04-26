<?php
use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode(Yii::t('app', $this->title)) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Возможно, страница удалена или не правильный url адрес.
    </p>


</div>
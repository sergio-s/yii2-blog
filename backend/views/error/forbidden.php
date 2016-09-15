<?php
use yii\helpers\Html;

$this->title = $exception->statusCode;
?>

<div class="site-error">
    <h1><?= $exception->statusCode; ?></h1>

    <div class="alert alert-danger">
        <?= $exception->getMessage() ?>
    </div>
</div>
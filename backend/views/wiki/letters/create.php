<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\wiki\AdminWikiLetters */

$this->title = 'Создать категорию буквы';
$this->params['breadcrumbs'][] = ['label' => 'Все категории букв', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-wiki-letters-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

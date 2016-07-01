<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\wiki\AdminWikiTerms */

$this->title = 'Создать страницу термина';
$this->params['breadcrumbs'][] = ['label' => 'Все страницы терминов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-wiki-terms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

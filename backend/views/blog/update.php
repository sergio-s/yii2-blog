<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BlogPostsTable */

$this->title = 'Update Blog Posts Table: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blog Posts Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blog-posts-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

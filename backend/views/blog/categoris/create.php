<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BlogCategorisTable */

$this->title = Yii::t('app', 'Create Blog Categoris Table');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Categoris Tables'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-categoris-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

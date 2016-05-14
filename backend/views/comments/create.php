<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\comments\Comments */

//$this->title = 'Create Comments';
$this->params['breadcrumbs'][] = ['label' => 'Все комментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('create_form', [
        'model' => $model,
    ]) ?>

</div>

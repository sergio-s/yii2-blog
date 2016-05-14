<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\comments\Comments */

//$this->title = 'Update Comments: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Все комментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'id комментария - '.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('update_form', [
        'model' => $model,
    ]) ?>

</div>

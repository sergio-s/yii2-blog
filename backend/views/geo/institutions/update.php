<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\geo\GeoInstitutions */

$this->title = 'изменить данные роддома: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Роддома', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geo-institutions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'htmlImg' => $htmlImg,
    ]) ?>

</div>

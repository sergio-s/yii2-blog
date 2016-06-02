<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\geo\GeoCities */

$this->title = 'Добавить город';
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geo-cities-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'defaultCountry' => $defaultCountry,
    ]) ?>

</div>

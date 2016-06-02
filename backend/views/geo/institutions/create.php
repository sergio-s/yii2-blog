<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\geo\GeoInstitutions */

$this->title = 'Добавить роддом';
$this->params['breadcrumbs'][] = ['label' => 'Роддома', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geo-institutions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

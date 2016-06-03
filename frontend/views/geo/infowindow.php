<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use kartik\rating\StarRating;

?>

<div>
    <div style='overflow:hidden;'>

        <?php if(isset($institution->geoInstitutionsPhotos[0]->img) && NULL != $institution->geoInstitutionsPhotos[0]->img):?>
            <img  src="<?php echo Yii::getAlias('@web/img/geo/institution-'.$institution->id.'/'.$institution->geoInstitutionsPhotos[0]->img);?>" style="width:60px;float:left;margin-right:4px;">
        <?php endif;?>

        <p>
            <strong><a href="<?=Url::toRoute(['/geo/institutions', 'instId' => $institution->id]);?>" ><?=$institution->name;?></a></strong>
        </p>

        <p>
            <a href="<?=Url::toRoute(['/geo/institutions', 'instId' => $institution->id]);?>" >Перейти к просмотру...</a>
        </p>

<?php

echo StarRating::widget([
                    'name' => 'rating_2',
                    'value' => 3,
                    'pluginOptions' => [
                        'displayOnly' => true,
                        //'disabled'=>true,
                        'theme' => 'krajee-svg',
                        'stars' => 10,
                        'min' => 0,
                        'max' => 10,
                        'showClear' => false,//знак "кирпич"
                        'showCaption' => false,//без подписи количества выбранных
                        'size' => 'mili',//mili
                    ]
                ]);

 ?>

    </div>
</div>




<?php
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use yii\bootstrap\Modal;
//use common\widgets\Alert;

?>
<?php Pjax::begin([
    'enablePushState' => false,
    'timeout' => 10000,
    'id' => $pjaxContainerId,
]); ?>



<div id="likesBox">
    <form method="post" autocomplete="off" data-pjax="">
        <input type="hidden" name ="like" value="yes">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        <button type="submit" class="button">Нравится</button>
    </form>
    <span class="resultLikes"><?=$likeTotal;?></span>
</div>


<?php

    //$widgetId - имя сессии
    if(Yii::$app->session->hasFlash($widgetId) != null)
    {
        Modal::begin(['id' => 'myModal-header','header' => '<h2>Сообщение !</h2>',]);
            echo "<h2 style='color:green;'>";
                echo "<strong>";
                    echo Yii::$app->session->getFlash($widgetId);
                echo "</strong>";
            echo "</h2>";
        Modal::end();
        //вызываем модальное окно в этом блоке
        $js = "$('#myModal-header').modal()";
        $this->registerJs($js);

    }

?>

<?php Pjax::end(); ?>

<?php
//echo Html::a('Нравится', ['', 'id'=>$institution->id], [
//            //'class' => '',
//            'data' => [
//                //'confirm' => "Are you sure you want to delete profile?",
//                'method' => 'post',
//            ],
//        ]);
?>
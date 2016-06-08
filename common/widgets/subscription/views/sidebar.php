<?php
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;
use yii\bootstrap\Modal;
?>
<?php //widget_id - устанавливаем уникальный индификатор, что передаем при инициализации виджета ?>
<?php Pjax::begin(['id' => $widget_id]); ?>
<?php //var_dump($widget_id);?>
    <?php $form = ActiveForm::begin([   'id' => $widget_id.'-form',
                                        'method' => 'POST',
                                        'action' => '',
                                        'enableAjaxValidation' => false,
                                        'options' => ['class'=> 'subscribe-form','style' => '', 'autocomplete' => 'off', 'data-pjax' => true,'enctype' => 'multipart/form-data']
                                    ]);?>
        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Введите ваш email'])->label(false);?>
        <?= Html::submitButton('Подписаться', ['class' => '']);?>
    <?php ActiveForm::end();?>



<?php
    //$widget_id - имя сессии
    if(Yii::$app->session->hasFlash($widget_id) != null)
    {
        Modal::begin(['id' => 'myModal-sidebar','header' => '<h2>Форма подписки</h2>',]);
            echo "<h2 style='color:green;'>";
                echo "<strong>";
                    echo Yii::$app->session->getFlash($widget_id);
                echo "</strong>";
            echo "</h2>";
        Modal::end();
        //вызываем модальное окно в этом блоке
        $js = "$('#myModal-sidebar').modal()";
        $this->registerJs($js);
    }
//    elseif (Yii::$app->session->hasFlash('Subscription_error') != null ) {
//        Modal::begin(['id' => 'myModal_er','header' => '<h2>Форма подписки</h2>',]);
//            echo "<h2 style='color:red;'>";
//                echo "<strong>";
//                    echo Yii::$app->session->getFlash('Subscription');
//                echo "</strong>";
//            echo "</h2>";
//        Modal::end();
//        //вызываем модальное окно в этом блоке
//        $js = "$('#myModal_er').modal()";
//        $this->registerJs($js);
//    }
?>
<?php //var_dump($$widget_id);?>
<?php Pjax::end(); ?>



<?php
//способ вывода сообщения о успешном сохранении в качестве появляющейсая надписи
//if(Yii::$app->session->hasFlash('Subscription') ): ?>
<!--    <div id="mes" style="color:green;">
        <?php //echo Yii::$app->session->getFlash('success') ?>
</div>
//?>
<?php
//$js = " $('#new_Subscription').on('pjax:end', function() {
//    $('#mes').css('display', 'none');
//    $('#mes').fadeIn(1000);
//
//
//        $('input').change(function() {
//            $('#mes').fadeOut(1000);
//        });
//
//    })";
//
//  $this->registerJs($js, $this::POS_READY);
//?>

<?php //echo Alert::widget(); ?>
-->
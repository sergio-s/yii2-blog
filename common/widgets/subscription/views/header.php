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

    <?php $form = ActiveForm::begin([   'id' => $widget_id.'-form',
                                        'method' => 'POST',
                                        'action' => '',
                                        'enableAjaxValidation' => false,
                                        'options' => ['class'=> 'subscribe-form','style' => '', 'autocomplete' => 'off', 'data-pjax' => true,]
                                    ]);?>
        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Введите ваш email'])->label(false);?>
        <?= Html::submitButton('Подписаться', ['class' => '']);?>
    <?php ActiveForm::end();?>



<?php

    //$widget_id - имя сессии
    if(Yii::$app->session->hasFlash($widget_id) != null)
    {
        Modal::begin(['id' => 'myModal-header','header' => '<h2>Форма подписки</h2>',]);
            echo "<h2 style='color:green;'>";
                echo "<strong>";
                    echo Yii::$app->session->getFlash($widget_id);
                echo "</strong>";
            echo "</h2>";
        Modal::end();
        //вызываем модальное окно в этом блоке
        $js = "$('#myModal-header').modal()";
        $this->registerJs($js);

    }

?>

<?php Pjax::end(); ?>


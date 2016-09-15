<?php
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;
use yii\bootstrap\Modal;
?>

<!--<form id="email-form" role="form" class="">
    <input type="email" class="" placeholder="Введите ваш email">
    <div id="check-footer-wrap">
        <label>
            <input id="check-footer" type="checkbox" name="check" value="check2">
            <span>Если вы согласны с условиями сайта,то нужно отметить поле.Прочитаейте сначала правила - <a href="">правила</a></span>
        </label>
    </div>
        <button type="submit" class=""><i class="sprite sprite-botton-arrow-for-input"></i></button>
</form>-->

<?php //widget_id - устанавливаем уникальный индификатор, что передаем при инициализации виджета ?>
<?php Pjax::begin(['id' => $widget_id]); ?>

    <?php $form = ActiveForm::begin([   'id' => $widget_id.'-form',
                                        'method' => 'POST',
                                        'action' => '',
                                        'enableAjaxValidation' => false,
                                        'options' => ['class'=> 'email-form','style' => '', 'autocomplete' => 'off', 'data-pjax' => true,]
                                    ]);?>

        <?php //echo $form->field($model, 'email',['options'=> ['class'=> ''] ])->textInput(['placeholder' => 'Введите ваш email'])->label(false);?>
        <?php echo $form->field($model, 'email')->textInput(['placeholder' => 'Введите ваш email'])->label(false);?>
        <div id="check-footer-wrap">
<!--            <label>-->
                <?php echo $form->field($model, 'checkbox',['options'=> ['id'=>'check-footer'] ])->checkbox(['checked' => false],FALSE)->label(false);//(FALSE) - второй параметр $enclosedByLabel - если true, то тег <input> будет находится внутри тега <label>?>
<!--                <input id="check-footer" type="checkbox" name="check" value="check2">-->
                <p id="prop">Если вы согласны с условиями сайта,то нужно отметить поле.Прочитаейте сначала правила - <a href="">правила</a></p>
<!--            </label>-->
        </div>

        <?= Html::submitButton("<i class='sprite sprite-botton-arrow-for-input'></i>", ['class' => '']);?>

    <?php ActiveForm::end();?>


<?php

    //$widget_id - имя сессии
    if(Yii::$app->session->hasFlash($widget_id) != null)
    {
        Modal::begin(['id' => 'myModal-footer','header' => '<h2>Форма подписки</h2>',]);
            echo "<h2 style='color:green;'>";
                echo "<strong>";
                    echo Yii::$app->session->getFlash($widget_id);
                echo "</strong>";
            echo "</h2>";
        Modal::end();
        //вызываем модальное окно в этом блоке
        $js = "$('#myModal-footer').modal()";
        $this->registerJs($js);

    }

?>

<?php Pjax::end(); ?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\models\wiki\AdminWikiLetters;
use backend\models\wiki\AdminWikiTerms;


/* @var $this yii\web\View */
/* @var $model backend\models\wiki\AdminWikiTerms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-wiki-terms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'id_letter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_letter',
            [
            'template' =>
                        '<div class="form-group"><label class="control-label">{label}'
                        . Html::a(' (как заполнять)', ['#'], ['data-toggle' => 'tooltip','title' => "Выбрать букву (категорию) для термина, соответствующую первой букве термина"])
                        . '</label>'
                        .'{input}{error}{hint}'
                        . '</div>',

            ]
            )->dropDownList(

            ArrayHelper::map(AdminWikiLetters::find()->all(),'id','letter'),
            ['prompt' => 'Выбрать букву']

            )
            ->label('Выбрать букву (категорию) для термина')
            ?>

    <?php echo $form->field($model, 'alias',
            [
            'template' =>
                        '<div class="form-group"><label class="control-label">{label}'
                        . Html::a(' (как заполнять)', ['#'], ['data-toggle' => 'tooltip','title' => "Разрешены символы тире и нежнее подчеркивание. Введите фразу в поле. При переключении на другое поле вставленная фраза будет конвертирована в латиницу автоматически."])
                        . '</label>'
                        .'{input}{error}{hint}'
                        . '</div>',

            ]
            )->textInput(['maxlength' => true, 'act' => 'translit'])
    //  ->label('Алиас латинскими буквами.  ');
    ?>

    <?= $form->field($model, 'title',
            [
            'template' =>
                        '<div class="form-group"><label class="control-label">{label}'
                        . Html::a(' (как заполнять)', ['#'], ['data-toggle' => 'tooltip','title' => "Тут записывается непосредственно термин. Первая буква термина должна соответствовать выбранной категории (буквы)."])
                        . '</label>'
                        .'{input}{error}{hint}'
                        . '</div>',

            ]
            )->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords',
            [
            'template' =>
                        '<div class="form-group"><label class="control-label">{label}'
                        . Html::a(' (как заполнять)', ['#'], ['data-toggle' => 'tooltip','title' => "Перечислите ключевые слова через запятую"])
                        . '</label>'
                        .'{input}{error}{hint}'
                        . '</div>',

            ]
            )->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <!--    ТЕКСТОВЫЙ РЕДАКТОР С ЗАГРУЗКОЙ КАРТИНОК-->
    <?php
            echo $form->field($model, 'content')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,
                    'imageManagerJson' => Url::to(['/wiki-terms/redactor-images-get']),
                    'imageUpload' => Url::to(['/wiki-terms/redactor-image-upload']),
                    'plugins' => [
                        'imagemanager',
                        'clips',
                        'fullscreen',
                        'fontcolor',
                        'fontfamily',
                        'fontsize',
                        'video',
                        'blockwrap',
                     ]
                ]
            ]);
    ?>
  <!-- ###   ТЕКСТОВЫЙ РЕДАКТОР С ЗАГРУЗКОЙ КАРТИНОК  ### -->

    <?php //echo $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php //echo $form->field($model, 'createdDate')->textInput() ?>

    <?php //echo $form->field($model, 'updatedDate')->textInput() ?>

    <?php //echo $form->field($model, 'autorId')->textInput() ?>

    <?php //echo $form->field($model, 'updaterId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php

$script = <<< JS
console.log($(this));
//перевод в транслит строки в input url
jQuery('input[act=translit]').focusout(function(){
    var str = $(this).val();
    var transl = translit(str);
    $(this).val(transl);
});

  // инициализировать все элементы на страницы, имеющих атрибут data-toggle="tooltip", как компоненты tooltip
  $('[data-toggle="tooltip"]').tooltip()

$('[data-toggle="tooltip"]').click(function( event ) {
  event.preventDefault();
});
JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>
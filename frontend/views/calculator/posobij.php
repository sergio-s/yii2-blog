<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;


$this->params['breadcrumbs'][] = strip_tags($this->context->h1);
?>

<div class="blog-post">
    <h1><?= strip_tags($this->context->h1);?></h1>

    <hr>
    <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp"></div>

    <br>

    <blockquote class="bg-warning">
        <?= strip_tags($this->context->description);?>
    </blockquote>
    <p>
        Калькулятор рассчитывает пособие по беременности и родам и единовременное пособие при рождении ребенка. Пособия рассчитываются для тех, кто идет на больничный по беременности в 2016 году.
    </p>
    <h3>
        Для определения размеров пособий заполните форму:
    </h3>

    <div class="row">
        <div class="col-xs-24">
            <form role="form" action="" method="post">
                <input type="hidden" name="_csrf" value="ZHAzcENzcUI.PEofNCkdNVU7bDslOj4XIUAEFHsDNjUsRVgocUQVCw==">
<!--Блок выбора прродолжительности больничного-->
                <div class="radio days">
                    <p><strong>Продолжительность больничного по БиР:</strong></p>
                    <label>
                        <input style="width: 15px; height:15px" type="radio" name="countHoliday"  value="140" checked>
                        140 дней <small>(одноплодная беременность без осложнений)</small>
                    </label>
                    <br>
                    <label>
                        <input style="width: 15px; height:15px" type="radio" name="countHoliday"  value="156">
                        156 дней <small>(одноплодная беременность c осложнениями)</small>
                    </label>
                    <br>
                    <label>
                        <input style="width: 15px; height:15px" type="radio" name="countHoliday"  value="194">
                        194 дней <small>(многоплодная беременность)</small>
                    </label>
                </div>

                <hr class="rose">
<!--Блок выбора страхового стажа-->
                <div class="radio insurance">
                    <p><strong>Страховой стаж больше 6 месяцев?</strong></p>
                    <label>
                        <input style="width: 15px; height:15px" type="radio" name="insuranceMore6m"  value = 'yes' checked>
                        Да
                    </label>
                    <br>
                    <label>
                        <input style="width: 15px; height:15px" type="radio" name="insuranceMore6m"  value = 'no'>
                        Нет
                    </label>

                </div>

                <hr class="rose">

<!--данные за 2015 год-->

                <div class="radio check_years" id="y2015">
                    <p><strong>Введите данные за 2015 год:</strong></p>
                    <label style="padding: 0;">
                        <input style="width: 15px; height:15px" type="checkbox">
                        Заменить этот год?
                        <br>
                        <small class="extraSmall">(год можно заменить только если в нём Вы были в отпуске по уходу за ребёнком до 1,5 лет или на больничном по беременности и родам)</small>
                    </label>

                    <table class="inputSumBox">
                        <tbody>
                            <tr>
                                <td height="51" nowrap="nowrap">сумарный доход за год</td>
                                <td class="inputTd">
                                    <input type="text" size="10" maxlength="8" name="sumIncome[2015]" value="0">
                                </td>
                                <td><small class="extraSmall">(с которого были отчисления в ФСС)</small></td>
                            </tr>

                            <tr>
                                <td height="51" nowrap="nowrap">исключаемый период</td>
                                <td class="inputTd">
                                    <input type="text" size="10" maxlength="8" name="deductiblePeriod[2015]" value="0">
                                </td>
                                <td><small class="extraSmall">(количество дней на больничных или в отпуске по уходу за ребенком до 1,5 лет)</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr class="rose">

<!--данные за 2014 год-->

                <div class="radio check_years" id="y2014">
                    <p><strong>Введите данные за 2014 год:</strong></p>
                    <label style="padding: 0;">
                        <input style="width: 15px; height:15px" type="checkbox">
                        Заменить этот год?
                        <br>
                        <small class="extraSmall">(год можно заменить только если в нём Вы были в отпуске по уходу за ребёнком до 1,5 лет или на больничном по беременности и родам)</small>
                    </label>

                    <table class="inputSumBox">
                        <tbody>
                            <tr>
                                <td height="51" nowrap="nowrap">сумарный доход за год</td>
                                <td class="inputTd">
                                    <input type="text" size="10" maxlength="8" name="sumIncome[2014]" value="0">
                                </td>
                                <td><small class="extraSmall">(с которого были отчисления в ФСС)</small></td>
                            </tr>

                            <tr>
                                <td height="51" nowrap="nowrap">исключаемый период</td>
                                <td class="inputTd">
                                    <input type="text" size="10" maxlength="8" name="deductiblePeriod[2014]" value="0">
                                </td>
                                <td><small class="extraSmall">(количество дней на больничных или в отпуске по уходу за ребенком до 1,5 лет)</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

<!--данные за 2013 год-->
                <hr class="rose" style="display: none;">
                <div class="radio check_years additional" id="y2013" style="display: none;">
                    <p><strong>Введите данные за 2013 год:</strong></p>

                    <table class="inputSumBox">
                        <tbody>
                            <tr>
                                <td height="51" nowrap="nowrap">сумарный доход за год</td>
                                <td class="inputTd">
                                    <input type="text" size="10" maxlength="8" name="sumIncome[2013]" value="">
                                </td>
                                <td><small class="extraSmall">(с которого были отчисления в ФСС)</small></td>
                            </tr>

                            <tr>
                                <td height="51" nowrap="nowrap">исключаемый период</td>
                                <td class="inputTd">
                                    <input type="text" size="10" maxlength="8" name="deductiblePeriod[2013]" value="">
                                </td>
                                <td><small class="extraSmall">(количество дней на больничных или в отпуске по уходу за ребенком до 1,5 лет)</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

<!--данные за 2012 год-->
                <hr class="rose" style="display: none;">
                <div class="radio check_years additional" id="y2012" style="display: none;">
                    <p><strong>Введите данные за 2012 год:</strong></p>

                    <table class="inputSumBox">
                        <tbody>
                            <tr>
                                <td height="51" nowrap="nowrap">сумарный доход за год</td>
                                <td class="inputTd">
                                    <input type="text" size="10" maxlength="8" name="sumIncome[2012]" value="">
                                </td>
                                <td><small class="extraSmall">(с которого были отчисления в ФСС)</small></td>
                            </tr>

                            <tr>
                                <td height="51" nowrap="nowrap">исключаемый период</td>
                                <td class="inputTd">
                                    <input type="text" size="10" maxlength="8" name="deductiblePeriod[2012]" value="">
                                </td>
                                <td><small class="extraSmall">(количество дней на больничных или в отпуске по уходу за ребенком до 1,5 лет)</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr class="rose">
<!--коэффициент города-->
                <div class="select cityCoef">
                    <p><strong>Районный коэффициент в Вашем регионе:</strong></p>
                    <p><small>(пример:   Москва, Санкт-Петербург, Нижний Новгород – 1;   Екатеринбург – 1,15;   Новосибирск – 1,2)</small></p>

                    <select id="coefSelect" name="coef" size="1">
                        <option value="1" selected="selected">1</option>
                        <option value="1.15">1,15</option>
                        <option value="1.2">1,2</option>
                        <option value="1.3">1,3</option>
                        <option value="1.4">1,4</option>
                        <option value="1.5">1,5</option>
                        <option value="1.6">1,6</option>
                        <option value="1.7">1,7</option>
                        <option value="1.8">1,8</option>
                        <option value="2">2</option>
                    </select>

                </div>
                <br>
                <button type="submit" class="btn btn-default">Рассчитать пособие по БиР</button>
            </form>



        </div>
    </div>


</div>

<?php
$css = <<<CSS
hr.rose{
    border: none;
    color:rgba(255, 153, 204, 0.5);
    background-color:rgba(255, 153, 204, 0.5);
    height:2px;
}

.extraSmall
{
    font-size: 11px
}

.inputSumBox{
    border-spacing: 7px 11px;
}

.inputSumBox input{
    height: 25px;

}

.inputTd{
   padding:0 20px;
}

.coefSelect{
    height: 25px;
    width: 100px;
}

CSS;
$this->registerCss($css);

$js = <<<JS

var y2013 = $('#y2013');
var y2012 = $('#y2012');

$(':checkbox').change(function() {
   var table = $(this).parent("label").siblings(".inputSumBox");
   if($(this).is(":checked")) {


        //console.log(table.find('input'));
        table.fadeToggle('slow');
        table.find('input').val('');


        additional = $('.additional:hidden').filter( ':first' ).show('slow');//дополнительные даты 2012, 2013
        additional.find('input').val('0');
        additional.prev('hr').show('slow');

        return;
   }
   else{
        table.fadeToggle('slow');
        table.find('input').val('0');

        additit = $('.additional:visible').filter( ':last' );//дополнительные даты 2012, 2013
        additit.prev('hr').hide('slow');
        additit.hide('slow');
        additit.find('input').val('');


        return;
   }
});

var inp = $(".inputSumBox input[type=text]");
//console.log(inp);

//при наведении ноль пропадает
inp.focusin(function()
{
    if($(this).val() == '0'){
        $(this).val('');
    }

});

//при потере фокуса, если ничего не введено - появляется ноль
inp.focusout(function()
{
   if($(this).val().length === 0){
        $(this).val('0');
   }
});

JS;
$this->registerJs($js, $this::POS_READY);

?>
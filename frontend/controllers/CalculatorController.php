<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;


class CalculatorController extends BaseFront
{
    public $h1;
    public $description;
    public $currentYear = 2016;

    private $rubAndKopConv = false;//флаг конвертирования суммы в вид число руб. число коп.

    //максимально возможное пособие по беременности
    private static $benefitMax = [
        '2016' => 248164.00,
    ];

    //минимально возможное пособие по беременности
    private static $benefitMin = [
        '2016' => 28555.80,
    ];

    //минимальная оплату труда. Для 2016 года МРОТ составляет – 6204 руб. в мес
    private static $paymentMonthMin = [
        '2016' => 6204,
    ];

    //полагается единовременное пособие при рождении ребенка
    private static $oneTimeBenefit = [
        '2016' => 15512.65,
    ];


    //установленный средний заработок за год (предельная величина)
    //если средний заработок за год больше предельной величины, то он приравнивается к
    //предельной величине
    private static $yearProfit = [
        '2011' => 463000,
        '2012' => 512000,
        '2013' => 568000,
        '2014' => 624000,
        '2015' => 670000,
    ];

    //установленный средний заработок за год
    private static $yearDays = [
        '2012' => 365,
        '2013' => 365,
        '2014' => 365,
        '2015' => 365,
        '2016' => 366,
    ];

    public function actionPosobij()
    {
        $request = Yii::$app->request;
        if ($request->isPost) {
            $request = Yii::$app->request;
            $countHoliday = $request->post('countHoliday');//сколько дней отпуска
            $insurance = $request->post('insuranceMore6m');//страховка более 6 мес.?
            $coef = $request->post('coef');//районный коэффициент для расчета выплат
            $deductiblePeriod = $request->post('deductiblePeriod');//массив исключаемых периодов
            $sumIncome = $request->post('sumIncome');//массив доходов за два выбранные года
            foreach($sumIncome as $k => $v){
                if($v === ''){
                    unset($sumIncome[$k]);
                }
            }


            $session = Yii::$app->session;
            $session['benefit.calc'] = true;
            $session['benefit.result'] = 0;
            $session['benefit.sumIncome'] = $sumIncome;
            $session['benefit.coef'] = $coef;
            //var_dump($sumIncome);



            //если страховой стаж менее 6 мес.
            if($insurance === 'no'){
                $this->rubAndKopConv = true;
                $session['benefit.result'] = $this->priseFormat($this->getMinimalBenefit($countHoliday, $coef));

            }else{
                $this->rubAndKopConv = true;
                $session['benefit.result'] = $this->priseFormat($this->getBenefit($sumIncome, $deductiblePeriod, $countHoliday, $coef));
            }

            return $this->redirect(array('posobij-result'));

        }

        Yii::$app->view->title .= ': Калькулятор пособий по беременности и родам в 2016 году';
        $this->description = 'Онлайн калькулятор декретных рассчитывает пособие по беременности и родам в 2016 году и кое что ещё...';

        Yii::$app->view->registerMetaTag(['name' => 'description','content' => $this->description.' - '.Yii::$app->name]);
        Yii::$app->view->registerMetaTag(['name' => 'keywords','content' => 'калькулятор расчет пособий беременности родам рождении ребенка- '.Yii::$app->name]);

        $this->h1 = "Калькулятор пособий по беременности и родам в 2016 году";





        return $this->render('posobij',[


                                    ]);
    }

    public function actionPosobijResult()
    {
        Yii::$app->view->title .= ': Калькулятор пособий по беременности и родам (результаты).';
        $this->description = 'Мы посчитали ваши декретные пособия!';

        Yii::$app->view->registerMetaTag(['name' => 'description','content' => $this->description.' - '.Yii::$app->name]);
        Yii::$app->view->registerMetaTag(['name' => 'keywords','content' => 'Калькулятор - Мы посчитали ваши декретные пособия! '.Yii::$app->name]);

        $this->h1 = "Результаты расчетов декретно пособия";


        return $this->render('posobij-result',[
                                                'currentYear' => $this->currentYear,
                                                'oneTimeBenefit' => $this->getOneTimeBenefit(),//единоразовая выплата по рождению
        ]);
    }
    /**
     * $year - текущий год
     * $countHoliday - число дней отпуска
     */
    //расчет пособия по минимальной ставке зарплаты, установленный на оприделенный год
    //Нужно получить минимальную оплату за день = Миним. месячная зарплата * 24 (месяца) / 730 (число дней в предшевствующих двух годах)
    private function getMinimalBenefit($countHoliday, $coef){

        $paymentDayMin = $this->getPaymentDayMin();//мин. заработок за день, округленный до копеек

        $minimalBenefit = ($paymentDayMin * $countHoliday) * $coef;//округляем до целого в меньшую сторону

        //return ceil($minimalBenefit);

        return intval($minimalBenefit * 100) / 100;//обрезает дробь до сотых

        //return round($minimalBenefit);

        //return intval($minimalBenefit);
    }

    //расчет пособия с исходными данными
    //$sumIncome
    //$deductiblePeriod
    //$countHoliday
    //$coef
    private function getBenefit(array $sumIncome,array $deductiblePeriod, $countHoliday, $coef){
        $countPaymentOn2Years = 0;//сумма доходов за два года
        $countDaysOn2Years = 0;//количество дней за выбранные годы
        foreach($sumIncome as $data => $paymen){
            $countPaymentOn2Years += $paymen;
            $countDaysOn2Years += self::$yearDays[$data];
        }
        $totalDeductiblePeriod = array_sum($deductiblePeriod);//сумма исключаемого периода

        //расччетная сред.дневн.зарплата = (ср.зар за 2014 + 2015)/(730 - искл.дни)*140(дней декрета)
        $paymentDayMiddle = $countPaymentOn2Years / ($countDaysOn2Years-$totalDeductiblePeriod);//сред.дневн.зараб
        //$paymentDayMiddle = round($paymentDayMiddle, 2);

        $paymentDayMin = $this->getPaymentDayMin();//мин. дн. зп.
        $paymentDayMax = $this->getPaymentDayMax();//мак. дн. зп.

        $paymentDay = $paymentDayMiddle;

        //Если зарплата меньше минимальной- берем минимальную установленную
        if($paymentDayMiddle < $paymentDayMin){
            $paymentDay = $paymentDayMin;
        }

        //Если зарплата больше максимальной - берем максимально установленную
        if($paymentDayMiddle > $paymentDayMax){
            $paymentDay = $paymentDayMax;
        }

        //$benefit = round(($paymentDay * $countHoliday) * $coef);

        $benefit = ($paymentDay * $countHoliday) * $coef;
        $benefit = intval($benefit * 100) / 100;

        //$benefit = floor(($paymentDay * $countHoliday) * $coef);
        //$benefit = ceil(($paymentDay * $countHoliday) * $coef);
        return $benefit;

    }

    //Максимальная величина среднего дневного заработка
    //Сумма предельных заработков за два предшествующих года / количество дней за эти два года
    private function getPaymentDayMax(){
        $lastYear = $this->currentYear - 1;//прошлый год (от текущего)
        $beforeLastYear = $lastYear - 1;//позапрошлый год (от текущего)
        $countDaysOn2Years = self::$yearDays[$lastYear] + self::$yearDays[$beforeLastYear];//кол-во дней за 2 года

        $countProfitOn2Years = self::$yearProfit[$lastYear] + self::$yearProfit[$beforeLastYear];//общая придельная сумма зп за два года
        //общий макс. заработок за 2 года/кол-во дней
        $paymentDayMax = $countProfitOn2Years / $countDaysOn2Years;

        return round($paymentDayMax, 2);//макс. заработок за день, округленный до копеек

    }

    private function getPaymentDayMin(){
        $paymentMonthMin = self::$paymentMonthMin[$this->currentYear];//минималка за месяц
        $lastYear = $this->currentYear - 1;//прошлый год (от текущего)
        $beforeLastYear = $lastYear - 1;//позапрошлый год (от текущего)
        $countDaysOn2Years = self::$yearDays[$lastYear] + self::$yearDays[$beforeLastYear];//кол-во дней за 2 года

        $paymentDayMin = ($paymentMonthMin * 24)/$countDaysOn2Years;//минимальная оплата за день на момент $year (2016)

        return $paymentDayMin = round($paymentDayMin, 2);//мин. заработок за день, округленный до копеек

        //return intval($paymentDayMin * 100) / 100;
    }



        //возвращает сумму единоразовой выплаты по беременности для текущего года
    private function getOneTimeBenefit(){
        return self::$oneTimeBenefit[$this->currentYear];
    }

    //$price - сумма вида (например) 21435.34
    //На выходе 21435руб. 34коп.
    private function rubAndKop($price){
        $ar = explode(".", $price);
        if(count($ar)<2){
            array_push($ar, '00');
        }
        list($rub, $kop) = $ar;

        if(!isset($kop) or empty($kop) or 0 == $kop){
            $kop = '00';
        }
        if(mb_strlen($kop) < 2){
            $kop .= '0';
        }
        return $rub.'руб. '.$kop.'коп. ';
    }


    private function priseFormat($priсe){
        //если флаг $this->rubAndKopConv = true
        if($this->rubAndKopConv){
            return $this->rubAndKop($priсe);//пример результата - 21435руб. 34коп.
        }else{
            return $priсe.'руб.';//пример результата - 21435.34руб.
        }
    }

}

<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use app\models\wiki\WikiLetters;
use app\models\wiki\WikiTerms;

class WikiController extends BaseFront
{
    public $h1;


    public function actionIndex()
    {
        Yii::$app->view->title .= ' Все страницы энциклопедии';

        Yii::$app->view->registerMetaTag(['name' => 'description','content' => 'Энциклопедии - '.Yii::$app->name]);
        Yii::$app->view->registerMetaTag(['name' => 'keywords','content' => 'страницы энциклопедии '.Yii::$app->name]);

        $this->h1 = "Все страницы энциклопедии";// - Ябеременна.ру

        //выборка всех категорий букв, по которым есть термины и ставим в качестве ключей массивов id буквы
        $alphabet = WikiLetters::find()->alphabetIssetTerm()->indexBy('id')->all();

        //выборка терминов с сортировкой по алфавиту id_letter и title внутри одного id_letter
        $termList = WikiTerms::find()->select('id_letter, alias, title')
                                    ->orderBy(['id_letter'=>SORT_ASC, 'title'=>SORT_ASC])
                                    ->all();



        //построение массива терминов для трех колоночного макета для верстки md, lg
        $colMd = 3;
        $elemsIncolMd = ceil(count($termList)/$colMd);//количество терминов в одной колонке
        $gridMd = [];//формеруемый массив для трех колонок
        $elem = 0;//счетчик

        foreach ($termList as $term){
           $elem++;
           //термины 1ой колонки
           if($elem <= $elemsIncolMd){
               $gridMd[1][$elem] = $term;
           }
           //термины 2ой колонки
           if($elem > $elemsIncolMd && $elem <= $elemsIncolMd*2){
               $gridMd[2][$elem] = $term;
           }
           //термины 3й колонки
           if($elem > $elemsIncolMd*2){
               $gridMd[3][$elem] = $term;
           }
        }

        //построение массива терминов для трех колоночного макета для верстки sm xs
        $colSm = 2;
        $elemsIncolSm = ceil(count($termList)/$colSm);//количество терминов в одной колонке
        $gridSm = [];//формеруемый массив для трех колонок
        $elem = 0;//счетчик

        foreach ($termList as $term){
           $elem++;
           //термины 1ой колонки
           if($elem <= $elemsIncolSm){
               $gridSm[1][$elem] = $term;
           }
           //термины 2ой колонки
           if($elem > $elemsIncolSm){
               $gridSm[2][$elem] = $term;
           }

        }

        return $this->render('index',[
                                'alphabet' => $alphabet,
                                'gridMd' => $gridMd,
                                'gridSm' => $gridSm,


                            ]);
    }

    public function actionLetter($alias)
    {
        $curLetter = WikiLetters::find()->byAlias($alias)->one();

        if(NULL === $curLetter)
        {
            throw new \yii\web\HttpException(404, 'Такой страницы не существует. ');
            //throw new \yii\web\NotFoundHttpException;
        }

        Yii::$app->view->title .= " Энциклопедия- {$curLetter->title}";

        if(isset($curLetter->description) && NULL !== $curLetter->description)
        {
            \Yii::$app->view->registerMetaTag(['name' => 'description','content' => $curLetter->description]);
        }

        if(isset($curLetter->keywords) && NULL !== $curLetter->keywords)
        {
            \Yii::$app->view->registerMetaTag(['name' => 'keywords','content' => $curLetter->keywords]);
        }

        $this->h1 = $curLetter->h1;

        //выборка всех категорий букв, по которым есть термины и ставим в качестве ключей массивов id буквы
        $alphabet = WikiLetters::find()->alphabetIssetTerm()->indexBy('id')->all();

        //выборка терминов с сортировкой по алфавиту title
        $termList = WikiTerms::find()->select('id_letter, alias, title')
                                     ->where(['id_letter' => $curLetter->id])
                                     ->orderBy(['title'=>SORT_ASC])
                                     ->all();
//        count($termList);

        return $this->render('letter',[
                                'alphabet' => $alphabet,
                                'curLetter' => $curLetter,
                                'termList' => $termList,
                            ]);

    }


    public function actionTerm($alias)
    {
        $curTerm = WikiTerms::find()->byAlias($alias)->one();

        if(NULL === $curTerm)
        {
            throw new \yii\web\HttpException(404, 'Такой страницы не существует. ');
            //throw new \yii\web\NotFoundHttpException;
        }

        Yii::$app->view->title .= "Энциклопедия: {$curTerm->title}";

        if(isset($curTerm->description) && NULL !== $curTerm->description)
        {
            \Yii::$app->view->registerMetaTag(['name' => 'description','content' => $curTerm->description]);
        }

        if(isset($curTerm->keywords) && NULL !== $curTerm->keywords)
        {
            \Yii::$app->view->registerMetaTag(['name' => 'keywords','content' => $curTerm->keywords]);
        }

        $this->h1 = $curTerm->h1;

        $siblingsTerms = $curTerm->getSiblingsTerms($curTerm->letter->id);//передаем id категории из которой выводим похожие записи

        return $this->render('term',[
                                'curTerm' => $curTerm,
                                'siblingsTerms' => $siblingsTerms,


                            ]);

    }

}

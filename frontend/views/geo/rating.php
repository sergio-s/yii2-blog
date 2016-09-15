<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\rating\StarRating;

?>


<?php

       Modal::begin(['id' => 'myModal-geo','header' => '<h2>Сообщение для Вас!</h2>',]);
            echo "<h2 style='color:green;'>";
                echo "<strong>";

                echo "</strong>";
            echo "</h2>";
        Modal::end();
        //вызываем модальное окно в этом блоке
//        $js = "$('#myModal-geo').modal()";
//        $this->registerJs($js);
?>



<div id="ratingBlock" style="margin-top: -24px;">
        <div class="row">
            <p class="col-md-5" id="ratingBlockInfo">
                <small>Рейтинг: <strong class="numRait"><?=$institution->rating;?></strong></small><br>
                <small>Голосов: <strong class="numVotes"><?=$institution->ratingVotes;?></strong></small>
            </p>
            <p class="col-md-19">


            <?php //echo $institution->rating;

                    echo StarRating::widget([
                        'name' => 'rating_2',
//                        'pjaxContainerId' => $id,
                        'model' => $institution,
                        'attribute' => 'rating',
                        //'value' => 3,
                        'options' => ['id' => $id],
                        'pluginOptions' => [
                            //'disabled'=>true,

                            //'displayOnly' => true,//звезды только для показа, но не активны
                            'theme' => 'krajee-svg',
                            'stars' => 10,
                            'step' => 1,
                            'min' => 0,
                            'max' => 10,
                            'disabled' => Yii::$app->user->isGuest ? true : false,//для гостя блокируем кнопки
                            'showClear' => false,// (знак "кирпич")
                            'showCaption' => false,//без подписи количества выбранных
                            'size' => 'xs',//mili
                            'defaultCaption' => 'оценка {rating}',
                            'starCaptions' => [
                                0 => 'Extremely Poor',
                                1 => 'оценка 1',
                                2 => 'оценка 2',
                                3 => 'оценка 3',
                                4 => 'оценка 4',
                                5 => 'оценка 5',
                                6 => 'оценка 6',
                                7 => 'оценка 7',
                                8 => 'оценка 8',
                                9 => 'оценка 9',
                                10 => 'оценка 10',
                            ],
                        ],
                        'pluginEvents' => [
                            'rating.change' => "function(event, value, caption) {
                                //console.log(value);
                                //console.log($('#geoinstitutions-rating').val());

                                $.ajax({
                                    type: 'POST',
                                    url: '".Url::to()."',//адрес контроллера и экшена. Так как вид вызван из того же экшена, что и обработка этого запроса, тооставляем пустым или пишем - controller/action
                                    data: {'rait': value},// value - число выбранных звезд
                                    cache: false,
                                    success: function(data) {
                                        var data = jQuery.parseJSON(data);//конвертируем json обьект, что передаем из php  в обьект jquery
                                        var inputRating = $('#".$id."');

                                        if (typeof data.message !== 'undefined') {
                                            console.log(data.message);
                                            inputRating.rating('reset');//очищает рейтинг до значения в бд

                                            $('#myModal-geo .modal-body strong').text(data.message);//забиваем сообщение в модальное окно
                                            $('#myModal-geo').modal();//вызываем виджет модального окна

                                        }else{

                                            $('.numRait').text(data.rating);//обновляем цыфры рейтинга в тегах на странице
                                            $('.numVotes').text(data.ratingVotes);//обновляем цыфры кол-ва голосов в тегах на странице
                                            //inputRating.rating('refresh', {disabled: true, showClear: false, showCaption: true});//добавляет рейтинг и блокирует повторное нажатие
                                            $('#w1').rating('update', value).val();
                                            $('#w2').rating('update', value).val();
                                            $('#w1').rating('refresh', {disabled: true, showClear: false, showCaption: true});//добавляет рейтинг и блокирует повторное нажатие
                                            $('#w2').rating('refresh', {disabled: true, showClear: false, showCaption: true});//добавляет рейтинг и блокирует повторное нажатие

                                        }

                                    }
                                });



                            }",

                        ],
                    ]);
            ?>

            </p>
        </div>
    </div>


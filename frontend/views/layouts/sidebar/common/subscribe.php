<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use rmrevin\yii\ulogin\ULogin;
use common\widgets\subscription\SubscriptionWidget;

AppAsset::register($this);
?>
<!--форма подписки-->
<div style="width: 100%; ">
    <!-- <form id="subscribe-form" role="form" class="">
            <label for="exampleInput"></label>
            <input type="email" class="" placeholder="Введите ваш email">
            <button type="submit" class="">Отправить</button>
        </form>-->


    <?php echo SubscriptionWidget::widget(['widget_id' => 'SubscriptionSidebar', 'modelName' => 'SubscriptionSidebar', 'wView' => 'sidebar']) ?>

</div>

<div style="width: 80%; margin: auto; ">Чтобы подписаться просто нажмите на иконку соц сети</div>

<div id="subscribe-form-soc">
    <!--авторизация по фейсбук и вконтакте-->

    <?= $this->render('@app/views/layouts/socloginmedium.php', ['display' => ULogin::D_PANEL]); ?>
</div>


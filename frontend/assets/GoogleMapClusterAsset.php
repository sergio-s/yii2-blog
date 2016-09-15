<?php

/*
 * GoogleMapClusterAsset
 */
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 *
 *  POS_HEAD: in the head section
    POS_BEGIN: at the beginning of the body section
    POS_END: at the end of the body section
    POS_LOAD: enclosed within jQuery(window).load(). Note that by using this position, the method will automatically register the jQuery js file.
    POS_READY: enclosed within jQuery(document).ready(). This is the default value. Note that by using this position, the method will automatically register the jQuery js file.
 *
 *
 *
 */

//namespace common\widgets\googlemap;
namespace frontend\assets;

use yii\web\AssetBundle;
//use yii\web\View;
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class GoogleMapClusterAsset extends AssetBundle
{
    public $basePath = '@webroot/css/google-map-widget';
    public $baseUrl = '@web/css/google-map-widget';

    //public $sourcePath = '@common/widgets/googlemap/assets';

   public $css = [];

    public $js = [
        'js-marker-clusterer-gh-pages/src/markerclusterer.js',
        //'https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/src/markerclusterer.js',
    ];


      public $depends = [
        'frontend\assets\GoogleMapAsset',
    ];

}

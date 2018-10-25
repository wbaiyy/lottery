<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'lotteryAssets/css/bootstrap.min.css',
        'lotteryAssets/css/font-awesome.css',
        'lotteryAssets/css/jquery.mobile-1.2.0.min.css',
        'lotteryAssets/css/owl.carousel.css',
        'lotteryAssets/css/owl.theme.css',
        'lotteryAssets/css/style.css',
        'lotteryAssets/css/theme_tw.css',
        'lotteryAssets/css/mobile.css',
    ];
    public $js = [
        'lotteryAssets/js/bootstrap.min.js',
        'lotteryAssets/js/isotope.pkgd.min.js',
        'lotteryAssets/js/jquery.slicknav.js',
        'lotteryAssets/js/main.js',
        'lotteryAssets/js/owl.carousel.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

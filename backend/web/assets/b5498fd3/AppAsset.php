<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets'; // مسیر درست
    public $css = [
        'css/bootstrap.min.css', // مسیر صحیح
    ];
    public $js = [
        'js/bootstrap.bundle.min.js', // مسیر صحیح
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
        'yii\web\JqueryAsset',
    ];
}


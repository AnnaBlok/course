<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class LessonAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [
        'js/lesson/index.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}

<?php

namespace claudejanz\wysihtml5;

use yii\web\AssetBundle;

/**
 * This is just an example.
 */
class Wysihtml5Asset extends AssetBundle
{
    public $sourcePath = '@vendor/claudejanz/yii2-wysihtml5/assets';

    

    public $js = [
        'wysihtml5-0.3.0.min.js',
        'bootstrap-wysihtml5-0.0.2.js',
    ];
    public $css = [
        'bootstrap-wysihtml5-0.0.2.css',
        'wysiwyg-color.css',
    ];

    
} 
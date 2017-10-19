<?php
/**
 * Created by PhpStorm.
 * User: PHPdev
 * Date: 19.10.2017
 * Time: 13:52
 */

namespace kak\widgets\upload\bundles;


class UploadAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/kak/upload/assets';

    public $css = [
        'css/kak-upload.css'
    ];

    public $js = [
        'js/kak-upload.js'
    ];


    public $depends = [
        '\kak\widgets\upload\bundles\BlueimpFileUploadAsset'
    ];
}
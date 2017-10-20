<?php
namespace kak\widgets\upload\bundles;


class UploadLocalAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/kak/upload/assets';
    public $js = [
        'js/kak-upload-local.js'
    ];
    public $depends = [
        '\kak\widgets\upload\bundles\BlueimpFileUploadAsset'
    ];
}
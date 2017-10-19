<?php
namespace kak\widgets\upload;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class UploadManager
 * @package kak\storage\widgets
 * @property $storages
 */
class Upload extends Widget
{
    const ACCEPT_IMAGE = 'image/*';
    const ACCEPT_VIDEO = 'video/*';
    const ACCEPT_AUDIO = 'audio/*';

    /**
     * filter model
     * @var $model
     */
    public $model;

    /** current models upload
     * @var $models
     */
    public $models;
    /**
     * single or multiple uploads
     * @var bool
     */
    public $multiple = true;

    /**
     * set media types or file extensions ['.gif', '.jpg', '.png', '.doc'] from client validation html5
     * @var array
     * @see http://www.iana.org/assignments/media-types/media-types.xhtml
     */
    public $accept = [];

    public $storages = [];

    private $_behaviors = [];

    /**
     * Provide the option to be able to set behaviors on GridView configuration.
     * @param array $behaviors
     */
    public function setBehaviors(array $behaviors = [])
    {
        $this->_behaviors = $behaviors;
    }

    /**
     * get behaviors
     * @param array $behaviors
     */
    public function behaviors()
    {
        return ArrayHelper::merge($this->_behaviors, parent::behaviors());
    }


    public function init()
    {
        parent::init();
        $this->initStorages();
    }


    public function initStorages()
    {
        if(!count($this->storages)) {
            $this->storages[] = ['class' => storages\LocalStorage::className()];
        }
        $replace = [];
        foreach ($this->storages as $storage){
            $replace[] = \Yii::createObject($storage);
        }
        $this->storages = $replace;
    }


    public function run()
    {
        echo \yii\helpers\Html::beginTag('div', [
            'class' => 'kak-storage-upload',
        ]);
            echo \yii\helpers\Html::beginTag('div', [
                'class' => 'upload-inner-wrap',
            ]);
                echo $this->render('upload-wrap');
            echo \yii\helpers\Html::endTag('div');
        echo \yii\helpers\Html::endTag('div');

        bundles\UploadAsset::register($this->getView());

    }

}
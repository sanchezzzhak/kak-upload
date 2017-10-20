<?php
namespace kak\widgets\upload\storages\base;

use yii\base\Object;

abstract class BaseStorage extends Object
{
    /**
     * @var $widget \kak\widgets\upload\Upload
     */
    public $widget;
    public $icon;
    public $label;
    public $namel;

    abstract public function run();


}
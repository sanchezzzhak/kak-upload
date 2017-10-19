<?php
namespace kak\widgets\upload\storages;
use yii\base\Object;

class LocalStorage extends Object
{
    public $label;

    public $name = 'LocalStorage';

    public function getLink()
    {
        return '#';
    }

    public function run()
    {

    }



}
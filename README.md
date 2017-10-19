# kak-upload
upload widget for yii2

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run
```
php composer.phar require --prefer-dist kak/upload "*"
```

Usages
------------
```php
<?= \kak\widgets\upload\Upload::widget([
   'model' => $model,
   'url' => ['site/upload']
]); ?>
```

Configuration controller
------------
Attach action UploadAction
```php
class SiteController extends \yii\web\Controller
{
    //...
    public function actions()
    {
        return [];
    }
}


```

Widget method options
------------
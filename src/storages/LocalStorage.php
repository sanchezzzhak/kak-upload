<?php
namespace kak\widgets\upload\storages;
use kak\widgets\upload\bundles\UploadLocalAsset;
use yii\base\Object;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

class LocalStorage extends base\BaseStorage
{

    public $label = 'Local upload files';
    public $name = 'local-storage';


    public $categoryMessage = '@kak/upload/src/messages/local-storage';


    public $labelAddFiles          = 'Add files...';
    public $labelSuccess           = 'Uploaded success';
    public $labelProcessingUpload  = 'Processing upload...';
    public $labelUploadError       = 'Uploading error...';
    public $labelCrop              = 'Crop';
    public $labelStart             = 'Start';
    public $labelCancel            = 'Cancel';
    public $labelDelete            = 'Delete';


    public $url = ['site/upload'];
    public $storage = 'storage';

    /**
     * @var $clientOptions array containing the config js params.
     * $clientOptions = [
     *      'dataType' => 'json',
     *      'type' => 'post',
     *      'singleFileUploads' =>  true,
     *      'limitMultiFileUploadSize' => 0,
     *      'limitConcurrentUploads' => 3,
     *      'autoUpload' => true,
     *
     * ]
     * @see https://github.com/blueimp/jQuery-File-Upload/wiki/Options
     */
    public $clientOptions = [];
    public $clientJsEvemts = [];


    public $templateButtonCancel = '
        <button class="btn inline btn-warning" data-click="cencel-upload">
            <i class="glyphicon glyphicon-ban-circle"></i>
            <span>{labelCancel}</span>
        </button>
    ';

    public $templateButtonStart = '
        <button class="btn inline btn-primary start" disabled="disabled" data-click="start-upload">
            <i class="glyphicon glyphicon-upload"></i>
            <span>{labelStart}</span>
            </button>
        ';

    public $templateProgressBar = '
        <strong class="error text-danger"></strong>
        <p class="size">{labelProcessingUpload}</p>
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="progress-bar bar" style="width:0%;"></div>
        </div>
    ';

    public $templateItem = '
    <div class="upload-item">
        <p class="name">{fileName}</p>
        {progressBar}
        {btnStart}
        {btnCancel}
    </div>
    ';

    public function init()
    {
        parent::init();
        $this->initDefaultOptions();
    }

    private function initDefaultOptions()
    {
        $this->clientOptions['url'] = Url::to( $this->url);
    }




    public function getLink()
    {
        return '#';
    }

    public function run()
    {
        UploadLocalAsset::register( $this->widget->getView());
        $content = Html::beginTag('div', ['class' => 'kak-upload-local', 'data' => $this->clientOptions ]);
        $content.= Html::tag('span', Html::tag('span', $this->labelAddFiles ) . Html::fileInput('file') ,['class' => 'btn fileinput-button']);

        $content.= Html::tag('div','',['class' => 'dropzone-files']);
        $content.= Html::tag('div','',['class' => 'upload-files']);
        $content.= Html::endTag('div');


        return $content;
    }



}
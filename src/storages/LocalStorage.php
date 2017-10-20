<?php
namespace kak\widgets\upload\storages;
use kak\widgets\upload\bundles\UploadLocalAsset;
use yii\base\Object;
use yii\helpers\Html;
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

    /**
     * @var array
     * array['fields'] array Defines the feilds to be shown by scaffolding.
     * array['fields'][fieldName] array Defines the options for a field, or just enables the field if array is not applied.
     * array['fields'][fieldName]['name'] string Overrides the field name (default is the array key)
     * array['fields'][fieldName]['model'] string (optional) Overrides the model if the field is a belongsTo assoicated value.
     * array['fields'][fieldName]['width'] string Defines the width of the field for paginate views. Examples are "100px" or "auto"
     * array['fields'][fieldName]['align'] string Alignment types for paginate views (left, right, center)
     * array['fields'][fieldName]['format'] string Formatting options for paginate fields. Options include ('currency','nice','niceShort','timeAgoInWords' or a valid Date() format)
     * array['fields'][fieldName]['title'] string Changes the field name shown in views.
     * array['fields'][fieldName]['desc'] string The description shown in edit/create views.
     * array['fields'][fieldName]['readonly'] boolean True prevents users from changing the value in edit/create forms.
     * array['fields'][fieldName]['type'] string Defines the input type used by the Form helper (example 'password')
     * array['fields'][fieldName]['options'] array Defines a list of string options for drop down lists.
     * array['fields'][fieldName]['editor'] boolean If set to True will show a WYSIWYG editor for this field.
     * array['fields'][fieldName]['default'] string The default value for create forms.
     */
    public $clientOptions = [];



    public $templateUploadItem;
    public $templateDownloadItem;


    public function getLink()
    {
        return '#';
    }

    public function run()
    {
        UploadLocalAsset::register( $this->widget->getView());


        $content = Html::beginTag('div');
        $content.= Html::tag('span', Html::tag('span', $this->labelAddFiles ) . Html::fileInput('file') ,['class' => 'btn fileinput-button']);
        $content.= Html::endTag('div');
        $content.= Html::tag('div','',['class' => 'dropzone-files']);

        return $content;
    }



}
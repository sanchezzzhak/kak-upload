<?php
    /** @var $this \yii\web\View */
    /** @var $context \kak\widgets\upload\Upload */
    $context = $this->context;

?>
<div class="upload-base">
    <!--<span class="btn fileinput-button">
        <?=yii\helpers\Html::activeFileInput($context->model, 'file', []) . "\n"; ?>
    </span> -->
    <div class="upload-select-storage">
        <span class="btn select-storage-button" data-click="open-storage-list">
            <i class="glyphicon glyphicon-plus"></i>
            <span>select files</span>
        </span>
    </div>
</div>
<div class="upload-wrap">
    <div class="upload-header">
        <button type="button" class="header-button select-storage-menu" data-click="open-storage-list">
            <span class="icon-line"></span>
            <span class="icon-line"></span>
            <span class="icon-line"></span>
        </button>
        <button type="button" class="header-button select-storage-close" data-click="close-storage-list">&times</button>
    </div>
    <div class="upload-tabs">
        <ul class="nav nav-stacked">
            <?php foreach ($context->storages as $storage):?>
               <?=\yii\helpers\Html::tag('li', \yii\helpers\Html::a($storage->label, '#'), [
                    'data-click' => 'item-storage',
                    'data-name' => $storage->name
                ]); ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="upload-items">

    </div>
    <div class="upload-area">
        <?php foreach ($context->storages as $storage):?>
            <?=\yii\helpers\Html::tag('div', $storage->run(), [
                'data-name' => $storage->name,
                'class' => 'upload-panel upload-panel-' . $storage->name
            ])?>
        <?php endforeach; ?>
    </div>
</div>
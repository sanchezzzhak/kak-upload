(function($) {
    'use strict';

    var selectors = {
        openStorageList : '[data-click="open-storage-list"]',
        closeStorageList : '[data-click="close-storage-list"]',
        itemStorageTab : '[data-click="item-storage"]',
        areaStorageTab: '.upload-panel'

    };
    var stages = {
        openStorageList: 'open-storage-list',
        openStorageTab: 'open-storage-tab'
    }

    var kakUpload = function(element, options) {
        this.$parent = $(element)
        this.init();
    };

    kakUpload.prototype = {
        constructor: kakUpload,
        init: function(){
            // events ui register
            this.$parent.on('click', selectors.openStorageList, $.proxy(function (e) {
                e.preventDefault();
                this.onOpenStorageList(e);
            }, this));
            this.$parent.on('click', selectors.closeStorageList, $.proxy(function (e) {
                e.preventDefault();
                this.onCloseStorageList(e);
            }, this));
            this.$parent.on('click', selectors.itemStorageTab, $.proxy(function (e) {
                e.preventDefault();
                this.onOpenStorage(e);
            }, this));

            // events triger register
            this.$parent.on('upload-add', function(){});
            this.$parent.on('upload-stop', function(){});
            this.$parent.on('upload-process', function(){});
            this.$parent.on('upload-done', function(){});
        },
    }

    kakUpload.prototype.onOpenStorageList = function(e){
        console.log('open storages');
        this.$parent.addClass(stages.openStorageList)
            .removeClass(stages.openStorageTab);
    };

    kakUpload.prototype.onCloseStorageList = function(e){
        console.log('close storages');
        this.$parent.removeClass(stages.openStorageList)
            .removeClass(stages.openStorageTab);
    };

    kakUpload.prototype.onOpenStorage = function(e){
        console.log('open storage tab');
        this.$parent.addClass(stages.openStorageTab);
        var name = $(e.currentTarget).data('name');
        var tab = this.$parent.find(selectors.areaStorageTab + '[data-name="' + name + '"]');
        this.$parent.find(selectors.areaStorageTab).hide();
        tab.show();
    };

    $.fn.kakUpload = function(option) {
        var args = Array.apply(null, arguments);
        args.shift();
        return this.each(function () {
            var $this = $(this), data = $this.data('kakUpload'), options = typeof option === 'object' && option;
            if (!data) {
                data = new kakUpload(this, $.extend({}, $.fn.kakUpload.defaults, options, $(this).data()));
                $this.data('kakUpload', data);
            }
            if (typeof option === 'string') {
                data[option].apply(data, args);
            }
        });
    };
    $.fn.kakUpload.defaults = {};
    $.fn.kakUpload.Constructor = kakUpload;


    $('.kak-storage-upload').each(function(k,i){
        $(i).kakUpload();
    });


})(window.jQuery);
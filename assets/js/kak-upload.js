(function($) {
    'use strict';

    var selectors = {
        openStorageList : '[data-click="open-storage-list"]',
        closeStorageList : '[data-click="close-storage-list"]'
    };
    var stages = {
        openStorageList: 'open-storage-list'
    }
    var defaultOptions = {};

    var kakUpload = function(element, options) {
        this.$parent = $(element)
        this.options  = $.extend(defaultOptions,options);
        this.init();
    };

    kakUpload.prototype = {
        constructor: kakUpload,
        init: function(){
            this.$parent.on('click', selectors.openStorageList, $.proxy(function (e) {
                this.onOpenStorageList(e);
            }, this));

            this.$parent.on('click', selectors.closeStorageList, $.proxy(function (e) {
                this.onCloseStorageList(e);
            }, this));
        },
        onOpenStorageList: function(e){
            this.$parent.addClass(stages.openStorageList);
        },
        onCloseStorageList: function(e){
            this.$parent.removeClass(stages.openStorageList);
        },

        this.$parent.on('upload-add', function(){});
        this.$parent.on('upload-stop', function(){});
        this.$parent.on('upload-process', function(){});
        this.$parent.on('upload-done', function(){});

    }

    $.fn.kakUpload = function(option) {
        var options = typeof option == 'object' && option;
        new kakUpload(this, options);
        return this;
    };
    $.fn.kakUpload.Constructor = kakUpload;

    $('.kak-storage-upload').each(function(k,i){
        console.log('init!~');
        $(i).kakUpload();
    });


})(window.jQuery);
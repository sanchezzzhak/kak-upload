(function($) {
    'use strict';

    var selectors = {
        conteinerTab : '.upload-panel-local-storage',
        conteinerWidget : '.kak-upload-local'
    }

    var kakUploadFileTabWidget = function(element) {
        this.$parent = $(element).find(selectors.conteinerWidget);
        this.ui = $(element).closest('.kak-storage-upload');
        this.init();
    };

    kakUploadFileTabWidget.prototype = {
        constructor: kakUploadFileTabWidget
    };

    kakUploadFileTabWidget.prototype.init = function () {
        var $file = this.$parent.find('input[type="file"]');

        $file.fileupload({
           dataType: 'json',
           autoUpload: true,
           url: this.$parent.data('url'),
       });


        // .bind('fileuploadadd', function (e, data) {/* ... */})
        // .bind('fileuploadsubmit', function (e, data) {/* ... */})
        // .bind('fileuploadsend', function (e, data) {/* ... */})
        // .bind('fileuploaddone', function (e, data) {/* ... */})
        // .bind('fileuploadfail', function (e, data) {/* ... */})
        // .bind('fileuploadalways', function (e, data) {/* ... */})
        // .bind('fileuploadprogress', function (e, data) {/* ... */})
        // .bind('fileuploadprogressall', function (e, data) {/* ... */})
        // .bind('fileuploadstart', function (e) {/* ... */})
        // .bind('fileuploadstop', function (e) {/* ... */})
        // .bind('fileuploadchange', function (e, data) {/* ... */})
        // .bind('fileuploadpaste', function (e, data) {/* ... */})
        // .bind('fileuploaddrop', function (e, data) {/* ... */})
        // .bind('fileuploaddragover', function (e) {/* ... */})
        // .bind('fileuploadchunksend', function (e, data) {/* ... */})
        // .bind('fileuploadchunkdone', function (e, data) {/* ... */})
        // .bind('fileuploadchunkfail', function (e, data) {/* ... */})
        // .bind('fileuploadchunkalways', function (e, data) {/* ... */});
        //
        // .bind('fileuploadprocessstart', function (e) {/* ... */})
        // .bind('fileuploadprocess', function (e, data) {/* ... */})
        // .bind('fileuploadprocessdone', function (e, data) {/* ... */})
        // .bind('fileuploadprocessfail', function (e, data) {/* ... */})
        // .bind('fileuploadprocessalways', function (e, data) {/* ... */})
        // .bind('fileuploadprocessstop', function (e) {/* ... */});

         /*
              multiple: $el.data('multiple') == '1' || false,
                autoUpload: $el.data('autoupload') == '1' || false,
                dataType: 'json',
                singleFileUploads: true,

                uploadTemplateId: null,
                downloadTemplateId: null,
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $el.find('.progress .bar').css('width', progress + '%');
            },

         */

    };

    $.fn.kakUploadFileTabWidget = function(option) {
        var args = Array.apply(null, arguments);
        args.shift();
        return this.each(function () {
            var $this = $(this), data = $this.data('kakUploadFileTabWidget'), options = typeof option === 'object' && option;
            if (!data) {
                data = new kakUploadFileTabWidget(this, $.extend({}, $.fn.kakUploadFileTabWidget.defaults, options, $(this).data()));
                $this.data('kakUploadFileTabWidget', data);
            }
            if (typeof option === 'string') {
                data[option].apply(data, args);
            }
        });
    };
    $.fn.kakUploadFileTabWidget.defaults = {};
    $.fn.kakUploadFileTabWidget.Constructor = kakUploadFileTabWidget;

    $('.kak-storage-upload').each(function(k,i){
        $(i).find(selectors.conteinerTab).kakUploadFileTabWidget();
    });
})(window.jQuery);
(function($) {
    'use strict';


    var kakUploadTabWidget = function(element, options) {
        this.$parent = $(element)
        this.$ui = this.$parent.closest('.kak-storage-upload');
        this.init();
    };

    kakUploadTabWidget.prototype = {
        constructor: kakUploadTabWidget
    };

    kakUploadTabWidget.prototype.init = function () {
        this.$parent.find('input[type="file"]').fileupload({
            dataType: 'json',
        });

         /*
              multiple: $el.data('multiple') == '1' || false,
                autoUpload: $el.data('autoupload') == '1' || false,
                dataType: 'json',
                singleFileUploads: true,
                url: $el.data('url'),
                uploadTemplateId: null,
                downloadTemplateId: null,
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $el.find('.progress .bar').css('width', progress + '%');
            },

         */

    };




    }

    $('.kak-storage-upload').each(function(k,i){
        kakUploadTabWidget($(i).find('.upload-panel-local-storage'))
    });

})(window.jQuery);
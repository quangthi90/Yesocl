(function($, document, undefined) {
    function SingleUpload(el){
        this.jqXHR = null;
        this.listImgUrl = '';
        this.container = el;
        this.uploadInvoke = el.find('.img-upload');
        this.previewerImgContainer = el.find('.img-previewer-container');
        this.resultContainer = el.find('.img-url');
        this.progressBar = el.find('.y-progress');
        this.dropZone = el;
        this.dropZoneShow = el.find('.drop-zone-show');
        this.initUploadPlugin();
    }
    SingleUpload.prototype.initUploadPlugin = function() {
        var that = this;
        that.uploadInvoke.fileupload({
            dataType: 'json',
            dropZone: that.dropZone,
            autoUpload: true,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: 500000, // 5 MB
            disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
            previewThumbnail: false,
            previewMaxWidth: 430,
            previewMaxHeight: 200,
            previewCrop: true
        }).on('fileuploadadd', function (e, data) {
            $('.tooltip').remove();
            that.previewerImgContainer.children('.post_image_item').remove();
            that.dropZoneShow.hide();
            data.context = $('<div/>').addClass('post_image_item').appendTo(that.previewerImgContainer);
            $.each(data.files, function (index, file) {
                var closeBtn = $('<span class="close"><i class="icon-remove"></i></span>');
                closeBtn.click(function(){                
                    $(this).parent().fadeOut(300, function(){
                        if(!that.jqXHR) {                 
                            that.jqXHR.abort(); 
                        }
                        $(this).remove();
                        that.resultContainer.val('');
                        that.listImgUrl = '';
                        that.dropZoneShow.show();
                    });
                }).appendTo(data.context);   
                var spinIcon = $('<span class="loadding-icon"><i class="icon-spinner icon-spin icon-large"></i></span>') ;
                spinIcon.appendTo(data.context);
                that.jqXHR = data.submit();
            });
        }).on('fileuploadprocessalways', function (e, data) {
            var index = data.index,
                file = data.files[index],
                node = $(data.context[index]);
            if (file.preview) {
                node.prepend(file.preview);
                node.children('canvas').css('opacity','0.1');
            }
            if (file.error) {
                var error = $('<div class="alert alert-error"/>').html('<strong>Error</strong> ' + file.error);
                node.append(error);
            }
        }).on('fileuploadprogress', function (e, data) {
            var node = $(data.context[data.index]);
            var progress = data.loaded / data.total;
            node.children('canvas').css('opacity', progress);        
        }).on('fileuploadprogressall', function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            that.progressBar.children('.bar').show().css('width', progress + '%');
            if(progress == 100) {
                that.progressBar.children('.bar').slideUp(500, function(){
                    $(this).css('width','0%');
                });
            }
        }).on('fileuploaddone', function (e, data) {
            $.each(data.result.files, function (index, file) {
                if (file.url) {
                    var link = $('<a>')
                        .prop('href', file.url)
                        .addClass('img-link-popup')
                        .magnificPopup({type:'image'}); 
                    var imageUploaded = $('<img>').prop('src', file.url).addClass('img-uploaded');
                    $(data.context[index]).children('canvas').replaceWith(imageUploaded);
                    $(data.context[index]).children('.img-uploaded').wrap(link);
                    if(that.listImgUrl.length == 0){
                        that.listImgUrl = file.url;
                    }else {                    
                        that.listImgUrl += ('*' + file.url);
                    }
                } else if (file.error) {
                    var error = $('<div class="alert alert-error"/>').html('<strong>Error</strong> ' + file.error);
                    $(data.context[index]).append(error);
                }
                $(data.context[index]).children('.loadding-icon').remove();
            });
            that.resultContainer.val(that.listImgUrl);
        }).on('fileuploadfail', function (e, data) {
            console.log(data);
            $.each(data.files, function (index, file) {
                var error = $('<div class="alert alert-error"/>').html('<strong>Error</strong> File upload failed');            
                $(data.context[index]).append(error);
                $(data.context[index]).children('.loadding-icon').remove();
            });
            that.progressBar.children('.bar').css('width', '0%');            
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    }

    $(function(){        
        $('.upload-container').each(function(){
            new SingleUpload($(this));       
        });
    });
}(jQuery, document));
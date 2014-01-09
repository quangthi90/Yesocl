(function($, document, undefined) {

    function ImageUploader(el){
        this.$jqXHR = null;
        this.$container = el;
        this.$uploadInvoke = el.find('.img-upload');
        this.$previewerImgContainer = el.find('.img-previewer-container');
        this.$progressBar = el.find('.y-progress');
        this.$dropZone = el;
        this.$dropZoneShow = el.find('.drop-zone-show');
        this.initUploadPlugin();
    };
    ImageUploader.prototype.initUploadPlugin = function() {
        var that = this;
        that.$uploadInvoke.fileupload({
            dataType: 'json',
            dropZone: that.$dropZone,
            autoUpload: true,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: 500000, // 5 MB
            disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
            previewThumbnail: false,
            previewMaxWidth: 430,
            previewMaxHeight: 200,
            previewCrop: true
        }).on('fileuploadadd', function (e, data) {
            that.$previewerImgContainer.children('.post_image_item').remove();
            that.$dropZoneShow.hide();
            data.context = $('<div/>').addClass('post_image_item').appendTo(that.$previewerImgContainer);
            $.each(data.files, function (index, file) {
                var closeBtn = $('<span class="close"><i class="icon-remove"></i></span>');
                closeBtn.click(function(){                
                    $(this).parent().fadeOut(300, function(){
                        if(!that.$jqXHR) {                 
                            that.$jqXHR.abort(); 
                        }
                        $(this).remove();
                        that.$dropZoneShow.show();
                    });
                }).appendTo(data.context);   
                var spinIcon = $('<span class="loadding-icon" style="display:block;"><i class="icon-spinner icon-spin icon-large"></i></span>') ;
                spinIcon.appendTo(data.context);
                that.$jqXHR = data.submit();
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
            that.$progressBar.children('.bar').show().css('width', progress + '%');
            if(progress == 100) {
                that.$progressBar.children('.bar').slideUp(500, function(){
                    $(this).css('width','0%');
                });
            }
        }).on('fileuploaddone', function (e, data) {
            var file = data.result.files[0];
            $.each(data.result.files, function (index, file) {
                if (file.url) {
                    new ImageCropper(file.url);
                } else if (file.error) {
                    var error = $('<div class="alert alert-error"/>').html('<strong>Error</strong> ' + file.error);
                    $(data.context[index]).append(error);
                }
                $(data.context[index]).children('.loadding-icon').remove();
            });
        }).on('fileuploadfail', function (e, data) {
            $.each(data.files, function (index, file) {
                var error = $('<div class="alert alert-error"/>').html('<strong>Error</strong> File upload failed');            
                $(data.context[index]).append(error);
                $(data.context[index]).children('.loadding-icon').remove();
            });
            that.$progressBar.children('.bar').css('width', '0%');            
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    };

    function ImageCropper(imageUrl) {
        this.$uploadContainer = $('#avatar-choose-image');
        this.$imageCropper    = $('#avatar-edit-image');
        this.$imageUrl        = imageUrl;
        this.$uploadedImageContainer = this.$imageCropper.find('.uploaded-image');
        this.$previewedImageContainer = this.$imageCropper.find(".previewed-image");
        this.$nonePreviewImage = this.$imageCropper.find('.none-image');
        this.$uploadedImage   = this.$imageCropper.find('#uploaded-image');
        this.$previewImage   = this.$imageCropper.find('#previewed-image');
        this.$saveAvatarBtn = this.$imageCropper.find('#avatar-save');
        this.$chooseAvatarBtn = this.$imageCropper.find('#avatar-re-choose-image');
        this.$makeCircleBtn = this.$imageCropper.find('#make-circle-btn');
        this.$clearPreviewBtn = this.$imageCropper.find('#make-clear-btn');
        this.$boundX = 0;
        this.$boundY = 0;
        this.$jcropApi = null;       

        this.attachEvents();
    };
    ImageCropper.prototype.attachEvents = function() {
        var that = this;
        that.$uploadContainer.fadeOut(300, function(){
            that.$imageCropper.fadeIn(400);    
        });
        var spinIcon = $('<span class="loadding-icon" style="display:block;text-align: center;"><i class="icon-spinner icon-spin icon-large"></i></span>') ;
        that.$uploadedImageContainer.append(spinIcon);
        that.$previewImage.prop('src', that.$imageUrl).load(function(){
            that.$nonePreviewImage.hide(10);
        });
        that.$uploadedImage.prop('src', that.$imageUrl).load(function(){
            that.$uploadedImageContainer.find('.loadding-icon').remove();
            that.$uploadedImage.fadeIn(200, function(){
                $(this).Jcrop({
                    onChange: function(crop){
                        that.updatePreview(crop);
                    },
                    onSelect: function(crop){
                        that.updatePreview(crop);
                    },
                    aspectRatio: 1,
                    bgColor: '#FAFAFA',
                    boxWidth: 550,
                    boxHeight: 320
                },function(){
                    var bounds = this.getBounds();
                    that.$boundX = bounds[0];
                    that.$boundY = bounds[1];
                    that.$jcropApi = this;
                });
            }); 
            that.$clearPreviewBtn.trigger('click');
        });
        
        that.$chooseAvatarBtn.on('click', function(e){
            e.preventDefault();
            if(that.$jcropApi !== null ){
                that.$jcropApi.destroy();
            }            
            that.$imageCropper.fadeOut(300, function(){
                that.$nonePreviewImage.show(10);
                that.$previewImage.hide(10);
                that.$uploadContainer.find('.post_image_item').remove();
                that.$uploadContainer.find('.drop-zone-show').show(100);
                that.$uploadContainer.fadeIn(200);
            });
        });
        that.$makeCircleBtn.on('click', function(e){
            e.preventDefault();
            that.$previewedImageContainer.toggleClass('circle');
            if(that.$previewedImageContainer.hasClass('circle')){
                $(this).attr('data-original-title', 'Remove circle');
            }else{
                $(this).attr('data-original-title', 'Make circle');
            }
        });
        that.$clearPreviewBtn.on('click', function(e){
            e.preventDefault();
            that.$nonePreviewImage.show(10);
            that.$previewImage.hide(10);
            that.$saveAvatarBtn.addClass('disabled');
            that.$jcropApi.release();
        });
        that.$saveAvatarBtn.on('click', function(e){
            e.preventDefault();
            if($(this).hasClass('disabled')){
                return false;
            }
            var cropX = $(this).data('crop-x');
            var cropY = $(this).data('crop-y');
            var cropW = $(this).data('crop-w');
            alert('Crop Image -> X:' + cropX + ', Y:' + cropY + ', Width:' + cropW);
        });
    };
    ImageCropper.prototype.updatePreview = function(crop) {
        var that = this;
        if (parseInt(crop.w) > 0)
        {
            var rx = 150 / crop.w;
            var ry = 150 / crop.h;            
            that.$previewImage.css({
              width: Math.round(rx * that.$boundX) + 'px',
              height: Math.round(ry * that.$boundY) + 'px',
              marginLeft: '-' + Math.round(rx * crop.x) + 'px',
              marginTop: '-' + Math.round(ry * crop.y) + 'px'
            }).show(10);
            that.$nonePreviewImage.hide(10);
            that.$saveAvatarBtn.data('crop-x', Math.round(crop.x));
            that.$saveAvatarBtn.data('crop-y', Math.round(crop.y));
            that.$saveAvatarBtn.data('crop-w', Math.round(rx * that.$boundX));
            that.$saveAvatarBtn.removeClass('disabled');
        }else {
            that.$nonePreviewImage.show(10);
            that.$previewImage.hide(10);
            that.$saveAvatarBtn.addClass('disabled');
        }
    };

    $(function(){        
        $('.upload-container').each(function(){
            new ImageUploader($(this));       
        });
    });
}(jQuery, document));
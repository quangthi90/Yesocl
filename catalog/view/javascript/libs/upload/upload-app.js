/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    var jqXHR = null;
    $('#img-upload').fileupload({
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 5000000, // 5 MB
        disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
        previewThumbnail: false,
        previewMaxWidth: 430,
        previewMaxHeight: 200,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        $('.tooltip').remove();
        $('#post_image_previewer').empty();
        data.context = $('<div/>').addClass('post_image_item').appendTo('#post_image_previewer');
        $.each(data.files, function (index, file) {
            var closeBtn = $('<span class="close"><i class="icon-remove"></i></span>');
            closeBtn.click(function(){
                $(this).parent().fadeOut(300, function(){
                    $(this).remove();
                });
            }).appendTo(data.context);   
            var spinIcon = $('<span class="loadding-icon"><i class="icon-spinner icon-spin icon-large"></i></span>') ;
            spinIcon.appendTo(data.context);
            jqXHR = data.submit();
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
        $('#progress .bar').show().css('width', progress + '%');
        if(progress == 100) {
            $('#progress .bar').slideUp(500, function(){
                $(this).css('width','0%');
            });
        }
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);                
                $(data.context[index]).children('canvas').css('opacity','1').wrap(link);                 
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
        });
        $('#progress .bar').css('width', '0%');
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
// Like + Unlike a post
(function($, document, undefined) {
    function LikePostBtn( $el ){
        var that = this;
        this.$el            = $el;
        this.url            = $el.data('url');
        this.isLiked        = $el.data('is-liked');
        
        this.$btnLike       = $el.find('.like-post');
        this.$btnUnLike     = $el.find('.unlike-post');
        this.$btnLiked      = $el.find('.liked-post');

        this.attachEvents();
    }
    LikePostBtn.prototype.attachEvents = function(){
        var that = this;

        this.$btnLike.click(function(e) {
            if(that.$btnLike.hasClass('disabled')) {
                e.preventDefault();

                return false;
            }

            that.submit(that.$btnLike);

            return false;
        });

        this.$btnUnLike.click(function(e) {
            if(that.$btnUnLike.find('a').hasClass('disabled')) {
                e.preventDefault();

                return false;
            }

            that.submit(that.$btnUnLike.find('a'));

            return false;
        });
    };
    LikePostBtn.prototype.submit = function($button){
        var that = this;        

        var promise = $.ajax({
            type: 'POST',
            url:  this.url,
            dataType: 'json'
        });

        this.triggerProgress($button, promise);

        promise.then(function(data) { 
            if(data.success == 'ok'){ 
                var $curr_item = that.$el.parents('.post'); 
                that.$el.find('.post_meta .post_like d.number-counter').html( data.like_count );
                that.$el.find('.post-liked-list d').html( data.like_count ).data('like-count', data.like_count);

                //Unlike
                if(that.$el.data('is-liked') == 1) {
                    that.$btnLiked.addClass('hidden');
                    that.$btnUnLike.addClass('hidden');
                    that.$btnLike.removeClass('hidden');
                    that.$el.data('is-liked', 0);
                    that.$btnUnLike.parents('.dropdown').removeClass('open');
                }else { //Like
                    that.$btnLiked.removeClass('hidden');
                    that.$btnUnLike.removeClass('hidden');
                    that.$btnLike.addClass('hidden');
                    that.$el.data('is-liked', 1);
                }
                
                that.$el.find('.post-liked-list').data('users', null);
                that.$el.find('.post-liked-list').data('like-count', data.like_count);
            }
        });     
    };
    LikePostBtn.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f        = function() {
            $spinner.remove();
            $el.removeClass('disabled').prepend($old_icon);
        };

        $old_icon.remove();
        $el.addClass('disabled').prepend($spinner);

        promise.then(f, f);
    };

    $(function(){
        $('.post-item').each(function(){
            new LikePostBtn($(this));           
        });

        $(document).bind('POST_BUTTON', function(e) {
            $('.post-item').each(function(){
                new LikePostBtn($(this));           
            });
        });
    });
}(jQuery, document));

// Show list users liked post
(function($, document, undefined) {
    function UserListViewer($el) {
        this.$el        = $el;
        this.url        = $el.data('url');

        this.addEvents();
    }
    UserListViewer.prototype.addEvents = function() {
        var that = this;
        this.$el.click(function(e){
            e.preventDefault();
            
            if( $(this).hasClass('disabled') || that.$el.data('like-count') == 0 ) {
                return false;
            }

            $(this).addClass('show-liked-list');

            that.submit(that.$el);

            return false;
        });
    }
    UserListViewer.prototype.submit = function($button) {
        var that = this;

        var users = $button.data('users');
        
        if ( users == undefined ){
            var promise = $.ajax({
                type: 'POST',
                url:  this.url,
                dataType: 'json'
            });

            this.triggerProgress($button, promise);

            promise.then(function(data) {
                if(data.success == 'ok'){                    
                    if(data.users.length == 0){
                        return;
                    }

                    var users = [];

                    for (key in data.users) {
                        users[data.users[key].id] = data.users[key];
                    }

                    $button.data('users', users);

                    var usersViewer = $('<div id="#user-viewer-container"></div>');
                    for (key in users) {
                        $.tmpl( $('#list-user-liked-template'), users[key]).appendTo(usersViewer);
                    }
                    bootbox.dialog({
                        message: usersViewer.wrap('<div>').parent().html(),
                        title: "Who liked this post",
                        onEscape: function(){
                            bootbox.hideAll();
                            $('.show-liked-list').removeClass('show-liked-list');
                        }
                    });
                    $('.modal-backdrop').on('click', function(){
                       bootbox.hideAll();
                       $('.show-liked-list').removeClass('show-liked-list');
                    });

                    $(document).trigger('FRIEND_ACTION', [false]);

                    // $('#list-user-liked-template').data('comment_id', that.$el.data('id'));
                }
            });
        }else{
            users = $button.data('users');

            var usersViewer = $('<div id="#user-viewer-container"></div>');
            for (key in users) {
                $.tmpl( $('#list-user-liked-template'), users[key]).appendTo(usersViewer);
            }
            bootbox.dialog({
                message: usersViewer.wrap('<div>').parent().html(),
                title: "Who liked this post",
                onEscape: function(){
                    bootbox.hideAll();
                }
            });
            $('.modal-backdrop').on('click', function(){
               bootbox.hideAll();
            });

            $(document).trigger('FRIEND_ACTION', [false]);

            // $('#list-user-liked-template').data('comment_id', that.$el.data('id'));
        }
    }
    UserListViewer.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f        = function() {
            $spinner.remove();
            $el.removeClass('disabled').prepend($old_icon);
        };

        $old_icon.remove();
        $el.addClass('disabled').prepend($spinner);

        promise.then(f, f);
    };

    $(function(){
        $('.post-liked-list').each(function(){
            new UserListViewer($(this));
        });

        $(document).bind('POST_SHOW_LIKED_BUTTON', function(e) {
            $('.post-liked-list').each(function(){
                new UserListViewer($(this));
            });
        });
    }); 
}(jQuery, document));

// Show advance edit post
(function($, document, undefined) {
    var $advance_post_form = $('.js-advance-post');

    function ShowEditPostAdvance($el) {
        this.$el        = $el;
        this.$btn       = $el.find('.post-edit-btn');
        this.$image     = $el.find('.post_image > img');

        this.content    = $el.find('.post_text_editable').html();
        this.title      = $el.find('.post_title > a').html();
        this.category   = $el.data('category-id');
        this.description = $el.data('description');
        
        this.addEvents();
    }
    ShowEditPostAdvance.prototype.addEvents = function() {
        var that = this;
        this.$btn.click(function(e){
            e.preventDefault();

            // Update title of advance popup
            $advance_post_form.find('.js-advance-post-title').html( sEditPost );

            // Content
            $advance_post_form.find('.js-post-content').code( that.content );

            // Title
            $advance_post_form.find('.js-post-title').val( that.title );

            // Description
            $advance_post_form.find('.js-post-description').val( that.description );

            // Category
            $advance_post_form.find('.js-post-category').val( that.category );
            
            // Image
            if ( that.$image.attr('src') != '' ){
                $advance_post_form.find('.drop-zone-show').html('').append('<img src="' + that.$image.attr('src') + '" />');
            }
            

            // Mention is edit form
            $advance_post_form.data('is-add-form', 0);

            // Cache current post
            $advance_post_form.data('post', that.$el);

            // Post slug
            $advance_post_form.data('post-slug', that.$el.data('post-slug'));

            return false;
        });
    }

    $(function(){
        $('.js-post-item').each(function(){
            new ShowEditPostAdvance($(this));
        });

        $(document).bind('EDIT_POST', function(e, $post_item) {
            new ShowEditPostAdvance($post_item);
        });

        $(document).bind('POPUP_CLOSED', function(e) {
            if ( $('.js-advance-post').data('is-add-form') == 1 ){
                $('.js-advance-post').data('form-value', {
                    title: $('.js-advance-post').find('.js-post-title').val(),
                    content: $('.js-advance-post').find('.js-post-content').code(),
                    description: $('.js-advance-post').find('.js-post-description').val(),
                    category: $('.js-advance-post').find('.js-post-category').val(),
                    image: $('.js-advance-post').find('.img-uploaded').attr('src')
                });
            }

            $('.js-advance-post').find('.js-post-reset-btn').trigger('click');
        });
    }); 
}(jQuery, document));

// Submit post to add or edit
(function($, document, undefined) {
    var marginPostDefault = 15;
    var widthPostDefault = 420;

    function SubmitPost( $el ) {
        this.rootContent        = $('#y-content');
        this.mainContent        = $('#y-main-content');
        this.blockContent       = this.mainContent.find('.block-content');
        
        this.$el                = $el;
        this.$title             = $el.find('.js-post-title');
        this.$category          = $el.find('.js-post-category');
        this.$description       = $el.find('.js-post-description');
        this.$content           = $el.find('.js-post-content');
        this.$submitBtn         = $el.find('.js-post-submit-btn');
        this.$showPopupBtn      = $('.js-show-popup-btn');
        
        this.postType           = $el.data('post-type');
        
        this.attachEvents();
    }

    SubmitPost.prototype.attachEvents = function(){
        var that = this;

        this.$submitBtn.click(function(e) {
            e.preventDefault();
            
            if(that.$submitBtn.hasClass('disabled')) {
                return false;
            }
            if(that.validate() == false){
                return false;
            }

            // content, user tagged, thumb
            if ( !that.$content.hasClass('js-post-status') ){
                var content = that.$content.code();
                var usersTagged = that.$content.getTags();
                var thumb = that.$el.find('.img-uploaded').attr('src');
            
            }else{
                var usersTagged = [];
                var mentions = that.$content.mentionsInput('getMentions');
                $.each(mentions, function(key, value){                
                    usersTagged.push(value.id);
                });
                var content = that.$content.mentionsInput('getHtmlContent');
                var thumb = that.$el.find('.img-uploaded').attr('src');
            }

            that.data = {
                title       : that.$title.val(),
                category    : that.$category.val(),
                description : that.$description.val(),
                content     : content,
                tags        : usersTagged,
                thumb       : thumb
            };

            that.is_add = that.$el.data('is-add-form');
            
            that.submit(that.$submitBtn);

            return false;
        });

        this.$showPopupBtn.click(function(e){
            e.preventDefault();

            $('.js-advance-post').data('is-add-form', 1);

            var form_value = $('.js-advance-post').data('form-value');

            $('.js-advance-post').find('.js-advance-post-title').html( sAddPost );

            if ( typeof form_value != 'undefined' ){
                $('.js-advance-post').find('.js-post-title').val(form_value.title);
                $('.js-advance-post').find('.js-post-content').code(form_value.content);
                $('.js-advance-post').find('.js-post-description').val(form_value.description);
                $('.js-advance-post').find('.js-post-category').val(form_value.category);
                if ( form_value.image != undefined ){
                    var $post_image = $.tmpl( $('#uploaded-image-template'), {thumbnailUrl: form_value.image} );
                    $('.js-advance-post').find('.drop-zone-show').hide();
                    $('.js-advance-post').find('.img-previewer-container').append( $post_image );
                }
            }
        });
    };

    SubmitPost.prototype.submit = function($button){
        var that = this;

        if ( this.is_add == 1 ){
            this.url = window.yRouting.generate('PostAdd', {
                post_type: that.postType,
                user_slug: window.yUser.get('slug')
            });
        }else{
            this.url = window.yRouting.generate('PostEdit', {
                post_type: that.postType,
                post_slug: that.$el.data('post-slug')
            });
        }

        var promise = $.ajax({
            type: 'POST',
            url:  this.url,
            data: this.data,
            dataType: 'json'
        });
        
        this.triggerProgress($button, promise);

        promise.then(function(data) {
            if(data.success == 'ok'){
                if ( that.is_add == 1 ){
                    var htmlOutput = $.tmpl( $('#post-item-template'), data.post ); 
                    var firstColumn = that.blockContent.find('.column:first-child');          
                    var newColumn = $('<div class="column">').append(htmlOutput);
                    newColumn.width(widthPostDefault);                
                    newColumn.css({
                        'opacity':'0', 
                        'min-width': widthPostDefault + 'px'
                    });
                    
                    //Adjust size of layout:
                    var post = newColumn.children('.post');
                    var postBody   = post.children('.post_body');
                    post.height(firstColumn.height() - 2*(marginPostDefault + 1));
                    postBody.height(post.height() - 65 - 10 - 22);
                    var postTitle  = postBody.children('.post_title');                
                    var postImg    = postBody.children('.post_image');
                    if(postTitle.length > 0){
                        postImg.height(postBody.height()*0.6);
                    }else {
                        postImg.height(postBody.height()*0.7);
                    }
                    var postTextRaw = postBody.children('.post_text_raw');                
                    var maxHeightText = postBody.height() - postTitle.height() - postImg.height() - 15;
                    postTextRaw.height(Math.floor(maxHeightText/20)*20);
                    var imgInTextRaw = postTextRaw.find('img');
                    if(imgInTextRaw.length > 0) {
                        imgInTextRaw.hide(10);
                    }                
                    firstColumn.hide().after(newColumn).show(200);
                    that.mainContent.width(that.mainContent.width() + widthPostDefault + marginPostDefault);
                    that.rootContent.getNiceScroll().resize();

                    //Attach events:
                    setTimeout(function(){
                        post.find('.post_text_raw').truncate({
                            width: 'auto',
                            token: '&hellip;',
                            side: 'right',
                            multiline: true
                        });

                        $(".timeago").timeago(); 

                        post.find('.link-popup').magnificPopup({
                            type:'inline',
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'mfp-fade'
                        });            
                        newColumn.css('opacity', '1');
                    }, 500); 

                    //Rise events:
                    $(document).trigger('POST_BUTTON');
                    $(document).trigger('POST_SHOW_LIKED_BUTTON');
                    $(document).trigger('HORIZONTAL_POST');
                    $(document).trigger('DELETE_POST', [htmlOutput]);
                    $(document).trigger('EDIT_POST', [htmlOutput]); 
                }else{
                    var $current_post = that.$el.data('post');
                    var textRaw = $current_post.find('.post_text_raw');
                    textRaw.html( data.post.content );
                    setTimeout(function(){
                        textRaw.truncate({
                            width: 'auto',
                            token: '&hellip;',
                            side: 'right',
                            multiline: true
                        });
                    }, 500); 
                    $current_post.find('.post_text_editable').html( data.post.content );
                    if ( data.post.title != null ){
                        $current_post.find('.post_title').removeClass('hidden').find('a').html( data.post.title );
                    }
                    if ( data.post.image != null ){
                        $current_post.find('.post_image').removeClass('hidden').html($('<image src="' + data.post.image + '" />'));
                    }

                    $(document).trigger('EDIT_POST', [$current_post]);
                }
                
                //Reset:
                if ( that.$content.hasClass('js-post-status') ){
                    that.$content.mentionsInput('reset');
                    that.$content.height(40);
                    that.$el.find('.img-previewer-container').html('');
                }else{
                    that.$el.find('.js-post-reset-btn').trigger('click');
                    $('.mfp-ready').trigger('click');
                }               
            }
        });
    };

    SubmitPost.prototype.validate = function(){
        if(!String.prototype.trim) {
          String.prototype.trim = function () {
            return this.replace(/^\s+|\s+$/g,'');
          };
        }

        if ( this.is_add == 1 && this.$title.val() != undefined && this.$title.val().trim().length === 0 ){
            this.$title.val('');
            return false;
        }

        if ( this.$content.hasClass('js-post-status') && this.$content.val().trim().length === 0 ){
            this.$content.val('');
            return false;
        }
            // var tempEle = $("<div></div>");
            // tempEle.append(this.$advance_content.code());
            // if (tempEle.text().trim().length === 0 ){
            //     this.$advance_content.code('');
            //     return false;
            // }
        return true;
    };

    SubmitPost.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var f        = function() {
            $el.removeClass('disabled');
            $spinner.remove();
        };

        $el.addClass('disabled').prepend($spinner);

        promise.then(f, f);
    };

    $(function(){
        $('.js-post-form').each(function(){
            new SubmitPost($(this));
        });     
    });
}(jQuery, document));

// Delete post
(function($, document, undefined) {
    function DeletePost($el) {
        this.$el        = $el;
        this.$btn       = $el.find('.post-delete-btn');

        this.postType   = $el.data('post-type');
        this.postSlug   = $el.data('post-slug');
        this.url        = window.yRouting.generate('PostDelete', {
            post_type: this.postType,
            post_slug: this.postSlug
        });

        this.mainContent = $('#y-main-content');
        this.rootContent = $('#y-content');

        this.addEvents();
    }
    DeletePost.prototype.addEvents = function() {
        var that = this;
        this.$btn.click(function(e){
            e.preventDefault();
            
            if( $(this).hasClass('disabled') ) {
                return false;
            }

            bootbox.dialog({
                title: sConfirm,
                message: sConfirmDeletePost,
                buttons: 
                {
                    cancel: {
                        label: sCancel,
                        className: "btn",
                        callback: function() {
                        }
                    },
                    oke: {
                        label: "OK",
                        className: "btn-primary",
                        callback: function() {
                            that.submit(that.$btn.find('a'));
                        }
                    }
                }
            });

            return false;
        });
    }
    DeletePost.prototype.submit = function($button) {
        var that = this;
        //Mark deleted post:
        that.$el.addClass('deleting');
        var promise = $.ajax({
            type: 'POST',
            url:  this.url,
            dataType: 'json'
        });

        this.triggerProgress($button, promise);

        promise.then(function(data) {
            if(data.success == 'ok') {
                var widthColumn = that.$el.parent().outerWidth();                
                that.$el.parent().css('opacity','0').slideUp(300, function(){
                    $(this).remove();
                    that.mainContent.width(that.mainContent.width() - widthColumn);
                    that.rootContent.getNiceScroll().resize();
                });
            }else{
                that.$el.parent().removeClass('deleting');
            }
        });
    }
    DeletePost.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f        = function() {
            $spinner.remove();
            $el.removeClass('disabled').prepend($old_icon);
        };

        $old_icon.remove();
        $el.addClass('disabled').prepend($spinner);

        promise.then(f, f);
    };

    $(function(){
        $('.js-post-item').each(function(){
            new DeletePost($(this));
        });

        $(document).bind('DELETE_POST', function(e, $post_item) {
            new DeletePost($post_item);
        });
    }); 
}(jQuery, document));
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
                that.$el.find('.post_meta .post_like d').html( data.like_count );
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

// Add new post
(function($, document, undefined) {
    var marginPostDefault = 15;
    var widthPostDefault = 420;
    var $post_add_form = $('#post-advance-add-popup');

    function AddPost( $el ) {
        this.rootContent        = $('#y-content');
        this.mainContent        = $('#y-main-content');
        this.blockContent       = this.mainContent.find('.block-content');
        
        this.$el                = $el;
        this.$content           = $el.find('.status-content');
        this.url                = $el.data('url');
        this.$status_btn        = $el.find('.btn-status');

        this.$advance_title     = $post_add_form.find('.post-advance-title');
        this.$advance_content   = $post_add_form.find('.post-advance-content');
        this.$advance_btn       = $post_add_form.find('.btn-post-advance');
        this.$editor            = $post_add_form.find('.y-editor');
        this.attachEvents();
    }

    AddPost.prototype.attachEvents = function(){
        var that = this;

        this.$advance_btn.click(function(e) {
            if(that.$advance_btn.hasClass('disabled')) {
                e.preventDefault();
                return false;
            }

            if(that.validate(true) == false){
                return false;
            }

            that.data = {
                title       : that.$advance_title.val(),
                content     : that.$advance_content.code(),
                thumb       : $post_add_form.find('.img-link-popup').attr('href')
            };

            //console.log(that.$advance_content.getTags());

            that.submit(that.$advance_btn);

            return false;
        });
        this.$status_btn.click(function(e) {
            if(that.$status_btn.hasClass('disabled')) {
                e.preventDefault();
                return false;
            }
            if(that.validate(false) == false){
                return false;
            }
            var usersTagged = [];
            var mentions = that.$content.mentionsInput('getMentions');
            $.each(mentions, function(key, value){                
                usersTagged.push(value.id);
            });
            that.data = {
                content     : that.$content.mentionsInput('getHtmlContent'),
                tags        : usersTagged,
                thumb       : that.$el.find('.img-link-popup').attr('href')
            };

            that.submit(that.$status_btn);

            return false;
        });     
    };

    AddPost.prototype.submit = function($button){
        var that = this;

        var promise = $.ajax({
            type: 'POST',
            url:  this.url,
            data: this.data,
            dataType: 'json'
        });

        this.triggerProgress($button, promise);

        promise.then(function(data) {
            if(data.success == 'ok'){
                var htmlOutput = $.tmpl( $('#post-item-template'), data.post ); 
                var firstColumn = that.blockContent.find('.column:first-child');            
                var newColumn = $('<div class="column">').append(htmlOutput);
                newColumn.children('.post').height(firstColumn.height() - 2*(marginPostDefault + 1));
                //newColumn.find('.post_text_raw').
                newColumn.width(widthPostDefault);
                newColumn.css({
                    'opacity':'1', 
                    'min-width': widthPostDefault + 'px'
                });
                firstColumn.hide().after(newColumn).show(500);
                that.mainContent.width(that.mainContent.width() + widthPostDefault + marginPostDefault);
                that.rootContent.getNiceScroll().resize();

                $(document).trigger('POST_BUTTON');
                $(document).trigger('POST_SHOW_LIKED_BUTTON');
                $(document).trigger('HORIZONTAL_POST');
                $(document).trigger('DELETE_POST', [htmlOutput]);

                jQuery(".timeago").timeago();
                that.$content.val('');
                that.$advance_content.code('');
                that.$advance_title.val('');
                $post_add_form.find('.img-previewer-container').html('');
                that.$el.find('.img-previewer-container').html('');

                $('.mfp-ready').trigger('click');
            }
        });
    };

    AddPost.prototype.validate = function(is_advance){
        if ( is_advance == true ){
            if ( this.$advance_content.code() == '' ){
                return false;
            }
        }else{
            if ( this.$content.val().length == 0 ){
                return false;
            }
        }
    };

    AddPost.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var f        = function() {
            $el.removeClass('disabled');
            $spinner.remove();
        };

        $el.addClass('disabled').prepend($spinner);

        promise.then(f, f);
    };

    $(function(){
        $('.form-status').each(function(){
            new AddPost($(this));
        });     
    });
}(jQuery, document));

// Show delete post
(function($, document, undefined) {
    function DeletePost($el) {
        this.$el        = $el;
        this.$btn       = $el.find('.post-delete-btn');

        this.url        = $el.data('url-delete');

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
                title: "Confirm",
                message: "Are you sure you want to delete this post ?",             
                buttons: 
                {
                    cancel: {
                        label: "Cancel",
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
                that.$el.parent().css('opacity','0').slideUp(300, function(){
                    $(this).remove();
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

// Show advance edit post
(function($, document, undefined) {
    var $edit_post_form = $('#post-advance-edit-popup');

    function ShowEditAdvance($el) {
        this.$el        = $el;
        this.$btn       = $el.find('.post-edit-btn');
        this.content    = $el.find('.post_text_raw').html();
        this.title      = $el.find('.post_title > a').html();
        this.$image     = $el.find('.post_image > img');

        this.url        = $el.data('url-edit');

        this.addEvents();
    }
    ShowEditAdvance.prototype.addEvents = function() {
        var that = this;
        this.$btn.click(function(e){
            e.preventDefault();

            // Content
            $edit_post_form.find('.post-advance-content').code( that.content );

            // Title
            $edit_post_form.find('.post-advance-title').val( that.title );

            // Image
            $edit_post_form.find('.drop-zone-show').html('').append(that.$image);

            // Url
            $edit_post_form.data('url', that.url);

            // Cache current post
            $edit_post_form.data('post', that.$el);

            return false;
        });
    }

    $(function(){
        $('.js-post-item').each(function(){
            new ShowEditAdvance($(this));
        });

        $(document).bind('EDIT_POST', function(e, $post_item) {
            new ShowEditAdvance($post_item);
        });
    }); 
}(jQuery, document));

// Submit edit post
(function($, document, undefined) {
    function EditPost( $el ) {
        this.$el                = $el;
        this.$title             = $el.find('.post-advance-title');
        this.$content           = $el.find('.post-advance-content');
        this.$btn               = $el.find('.btn-post-advance');

        this.attachEvents();
    }

    EditPost.prototype.attachEvents = function(){
        var that = this;

        this.$btn.click(function(e) {
            e.preventDefault();
            
            if($(this).hasClass('disabled') || that.validate() == false) {
                return false;
            }
            
            if ( that.$el.find('.img-url').val() == null ){
                var thumb = null;
            }else{
                var thumb = that.$el.find('.img-link-popup').attr('href');
            }
            
            that.url = that.$el.data('url');
            
            that.data = {
                title       : that.$title.val(),
                content     : that.$content.code(),
                thumb       : thumb
            };

            that.submit($(this));

            return false;
        });    
    };

    EditPost.prototype.submit = function($button){
        var that = this;

        var promise = $.ajax({
            type: 'POST',
            url:  this.url,
            data: this.data,
            dataType: 'json'
        });

        this.triggerProgress($button, promise);

        promise.then(function(data) {
            if(data.success == 'ok'){
                var $current_post = that.$el.data('post');
                
                $current_post.find('.post_text_raw').html( data.post.content );
                $current_post.find('.post_title > a').html( data.post.title );
                $current_post.find('.post_image').html($('<image src="' + data.post.image + '" />'));

                $('.mfp-ready').trigger('click');
            }
        });
    };

    EditPost.prototype.validate = function(){
        if ( this.$content.code() == '' ){
            return false;
        }
    };

    EditPost.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var f        = function() {
            $el.removeClass('disabled');
            $spinner.remove();
        };

        $el.addClass('disabled').prepend($spinner);

        promise.then(f, f);
    };

    $(function(){
        new EditPost($('#post-advance-edit-popup'));
    });
}(jQuery, document));
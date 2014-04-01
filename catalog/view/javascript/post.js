// Post controller generate view (html)
function PostController( aPosts ){
    'use strict';

    var that = this;

    // Update post info for template with knockout format
    this.updateInfo = function(_post){
        var post = _post;

        // User Author info
        var user = window.yUsers.getItem( post.user_id );
        user.href = window.yRouting.generate('WallPage', {user_slug: user.slug});
        post.user = user;

        // Owner when user A post on User B 's wall page
        if ( post.user_id != post.owner_id ){
            var owner = window.yUsers.getItem( post.owner_id );
            owner.href = window.yRouting.generate('WallPage', {user_slug: owner.slug});
            post.object = owner;
        }else{
            post.object = null;
        }

        // Category when user A post on Branch X
        if ( post.category_slug !== undefined ){
            var category = {
                href: window.yRouting.generate('BranchCategory', {category_slug: post.category_slug}),
                name: post.category_name
            };
            post.object = category;
        }else{
            post.object = null;
        }

        post.href = window.yRouting.generate('PostPage', {post_type: post.type, post_slug: post.slug});

        return post;
    };
    
    // Check user, owner, category & post info
    this.aPosts = [];
    for ( var key in aPosts ){
        this.aPosts.push( this.updateInfo(aPosts[key]) );
    }
    // console.log(this.aPosts);
    // Connect list posts with Knockout js
    function PostsViewModel(){
        var self = this;

        self.posts = ko.observableArray();
        for ( var key in that.aPosts ){
            self.posts.push( new PostModel(that.aPosts[key]) );
        }

        function PostModel(_post){
            var self = this;
            
            self.slug           = ko.observable( _post.slug );
            self.href           = ko.observable( _post.href );
            self.isUserLiked    = _post.isUserLiked;
            self.is_edit        = ko.observable( _post.is_edit );
            self.is_del         = ko.observable( _post.is_del );
            self.user           = {
                href: _post.user.href,
                username: _post.user.username,
                avatar: _post.user.avatar
            };
            if ( _post.object !== null ){
                self.object = {
                    href: _post.object.href,
                    name: _post.object.name
                };
            }else{
                self.object = null;
            }
            self.timeago        = _post.timeago;
            self.created        = ko.observable( _post.created );
            self.created_full   = ko.observable( _post.created_full );
            self.created_short  = ko.observable( _post.created_short );
            self.comment_count  = ko.observable( _post.comment_count );
            self.count_viewer   = ko.observable( _post.count_viewer );
            self.like_count     = ko.observable( _post.like_count );
            self.type           = ko.observable( _post.type );
            self.title          = ko.observable( _post.title );
            self.content        = ko.observable( _post.content );
            self.image          = ko.observable( _post.image );
            self.thumb          = ko.observable( _post.thumb );
            self.see_more       = ko.observable( _post.see_more );
        }
    }
    ko.applyBindings(new PostsViewModel());

    this.add = function(_post)
    {
        this.aPosts.push(_post);
    };

    this.update = function(key, _post){
        this.aPosts[key] = _post;
    };

    this.remove = function(key){
        this.aPosts.splice(key, 1);
    };
}

// Post action
(function($, document, undefined) {
    'use strict';
    function PostAction( $el ){
        this.$el                = $el;
        
        this.$btnUnLike         = $el.find('.js-unlike-post');
        this.$btnLike           = $el.find('.js-like-post');

        this.attachEvents();
    }
    PostAction.prototype.attachEvents = function(){
        var that = this;

        this.$btnLike.click(function(e) {
            // if(that.$btnLike.hasClass('disabled')) {
            //     e.preventDefault();

            //     return false;
            // }

            // that.submit(that.$btnLike);



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
    PostAction.prototype.submit = function($button){
		var that = this;

        var promise = $.ajax({
            type: 'POST',
            url:  this.url,
            dataType: 'json'
        });

        this.triggerProgress($button, promise);

		promise.then(function(data) {
			if(data.success == 'ok'){
				// var $curr_item = that.$el.parents('.post');
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
    PostAction.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f       = function() {
            $spinner.remove();
            $el.removeClass('disabled').prepend($old_icon);
        };

        $old_icon.remove();
        $el.addClass('disabled').prepend($spinner);

        promise.then(f, f);
    };

    $(function(){
        $('.js-post-item').each(function(){
            new PostAction($(this));
        });

        $(document).bind('POST_BUTTON', function() {
            $('.post-item').each(function(){
                new PostAction($(this));
            });
        });
    });
}(jQuery, document));

// Show list users liked post
(function($, document, undefined) {
    'use strict';

    function UserListViewer($el) {
        this.$el        = $el;
        this.url        = $el.data('url');

        this.addEvents();
    }
    UserListViewer.prototype.addEvents = function() {
        var that = this;
        this.$el.click(function(e){
            e.preventDefault();
            
            if( $(this).hasClass('disabled') || that.$el.data('like-count') == '0' ) {
                return false;
            }

            $(this).addClass('show-liked-list');

            that.submit(that.$el);

            return false;
        });
	};
    UserListViewer.prototype.submit = function($button) {
        var userIds = $button.data('user-ids');
        
        if ( userIds === undefined || userIds === null ){
            var promise = $.ajax({
                type: 'POST',
                url:  this.url,
                dataType: 'json'
            });

            this.triggerProgress($button, promise);

            promise.then(function(data) {
				if (data.success == 'ok'){
					if(data.users.length === 0){
                        return false;
                    }

                    var users = [],
                        userIds = [];

					for (var key in data.users) {
                        if ( window.yUsers.getItem(data.users[key].id) === undefined ){
                            window.yUsers.setItem( data.users[key].id, data.users[key] );
                        }
                        users.push( data.users[key] );
                        userIds[data.users[key].id] = data.users[key].id;
                    }

                    $button.data('user-ids', userIds);

                    window.userFunction.showPopupUserList( users );
                }
            });
        }else{
            var users = [];
            for ( var key in userIds ){
                if ( window.yUsers.getItem(key) !== undefined ){
                    users.push( window.yUsers.getItem(key) );
                }
            }

            window.userFunction.showPopupUserList( users );
        }
    };
    UserListViewer.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f       = function() {
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

        $(document).bind('POST_SHOW_LIKED_BUTTON', function() {
            $('.post-liked-list').each(function(){
                new UserListViewer($(this));
            });
        });
    });
}(jQuery, document));

// Show advance edit post
(function($, document, undefined) {
    'use strict';

    var $advance_post_form = $('.js-advance-post');

    function ShowEditPostAdvance($el) {
        this.$el        = $el;
        this.$btn       = $el.find('.post-edit-btn');
        this.$image     = $el.find('.post_image img');

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
            if ( that.$image.attr('src') !== '' ){
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
    };

    $(function(){
        $('.js-post-item').each(function(){
            new ShowEditPostAdvance($(this));
        });

        $(document).bind('EDIT_POST', function(e, $post_item) {
            new ShowEditPostAdvance($post_item);
        });

        $(document).bind('POPUP_CLOSED', function() {
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
    'use strict';

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
        this.userSlug           = $('.js-post-status').parents('.form-status').data('user-slug');
        
        this.attachEvents();
    }

    SubmitPost.prototype.attachEvents = function(){
        var that = this;

        this.$submitBtn.click(function(e) {
            e.preventDefault();
            
            if(that.$submitBtn.hasClass('disabled')) {
                return false;
            }
            if(that.validate() === false){
                return false;
            }

            // content, user tagged, thumb
            var usersTagged = [];
            var content, thumb;
            if ( !that.$content.hasClass('js-post-status') ){
                content = that.$content.code();
                usersTagged = that.$content.getTags();
                thumb = that.$el.find('.img-uploaded').attr('src');
            
            }else{
                var mentions = that.$content.mentionsInput('getMentions');
                $.each(mentions, function(key, value){
                    usersTagged.push(value.id);
                });
                content = that.$content.mentionsInput('getHtmlContent');
                thumb = that.$el.find('.img-uploaded').attr('src');
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
                if ( form_value.image !== undefined ){
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
                user_slug: that.userSlug
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

                        $('.timeago').timeago();

                        post.find('.link-popup').magnificPopup({
                            type:'inline',
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'mfp-fade'
                        });
                        newColumn.css('opacity', '1');
                    }, 500);

                    htmlOutput.find('.post_body').magnificPopup({
                        delegate: 'a',
                        type: 'image',
                        closeOnContentClick: false,
                        closeBtnInside: false,
                        mainClass: 'mfp-with-zoom mfp-img-mobile',
                        image: {
                            verticalFit: true,
                            titleSrc: function(item) {
                                return item.el.attr('title');
                            }
                        }
                    });

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
                    if ( data.post.title !== null ){
                        $current_post.find('.post_title').removeClass('hidden').find('a').html( data.post.title );
                    }
                    if ( data.post.image !== null ){
                        $current_post.find('.post_image').removeClass('hidden').find('a').attr('href', data.post.thumb + '?' + new Date().getTime());
                        $current_post.find('.post_image').removeClass('hidden').find('img').attr('src', data.post.image + '?' + new Date().getTime());
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

        if ( this.is_add == 1 && this.$title.val() !== undefined && this.$title.val().trim().length === 0 ){
            this.$title.val('');
            return false;
        }

        if ( this.$content.hasClass('js-post-status') && this.$content.val().trim().length === 0 ){
            this.$content.val('');
            return false;
        }
            
        if ( this.$description.val() !== undefined && this.$description.val().trim().length === 0 ){
            this.$description.val('');
            return false;
        }

        return true;
    };

    SubmitPost.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var f       = function() {
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
    'use strict';

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
                        className: 'btn',
                        callback: function() {
                        }
                    },
                    oke: {
                        label: 'OK',
                        className: 'btn-primary',
                        callback: function() {
                            that.submit(that.$btn.find('a'));
                        }
                    }
                }
            });

            return false;
        });
    };
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
    };
    DeletePost.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f       = function() {
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
(function($, document, undefined) {
    var comment_box = $('#comment-box');
    var comment_form = $('.comment-form');
    var list_comment = $('#comment-box .y-box-content');
    var page = 1;

    function UserInfo(user_name, user_img, user_url, number_friend, is_friend, is_follow) {
        this.userName = user_name;
        this.userUrl = user_url;
        this.userImg = user_img;
        this.numberFriend = number_friend;
        this.isFriend = is_friend;
        this.isFollow = is_follow;
    }
    function UserListViewer(el) {
        this.element 		= el;
        this.viewTitle 		= el.data('view-title');
        this.viewType 		= el.data('view-title');
        this.postSlug		= el.data('post-slug');
        this.postType		= el.data('post-type');
        this.typeSlug 		= el.data('type-slug');
        this.addEvents();
    }
    UserListViewer.prototype.addEvents = function() {
        var that = this;
        this.element.click(function(e){
            e.preventDefault();
            if($(this).hasClass('disabled')) {
                return false;
            }
            that.showViewer();
        });
    }
    UserListViewer.prototype.showViewer = function() {
        var that = this;

        var spinner = $('<i class="icon-refresh icon-spin"></i>');
        that.element.addClass('disabled').parent().prepend(spinner);

        //Bi?n ch?a danh s�ch c�c User s? hi?n th?
        var data;

        //L?y d? li?u danh s�ch ngu?i d�ng d?a v�o lo?i action v� c�c th�ng s? c?a b�i post (slug,type)
        if(that.viewType == 'like'){

        }
        else if (that.viewType == 'comment') {

        }
        else if (that.viewType == 'view') {

        }
		
        //D? li?u test demo:
        data = new Array();
        var user1 = new UserInfo('User 1', 'image/template/user-avatar.png', '#', 10, 0, 1);
        var user2 = new UserInfo('User 2', 'image/template/user-avatar.png', '#', 10, 0, 1);
        var user3 = new UserInfo('User 3', 'image/template/user-avatar.png', '#', 10, 0, 0);
        var user4 = new UserInfo('User 4', 'image/template/user-avatar.png', '#', 10, 1, 1);
        var user5 = new UserInfo('User 5', 'image/template/user-avatar.png', '#', 10, 1, 0);
        var user6 = new UserInfo('User 6', 'image/template/user-avatar.png', '#', 10, 0, 1);
        var user7 = new UserInfo('User 7', 'image/template/user-avatar.png', '#', 10, 0, 0);
        var user8 = new UserInfo('User 8', 'image/template/user-avatar.png', '#', 10, 1, 1);
        var user9 = new UserInfo('User 9', 'image/template/user-avatar.png', '#', 10, 0, 1);
        var user10 = new UserInfo('User 10', 'image/template/user-avatar.png', '#', 10, 1, 0);
        data.push(user1);
        data.push(user2);
        data.push(user3);
        data.push(user4);
        data.push(user5);
        data.push(user6);
        data.push(user7);
        data.push(user8);
        data.push(user9);
        data.push(user10);

        var templateUserInfo = $('#user-info-template');
        var userViewerContainer = $('#user-viewer-container').html('');
        var htmlContent = '';

        for (var i = 0; i < data.length; i++) {
            var user = data[i];
            var html = templateUserInfo.html().replace('USER_URL', user.userUrl);
            html = html.replace('USER_NAME', user.userName);
            html = html.replace('USER_IMG', user.userImg);
            html = html.replace('NUMBER_OF_FRIEND', user.numberFriend);
            var actionFriend = '<i class="icon-ok"></i>Friend';
            if(user.isFriend == 0) {
                actionFriend = '<i class="icon-plus"></i>Add as Friend';
            }
            html = html.replace('USER_ACTIONS', actionFriend);
            htmlContent += html;
        };
        userViewerContainer.html(htmlContent);
        userViewerContainer.bPopup( 
        {
            follow: [false, false],				
            speed: 300,
            transition: 'slideDown',
            modalColor : '#000',
            opacity: '0.5'
        }
        );		

        //Complete
        that.element.removeClass('disabled');
        spinner.remove();
    }

    function LikePostBtn( $el ){
        var that = this;
        this.$el			= $el;
        this.url			= $el.data('url');
        this.isLiked 		= $el.data('post-liked');
        this.iconLike 		= $el.find('i');

        this.attachEvents();
    }

    LikePostBtn.prototype.attachEvents = function(){
        var that = this;

        this.$el.click(function(e) {
            if(that.$el.hasClass('disabled')) {
                e.preventDefault();

                return false;
            }

            that.submit(that.$el);

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
                $curr_item.find('.post_meta .post_like d').html( data.like_count );
                $button.find('d').html( data.like_count );
                $curr_item.find('.view-list-liker d').html( data.like_count );

                var $likeIcon = $('<i class="icon-thumbs-up medium-icon"></i>');
                var $unLikeIcon = $('<i class="icon-thumbs-down medium-icon"></i>');
                //Unlike
                if(that.isLiked == 1) {
                    that.iconLike.replaceWith($likeIcon);
                    that.iconLike = $likeIcon;
                    that.isLiked = 0;
                }else { //Like
                    that.iconLike.replaceWith($unLikeIcon);
                    that.iconLike = $unLikeIcon;
                    that.isLiked = 1;
                }

                that.$el.removeClass('disabled');
            }

        });		
    };
		
    LikePostBtn.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-refresh icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f        = function() {
            $spinner.remove();
            $el.html($old_icon);
        };

        $el.addClass('disabled').html($spinner);

        promise.then(f, f);
    };

    function LikeCommentBtn( $el ){
        var that = this;

        var $curr_item = $el.parents('.post');

        this.$el			= $el;
        this.url			= $el.data('url');
        this.isLiked 		= $el.data('comment-liked');
        this.iconLike 		= $el.find('i');
        this.attachEvents();
    }

    LikeCommentBtn.prototype.attachEvents = function(){
        var that = this;

        this.$el.click(function(e) {
            if(that.$el.hasClass('disabled')) {
                e.preventDefault();

                return false;
            }

            that.submit(that.$el);

            return false;
        });
    };
		
    LikeCommentBtn.prototype.submit = function($button){
        var that = this;

        var promise = $.ajax({
            type: 'POST',
            url:  this.url,
            dataType: 'json'
        });

        this.triggerProgress($button, promise);

        promise.then(function(data) {
            alert(data.success);
            if(data.success == 'ok'){
                that.$el.find('d').html( data.like_count ); 

                var $likeIcon = $('<i class="icon-thumbs-up medium-icon"></i>');
                var $unLikeIcon = $('<i class="icon-thumbs-down medium-icon"></i>');
                //Unlike
                if(that.isLiked == 1) {
                    that.iconLike.replaceWith($likeIcon);
                    that.iconLike = $likeIcon;
                    that.isLiked = 0;
                }else { //Like
                    that.iconLike.replaceWith($unLikeIcon);
                    that.iconLike = $unLikeIcon;
                    that.isLiked = 1;
                }
            }
        });
    };
		
    LikeCommentBtn.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-refresh icon-spin"></i>');
        var f        = function() {
            $spinner.remove();
            $el.removeClass('disabled');
        };

        $el.addClass('disabled').parent().append($spinner);

        promise.then(f, f);
    };

    function CommentBtn( $el ){
        var that = this;

        this.$el			= $el;
        this.comment_count	= $el.data('comment-count');
        this.comment_url	= $el.data('comment-url');
        this.url			= $el.data('url');

        this.attachEvents();
    }

    CommentBtn.prototype.attachEvents = function(){
        var that = this;

        this.$el.click(function(e) {
            if(that.$el.hasClass('disabled')) {
                e.preventDefault();

                return false;
            }

            $('#comment-box').find('.y-box-header .close').trigger('click');

            that.submit(that.$el);

            return false;
        });
    };

    CommentBtn.prototype.submit = function($button){
        var that = this;

        var promise = $.ajax({
            type: 'POST',
            url:  this.url,
            dataType: 'json'
        });

        this.triggerProgress($button, promise);

        promise.then(function(data) { 
            if(data.success == 'ok'){
                $('.comment-body').html('');

                var htmlOutput = '';
                for (key in data.comments) {
                    htmlOutput += $.tmpl( $('#item-template'), data.comments[key] ).html();
                }
				
                htmlOutput += '<div id="add-more-item"></div>';
                comment_box.find('.comment-body').html(htmlOutput);
                comment_box.find('.y-box-header span').html(that.comment_count);
                comment_form.attr('data-url', that.comment_url);
                page = 1;
                $('.comment-body').animate({
                    scrollTop: $(".comment-body").find("#add-more-item").first().offset().top
                }, 1000);
                new CommentForm(comment_form);

                $('.comment-item .like-comment').each(function(){
                    new LikeCommentBtn($(this));			
                });

                jQuery(".timeago").timeago();
            }

            if ( $button.parents('.post').attr('class') != undefined ){
                showCommentForCurrentPost($button.parents('.post'));
            }
        });
    };

    CommentBtn.prototype.triggerProgress = function($el, promise)
    {
        var $spinner = $('<i class="icon-refresh icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f        = function() {
            $spinner.remove();
            $el.html($old_icon);
        };

        $el.addClass('disabled').html($spinner);

        promise.then(f, f);
    };

    function CommentForm( $el ){
        var that = this;
        this.$el			= $el;
        this.$content		= $el.find('textarea');
        this.$comment_btn	= $el.find('.btn-comment');
        this.$press_enter_cb  = $el.find('.cb-press-enter');
        this.attachEvents();
        if(that.$press_enter_cb.parent().hasClass('checked')){
            that.$comment_btn.hide();
        }
    }

    CommentForm.prototype.attachEvents = function(){
        var that = this;
        this.$comment_btn.click(function(e) {
            if(that.$comment_btn.hasClass('disabled')) {
                e.preventDefault();

                return false;
            }
			
            if(that.validate() == false){
                return false;
            }

            that.url	= that.$el.attr('data-url');

            that.data = {
                content 	: that.$content.val()
            };

            that.submit(that.$comment_btn);

            return false;
        });
    };

    CommentForm.prototype.submit = function($button){
        var that = this;

        var promise = $.ajax({
            type: 'POST',
            url:  this.url,
            data: that.data,
            dataType: 'json'
        });

        this.triggerProgress($button, promise);

        promise.then(function(data) {
            if(data.success == 'ok'){
                htmlOutput = $.tmpl( $('#item-template'), data.comment ).html();
                $('#add-more-item').before(htmlOutput);
                that.$content.val('');
                //Scroll to last post which have just been added
                list_comment.animate({ 
                    scrollTop: $('#add-more-item').offset().top
                }, 1000);

                var comment_count = parseInt(that.$el.parent().find('.counter').html()) + 1;
                that.$el.parent().find('.counter').html( comment_count );

                var $curr_item = $('.open-comment.disabled').parents('.post');
				
                $('.open-comment.disabled').parent().find('d').html( comment_count );
                $curr_item.find('.open-comment').attr('data-comment-count', comment_count).find('d').html( comment_count );
                $curr_item.find('.post_header .post_cm d').html( comment_count );

                $('.comment-item .like-comment').each(function(){
                    new LikeCommentBtn($(this));			
                });

                jQuery(".timeago").timeago();
            }
        });
    };

    CommentForm.prototype.validate = function(){
        if(this.$content.val().length == 0){
            return false;
        }
    };

    CommentForm.prototype.triggerProgress = function($el, promise)
    {
        var $spinner = $('<i class="icon-refresh icon-spin"></i>');
        var f = function() {
            $el.removeClass('disabled');
            $spinner.remove();
        };

        $el.addClass('disabled').prepend($spinner);

        promise.then(f, f);
    };

    function showCommentForCurrentPost ($post) {
		
        $('.post').removeClass('post-selecting');
        $post.addClass('post-selecting');
        $('#overlay').show('fast');

        if($post.attr('class').indexOf('last-feed')){ 
            $('#y-main-content').scrollLeft($('#y-main-content').width());
        }

        //Show comment box:
        comment_box.animate({
            "right": "2px"
        }, "slow", function(){			
            //list_comment.makeScrollWithoutCalResize();
            });
    // list_comment.animate({ 
    // 	scrollTop: $('#add-more-item').offset().top
    // }, 1000);
    }

    function hideCommentBox () {
        $('#overlay').hide();
        $('.post').removeClass('post-selecting');
        $('.open-comment').removeClass('disabled');
        comment_box.animate({
            "right": "-500px"
        }, "slow");
        page = 1;
    }

    $(function(){
        $('.who-action .view-list-user').each(function(){
            new UserListViewer($(this));
        });

        $('.like-post').each(function(){
            new LikePostBtn($(this));			
        });

        $('.open-comment').each(function(){
            new CommentBtn($(this));			
        });

        $('.comment-container').on('click', '.y-box-header .close', function(){
            hideCommentBox();
        });
		
        $('#overlay').click(function() {
            hideCommentBox ();
        });
        $(document).keyup(function(e) {
            if (e.keyCode == 27) { 
                hideCommentBox ();
            }
        });

        var getComments = function () {
            list_comment.off('scroll');
            if(list_comment.scrollTop() == 0 && (((page + 1)*10 < $('.open-comment.disabled').attr('data-comment-count')) || ((page + 1)*10 - $('.open-comment.disabled').attr('data-comment-count') <= 10)) ) {
                page++;
                var data = {
                    'post_slug'	: comment_form.attr('data-post-id'),
                    'post_type' : comment_form.attr('data-post-type'),
                    'page'		: page
                }
                $.ajax({
                    type: 'POST',
                    url:  $('.open-comment.disabled').data('url'),
                    data: data,
                    dataType: 'json',
                    progress: function () {
                        $('.comment-body').prepend('<span class="loading"><i class="icon-spin icon-refresh"></i>Loading...</span>');
                    },
                    success: function (data) {
                        if(data.success == 'ok') {
                            var htmlOutput = '';
                            for (key in data.comments) {
                                htmlOutput += $.tmpl( $('#item-template'), data.comments[key] ).html();
                            }
                            $('.comment-body').find('.loading').remove();
                            $('.comment-body').prepend(htmlOutput);
                        }
                    }
                });
            } 
            list_comment.on('scroll', function () {
                getComments();
            });
        }
        list_comment.on('scroll', function () {
            getComments();
        });

        $(document).bind('POST_BUTTON', function(e) {
            $('.like-post').each(function(){
                new LikePostBtn($(this));			
            });

            $('.open-comment').each(function(){
                new CommentBtn($(this));			
            });
        });
    });
}(jQuery, document));
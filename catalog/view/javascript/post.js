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
                that.$el.find('.post-liked-list').html( data.like_count ).data('like-count', data.like_count);

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
            $('.like-post').each(function(){
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
                        }
                    });
                    $('.modal-backdrop').on('click', function(){
                       bootbox.hideAll();
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
    }); 
}(jQuery, document));

// Show list comment
(function($, document, undefined) {
    function ShowListComments( $el ){
        var that = this;

        this.$el            = $el;
        this.comment_count  = $el.data('comment-count');
        this.comment_url    = $el.data('comment-url');
        this.url            = $el.data('url');

        this.attachEvents();
    }
    ShowListComments.prototype.attachEvents = function(){
        var that = this;
        this.$el.click(function(e) {
            if(that.$el.hasClass('disabled')) {
                e.preventDefault();
                return false;
            }
            // $('#comment-box').find('.y-box-header .btn-close').trigger('click');

            if ( that.$el.data('comment-count') == 0 ){
                var htmlOutput = '';
                htmlOutput += '<div id="add-more-item"></div>';
                $('#comment-box').find('.comment-body').html(htmlOutput);
                $('#comment-box').find('.y-box-header span').html(that.comment_count);
                $('.comment-form').attr('data-url', that.comment_url);
                
                $('.comment-body').stop().animate({
                    scrollTop: $(".comment-body").find("#add-more-item").first().offset().top
                }, 1000);

                $(document).trigger('SHOWN_COMMENT_LIST');

                that.showCommentBox(that.$el); 
            }else{
                that.submit(that.$el);
            }

            return false;
        });
        $('#comment-box').on('click', '.y-box-header .btn-close', function(){
            that.hideCommentBox(that.$el);
        });        
        $('#overlay').click(function() {
            that.hideCommentBox(that.$el);
        });
        $(document).keyup(function(e) {
            if (e.keyCode == 27) { 
                that.hideCommentBox(that.$el);
            }
        });
    };
    ShowListComments.prototype.submit = function($button){
        var that = this;
        
        if ( this.$el.data('comments') == undefined ){
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
                    var comments = new Array();
                    for (key in data.comments) {
                        comments[data.comments[key].id] = data.comments[key];
                        htmlOutput += $.tmpl( $('#item-template'), data.comments[key] ).html();
                    }
                    that.$el.data('comments', comments);  
                    var comment_count = getActualLengthOfArray(comments);   

                    htmlOutput += '<div id="add-more-item"></div>';
                    $('#comment-box').find('.comment-body').html(htmlOutput);
                    $('#comment-box').find('.y-box-header span').html(that.comment_count);
                    $('.comment-form').attr('data-url', that.comment_url);
                    
                    $('.comment-body').stop().animate({
                        scrollTop: $(".comment-body").find("#add-more-item").first().offset().top
                    }, 1000);

                    $(document).trigger('SHOWN_COMMENT_LIST');

                    jQuery(".timeago").timeago();
                    that.showCommentBox($button); 
                }     
            });
        }else{
            var $spinner = $('<i class="icon-spinner icon-spin"></i>');
            var $old_icon = that.$el.find('i');
            var f        = function() {
                $spinner.remove();
                that.$el.html($old_icon);
            };

            that.$el.addClass('disabled').html($spinner);
            $('.comment-body').html('');

            var htmlOutput = '';

            var comments = that.$el.data('comments');
            for (key in comments) {
                htmlOutput += $.tmpl( $('#item-template'), comments[key] ).html();
            }
                
            htmlOutput += '<div id="add-more-item"></div>';
            $('#comment-box').find('.comment-body').html(htmlOutput);
            $('#comment-box').find('.y-box-header span').html(that.comment_count);
            $('.comment-form').attr('data-url', that.comment_url);
            page = 1;
            $('.comment-body').stop().animate({
                scrollTop: $(".comment-body").find("#add-more-item").first().offset().top
            }, 100);

            $(document).trigger('SHOWN_COMMENT_LIST');

            jQuery(".timeago").timeago();
            that.showCommentBox($button);
            f();
        }
    };
    ShowListComments.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f        = function() {
            $spinner.remove();
            $el.html($old_icon);
        };

        $el.addClass('disabled').html($spinner);

        promise.then(f, f);
    };
    ShowListComments.prototype.showCommentBox = function($button) {
        var post = $button.parents('.post');
        if(post.length >= 0){
            $('.post').removeClass('post-selecting');
            post.addClass('post-selecting');
        }       
        $('#overlay').show(100);        
        $('#comment-box .y-box-content').makeCustomScroll(false);
        //Show comment box:
        $('#comment-box').width($('#y-content').width()/3);
        $('#comment-box').find('.comment-meta').width($('#comment-box').width() - 97);
        $('#comment-box').stop().animate({ "right": "2px" }, 200);
    }
    ShowListComments.prototype.hideCommentBox = function($button) {
        $('#overlay').hide();
        $('.post').removeClass('post-selecting');
        $button.removeClass('disabled');
        $('#comment-box').stop().animate({"right": "-1000px" }, "slow");
        page = 1;
    }

    $(function(){
        $('.open-comment').each(function(){
            new ShowListComments($(this));
        });

        $(document).bind('POST_BUTTON', function(e) {
            $('.open-comment').each(function(){
                new ShowListComments($(this));
            });
        });

        $(document).bind('FRIEND_UPDATE_STATUS', function(e, status, id) {
            if ( id == undefined ){
                return false;
            }

            var $curr_post = $('.open-comment.disabled');

            var comments = $curr_post.data('comments');

            var comment_id = $('#list-user-liked-template').data('comment_id');

            comments[comment_id].users[id].fr_status = status;
        });
    });
}(jQuery, document));

// Submit new comment
(function($, document, undefined) {
    // Submit new comment
    function AddComment( $el ){
        var that = this;
        this.$el            = $el;
        this.$content       = $el.find('textarea');
        this.$comment_btn   = $el.find('.btn-comment');
        this.$press_enter_cb  = $el.find('.cb-press-enter');
        
        this.attachEvents();
    }
    AddComment.prototype.attachEvents = function(){
        var that = this;

        if(this.$press_enter_cb.parent().hasClass('checked')){
            this.$comment_btn.hide();
        }

        this.$comment_btn.click(function(e) {
            if(that.$comment_btn.hasClass('disabled')) {
                e.preventDefault();

                return false;
            }
            
            if(that.validate() == false){
                return false;
            }

            that.url    = that.$el.attr('data-url');

            that.data = {
                content     : that.$content.val()
            };

            that.submit(that.$comment_btn);

            return false;
        });
        
        this.$press_enter_cb.click(function(e) {
            if(that.$press_enter_cb.parent().hasClass('checked')){
                that.$comment_btn.hide(100);
            }else{
                that.$comment_btn.show(100);
            }
        });
                
        this.$content.keypress(function(e){
            if(that.$press_enter_cb.parent().hasClass('checked') && e.which == 13){
                if ( that.$press_enter_cb.parent().hasClass('disabled') ){
                    e.preventDefault();

                    return false;
                }

                if(that.validate() == false){
                    return false;
                }

                that.url  = that.$el.attr('data-url');

                that.data = {
                    content   : that.$content.val()
                };

                that.submit(that.$press_enter_cb.parent());
                return false;
            }
        });
    };
    AddComment.prototype.submit = function($button){
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
                var $curr_item = $('.open-comment.disabled').parents('.post');

                var $comment_btn = $curr_item.find('.open-comment');

                var comments = $comment_btn.data('comments');
                comments[data.comment.id] = data.comment;

                htmlOutput = $.tmpl( $('#item-template'), data.comment ).html();
                $('#add-more-item').before(htmlOutput);
                $('#comment-box').find('.comment-meta').width($('#comment-box').width() - 97);
                that.$content.val('');
                //Scroll to last post which have just been added
                $('#comment-box .y-box-content').mCustomScrollbar("scrollTo","last");

                var comment_count = comments.length;

                that.$el.parent().find('.counter').html( comment_count );
                
                $comment_btn.parent().find('d').html( comment_count );
                $comment_btn.attr('data-comment-count', comment_count).find('d').html( comment_count );
                $curr_item.find('.post_header .post_cm d').html( comment_count );
                $curr_item.find(".view-list-user[data-view-type='comment']").html(comment_count);
                
                $(document).trigger('COMMENT_ADDED');

                jQuery(".timeago").timeago();
            }
        });
    };
    AddComment.prototype.validate = function(){
        if(this.$content.val().length == 0){
            return false;
        }
    };
    AddComment.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var f = function() {
            $el.removeClass('disabled');
            $spinner.remove();
        };

        $el.addClass('disabled').prepend($spinner);

        promise.then(f, f);
    };

    $(function(){
        $(document).bind('SHOWN_COMMENT_LIST', function(e) {
            $('.comment-form').each(function(){
                new AddComment($(this));
            });
        });
    });
}(jQuery, document));

// Like + Unlike a comment
(function($, document, undefined) {
    function LikeComment( $el ){
        var that = this;

        this.$el            = $el;
        this.url            = $el.data('url');
        this.isLiked        = $el.data('comment-liked');
        this.comment_id     = $el.data('id');

        this.$btnLike       = $el.find('.like-comment');
        this.$btnUnLike     = $el.parents('.comment-item').find('.un-like-btn');
        this.$likedLabel    = $el.find('.liked-label');
        
        this.attachEvents();
    }
    LikeComment.prototype.attachEvents = function(){
        var that = this;

        // Like Comment
        this.$btnLike.click(function(e) {
            if(that.$btnLike.hasClass('disabled')) {
                e.preventDefault();

                return false;
            }

            that.submit(that.$btnLike);

            return false;
        });

        // Unlike Comment
        this.$btnUnLike.click(function(e) {
            if(that.$btnUnLike.hasClass('disabled')) {
                e.preventDefault();

                return false;
            }

            that.submit(that.$btnUnLike.find('a'));

            return false;
        });
    };
    LikeComment.prototype.submit = function($button){
        var that = this;

        var promise = $.ajax({
            type: 'POST',
            url:  this.url,
            dataType: 'json'
        });

        this.triggerProgress($button, promise);

        promise.then(function(data) {
            if(data.success == 'ok'){
                that.$el.find('.like-count').html( data.like_count ); 

                // Unlike
                if(that.isLiked == 1) {
                    that.$btnLike.removeClass('hidden');
                    that.$btnUnLike.addClass('hidden');
                    that.$likedLabel.addClass('hidden');
                    that.isLiked = 0;
                    that.$btnUnLike.parents('.dropdown').removeClass('open');
                
                // Like
                }else {
                    that.$btnLike.addClass('hidden');
                    that.$btnUnLike.removeClass('hidden');
                    that.$likedLabel.removeClass('hidden');
                    that.isLiked = 1;
                }

                var $curr_post = $('.open-comment.disabled');
                var comments = $curr_post.data('comments');

                that.$el.data('like-count', data.like_count);
                comments[that.comment_id].is_liked = that.isLiked;
                comments[that.comment_id].like_count = data.like_count;
                comments[that.comment_id].users = null;
            }
        });
    };
    LikeComment.prototype.triggerProgress = function($el, promise){
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
        $(document).bind('SHOWN_COMMENT_LIST', function(e) {
            $('.comment-item .comment-info').each(function(){
                new LikeComment($(this));
            });
        });

        $(document).bind('COMMENT_ADDED', function(e) {
            $('.comment-item .comment-info').each(function(){
                new LikeComment($(this));
            });
        });
    });
}(jQuery, document));

// Show list users liked comment
(function($, document, undefined) {
    function ShowCommentUsersLiked( $el ){
        var that = this;

        this.$el            = $el;
        this.like_count     = $el.data('like-count');

        this.$btnLikedUser  = $el.find('.like-count');
        this.url            = this.$btnLikedUser.data('url');
        
        this.attachEvents();
    }
    ShowCommentUsersLiked.prototype.attachEvents = function(){
        var that = this;

        // Like Comment
        this.$btnLikedUser.click(function(e) {
            if(that.$btnLikedUser.hasClass('disabled') || that.$el.data('like-count') == 0) {
                e.preventDefault();

                return false;
            }

            that.submit(that.$btnLikedUser);

            return false;
        });
    };
    ShowCommentUsersLiked.prototype.submit = function($button){
        var that = this;

        var $curr_post = $('.open-comment.disabled');
        var comments = $curr_post.data('comments');
        
        if ( comments[this.$el.data('id')].users == undefined ){
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

                    comments[that.$el.data('id')].users = users;

                    var usersViewer = $('<div id="#user-viewer-container"></div>');
                    for (key in users) {
                        $.tmpl( $('#list-user-liked-template'), users[key]).appendTo(usersViewer);
                    }
                    bootbox.dialog({
                        message: usersViewer.wrap('<div>').parent().html(),
                        title: "Who liked this comment",
                        onEscape: function(){
                            bootbox.hideAll();
                        }
                    });
                    $('.modal-backdrop').on('click', function(){
                       bootbox.hideAll();
                    });

                    $(document).trigger('FRIEND_ACTION', [false]);

                    $('#list-user-liked-template').data('comment_id', that.$el.data('id'));
                }
            });
        }else{
            users = comments[this.$el.data('id')].users;

            var usersViewer = $('<div id="#user-viewer-container"></div>');
            for (key in users) {
                $.tmpl( $('#list-user-liked-template'), users[key]).appendTo(usersViewer);
            }
            bootbox.dialog({
                message: usersViewer.wrap('<div>').parent().html(),
                title: "Who liked this comment",
                onEscape: function(){
                    bootbox.hideAll();
                }
            });
            $('.modal-backdrop').on('click', function(){
               bootbox.hideAll();
            });

            $(document).trigger('FRIEND_ACTION', [false]);

            $('#list-user-liked-template').data('comment_id', that.$el.data('id'));
        }
    };
    ShowCommentUsersLiked.prototype.triggerProgress = function($el, promise){
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
        $(document).bind('SHOWN_COMMENT_LIST', function(e) {
            $('.comment-item .comment-info').each(function(){
                new ShowCommentUsersLiked($(this));
            });
        });

        $(document).bind('COMMENT_ADDED', function(e) {
            $('.comment-item .comment-info').each(function(){
                new ShowCommentUsersLiked($(this));
            });
        });
    });
}(jQuery, document));
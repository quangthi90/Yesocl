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

            if ( that.$el.data('comment-count') == 0 ){
                var htmlOutput = '';
                htmlOutput += '<div id="add-more-item"></div>';
                $('#comment-box').find('.comment-body').html(htmlOutput);
                $('#comment-box').find('.y-box-header span').html(that.comment_count);
                $('.comment-form').attr('data-url', that.comment_url);
                
                that.$el.addClass('disabled');

                $(document).trigger('SHOWN_COMMENT_LIST');

                that.showCommentBox(that.$el); 
            }else{
                that.submit(that.$el);
            }

            return false;
        });
        $('#comment-box').on('click', '#btn-close', function(){
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
                    var comments = new HashTable();
                    for (key in data.comments) {
                        comments.setItem(data.comments[key].id, data.comments[key]);
                        htmlOutput += $.tmpl( $('#item-template'), data.comments[key] ).html();
                    }
                    
                    that.$el.data('comments', comments);

                    htmlOutput += '<div id="add-more-item"></div>';
                    $('#comment-box').find('.comment-body').html(htmlOutput);
                    var comment_count = 0;
                    $('#comment-box').find('.comment-item').each(function(){
                        comment_count++;
                    });
                    $('#comment-box').find('.y-box-header span').html(comment_count);
                    $('.comment-form').attr('data-url', that.comment_url);
                    
                    $(document).trigger('SHOWN_COMMENT_LIST');

                    $(".timeago").timeago();
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
            
            comments.each(function(key, value){
                htmlOutput += $.tmpl( $('#item-template'), value ).html();
            });
                
            htmlOutput += '<div id="add-more-item"></div>';
            $('#comment-box').find('.comment-body').html(htmlOutput);
            var comment_count = 0;
            $('#comment-box').find('.comment-item').each(function(){
                comment_count++;
            });
            $('#comment-box').find('.y-box-header span').html(comment_count);
            $('.comment-form').attr('data-url', that.comment_url);
            page = 1;

            $(document).trigger('SHOWN_COMMENT_LIST');

            $(".timeago").timeago();
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
        //Hide all tootip:
        $('a[title]').tooltip('hide');
        //Show overlay: 
        $('#overlay').show(100);

        var commentBox = $('#comment-box');
        if(commentBox.find('.comment-item').length > 0) {
            //Popup advanced comment:
            commentBox.find('.link-popup').magnificPopup({
                type:'inline',
                midClick: true,
                removalDelay: 300,
                mainClass: 'mfp-fade'
            });
            commentBox.find('.comment-content img').each(function(){
                if($(this).parent('a').length == 0){
                    var imgWrapper = $("<a class='img-wrapper'></a>");
                    imgWrapper.attr('href', $(this).attr('src'));
                    imgWrapper.attr('title', $(this).attr('alt'));
                    $(this).wrap(imgWrapper);
                }         
            });
            commentBox.find('.comment-content').magnificPopup({
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
                },
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300, 
                    opener: function(element) {
                        return element.find('img');
                    }
                }
            });
        }

        //Show comment box:
        commentBox.width($('#y-content').width()/3);
        commentBox.find('.comment-meta').width(commentBox.width() - 97);
        var commentBody = commentBox.find('.comment-body').first();
        if(commentBody.length > 0) {
            commentBody.makeCustomScroll(false);  
        }
        commentBox.stop().animate({ "right": "2px" }, 200);
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

            if ( $curr_post.attr('class') == undefined ){
                var users = $('.show-liked-list').data('users');
                users[id].fr_status = status;
                $('.show-liked-list').data('users', users);
                return;
            }

            var comments = $curr_post.data('comments');

            var comment_id = $('#list-user-liked-template').data('comment_id');

            comments.getItem(comment_id).users[id].fr_status = status;
        });
    });
}(jQuery, document));

// Submit edit or add new comment
(function($, document, undefined) {
    // Submit new comment
    function AddComment( $el ){
        var that = this;
        this.$el            = $el;
        
        this.$content       = $el.find('textarea');
        this.$comment_btn   = $el.find('.btn-comment');
        this.$press_enter_cb  = $el.find('.cb-press-enter'); 

        this.$content_advance = $('#comment-advance-popup').find('.post-advance-content');
        this.$btn_advance   = $('#comment-advance-popup').find('.btn-post-advance');

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
            if(!that.validate(false)){
                return false;
            }

            that.url    = that.$el.attr('data-url');

            that.data = {
                content     : that.$content.val()
            };

            that.submit(that.$comment_btn);

            return false;
        });

        this.$btn_advance.click(function(e) {
            if(that.$btn_advance.hasClass('disabled')) {
                e.preventDefault();
                return false;
            }
            
            if(!that.validate(true)){
                return false;
            }

            if ( that.$el.hasClass('edit-comment') ){
                that.url = that.$el.data('url-edit');
            }else{
                that.url    = that.$el.attr('data-url');
            }

            that.data = {
                content     : that.$content_advance.code()
            };

            that.submit(that.$btn_advance);

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

                if(!that.validate(false)){
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
                if ( that.$el.hasClass('edit-comment') ){
                    var comments = $('.open-comment.disabled').data('comments');
                    if (comments == undefined){
                        comments = new HashTable();
                    }

                    comments.setItem(data.comment.id, data.comment);
                    $('.open-comment.disabled').data('comments', comments);

                    htmlOutput = $.tmpl( $('#item-template'), data.comment ).html();
                    var $curr_item = $('.comment-body').find('.comment-info[data-id=\'' + data.comment.id + '\']').parents('.comment-item');
                    $curr_item.after(htmlOutput);
                    $curr_item.remove();

                    that.$el.removeClass('edit-comment');
                }else{
                    var commentBox = $('#comment-box');
                    var commentBody = $('.comment-body').first();
                    commentBody.mCustomScrollbar('destroy');
                    var $curr_item = $('.open-comment.disabled').parents('.post');
                    var $comment_btn = $curr_item.find('.open-comment');
                    var comments = $comment_btn.data('comments');
                    
                    if (comments == undefined){
                        comments = new HashTable();
                    }
                    comments.setItem(data.comment.id, data.comment);
                    $comment_btn.data('comments', comments);

                    htmlOutput = $.tmpl( $('#item-template'), data.comment ).html();
                    $('#add-more-item').before(htmlOutput);
                    commentBody.find('.comment-meta').width(commentBody.width() - 97);
                    
                    //Scroll to last post which have just been added 
                    commentBody.makeCustomScroll(false);
                    setTimeout(function() {   
                        commentBody.mCustomScrollbar("scrollTo", "bottom");
                    }, 500);      

                    //Popup advanced comment:
                    commentBox.find('.link-popup').magnificPopup({
                        type:'inline',
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'mfp-fade'
                    });
                    //Zoom image in comment:
                    commentBox.find('.comment-content img').each(function(){
                        if($(this).parent('a').length == 0){
                            var imgWrapper = $("<a class='img-wrapper'></a>");
                            imgWrapper.attr('href', $(this).attr('src'));
                            imgWrapper.attr('title', $(this).attr('alt'));
                            $(this).wrap(imgWrapper);
                        }         
                    });
                    commentBox.find('.comment-content').magnificPopup({
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
                        },
                        gallery: {
                            enabled: true
                        },
                        zoom: {
                            enabled: true,
                            duration: 300, 
                            opener: function(element) {
                                return element.find('img');
                            }
                        }
                    });        
                    
                    var comment_count = 0;
                    commentBox.find('.comment-item').each(function(){
                        comment_count++;
                    });
                    // only post detail
                    $('#post-detail-comment-number').html(comment_count);

                    that.$content.val('');
                    that.$content_advance.code('');
                    commentBox.find('.counter').html( comment_count );                
                    $comment_btn.parent().find('.number-counter').html( comment_count );
                    $comment_btn.attr('data-original-title', comment_count);
                    $curr_item.find('.post_header .post_cm d').html( comment_count );
                }

                $('.timeago').timeago();
                $(document).trigger('COMMENT_ADDED'); 
                $('.mfp-ready').trigger('click');
            }
        });
    };
    AddComment.prototype.validate = function(is_advance){
        if(is_advance) {
            if (this.$content_advance.code().length == 0 ){
                return false;
            }
        }else {
            if(this.$content.val().length == 0){
                return false;
            }
        }        
        return true;
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
        $('.comment-form').each(function(){
            new AddComment($(this));
        });
        
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
                
                if ( comments == undefined ){
                    comments = new HashTable();
                }
                var comment = comments.getItem(that.comment_id);
                if ( comment == undefined ){
                    comment = new Array();
                }

                comment.is_liked = that.isLiked;
                comment.like_count = data.like_count;
                comment.users = null;

                comments.setItem(that.comment_id, comment);

                that.$el.data('like-count', data.like_count);
                $curr_post.data('comments', comments);
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
        $('.comment-item .comment-info').each(function(){
            new LikeComment($(this));
        });

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

        if ( comments == undefined ){
            comments = new HashTable();
        }

        var comment = comments.getItem(this.$el.data('id'));

        if ( comment == undefined ){
            comment = new Array();
        }
        
        if ( comment.users == undefined ){
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

                    comment.users = users;

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
            users = comment.users;

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
        $('.comment-item .comment-info').each(function(){
            new ShowCommentUsersLiked($(this));
        });

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

// Delete a comment
(function($, document, undefined) {
    function DeleteComment( $el ){
        var that = this;

        this.$el            = $el;
        this.url            = $el.data('url-delete');
        this.comment_id     = $el.data('id');

        this.$item          = $el.parents('.comment-item');
        this.$btnDelete     = this.$item.find('.delete-comment-btn');
        
        this.attachEvents();
    }
    DeleteComment.prototype.attachEvents = function(){
        var that = this;

        this.$btnDelete.click(function(e) {
            if(that.$btnDelete.hasClass('disabled')) {
                e.preventDefault();
                return false;
            }
            bootbox.dialog({
                title: "Confirm",
                message: "Are you sure you want to delete this comment ?",             
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
                            that.submit(that.$btnDelete.find('a'));
                        }
                    }
                }
            });

            return false;
        });
    };
    DeleteComment.prototype.submit = function($button){
        var that = this;

        var promise = $.ajax({
            type: 'POST',
            url:  this.url,
            dataType: 'json'
        });

        this.triggerProgress($button, promise);

        promise.then(function(data) {
            if(data.success == 'ok'){
                var $curr_item = $('.open-comment.disabled').parents('.post');
                var $comment_btn = $curr_item.find('.open-comment');
                var comments = $comment_btn.data('comments');
                
                if ( comments != undefined ){
                    comments.removeItem(that.comment_id);
                }
                
                $comment_btn.data('comments', comments);

                that.$item.remove();

                var comment_count = 0;
                $('#comment-box').find('.comment-item').each(function(){
                    comment_count++;
                });

                // only post detail
                $('#post-detail-comment-number').html(comment_count);

                $('#comment-box').find('.counter').html( comment_count );                
                $comment_btn.parent().find('.number-counter').html( comment_count );
                $comment_btn.attr('data-original-title', comment_count);
                $curr_item.find('.post_header .post_cm d').html( comment_count );
            }
        });
    };
    DeleteComment.prototype.triggerProgress = function($el, promise){
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
        $('.comment-item .comment-info').each(function(){
            new DeleteComment($(this));
        });

        $(document).bind('SHOWN_COMMENT_LIST', function(e) {
            $('.comment-item .comment-info').each(function(){
                new DeleteComment($(this));
            });
        });

        $(document).bind('COMMENT_ADDED', function(e) {
            $('.comment-item .comment-info').each(function(){
                new DeleteComment($(this));
            });
        });
    });
}(jQuery, document));

// Edit a comment
(function($, document, undefined) {
    function EditComment( $el ){
        var that = this;

        this.$el            = $el;
        this.url            = $el.data('url-edit');
        this.comment_id     = $el.data('id');

        this.$item          = $el.parents('.comment-item');
        this.content        = this.$item.find('.comment-content');
        this.$btnEdit       = this.$item.find('.edit-comment-btn');
        
        this.attachEvents();
    }
    EditComment.prototype.attachEvents = function(){
        var that = this;

        this.$btnEdit.click(function(e) {
            $('#comment-form').addClass('edit-comment').data('url-edit', that.url);
            that.content.find('img').each(function(){
                if($(this).parent().is('a.img-wrapper')){
                    $(this).unwrap();
                }
            });            
            $('#comment-advance-popup').find('.post-advance-content').code(that.content.html());
        });
    };

    $(function(){
        $('.comment-item .comment-info').each(function(){
            new EditComment($(this));
        });

        $(document).bind('SHOWN_COMMENT_LIST', function(e) {
            $('.comment-item .comment-info').each(function(){
                new EditComment($(this));
            });
        });
    });
}(jQuery, document));
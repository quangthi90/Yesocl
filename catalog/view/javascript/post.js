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
// Comment controller generate view (html)
function CommentController(){
    'use strict';

    var that = this;

    function CommentsViewModel(){
        var self = this;

        self.comments = ko.observableArray();
        self.comment_count = 0;

        function CommentModel(_comment){
            var self = this;
            
            // Create data
            self.slug           = ko.observable( _comment.slug );
            self.is_liked       = ko.observable( _comment.is_liked );
            self.is_edit        = ko.observable( _comment.is_edit );
            self.is_del         = ko.observable( _comment.is_del );
            self.author         = ko.observable( _comment.author );
            self.user           = {
                href: _comment.user.href,
                avatar: _comment.user.avatar
            };
            self.timeago        = _comment.timeago;
            self.created        = ko.observable( _comment.created );
            self.created_full   = ko.observable( _comment.created_full );
            self.created_short  = ko.observable( _comment.created_short );
            self.comment_count  = ko.observable( _comment.comment_count );
            self.like_count     = ko.observable( _comment.like_count );
            self.content        = ko.observable( _comment.content );
            self.liker_ids      = _comment.liker_ids;

            // Event
            // Like / Unlike
            self.likeComment = function() {
                self.isUserLiked(!self.isUserLiked());

                var promise = $.ajax({
                    type: 'POST',
                    url:  window.yRouting.generate('PostLike', {
                        post_type: self.type(),
                        post_slug: self.slug()
                    }),
                    dataType: 'json'
                });

                promise.then(function(data) {
                    if(data.success == 'ok'){
                        // Like count
                        self.like_count( data.liker_ids.length );

                        // List likers ID
                        self.liker_ids = data.liker_ids;
                    }else{
                        self.isUserLiked(!self.isUserLiked());
                    }
                });
            };

            // Show list Likers
            self.showLikers = function() {
                if ( self.liker_ids.length == 0 ){
                    return false;
                }
                window.yUserController.showPopupUsers( self.liker_ids );
            };
        }

        self.setComments = function(_comments){
            self.comments([]);
            if ( _comments !== undefined ){
                self.comment_count = _comments.length;

                for ( var key in _comments ){
                    // console.log(_users[key]);
                    self.comments.push( new CommentModel(_comments[key]) );
                }
            }else{
                self.comment_count = 0;
            }
        };
    }
    var $commentTemplate = document.getElementById('comment-box');
    var commentModelView = new CommentsViewModel();
    ko.cleanNode($commentTemplate);
    ko.applyBindings(commentModelView, $commentTemplate);

    // Set list users to show popup
    this.setComments = function(_comments){
        for ( var key in _comments ){
            var user = window.yUsers.getItem(_comments[key].user_id);
            user.href = window.yRouting.generate('WallPage', {user_slug: user.slug});
            _comments[key].user = user;
        }
        commentModelView.setComments(_comments);
    };
}

function showCommentBox($button) {
    'use strict';
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
        commentBox.find('.link-popup').makePopupLink();
        commentBox.find('.comment-content img').each(function(){
            if($(this).parent('a').length === 0){
                var imgWrapper = $('<a class="img-wrapper"></a>');
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
    commentBox.stop().animate({ 'right': '2px' }, 200, function(){
        commentBox.find('textarea.post_input').focus();
    });
}
function hideCommentBox($button) {
    'use strict';
    $('#overlay').hide();
    $('.post').removeClass('post-selecting');
    $button.removeClass('disabled');
    $('#comment-box').stop().animate({'right': '-5000px' }, 500, function(){

        if($('.toggle-comment').length == 0) return;

        $('.toggle-comment').fadeIn(100);
        $('.toggle-comment').children('a').tooltip('show');
        setTimeout(function(){
            $('.toggle-comment').children('a').tooltip('hide');
        }, 3000); 
    });
    // var page = 1;
}
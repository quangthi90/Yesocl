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
            owner.name = owner.username;
            post.object = owner;
        }else{
            post.object = null;
        }

        // Category when user A post on Branch X
        if ( post.object === null && post.category_slug !== undefined ){
            var category = {
                href: window.yRouting.generate('BranchCategory', {category_slug: post.category_slug}),
                name: post.category_name
            };
            post.object = category;
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

        self.single_posts = ko.observableArray();
        for ( var key in that.aPosts ){
            self.single_posts.push( new PostModel(that.aPosts[key]) );
        }

        function PostModel(_post){
            var self = this;
            // Create data
            self.id             = ko.observable( _post.id );
            self.slug           = ko.observable( _post.slug );
            self.href           = ko.observable( _post.href );
            self.isUserLiked    = ko.observable( _post.isUserLiked );
            self.is_edit        = ko.observable( _post.is_edit );
            self.is_del         = ko.observable( _post.is_del );
            self.user           = {
                href: _post.user.href,
                username: _post.user.username,
                avatar: _post.user.avatar
            };
            // console.log(_post.object);
            if ( _post.object !== null ){
                self.object = {
                    href: _post.object.href,
                    name: _post.object.name
                };
            }else{
                self.object = null;
            }
            self.timeago        = ko.observable( _post.timeago );
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
            self.type           = ko.observable( _post.type );
            if ( _post.type == 'user' ){
                self.show_count_view = ko.observable( false );
            }else{
                self.show_count_view = ko.observable( true );
            }
            self.liker_ids      = _post.liker_ids;

            // Event
            // Like / Unlike
            self.likePost = function() {
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
                if ( self.liker_ids.length === 0 ){
                    return false;
                }
                window.yUserController.showPopupUsers( self.liker_ids );
            };

            // Show list comments
            self.showComments = function(dataModel, event) {
                if ( self.comment_count() > 0 && self.comment_list === undefined ){
                    var promise = $.ajax({
                        type: 'POST',
                        url:  window.yRouting.generate('CommentList', {
                            post_type: self.type(),
                            post_slug: self.slug()
                        }),
                        dataType: 'json'
                    });

                    promise.then(function(data) {
                        if(data.success == 'ok'){
                            self.comment_list = data.comments;
                            for ( var key in data.users ){
                                if ( window.yUsers.getItem(data.users[key].id) === null ){
                                    window.yUsers.setItem( data.users[key].id, data.users[key] );
                                }
                            }
                            self.showComments(dataModel, event);
                        }else{
                            // self.isUserLiked(!self.isUserLiked());
                        }
                    });

                    return false;
                }

                window.yCommentController.setComments( self.comment_list, self.type(), self.slug() );
                showCommentBox( $(event.currentTarget) );
            };

            self.editPost = function() {
                var form = {
                    id: self.id(),
                    title: self.title(),
                    content: self.content(),
                    image: self.image()
                };

                window.yFormController.setForm( form );
            }
        }
    }
    var $listPostTemplate = document.getElementById('js-block-content');
    ko.cleanNode($listPostTemplate);
    ko.applyBindings(new PostsViewModel(), $listPostTemplate);

    // this.add = function(_post)
    // {
    //     this.aPosts.push(_post);
    // };

    // this.update = function(key, _post){
    //     this.aPosts[key] = _post;
    // };

    // this.remove = function(key){
    //     this.aPosts.splice(key, 1);
    // };
}
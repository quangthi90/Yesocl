{% block wall_post_block_stylesheet %}
{% endblock %}
{% block wall_post_block %}    
    <div data-bind="with: WallPostList" id="wall-post-list" class="gridalicious-row wall-post-list" data-toggle="gridalicious" data-gridalicious-width="340" data-gridalicious-gutter="12" data-gridalicious-selector=".gridalicious-item">
        <!-- ko if: !isLoadSuccess()-->
        <div class="innerAll inner-2x loading text-center text-medium"><i class="fa fa-fw fa-spinner fa-spin"></i> {% trans %}Loading{% endtrans %}</div>
        <!-- /ko -->
        <div class="loaded hide2">
            <!-- ko foreach: postList -->
            <!-- Widget -->
            <div class="widget gridalicious-item not-responsive post-item">
                <!-- Info -->
                <div class="bg-white innerT innerL post-header">
                    <div class="media">
                        <a class="pull-left" data-bind="link: { title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }">
                            <img width="50" class="media-object" data-bind="attr: {src: $data.user.avatar, alt: $data.user.username}">
                        </a>
                        <div class="media-body innerTB half">                            
                            <div>
                                <a class="text-black strong" data-bind="link: { text: $data.user.username, title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }"></a>
                                <!-- ko if: !$data.isOwner -->
                                <span><i class="icon-caret-right"></i></span>
                                <a data-bind="attr: { href: $data.ownerHref, title : $data.ownerName }, text: $data.ownerName"></a>
                                <!-- /ko -->
                            </div>
                            <span data-bind="timeAgo: $data.created"></span>
                        </div>
                    </div>
                </div>
                <!-- Content -->
                <div class="innerAll post-content" data-bind="html: $data.content()">
                </div>
                <!-- Comment -->
                <div class="innerAll border-bottom border-top text-small">
                    <a><i class="icon-thumbs-up text-larger half innerR"></i>Like</a>
                    <div class="pull-right">
                        <a data-toggle="collapse" class="innerR">
                            <i class="fa fa-bars text-larger"></i> Comments <span class="text-muted">2+</span>
                        </a>
                        <span class="label label-primary half innerAll">Liked (10)</span>
                    </div>
                </div>                
                <div class="comment-list">
                    <div class="media margin-none bg-gray comment-item">
                        <a href="" class="pull-left innerAll margin-right-none"><img src="{{ asset_img('no_user_avatar.png') }}" alt="50x50" width="50px" height="50px" class="media-object avatar"></a>
                        <div class="media-body innerTB">
                            <a href="" class="strong text-inverse text-small">Adrian Demian</a>
                            <small class="text-muted display-block text-small">on Jan 15th, 2014</small>
                            <div>- Happy B-Day!</div>
                        </div>
                    </div>
                </div>
                <div class="input-group comment">
                    <input type="text" class="form-control" placeholder="{% trans %}Your comment here...{% endtrans %}">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary" href="#"><i class="fa fa-comment"></i></button>
                    </div>
                </div>
            </div>
            <!-- //End Widget -->
            <!-- /ko -->
        </div>
    </div>
{% endblock %}
{% block wall_post_block_javascript %}
{% endblock %}
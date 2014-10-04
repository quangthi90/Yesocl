{% block wall_post_block_stylesheet %}
{% endblock %}
{% block wall_post_block %}    
    <div data-bind="with: WallPostList" id="wall-post-list" class="gridalicious-row wall-post-list" data-toggle="gridalicious" data-gridalicious-width="400" data-gridalicious-gutter="12" data-gridalicious-selector=".gridalicious-item">
        <div class="post-list-container">
            <!-- ko foreach: { data: postList, afterRender: afterRender } -->
            <!-- Widget -->
            <div class="widget gridalicious-item not-responsive post-item">
                <!-- ko if: $data.isLiked() || $data.isEdit || $data.isDelete -->
                <div class="dropdown post-options">
                    <a data-toggle="dropdown" class="dropdown-toggle">
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu action-options">
                        <!-- ko if: $data.isLiked() -->
                        <li><a data-bind="click: likePost"><i class="icon-thumbs-down innerR"></i>{% trans %}Unlike{% endtrans %}</a></li>
                        <!-- /ko -->
                        <!-- ko if: $data.isEdit -->
                        <li><a><i class="icon-compose innerR"></i>{% trans %}Edit{% endtrans %}</a></li>
                        <!-- /ko -->
                        <!-- ko if: $data.isDelete -->
                        <li><a><i class="icon-delete-symbol innerR"></i>{% trans %}Delete{% endtrans %}</a></li>
                        <!-- /ko -->
                    </ul>
                </div>
                <!-- /ko -->
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
                <div class="innerAll post-content" data-bind="html: $data.content(), zoomImageInContent: true, seeMore: true">
                </div>
                <!-- Comment -->
                <div class="innerAll border-bottom border-top text-small">
                    <!-- ko if: !$data.isLiked() -->
                    <a data-bind="click: likePost"><i class="icon-thumbs-up text-larger half innerR"></i>{% trans %}Like{% endtrans %}</a>
                    <!-- /ko -->
                    <!-- ko if: $data.isLiked() -->
                    <span><i class="icon-thumbs-up-fill text-larger half innerR"></i>{% trans %}Liked{% endtrans %}</span>
                    <!-- /ko -->
                    <div class="pull-right">
                        <!-- ko if: $data.commentCount() > 3 -->
                        <a data-toggle="collapse" class="innerR">
                            {% trans %}Comments{% endtrans %} <span class="text-muted" data-bind="text: ($data.commentCount() - 3) + ' ++'"></span>
                        </a>
                        <!-- /ko -->
                        <!-- ko if: $data.likeCount() == 1 -->
                        <span class="label label-primary half innerAll"><b data-bind="text: $data.likeCount()"></b> {% trans %}Like{% endtrans %}</span>
                        <!-- /ko -->
                        <!-- ko if: $data.likeCount() > 1 -->
                        <span class="label label-primary half innerAll"><b data-bind="text: $data.likeCount()"></b> {% trans %}Likes{% endtrans %}</span>
                        <!-- /ko -->
                    </div>
                </div>                
                <div class="comment-list">
                    <!-- ko foreach: $data.comments -->
                    <div class="media margin-none bg-gray comment-item">                        
                        <a class="pull-left innerAll margin-right-none" data-bind="link: { title: $data.user.author, route: 'WallPage', params: { user_slug: $data.user.slug } }">
                            <img data-bind="attr : { 'src' : $data.user.avatar, alt : $data.user.username }" width="50px" height="50px" class="media-object avatar">
                        </a>
                        <div class="media-body innerTB">
                            <a class="strong text-inverse text-small" data-bind="link: { text: $data.user.username, title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }"></a> 
                            <small class="text-muted display-block text-small" data-bind="timeAgo: $data.created"></small>
                            <div class="comment-content text-small" data-bind="html: $data.content">
                            </div>
                        </div>
                    </div>
                    <!-- /ko -->
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
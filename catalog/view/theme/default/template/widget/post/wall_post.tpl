{% block wall_post_block_stylesheet %}
{% endblock %}
{% block wall_post_block %}    
    <div data-bind="with: WallPostList" id="wall-post-list" class="wall-post-list">
        <div class="post-list-container">
            <!-- ko foreach: { data: postList, beforeRemove: doDeleteEffect, afterAdd: doAddEffect, afterRender: afterRender } -->
            <div class="widget post-item">
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
                        <li><a data-bind="click: $parent.editPost"><i class="icon-compose innerR"></i>{% trans %}Edit{% endtrans %}</a></li>
                        <!-- /ko -->
                        <!-- ko if: $data.isDelete -->
                        <li><a data-bind="click: $parent.deletePost"><i class="icon-delete-symbol innerR"></i>{% trans %}Delete{% endtrans %}</a></li>
                        <!-- /ko -->
                    </ul>
                </div>
                <!-- /ko -->
                <!-- Info -->
                <div class="innerT innerL post-header">
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
                <div class="innerAll overflow-hidden post-content">
                    <!-- ko if: $parent.currentEditingPost() == null || $parent.currentEditingPost().id != $data.id -->
                    <div class="innerR half pull-left post-images">
                        <!-- ko if: $data.image() != '' -->
                        <div class="main-image">
                            <img class="media-object thumb" data-bind="attr: { 'src' : $data.image(), 'data-zoom' : $data.thumb() }, loadImage: true" />    
                        </div>
                        <!-- /ko -->
                        <!-- ko if: $data.images() && $data.images().length > 0 -->
                        <div class="image-items" data-bind="galleryImage: true">
                            <!-- ko foreach: $data.images() -->
                            <a class="image-item" data-bind="attr: { href : $data.large }"><img data-bind="attr: { src : $data.small }"></a>
                            <!-- /ko -->
                        </div>
                        <!-- /ko -->
                    </div>
                    <div class="display-inline post-content-details">
                        <!-- ko if: $data.title() != '' -->
                        <a data-bind="link: { title: $data.title(), route: 'PostPage', params: { post_slug: $data.slug, post_type: $data.type } }"><h4 class="heading" data-bind="text: $data.title"></h4></a>                        
                        <!-- /ko -->
                        <div data-bind="html: $data.contentDisplay, zoomImageInContent: true, seeMore: true"></div>
                    </div>
                    <!-- /ko -->
                    <!-- ko if: $parent.currentEditingPost() != null && $parent.currentEditingPost().id == $data.id -->
                    <div class="edit-post-container" data-bind="with: $parent.currentEditingPost">
                        <div class="innerAll bg-gray overflow-hidden post-content-details post-editing">
                            <div class="innerB">
                                <input type="text" data-bind="value: $data.title, valueUpdate: 'afterkeydown', hasFocus: $parents[1].hasEditFocus(), enable: !$parents[1].isProcessing(), executeOnEscape: $parents[1].cancelEdit" class="form-control" placeholder="Enter a title ..." />
                            </div>
                            <div class="innerB">
                                <div class="edit-container">
                                    <textarea class="form-control resize-ver animated" data-bind="valueUpdate: 'afterkeydown', enable: !$parents[1].isProcessing(), mention: $data.content, autoSize: $data.content, resetHeight: 35, executeOnEscape: $parents[1].cancelEdit" type="text" placeholder="{% trans %}Enter content ...{% endtrans %}"></textarea>
                                </div>
                            </div>
                            <div class="innerT pull-right">
                                <button  data-bind="click: $parents[1].submitEdit, css: { 'disabled' : !$parents[1].canSubmitEdit() }" class="btn btn-primary btn-sm">{% trans %}OK{% endtrans %}</button>
                                <button data-bind="click: $parents[1].cancelEdit, css: { 'disabled' : $parents[1].isProcessing() }" class="btn btn-default btn-sm">{% trans %}Cancel{% endtrans %}</button>
                            </div>
                        </div>
                        <div class="innerT post-images">
                            <!-- ko if: $data.image() != '' -->
                            <img class="media-object thumb" data-bind="attr: { 'src' : $data.image(), 'data-zoom' : $data.thumb() }, loadImage: true" />
                            <!-- /ko -->
                        </div>                        
                    </div>
                    <!-- /ko -->
                </div>                
                <div class="innerAll border-bottom border-top bg-gray text-small">
                    <!-- ko if: !$data.isLiked() -->
                    <a data-bind="click: likePost"><i class="icon-thumbs-up text-larger half innerR"></i>{% trans %}Like{% endtrans %}</a>
                    <!-- /ko -->
                    <!-- ko if: $data.isLiked() -->
                    <span><i class="icon-thumbs-up-fill text-larger half innerR"></i>{% trans %}Liked{% endtrans %}</span>
                    <!-- /ko -->
                    <div class="pull-right">
                        <!-- ko if: $data.commentCount() > 3 && $data.comment().canLoadMore() -->
                        <a data-bind="click: $data.comment().loadComment" class="innerR">
                            {% trans %}Comments{% endtrans %} <span class="text-muted" data-bind="text: ($data.commentCount() - 3) + ' ++'"></span>
                        </a>
                        <!-- /ko -->
                        <!-- ko if: $data.commentCount() == 1 -->
                        <span class="label label-primary half innerAll"><b data-bind="text: $data.commentCount()"></b> {% trans %}Comment{% endtrans %}</span>
                        <!-- /ko -->
                        <!-- ko if: $data.commentCount() > 1 -->
                        <span class="label label-primary half innerAll"><b data-bind="text: $data.commentCount()"></b> {% trans %}Comments{% endtrans %}</span>
                        <!-- /ko -->
                        <!-- ko if: $data.likeCount() == 1 -->
                        <span class="label label-primary half innerAll"><b data-bind="text: $data.likeCount()"></b> {% trans %}Like{% endtrans %}</span>
                        <!-- /ko -->
                        <!-- ko if: $data.likeCount() > 1 -->
                        <span class="label label-primary half innerAll"><b data-bind="text: $data.likeCount()"></b> {% trans %}Likes{% endtrans %}</span>
                        <!-- /ko -->
                    </div>
                </div>
                <!-- Comment --> 
                <div data-bind="with: $data.comment">
                    <div class="comment-list">
                    <!-- ko foreach: commentList -->
                        <div class="media margin-none bg-white border-bottom comment-item">
                            <a class="pull-left innerAll margin-right-none" data-bind="link: { title: $data.user.author, route: 'WallPage', params: { user_slug: $data.user.slug } }">
                                <img data-bind="attr : { 'src' : $data.user.avatar, alt : $data.user.username }" width="50px" height="50px" class="media-object avatar">
                            </a>
                            <div class="media-body innerTB">
                                <a class="strong text-inverse text-small" data-bind="link: { text: $data.user.username, title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }"></a> 
                                <small class="text-muted text-small" data-bind="timeAgo: $data.created"></small>
                                <!-- ko if: $parent.currentEditComment() == null || $parent.currentEditComment().id != $data.id -->
                                <div class="text-small wraptext innerB innerR half comment-content" data-bind="html: $data.contentDisplay, zoomImageInContent: true, seeMore: true">
                                </div>
                                <!-- /ko -->
                                <!-- ko ifnot: $parent.currentEditComment() == null || $parent.currentEditComment().id != $data.id -->
                                <div class="innerAll padding-left-none" data-bind="with: $parent.currentEditComment">
                                    <div class="edit-container">
                                        <textarea class="form-control text-input resize-ver animated" data-bind="valueUpdate: 'afterkeydown', enable: !$parents[1].isProcessing(), hasFocus: $parents[1].hasEditFocus(), mention: $data.content, autoSize: $data.content, resetHeight: 35, executeOnEscape: $parents[1].cancelEdit" type="text" placeholder="{% trans %}Your comment here...{% endtrans %}"></textarea>
                                    </div>                                    
                                    <div class="innerT pull-right">
                                        <button  data-bind="click: $parents[1].submitEdit, css: { 'disabled' : !$parents[1].canSubmitEdit() }" class="btn btn-primary btn-sm">{% trans %}OK{% endtrans %}</button>
                                        <button data-bind="click: $parents[1].cancelEdit, css: { 'disabled' : $parents[1].isProcessing() }" class="btn btn-default btn-sm">{% trans %}Cancel{% endtrans %}</button>
                                    </div>
                                </div>
                                <!-- /ko -->
                                <!-- ko if: !$data.isLiked() -->
                                <a data-bind="click: $parent.like" class="text-small"><i class="icon-thumbs-up half innerR"></i>{% trans %}Like{% endtrans %}</a>
                                <!-- /ko -->
                                <!-- ko if: $data.isLiked() -->
                                <span class="text-small"><i class="icon-thumbs-up-fill half innerR"></i>{% trans %}Liked{% endtrans %}</span>
                                <!-- /ko -->
                            </div>
                            <!-- ko if: $data.isLiked() || $data.canEdit || $data.canDelete -->
                            <div class="dropdown post-options">
                                <a data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu action-options">
                                    <!-- ko if: $data.isLiked() -->
                                    <li><a data-bind="click: $parent.like"><i class="icon-thumbs-down innerR"></i>{% trans %}Unlike{% endtrans %}</a></li>
                                    <!-- /ko -->
                                    <!-- ko if: $data.canEdit -->
                                    <li><a  data-bind="click: $parent.edit"><i class="icon-compose innerR"></i>{% trans %}Edit{% endtrans %}</a></li>
                                    <!-- /ko -->
                                    <!-- ko if: $data.canDelete -->
                                    <li><a data-bind="click: $parent.delete"><i class="icon-delete-symbol innerR"></i>{% trans %}Delete{% endtrans %}</a></li>
                                    <!-- /ko -->
                                </ul>
                            </div>
                            <!-- /ko -->
                        </div>
                    <!-- /ko -->
                    </div>
                    <div class="comment" data-bind="with: $data.newComment">
                        <textarea rows="1" class="form-control text-input resize-ver animated" data-bind="valueUpdate: 'afterkeydown', enable: !$parent.isProcessing(), executeOnEnter: $parent.add, shiftKeyRequired: true, mention: content, autoSize: content, resetHeight: 28" type="text" placeholder="{% trans %}Your comment here...{% endtrans %}"></textarea>
                    </div>
                </div>
            </div>
            <!-- /ko -->
        </div>
    </div>
{% endblock %}
{% block wall_post_block_javascript %}
{% endblock %}
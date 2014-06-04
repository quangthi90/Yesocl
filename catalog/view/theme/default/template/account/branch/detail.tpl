{% extends '@template/default/template/common/layout.tpl' %}
{% use '@template/default/template/common/ko_template_block.tpl' %}

{% block title %}{{ branch.name }}|{% trans %}Branch Detail Page{% endtrans %}{% endblock %}

{% block stylesheet %}
{{ block('common_ko_template_style') }}
{% endblock %}

{% block body %}
    <div id="y-content">
        <div id="y-main-content" class="has-horizontal stock-page" style="min-width: inherit; display: inline-block;">
            {% set news_title = 'Post'|trans %}
            {% set news_href = '#' %}
            <div class="feed-block stock-block" data-bind="attr: { 'id' : $root.newsModel.id }, with: $root.newsModel">
                {% if news_title != '' %}
                <div class="block-header">
                    <h3 class="block-title"><a href="{{ news_href }}">{{ news_title }} <i class="icon-caret-right"></i></a></h3>
                </div>
                {% endif %}
                <div class="block-content">
                    <!-- ko if: hasNewPost() -->
                    <div class="news-creating-container fl branch-info" style="opacity: 0;">
                        <div class="branch-overview">
                            <img class="branch-logo" src="{{ branch.logo }}">
                            <h3 class="branch-name">{{ branch.name }}</h3>
                        </div>
                        <div class="branch-tool">
                            <a href="#" class="branch-function" data-bind="click: openAdvancePost">
                                <i class="icon-pencil"></i>
                                <span>{% trans %}New post{% endtrans %}</span>
                            </a>
                            <a href="#" style="width: 30%;" class="branch-function" data-bind="click: showBranchMembers">
                                <i class="icon-group"></i>
                                <span>{% trans %}Members{% endtrans %} ({{ branch.member_count }})</span>
                            </a>
                            {#% set isMember = true %}
                            {% if isMember == true %#}
                            <a href="{{ path('BranchList') }}" class="branch-function">
                                <i class="icon-signout"></i>
                                <span>{% trans %}Leave branch{% endtrans %}</span>
                            </a>
                            {#% else %}
                            <a href="#" class="branch-function">
                                <i class="icon-signin"></i>
                                <span>{% trans %}Join branch{% endtrans %}</span>
                            </a>
                            {% endif %#}
                        </div>
                    </div>
                    <div class="mfp-hide y-dlg-container form-advance" data-focus-type="input[type='text']" id="news-advance-post">
                        <div class="y-dlg">
                            <div class="dlg-title">
                                <i class="icon-yes"></i>
                                <span>{% trans %}New post{% endtrans %}</span>
                                <a title="Close" style="display: inline-block; float: right; margin-right: 10px;" data-bind="click: closeAdvancePost">X</a>
                            </div>
                            <div class="dlg-content">
                                <div class="dlg-column upload-container fl" style="width:28%;">
                                    <label class="control-label">{% trans %}Choose an image for new post{% endtrans %}</label>
                                    <input type="hidden" name="img-url" class="img-url" value="" />
                                    <div class="img-previewer-container" placeholder="{% trans %}Drag an image here{% endtrans %}">
                                        <p class="drop-zone-show">{% trans %}Drag an image here{% endtrans %}</p>
                                    </div>
                                    <div class="y-progress">
                                        <div class="bar" style="width: 0%;"></div>
                                    </div>
                                    <div class="drag-img-upload">
                                        <a class="btn btn-yes" onclick="$('#img-upload-adv').click() ; return false;">
                                            <span><i class="icon-upload"></i> {% trans %}Choose image{% endtrans %}</span>
                                        </a>
                                        <input type="file" data-no-uniform="true" id="img-upload-adv" class="img-upload" title="Choose image to upload" name="files[]" data-url="{{ path('UploadFile') }}" />
                                    </div>
                                </div>
                                <div class="dlg-column fr" style="width:68%;">
                                    <div class="alert alert-error top-warning hidden">{% trans %}Warning{% endtrans %}!!</div>
                                    <div class="control-group">
                                        <label for="title" class="control-label">{% trans %}Title{% endtrans %}</label>
                                        <div class="controls">
                                            <input placeholder="Your title" type="text" name="title" class="post-title-input" style="width: 98%;" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="title" class="control-label">{% trans %}Stock tag{% endtrans %}</label>
                                        <div class="controls">
                                            <input type="hidden" multiple class="autocomplete-tag-input" data-bind="autoCompleteTag: true" style="width: 100%;"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{% trans %}Content{% endtrans %}</label>
                                        <div class="y-editor" id="post-adv-editor" data-height="200" ></div>
                                    </div>
                                </div>
                            </div>
                            <div class="dlg-footer">
                                <div class="controls">
                                    <a class="btn btn-yes" data-bind="click: saveAdvancePost">{% trans %}Submit{% endtrans %}</a>
                                    <a class="btn btn-yes" data-bind="click: resetAdvancePost">{% trans %}Reset{% endtrans %}</a>
                                    <a class="btn btn-yes" data-bind="click: closeAdvancePost">{% trans %}Close{% endtrans %}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /ko -->
                    <!-- ko if: newsList().length > 0 -->
                    <div class="news-container" data-bind="foreach: newsList">
                        <div class="feed post post_status news-item">
                            <!-- ko if: $data.isLiked() || $data.isEdit || $data.isDelete -->
                            <div class="yes-dropdown">
                                <div class="dropdown">
                                   <a class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-caret-down"></i>
                                   </a>
                                   <ul class="dropdown-menu">
                                        <!-- ko if: $data.isLiked() -->
                                        <li class="unlike-post">
                                            <a data-bind="click: $data.likePost" title="{% trans %}Like{% endtrans %}"><i class="icon-thumbs-down medium-icon"></i> {% trans %}Unlike{% endtrans %}</a>
                                        </li>
                                        <!-- /ko -->
                                        <!-- ko if: $data.isEdit -->
                                        <li class="post-edit-btn">
                                            <a data-bind="click: $parent.startEditPost" title="Edit" class="link-popup"><i class="icon-edit"></i>{% trans %}Edit{% endtrans %}</a>
                                        </li>
                                        <!-- /ko -->
                                        <!-- ko if: $data.isDelete -->
                                        <li class="post-delete-btn">
                                            <a data-bind="click: $parent.deletePost" title="Delete"><i class="icon-trash"></i>{% trans %}Delete{% endtrans %}</a>
                                        </li>
                                        <!-- /ko -->
                                    </ul>
                                </div>
                            </div>
                            <!-- /ko -->
                            <div class="post_header">
                                <div class="avatar_thumb">
                                    <a data-bind="link: { title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }">
                                        <img class="news-owner-img" data-bind="attr: {src: $data.user.avatar, alt: $data.user.username}">
                                    </a>
                                </div>
                                <div class="post_meta_info">
                                    <div class="post_user">
                                        <a class="news-owner" data-bind="link: { text: $data.user.username, title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }"></a>
                                        <!-- ko if: !$data.isOwner -->
                                            <span><i class="icon-caret-right"></i></span>
                                            <a data-bind="attr: { href: $data.owner.href, title : $data.owner.username }, text: $data.owner.username"></a>
                                        <!-- /ko -->
                                    </div>
                                    <div class="post_meta">
                                        <span class="news-time post_time fl" data-bind="timeAgo: $data.created"></span>
                                        <span class="post_like fr">
                                            <!-- ko if: !$data.isLiked() -->
                                            <a style="cursor: pointer;" data-bind="click: $data.likePost" title="{% trans %}Like{% endtrans %}">
                                                <i class="icon-thumbs-up"></i>
                                            </a>
                                            <!-- /ko -->
                                            <!-- ko if: $data.isLiked() -->
                                            <span>{% trans %}Liked{% endtrans %}</span>
                                            <!-- /ko -->
                                            <a data-bind="click: showLikers" title="{% trans %}See users liked{% endtrans %}">
                                                <d class="counter" data-bind="text: $data.likeCount"></d>
                                            </a>
                                        </span>
                                        <span class="post_cm fr">
                                            <a data-bind="click: showComment" title="{% trans %}Comment{% endtrans %}">
                                                <i class="icon-comments"></i>
                                            </a>
                                            <d class="counter" data-bind="text: $data.commentCount"></d>
                                        </span>
                                        <span class="post_view fr">
                                            <i class="icon-eye-open"></i>
                                        <d class="counter" data-bind="text: $data.countViewer"></d>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="post_body">
                                <!-- ko if: $data.title -->
                                <h4 class="post_title"><a data-bind="link: { text: $data.title(), title: $data.title(), route: 'PostPage', params: { post_type : $data.type, post_slug: $data.slug } }"></a></h4>
                                <!-- /ko -->
                                <!-- ko if: $data.image -->
                                <div class="post_image">
                                    <a class="news-link" data-bind="zoomInitImage: $data.thumb">
                                        <img class="news-img" data-bind="attr: { src : $data.image(), alt : $data.title() } ">
                                    </a>
                                </div>
                                <!-- /ko -->
                                <div class="news-short-content" data-bind="html: $data.content()"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ko if: canLoadMore() -->
                    <div class="load-more-wrapper" style="position: absolute; right: 0px; top: 0px; bottom: 0px; width: 10px;">
                        <!-- ko if: !isLoadingMore() -->
                        <a title="Load more ..." data-bind="click: loadMore" class="btn-load-more" style="display: block; height: 100%;">
                            <i class="icon-chevron-right"></i>
                        </a>
                        <!-- /ko -->
                    </div>
                    <!-- /ko -->
                    <!-- /ko -->
                    <!-- ko if: isLoadSuccess() && newsList().length == 0 -->
                    <div class="news-container" style="width: 200px;">
                        <p>No data to display !</p>
                    </div>
                    <!-- /ko -->
                    <!-- ko if: !isLoadSuccess() -->
                    <div class="loading-background">
                        Loading data ...
                    </div>
                    <!-- /ko -->
                </div>
            </div>
            {{ block('common_ko_template_comment') }}
            {{ block('common_ko_template_user_box') }}
        </div>
    </div>
{% endblock %}

{% block template %}
{% endblock %}

{% block datascript %}
    <script type="text/javascript" src="{{ asset_js('libs/upload/jquery.ui.widget.js') }}"></script>
    <script type="text/javascript" src="{{ asset_js('libs/upload/jquery.load-image.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset_js('libs/upload/jquery.canvas-to-blob.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset_js('libs/upload/jquery.iframe-transport.js') }}"></script>
    <script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload.js') }}"></script>
    <script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload-process.js') }}"></script>
    <script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload-image.js') }}"></script>
    <script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload-validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset_js('libs/upload/upload-app.js') }}"></script>

    <script type="text/javascript" src="{{ asset_js('branch.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var currUser = JSON.parse('{{ current_user|json_encode()|raw }}');
            var postType = '{{ post_type }}';
            var postOptions = {
                Id : "branch-detail",
                canLoadMore: true,
                hasNewPost: true,
                validate: function(postData){
                    var validationMsgs = [];
                    //Validate here, return a collection of error if any
                    if(postData.content.length === 0) {
                        validationMsgs.push("Content is required");
                    }else {
                        var content = postData.content.replace(new RegExp("&nbsp;", 'g'), "");
                        content = content.replace(new RegExp("<br>", 'g'), "");
                        var temp = $("<div></div>");
                        temp.html(content);
                        if(temp.html().trim().length === 0){
                            validationMsgs.push("Content is required");
                        }
                    }
                    return validationMsgs;
                },
                urls : {
                    loadNews : { name: "ApiGetLastBranchNews",  params: { branch_slug : '{{ branch_slug }}' } },
                    postNews : { name: "ApiPostPost", params: { slug : currUser.slug, post_type: postType } },
                    updateNews : { name: "ApiPutPost", params: { post_type : postType } }
                }
            };
            var commentBoxOptions = {
                Id : "comment-box"
            };
            var userBoxOptions = {
            };

            var viewModel = {
                newsModel : new NewsViewModel(postOptions),
                commentBoxModel : new CommentBoxViewModel(commentBoxOptions),
                userBoxModel : new UserBoxViewModel(userBoxOptions),
            };
            ko.applyBindings(viewModel, document.getElementById('y-main-content'));
        });
    </script>
{% endblock %}

{% block javascript %}
{% endblock %}
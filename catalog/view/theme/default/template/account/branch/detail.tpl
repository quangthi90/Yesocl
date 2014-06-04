{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}{{ branch.name }}|{% trans %}Branch Detail Page{% endtrans %}{% endblock %}

{% block stylesheet %}
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
                    <div class="news-creating-container fl" style="opacity: 0;">
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
            var postOptions = {
                Id : "branch-detail",
                canLoadMore: true,
                hasNewPost: true,
                validate: function(postData){
                },
                urls : {
                    loadNews : { name: "ApiGetLastBranchNews",  params: { branch_slug : '{{ branch_slug }}' } },
                }
            };

            var viewModel = {
                newsModel : new NewsViewModel(postOptions),
            };
            ko.applyBindings(viewModel, document.getElementById('y-main-content'));
        });
    </script>
{% endblock %}

{% block javascript %}
{% endblock %}
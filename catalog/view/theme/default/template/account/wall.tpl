{% extends '@template/default/template/layout/basic/master.tpl' %}

{% use '@template/default/template/widget/post/wall_post.tpl' %}

{% use '@template/default/template/widget/account/userblock.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %}
    {{ block('wall_post_block_stylesheet') }}
{% endblock %}
{% block body %}
    <div class="innerAll">
        <div class="row">
            <div class="col-lg-9 col-md-8">
            {{ block('timeline_cover') }}
            {{ block('wall_post_block') }}
            </div>
            <!-- WIDGET -->
            <div class="col-md-4 col-lg-3">
            {{ include(template_from_string( user )) }}
            {% block widget_recent_news %}
                <div class="widget">
                    <h5 class="innerAll margin-none border-bottom bg-gray">Recent News</h5>
                    <div class="widget-body padding-none">
                        <div class="media border-bottom innerAll margin-none">
                            <img src="{{ asset_img('no_user_avatar.png') }}" height="50px" width="50px" class="pull-left media-object"/>
                            <div class="media-body">
                                <a href="" class="pull-right text-muted innerT half">
                                    <i class="fa fa-comments"></i> 4
                                </a>
                                <h5 class="margin-none"><a href="" class="text-inverse">Social Admin Released</a></h5>
                                <small>on February 2nd, 2014 </small>
                            </div>
                        </div>
                        <div class="media border-bottom innerAll margin-none">
                            <img src="{{ asset_img('no_user_avatar.png') }}" height="50px" width="50px" class="pull-left media-object"/>
                            <div class="media-body">
                                <a href="" class="pull-right text-muted innerT half">
                                    <i class="fa fa-comments"></i> 4
                                </a>
                                <h5 class="margin-none"><a href="" class="text-inverse">Timeline Cover Page</a></h5>
                                <small>on February 2nd, 2014 </small>
                            </div>
                        </div>
                    </div>
                </div>
            {% endblock %}
            </div>
            <!-- END WIDGET -->
        </div>
    </div>
{% endblock %}
{% block library_javascript %}
{% endblock %}
{% block common_javascript %}
{% endblock %}
{% block javascript %}
    {{ block('wall_post_block_javascript') }}
    <script type="text/javascript">
        (function($, ko,  Y, undefined) {
                Y.GlobalKoModel = Y.GlobalKoModel || {};
                var wallPostOptions = {
                    apiUrls : {
                        loadPost: {
                            name: "ApiGetUserPost", 
                            params: { user_slug : Y.CurrentUser.slug }
                        }
                    }
                };
                var oWallPost = new Y.Widgets.PostList(wallPostOptions, $("#wall-post-list"));
                Y.GlobalKoModel.WallPostList = oWallPost;

                //Apply Knockout
                ko.applyBindings(Y.GlobalKoModel);
        }(jQuery, ko, YesGlobal));
    </script>
{% endblock %}
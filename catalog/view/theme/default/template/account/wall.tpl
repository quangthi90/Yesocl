{% extends '@template/default/template/layout/basic/master.tpl' %}

{% use '@template/default/template/widget/post/wall_post.tpl' %}

{% use '@template/default/template/widget/account/user_block.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %}
    {{ block('wall_post_block_stylesheet') }}
{% endblock %}
{% block body %}
    <div class="innerAll">
        <div class="row">
            <div class="col-lg-9 col-md-8">
            {{ block('user_cover') }}
            {{ block('wall_post_block') }}
            </div>
            <!-- WIDGET -->
            <div class="col-md-4 col-lg-3">
            {{ block('widget_recent_news') }}
            </div>
            <!-- END WIDGET -->
        </div>
    </div>
{% endblock %}
{% block library_javascript %}
{% endblock %}
{% block common_javascript %}
<script src="{{ asset_js('models/post-models.js') }}"></script>
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
                            params: { user_slug : "{{ current_user.slug }}" }
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

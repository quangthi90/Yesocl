{% extends '@template/default/template/layout/basic/master.tpl' %}

{% use '@template/default/template/widget/post/wall_post.tpl' %}
{% use '@template/default/template/widget/post/recent_news.tpl' %}
{% use '@template/default/template/widget/post/new_post.tpl' %}
{% use '@template/default/template/widget/account/user_block.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %}
    {{ block('wall_post_block_stylesheet') }}
{% endblock %}
{% block body %}
    <div class="innerAll">
        <div class="row">
            <div class="col-lg-9 col-md-8">
            {{ block('timeline_cover') }}
            {{ block('new_post_block') }}
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
<script src="{{ asset_js('library/dropzone/dropzone.min.js') }}"></script>
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
                        },
                        savePost : { 
                            name: "ApiPutPost", 
                            params: {}
                        }
                    }
                };
                var oWallPost = new Y.Widgets.PostList(wallPostOptions, $("#wall-post-list"));
                Y.GlobalKoModel.WallPostList = oWallPost;

                var newPostOptions = {
                    apiUrl : {
                        name: "ApiPostPost", 
                        params: { slug : "{{ current_user.slug }}", post_type: '{{ post_type }}' }
                    },
                    targetPostList: oWallPost.uniqueName,
                    uploader: $("#dropzone-wall")
                };
                var newPost = new Y.Widgets.PostNew(newPostOptions, $("#new-post-widget"));
                Y.GlobalKoModel.NewPost = newPost;

                //Apply Knockout
                ko.applyBindings(Y.GlobalKoModel);
        }(jQuery, ko, YesGlobal));
    </script>
{% endblock %}

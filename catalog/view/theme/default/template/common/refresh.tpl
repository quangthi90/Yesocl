{% extends '@template/default/template/layout/basic/master.tpl' %}

{% use '@template/default/template/widget/post/recent_news.tpl' %}
{% use '@template/default/template/widget/post/post_list.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block body %}
    <div class="innerAll">
        <div class="row">
            <div class="col-lg-9 col-md-8">
            {{ block('post_list_block') }}
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
    {{ block('post_list_block_javascript') }}
    <script type="text/javascript">
        (function($, ko,  Y, undefined) {
                Y.GlobalKoModel = Y.GlobalKoModel || {};
                var postOptions = {
                    apiUrls : {
                        loadPost: {
                            name: "ApiGetLastestPost",  params: {}
                        },
                        savePost : { 
                            name: "ApiPutPost", params: {}
                        }
                    }
                };
                var oPostList = new Y.Widgets.PostList(postOptions, $("#post-list"));
                Y.GlobalKoModel.PostList = oPostList;

                //Apply Knockout
                ko.applyBindings(Y.GlobalKoModel);
        }(jQuery, ko, YesGlobal));
    </script>
{% endblock %}

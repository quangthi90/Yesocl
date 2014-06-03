{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/ko_post_item_wall.tpl' %}
{% use '@template/default/template/post/common/ko_post_status_branch.tpl' %}

{% block title %}{{ branch.name }}|{% trans %}Branch Detail Page{% endtrans %}{% endblock %}

{% block stylesheet %}
<style type="text/css">
    .block-content .post-item.adding {
        background-color: #DAFFD4;
        opacity: 0.8;
    }
</style>
{% endblock %}

{% block body %}
    <div id="y-content">
        <div id="y-main-content" class="has-horizontal post-per-column" style="width: 9999px;">
            <div id="branch-news" class="feed-block block-post-new" data-bind="with: $root.newsModel">
                <div class="block-header">
                    <a class="block-title fl" href="#">
                        {% trans %}Post{% endtrans %}
                    </a>
                    <a class="block-seemore fl" href="#">
                        <i class="icon-angle-right"></i>
                    </a>
                </div>
                <div class="block-content">
                    {{ block('post_common_ko_post_status_branch') }}
                    {{ block('post_common_ko_post_item_wall') }}
                </div>
            </div>
        </div>
    </div>
{% endblock %}

{% block template %}
{% endblock %}

{% block datascript %}
    <script type="text/javascript" src="{{ asset_js('branch.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var newsOptions = {
                Id : "branch-news",
                canLoadMore: true,
                //hasNewPost: false,
                validate: function(postData) {
                    //Validate here, return a collection of error if any
                    return [];
                },
                urls : {
                    loadNews : { name: "ApiGetLastBranchNews",  params: { branch_slug : "{{ branch_slug }}" } }
                }
            };
            var commentBoxOptions = {
            };
            var userBoxOptions = {
            };

            var viewModel = {
                newsModel : new NewsViewModel(newsOptions),
            };
            ko.applyBindings(viewModel, document.getElementById('y-main-content'));
        });
    </script>
{% endblock %}

{% block javascript %}
{% endblock %}
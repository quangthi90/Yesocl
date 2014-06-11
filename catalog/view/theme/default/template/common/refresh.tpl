{% extends '@template/default/template/common/layout.tpl' %}
{% use '@template/default/template/stock/common/news_item.tpl' %}
{% use '@template/default/template/stock/common/news_item_add_edit.tpl' %}
{% use '@template/default/template/common/ko_template_block.tpl' %}

{% block title %}{% trans %}What's new{% endtrans %}{% endblock %}

{% block stylesheet %}
{{ block('common_ko_template_style') }}
{% endblock %}

{% block body %}
{% if news_title is not defined %}
{% set news_title = 'News'|trans %}
{% endif %}
{% if news_href is not defined %}
{% set news_href = path('StockNewsPage') %}
{% endif %}

<div id="y-content">
    <div id="y-main-content" class="has-horizontal stock-page" style="min-width: inherit; display: inline-block;">
        <div class="feed-block stock-block" data-bind="attr: { 'id' : $root.newsModel.id }, with: $root.newsModel">
            {% if news_title != '' %}
            <div class="block-header">
                <h3 class="block-title"><a href="{{ news_href }}">{{ news_title }} <i class="icon-caret-right"></i></a></h3>
            </div>
            {% endif %}
            <div class="block-content">
                <!-- ko if: newsList().length > 0 -->
                <div class="news-container" data-bind="foreach: newsList">
                    {{ block('stock_common_news_item') }}
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

{% block javascript %}
{{ block('common_news_item_add_edit_javascript') }}
<script type="text/javascript" src="{{ asset_js('ko-vms.js') }}"></script>
<script type="text/javascript">
        $(document).ready(function() {
            var postOptions = {
                Id : "whats-new",
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
                    postNews : { name: "ApiPostPost", params: { post_type: '{{ post_type }}', slug: '{{ branch_slug }}' } },
                    updateNews : { name: "ApiPutPost", params: { post_type : '{{ post_type }}',slug: '{{ branch_slug }}' } }
                }
            };
            var commentBoxOptions = {
                Id : "comment-box"
            };
            var userBoxOptions = {
                defaultTitle: '{% trans %}Who liked{% endtrans %}',
            };

            var viewModel = {
                newsModel : new NewsViewModel(postOptions),
                commentBoxModel : new CommentBoxViewModel(commentBoxOptions),
                userBoxModel : new UserBoxViewModel(userBoxOptions),
            };
            ko.applyBindings(viewModel, document.getElementById('y-content'));
        });
</script>
{% endblock %}
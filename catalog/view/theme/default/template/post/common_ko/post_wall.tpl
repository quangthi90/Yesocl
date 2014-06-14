{% use '@template/default/template/post/common_ko/post_item.tpl' %}
{% use '@template/default/template/post/common_ko/post_item_add_edit.tpl' %}

{% block post_common_ko_block_post_wall %}
<div class="feed-block stock-block block-tabable" data-bind="attr: { 'id' : $root.newsModel.id }, with: $root.newsModel">
    <div class="block-header">
        <ul class="block-tabs">
            <li class="block-tab-item active">
                <a href="#">{% trans %}Overview{% endtrans %}</a>
            </li>
            <li class="block-tab-item">
                <a href="{{ path('StatisticsPage', {user_slug: current_user.slug}) }}">{% trans %}Statistics{% endtrans %}</a>
            </li>
        </ul>
    </div>
    <div class="block-content">
        <!-- ko if: hasNewPost() -->
        <div class="news-creating-container fl" style="opacity: 0;">
            {{ block('post_common_ko_post_item_add_edit') }}
        </div>
        <!-- /ko -->
        <!-- ko if: newsList().length > 0 -->
        <div class="news-container" data-bind="foreach: newsList">
            {{ block('post_common_ko_post_item') }}
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
{% endblock %}
{% block post_common_ko_block_post_wall_javascript %}
    {{ block('post_common_ko_post_item_add_edit_javascript') }}
{% endblock %}
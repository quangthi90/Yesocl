{% use '@template/default/template/stock/common/news_item.tpl' %}
{% use '@template/default/template/stock/common/news_item_add_edit.tpl' %}

{% block stock_common_block_news %}
{% if news_title is not defined %}
    {% set news_title = 'News'|trans %}
{% endif %}
{% if news_href is not defined %}
    {% set news_href = path('StockNewsPage') %}
{% endif %}

<div class="feed-block stock-block" data-bind="attr: { 'id' : $root.newsModel.id }, with: $root.newsModel">
    {% if news_title != '' %}
    <div class="block-header">
        <h3 class="block-title"><a href="{{ news_href }}">{{ news_title }} <i class="icon-caret-right"></i></a></h3>
    </div>
    {% endif %}
    <div class="block-content">
        <!-- ko if: hasNewPost() -->
        <div class="news-creating-container fl" style="opacity: 0;">
            {{ block('common_news_item_add_edit') }}
        </div>
        <!-- /ko -->
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
{% endblock %}
{% block stock_common_block_news_javascript %}
    {{ block('common_news_item_add_edit_javascript') }}
{% endblock %}
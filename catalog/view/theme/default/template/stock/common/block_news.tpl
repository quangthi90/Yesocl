{% use '@template/default/template/stock/common/news_item.tpl' %}

{% block stock_common_block_news %}
<div class="feed-block stock-block" data-bind="with: $root.newsModel">
    <div class="block-header">
        <h3 class="block-title">News <i class="icon-caret-right"></i></h3>
    </div>
    <div class="block-content">
        <div class="news-container" data-bind="foreach: newsList">
			{{ block('stock_common_news_item') }}		
		</div>
        <div class="clear"></div>
    </div>
</div>
{% endblock %}
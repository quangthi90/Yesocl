{% use '@template/default/template/stock/common/news_item.tpl' %}

{% block stock_common_block_news %}
<div class="feed-block stock-block">
    <div class="block-header">
        <h3 class="block-title">News <i class="icon-caret-right"></i></h3>
    </div>
    <div class="block-content">
        <div class="news-container">
			{% for i in 0..4 %}
				{{ block('stock_common_news_item') }}
			{% endfor %}
			<div class="clear"></div>
		</div>
    </div>
</div>
{% endblock %}
{% use '@template/default/template/stock/common/news_item.tpl' %}

{% block stock_common_block_ideas %}
<div class="feed-block stock-block">
    <div class="block-header">
        <h3 class="block-title">News <i class="icon-caret-right"></i></h3>
    </div>
    <div class="block-content">
        <div class="news-container">
			<div class="news-column">				
				{{ block('stock_common_news_item') }}
				{{ block('stock_common_news_item') }}
			</div>
			<div class="news-column">
				{{ block('stock_common_news_item') }}
				{{ block('stock_common_news_item') }}
			</div>
			<div class="news-column">
				{{ block('stock_common_news_item') }}
				{{ block('stock_common_news_item') }}
			</div>
			<div class="clear"></div>
		</div>
    </div>
</div>
{% endblock %}
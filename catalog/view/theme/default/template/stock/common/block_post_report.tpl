{% use '@template/default/template/stock/common/report_post.tpl' %}

{% block stock_common_block_post_report %}
<div class="feed-block stock-block">
    <div class="block-header">
        <h3 class="block-title">Post Report <i class="icon-caret-right"></i></h3>
    </div>
    <div class="block-content">
        <div class="news-container">
			{% for i in 0..4 %}
				{{ block('stock_common_report_post') }}
			{% endfor %}
			<div class="clear"></div>
		</div>
    </div>
</div>
{% endblock %}
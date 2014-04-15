{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/stock/common/block_market_chart.tpl' %}
{% use '@template/default/template/stock/common/block_watch_list.tpl' %}
{% use '@template/default/template/stock/common/block_news.tpl' %}
{% use '@template/default/template/stock/common/block_ideas.tpl' %}
{% use '@template/default/template/stock/common/block_post_report.tpl' %}

{% block title %}{% trans %} Market - Stock page {% endtrans %}{% endblock %}

{% block stylesheet %}    
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal stock-page">
        {{ block('stock_common_block_market_chart') }}
        {{ block('stock_common_block_watch_list') }}
        {{ block('stock_common_block_news') }}    
        {{ block('stock_common_block_ideas') }}
        {{ block('stock_common_block_post_report') }}
    </div>
</div>
{% endblock %}

{% block javascript %}
	<script type="text/javascript">
		var _markets = '{{ markets|json_encode()|raw }}';
		window.yMarkets = JSON.parse(_markets);
		var _stock = '{{ stock|json_encode()|raw }}';
		window.yStock = JSON.parse(_stock);
		window.yCurrMarketId = '{{ curr_market_id }}'
	</script>
	{{ block('stock_common_block_watch_list_javascript') }}
	<script type="text/javascript" src="{{ asset_js('market.js') }}"></script>

{% endblock %}
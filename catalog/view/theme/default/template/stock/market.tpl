{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/common/ko_template_block.tpl' %}
{% use '@template/default/template/stock/common/block_market_chart.tpl' %}
{% use '@template/default/template/stock/common/block_watch_list.tpl' %}
{% use '@template/default/template/stock/common/block_news.tpl' %}
{% use '@template/default/template/stock/common/block_ideas.tpl' %}
{% use '@template/default/template/stock/common/block_post_report.tpl' %}

{% block title %}{% trans %} Market - Stock page {% endtrans %}{% endblock %}
{% block stylesheet %}    
{{ block('common_ko_template_style') }}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal stock-page">
        {{ block('stock_common_block_market_chart') }}
        {{ block('stock_common_block_watch_list') }}
        {{ block('stock_common_block_news') }}
        {% set ideas_href = path('StockIdeaPage', {stock_code: stock.code}) %}
        {{ block('stock_common_block_ideas') }}
        {{ block('common_ko_template_comment') }}
        {{ block('common_ko_template_user_box') }}
    </div>
</div>
{% endblock %}

{% block javascript %}
	<script type="text/javascript" src="{{ asset_js('libs/highstock/highstock.js') }}"></script>	
	<script type="text/javascript" src="{{ asset_js('market.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			// Market list
			var _markets = '{{ markets|json_encode()|raw }}';
			var marketsInfo = JSON.parse(_markets);
			// Stock info of current Market
			var _stock = '{{ stock|json_encode()|raw }}';
			var stockInfo = JSON.parse(_stock);
			
			// Stock Watch list of current User
			var _watchList = '{{ watch_list|json_encode()|raw }}';

			//Add options to view model:
			var chartOptions = {
				markets :  marketsInfo,
				currMarketId : '{{ curr_market_id }}',
				stock : stockInfo
			};
			var watchListOptions = {
				Id : "st-watch-list",
				watchList : JSON.parse(_watchList)
			};
			var newsOptions = {
				Id : "stock-news",
                canLoadMore: false,
                hasNewPost: false,
                urls : {
                    loadNews : { name: "ApiGetLastStockNews",  params: {} }
                }
			};
			var ideasOptions = {
                Id : "stock-ideas",
                canLoadMore: false,
                hasNewPost: false,
                urls : {
                    loadNews : { name: "ApiGetStockIdeas",  params: { stock_code : stockInfo.code } }
                }
            };
			var commentBoxOptions = {
				Id : "comment-box"
			};
			var userBoxOptions = {
			};

			var viewModel = {
				chartModel : new ChartViewModel(chartOptions),
				watchListModel : new WatchListViewModel(watchListOptions),
				newsModel : new NewsViewModel(newsOptions),
				ideasModel: new NewsViewModel(ideasOptions),
				commentBoxModel : new CommentBoxViewModel(commentBoxOptions),
				userBoxModel : new UserBoxViewModel(userBoxOptions)
			};
			ko.applyBindings(viewModel, document.getElementById('y-main-content'));
		});
	</script>	

{% endblock %}
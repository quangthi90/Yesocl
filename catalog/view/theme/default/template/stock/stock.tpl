{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/common/ko_template_block.tpl' %}
{% use '@template/default/template/stock/common/block_stock_chart.tpl' %}
{% use '@template/default/template/stock/common/block_news.tpl' %}
{% use '@template/default/template/stock/common/block_ideas.tpl' %}
{% use '@template/default/template/stock/common/block_basic_key.tpl' %}
{% use '@template/default/template/stock/common/block_company_profile.tpl' %}
{% use '@template/default/template/stock/common/block_financial.tpl' %}
{% use '@template/default/template/stock/common/block_ownership_friend.tpl' %}
{% use '@template/default/template/stock/common/block_post_report.tpl' %}

{% block title %}{% trans %} Stock - Stock page {% endtrans %}{% endblock %}

{% block stylesheet %} 
{{ block('common_ko_template_style') }}   
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
    <div id="y-main-content" class="has-horizontal stock-page">
        {{ block('stock_common_block_stock_chart') }}
        {{ block('stock_common_block_news') }}
        {{ block('stock_common_block_ideas') }}
        {#{ block('stock_common_block_basic_key') }}
        {{ block('stock_common_block_company_profile') }}
        {{ block('stock_common_block_financial') }#}
        {% if stock.meta.funds|length > 0 %}
        {{ block('stock_common_block_ownership_friend') }}
        {% endif %}
        {#{ block('stock_common_block_post_report') }#}
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
            // Stock info of current Market
            var _stock = '{{ stock|json_encode()|raw }}';
            //Add options to view model:
            var chartOptions = {
                stock : JSON.parse(_stock)
            };
            var newsOptions = {
                Id : "stock-news",
                canLoadMore: false,
                hasNewPost: false,
                urls : {
                    loadNews : { name: "ApiGetLastStockNews",  params: { stock_code : "{{ stock_code }}" } }
                }
            };
            var ideasOptions = {
                Id : "stock-ideas",
                canLoadMore: false,
                hasNewPost: false,
                urls : {
                    loadNews : { name: "ApiGetLastStockNews",  params: { stock_code : "A" } }
                }
            };
            var userBoxOptions = {
            };            
            var commentBoxOptions = {
                Id : "comment-box"
            };
            var userBoxOptions = {
            };

            var viewModel = {
                chartModel : new ChartViewModel(chartOptions),
                newsModel: new NewsViewModel(newsOptions),
                ideasModel: new NewsViewModel(ideasOptions),
                commentBoxModel : new CommentBoxViewModel(commentBoxOptions),
                userBoxModel : new UserBoxViewModel(userBoxOptions)
            };
            ko.applyBindings(viewModel, document.getElementById('y-main-content'));
        });
    </script>
{% endblock %}
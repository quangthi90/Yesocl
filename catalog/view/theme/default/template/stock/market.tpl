{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/stock/common/block_market_chart.tpl' %}
{% use '@template/default/template/stock/common/block_watch_list.tpl' %}
{% use '@template/default/template/stock/common/block_news.tpl' %}
{% use '@template/default/template/stock/common/block_ideas.tpl' %}

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
        <div class="feed-block stock-block">
            <div class="block-header">
                <h3 class="block-title">Post Report <i class="icon-caret-right"></i></h3>
            </div>
            <div class="block-content">
                Content of Post Report
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascript %}
{% endblock %}
{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/stock/common/block_stock_chart.tpl' %}
{% use '@template/default/template/stock/common/block_news.tpl' %}
{% use '@template/default/template/stock/common/block_ideas.tpl' %}

{% block title %}{% trans %} Stock - Stock page {% endtrans %}{% endblock %}

{% block stylesheet %}    
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
    <div id="y-main-content" class="has-horizontal stock-page">
        {{ block('stock_common_block_stock_chart') }}
        {{ block('stock_common_block_news') }}
        {{ block('stock_common_block_ideas') }}

        <div class="feed-block stock-block">
            <div class="block-header">
                <h3 class="block-title">Basic Key <i class="icon-caret-right"></i></h3>
            </div>
            <div class="block-content">
                Content of Basic Key
            </div>
        </div>
        <div class="feed-block stock-block">
            <div class="block-header">
                <h3 class="block-title">Company Profile <i class="icon-caret-right"></i></h3>
            </div>
            <div class="block-content">
                Content of Company Profile
            </div>
        </div>
        <div class="feed-block stock-block">
            <div class="block-header">
                <h3 class="block-title">Financial <i class="icon-caret-right"></i></h3>
            </div>
            <div class="block-content">
                Content of Financial
            </div>
        </div>
        <div class="feed-block stock-block">
            <div class="block-header">
                <h3 class="block-title">Found ownership friend <i class="icon-caret-right"></i></h3>
            </div>
            <div class="block-content">
                Content of Found ownership friend
            </div>
        </div>
        <div class="feed-block stock-block">
            <div class="block-header">
                <h3 class="block-title">Post Reports <i class="icon-caret-right"></i></h3>
            </div>
            <div class="block-content">
                Post Reports
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascript %}
{% endblock %}
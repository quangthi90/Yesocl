{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/stock/common/block_stock_chart.tpl' %}
{% use '@template/default/template/stock/common/block_news.tpl' %}
{% use '@template/default/template/stock/common/block_ideas.tpl' %}
{% use '@template/default/template/stock/common/block_basic_key.tpl' %}
{% use '@template/default/template/stock/common/block_company_profile.tpl' %}
{% use '@template/default/template/stock/common/block_financial.tpl' %}
{% use '@template/default/template/stock/common/block_ownership_friend.tpl' %}
{% use '@template/default/template/stock/common/block_financial.tpl' %}
{% use '@template/default/template/stock/common/block_post_report.tpl' %}

{% block title %}{% trans %} Stock - Stock page {% endtrans %}{% endblock %}

{% block stylesheet %}    
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
    <div id="y-main-content" class="has-horizontal stock-page">
        {{ block('stock_common_block_stock_chart') }}
        {{ block('stock_common_block_news') }}
        {{ block('stock_common_block_ideas') }}
        {{ block('stock_common_block_basic_key') }}
        {{ block('stock_common_block_company_profile') }}
        {{ block('stock_common_block_financial') }}
        {{ block('stock_common_block_ownership_friend') }}
        {{ block('stock_common_block_post_report') }}
    </div>
</div>
{% endblock %}

{% block javascript %}
{% endblock %}
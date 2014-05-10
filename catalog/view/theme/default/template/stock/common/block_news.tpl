{% use '@template/default/template/stock/common/news_item.tpl' %}

{% block stock_common_block_news %}
<div class="feed-block stock-block" data-bind="attr: { 'id' : $root.newsModel.id }, with: $root.newsModel">
    <div class="block-header">
        <h3 class="block-title"><a href="{{ path('StockNewsPage') }}">{% trans %}News{% endtrans %} <i class="icon-caret-right"></i></a></h3>
    </div>
    <div class="block-content">
        <!-- ko if: isLoadSuccess() && newsList().length > 0 -->
            <div class="news-container" data-bind="foreach: newsList">
    			{{ block('stock_common_news_item') }}
    		</div>
            <!-- ko if: canLoadMore() -->
            <div class="load-more-wrapper" style="position: absolute; right: 0px; top: 0px; bottom: 0px; width: 10px;">
                <!-- ko if: !isLoadingMore() -->
                <a title="Load more ..." data-bind="click: loadMore" class="btn-load-more" style="display: block; height: 100%;">
                    <i class="icon-chevron-right"></i>
                </a>                
                <!-- /ko -->
                <!-- ko if: isLoadingMore() -->
                <i class="icon-spin icon-spinner"></i> Loading ...          
                <!-- /ko -->
            </div>
            <!-- /ko -->
        <!-- /ko -->        
        <!-- ko if: isLoadSuccess() && newsList().length == 0 -->
        <div class="news-container">
            <p>No news to display !</p>
        </div>
        <!-- /ko -->
        <!-- ko if: !isLoadSuccess() -->
        <div class="loading-background">
            <i style="font-size: 30px;" class="icon-spin icon-spinner"></i>
        </div>
        <!-- /ko -->
    </div>
</div>
{% endblock %}
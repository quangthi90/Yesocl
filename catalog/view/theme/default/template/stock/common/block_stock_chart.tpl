{% block stock_common_block_stock_chart %}
<div class="feed-block stock-block" id="stock-chart" data-bind="with: $root.chartModel">
    <div class="block-header">
        <h3 class="block-title">{{ stock.name }} <i class="icon-caret-right"></i></h3> 
    </div>
    <div class="block-content">
        <h3 class="chart-title">
            {{ stock.code }} (<a href="{{ path('StockMarket', {market_code: stock.market.code}) }}">{{ stock.market.code }}</a>)
        </h3>      
        <div class="chart-content-container" data-bind="with: stock">
            <div class="chart-content">
                <div class="row-fluid chart-indexs">
                    <div class="span4 index-overview up">
                        <ul>
                            <li class="index-staus">
                                <!-- ko if: $data.is_down -->
                                <i class="icon-caret-down"></i>
                                <!-- /ko -->
                                <!-- ko if: !$data.is_down -->
                                <i class="icon-caret-up"></i>
                                <!-- /ko -->
                            </li>
                            <li class="index-mount" data-bind="with: $data.last_exchange">
                                <span data-bind="text: $data.close_price"></span>
                            </li>
                            <li class="index-status-mount">
                                <span class="i-top" data-bind="css: {'price-down' : $data.exchange_price < 0 }">
                                    <!-- ko if: $data.exchange_price > 0 -->
                                    +
                                    <!-- /ko -->
                                    <span data-bind="text: $data.exchange_price"></span>
                                </span> 
                                <br />
                                <span class="i-bottom" data-bind="css: {'price-down' : $data.exchange_percent < 0 }">
                                    <!-- ko if: $data.exchange_percent > 0 -->
                                    +
                                    <!-- /ko -->
                                    <span data-bind="text: $data.exchange_percent, css: {'price-down' : $data.exchange_percent < 0 }"></span>
                                    %
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="span8 index-values">
                        <div class="row-fluid">
                            <div class="span3">
                                <label class="index-label">{% trans %}12 - Week Range{% endtrans %}</label>
                                <span class="index-value">
                                    <span data-bind="text: $data.range_price[84].min_price"></span>
                                     - 
                                    <span data-bind="text: $data.range_price[84].max_price"></span>
                                </span>
                            </div>
                            <div class="span3 text-right" data-bind="with: $data.last_exchange">
                                <label class="index-label">{% trans %}Open Price{% endtrans %}</label>
                                <span class="index-value" data-bind="text: $data.open_price, css: { 'price-down' : $data.open_price < 0 }"></span>
                            </div>
                            <div class="span3 text-right" data-bind="with: $data.last_exchange">
                                <label class="index-label">{% trans %}Volume{% endtrans %}</label>
                                <span class="index-value" data-bind="text: $data.volume"></span>
                            </div>
                            <div class="span3 text-right">
                                <label class="index-label">{% trans %}Market Cap{% endtrans %}</label>
                                <span class="index-value" data-bind="text: $data.meta.market_cap"></span>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3">
                                <label class="index-label">{% trans %}52 - Week Range{% endtrans %}</label>
                                <span class="index-value">
                                    <span data-bind="text: $data.range_price[364].min_price"></span>
                                     - 
                                    <span data-bind="text: $data.range_price[364].max_price"></span>
                                </span>
                            </div>
                            <div class="span3 text-right" data-bind="with: $data.pre_last_exchange">
                                <label class="index-label">{% trans %}Previous Closed Price{% endtrans %}</label>
                                <span class="index-value" data-bind="text: $data.close_price, css: { 'price-down' : $data.open_price < 0 }"></span>
                            </div>
                            <div class="span3 text-right">
                                <label class="index-label">{% trans %}Average Volume{% endtrans %}</label>
                                <span class="index-value" data-bind="text: $data.range_price[364].average"></span>
                            </div>
                            <div class="span3 text-right">
                                <label class="index-label">{% trans %}Price/Earnings{% endtrans %}</label>
                                <span class="index-value" data-bind="text: $data.meta.pe/$data.meta.eps"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ko if: $parent.isLoadSuccess() -->
                <a class="btn-zoom-chart" data-bind="click: $parent.zoomChart"><i class="icon-zoom-in"></i></a>
                <!-- /ko -->
                <div class="chart-area" id="y-chart-container">
                    <!-- ko if: !$parent.isLoadSuccess() -->
                    <div class="loading-background">
                        <i style="font-size: 30px;" class="icon-spin icon-spinner"></i>
                    </div>
                    <!-- /ko -->
                </div>               
            </div>                        
        </div>
    </div>
</div>
{% endblock %}
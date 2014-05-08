{% block stock_common_block_stock_chart %}
<div class="feed-block stock-block" id="stock-chart" data-bind="with: $root.chartModel">
    <div class="block-header">
        <h3 class="block-title">Mircrosoft Corporation <i class="icon-caret-right"></i></h3> 
    </div>
    <div class="block-content">
        <h3 class="chart-title">
            MSFT (NASDAQ)
        </h3>      
        <div class="tab-content" data-bind="with: stock">
            <div class="chart-content">
                <div class="row-fluid chart-indexs">
                    <div class="span4 index-overview up">
                        <ul>
                            <li class="index-staus">
                                <i class="icon-caret-up"></i>
                            </li>
                            <li class="index-mount">
                                10,000.23
                            </li>
                            <li class="index-status-mount">
                                <span class="i-top"> + 100</span> 
                                <br />
                                <span class="i-bottom"> + 0.80%</span>
                            </li>
                        </ul>
                    </div>
                    <div class="span8 index-values">
                        <div class="row-fluid">
                            <div class="span3">
                                <label class="index-label">Day Range</label>
                                <span class="index-value">10 - 20</span>
                            </div>
                            <div class="span3 text-right">
                                <label class="index-label">Open</label>
                                <span class="index-value">10 </span>
                            </div>
                            <div class="span3 text-right">
                                <label class="index-label">Volume</label>
                                <span class="index-value">10M </span>
                            </div>
                            <div class="span3 text-right">
                                <label class="index-label">Market Cap</label>
                                <span class="index-value">10 </span>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3">
                                <label class="index-label">52-Week Range</label>
                                <span class="index-value">10,000.00 - 20,000.00</span>
                            </div>
                            <div class="span3 text-right">
                                <label class="index-label">Previous Closed</label>
                                <span class="index-value">10</span>
                            </div>
                            <div class="span3 text-right">
                                <label class="index-label">Average Volume</label>
                                <span class="index-value">10M </span>
                            </div>
                            <div class="span3 text-right">
                                <label class="index-label">Price/Earnings</label>
                                <span class="index-value">10 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ko if: $parent.isLoadSuccess() -->
                <a class="btn-zoom-chart" data-bind="click: $parent.zoomChart"><i class="icon-zoom-out"></i></a>
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
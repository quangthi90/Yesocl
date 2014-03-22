{% block stock_common_block_stock_chart %}
<div class="feed-block stock-block" id="st-market">
    <div class="block-header">
        <h3 class="block-title">Market <i class="icon-caret-right"></i></h3> 
    </div>
    <div class="block-content">
        <ul class="nav nav-tabs market-list">
          <li class="active"><a href="#market-down" data-toggle="tab">Down</a></li>
          <li><a href="#market-nasdaq" data-toggle="tab">NASDAQ</a></li>
          <li><a href="#market-sp500" data-toggle="tab">S&P 500</a></li>
        </ul>
        <div class="tab-content market-content">
            <div class="tab-pane active" id="market-down">
                <div class="row-fluid market-statistics">
                    <div class="span6 index-overview up">
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
                    <div class="span6 index-values">
                        <div class="row-fluid">
                            <div class="span6">
                                <label class="index-label">Day Range</label>
                                <span class="index-value">10,000.00 - 20,000.00</span>
                            </div>
                            <div class="span6">
                                <label class="index-label">Open</label>
                                <span class="index-value">10,000.00 </span>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <label class="index-label">52-Week Range</label>
                                <span class="index-value">10,000.00 - 20,000.00</span>
                            </div>
                            <div class="span6">
                                <label class="index-label">Previous Closed</label>
                                <span class="index-value">10,000.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="market-chart">
                    <div class="market-chart-container">
                        <img src="image/chart-demo.jpg" alt="" /> 
                    </div>
                    <div class="row-fluid market-chart-functions">
                        <div class="span6">
                            <div class="btn-group">
                              <a class="btn active">Day</a>
                              <a class="btn">Week</a>
                              <a class="btn">Month</a>
                              <a class="btn">1 Year</a>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="btn-group pull-right">
                              <a class="btn"><i class="icon-ellipsis-horizontal"></i> Index Details</a>
                              <a class="btn"><i class="icon-search"></i>Search Quotes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="market-nasdaq">
                NASDAQ
            </div>
            <div class="tab-pane" id="market-sp500">
                S&P 500
            </div>                    
        </div>
    </div>
</div>
{% endblock %}
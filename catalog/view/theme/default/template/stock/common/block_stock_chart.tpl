{% block stock_common_block_stock_chart %}
<div class="feed-block stock-block" id="st-market">
    <div class="block-header">
        <h3 class="block-title">Mircrosoft Corporation <i class="icon-caret-right"></i></h3> 
    </div>
    <div class="block-content">
        <h3 class="chart-title">
            MSFT (NASDAQ)
        </h3>      
        <div class="tab-content">
            <div class="chart-content">
                <div class="row-fluid">
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
                <div class="chart-area">
                    <img src="image/chart-demo.jpg" alt="" /> 
                </div>                    
            </div>                        
        </div>
        <div class="chart-options">
            <div class="row-fluid">
                <div class="span9">
                    <div class="btn-group">
                        <a class="btn active">Day</a>
                        <a class="btn">Week</a>
                        <a class="btn">Month</a>
                        <a class="btn">1 Year</a>
                        <a class="btn">5 Years</a>
                        <a class="btn">All</a>
                    </div>
                </div>
                <div class="span3">
                    <div class="btn-group pull-right">
                      <a class="btn"><i class="icon-search"></i>Search Quotes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
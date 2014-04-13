{% block stock_common_block_market_chart %}
<div class="feed-block stock-block" id="st-market">
    <div class="block-header">
        <h3 class="block-title">Market <i class="icon-caret-right"></i></h3> 
    </div>
    <div class="block-content">
        <ul class="nav nav-tabs market-list">
        {% for market in markets %}
          <li {% if curr_market.id == market.id %}class="active"{% endif %}><a href="{{ path('StockMarket', {market_code: market.code}) }}">{{ market.code }}</a></li>
        {% endfor %}
        </ul>        
        <div class="tab-content">            
            <div class="tab-pane active" id="market-down">
                <div class="chart-content">
                    <div class="row-fluid">
                        <div class="span6 index-overview up">
                            <ul>
                                <li class="index-staus">
                                    {% if stock.is_down == true %}
                                    <i class="icon-caret-down"></i>
                                    {% else %}
                                    <i class="icon-caret-up"></i>
                                    {% endif %}
                                </li>
                                <li class="index-mount">
                                    {{ stock.last_exchange.close_price }}
                                </li>
                                <li class="index-status-mount">
                                    <span class="i-top"> + 100</span> 
                                    <br />
                                    <span class="i-bottom"> + 0.80%</span>
                                </li>
                            </ul>
                            <div class="index-date">
                                {{ stock.last_exchange.created|date('d/m/Y') }}
                            </div>
                        </div>
                        <div class="span6 index-values">
                            <div class="row-fluid">
                                <div class="span6">
                                    <label class="index-label">12-Week Range</label>
                                    <span class="index-value">{{ stock.range_price.84.min_price }} - {{ stock.range_price.84.max_price }}</span>
                                </div>
                                <div class="span6">
                                    <label class="index-label">Open</label>
                                    <span class="index-value">{{ stock.last_exchange.open_price }} </span>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span6">
                                    <label class="index-label">52-Week Range</label>
                                    <span class="index-value">{{ stock.range_price.364.min_price }} - {{ stock.range_price.364.max_price }}</span>
                                </div>
                                <div class="span6">
                                    <label class="index-label">Previous Closed</label>
                                    <span class="index-value">{{ stock.last_exchange.close_price }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chart-area">
                        <img src="image/chart-demo.jpg" alt="" /> 
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
        <div class="chart-options">
            <div class="row-fluid">
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
</div>
{% endblock %}
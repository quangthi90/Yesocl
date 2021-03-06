{% block stock_common_block_watch_list %}
<div class="feed-block stock-block" id="st-watch-list" data-bind="with: $root.watchListModel">
	<div class="block-header">
	    <h3 class="block-title">Watch List <i class="icon-caret-right"></i></h3>
	</div>
	<div class="block-content">
	    <ul class="watchlist-items" data-bind="foreach: watchList">
	    	<!-- ko if: !$data.isNew -->
	        <li class="wl-item">
	        	<a data-bind="click: $parent.removeWatchList" class="wl-remove"><i class="icon-remove"></i></a>
	            <div class="row-fluid">
	                <div class="span12">
	                    <a class="stock-code" data-bind="link: { text: $data.stock.code ,route: 'StockPage', params: { stock_code : $data.stock.code} }"></a>
	                    <a href="#" class="stock-name" data-bind="link: { text: $data.stock.name, title: $data.stock.name, route: 'StockPage', params: { stock_code :  $data.stock.code} }"></a>
	                </div>
	            </div>
	            <div class="row-fluid">
	                <div class="span6">
	                    <div class="index-status">
	                        <span class="index-icon">
	                        	<i data-bind="css : { 'icon-caret-up' : !$data.stock.is_down, 'icon-caret-down' : $data.stock.is_down }"></i>
                        	</span>
	                        <span class="index-mount" data-bind="text: $data.stock.last_exchange.close_price"></span>
	                    </div>
	                </div>
	                <div class="span6">
	                    <div class="index-status-mount">
	                        <span class="i-top" data-bind="text: $data.stock.exchange_price, css: { 'price-down' : $data.stock.exchange_price < 0 }"></span><br />
	                        <span class="i-bottom" data-bind="text: $data.stock.exchange_percent, css: { 'price-down' : $data.stock.exchange_percent < 0 }"></span>
	                    </div>
	                </div>
	            </div>
	        </li>
	        <!-- /ko -->
	        <!-- ko if: $data.isNew -->
	        <li class="wl-item wl-item-new">
	            <a data-bind="click: $parent.startAddWL.bind($data,'#new-wl')" class="btn btn-circle link-popup"><i class="icon-plus"></i>
	            </a>
	        </li>
	        <!-- /ko -->
	    </ul>
	</div>
	
	<div id="new-wl" class="mfp-hide y-dlg-container" data-focus-type="input[type='text']" style="max-width: 700px;">
		<div class="y-dlg">
			<form autocomplete="off" class="full-post">
				<div class="dlg-title">
			        <i class="icon-yes"></i> 
			        <span class="js-advance-post-title">{% trans %}New Watch List{% endtrans %}</span>
			    </div>
			    <div class="dlg-content" style="min-height: 300px;">
			    	<div class="wl-selected-container">
			    		<!-- ko if: addedWatchList().length > 0 -->
			    		<ul data-bind="foreach: addedWatchList">
			    			<li class="wl-selected-item">
			    				<span class="name" data-bind="text: $data.stock.code"></span>
			    				<a href="#" data-bind="click: $parent.removeStock"><i class="icon-remove"></i></a>
			    			</li>
			    		</ul>
			    		<!-- /ko -->
			    		<!-- ko if: addedWatchList().length == 0 -->
		    			<span>{% trans %}No stock choosen{% endtrans %}</span>
			    		<!-- /ko -->
			    	</div>
			    	<div class="wl-selected-control">
		    		    <div class="input-append live-search">
						    <input data-bind="value: query, enable: dataSourceEmpty() == false, attr : { 'placeholder' : dataSourceEmpty() == false ? 'Type stock ...' : 'No datasource found !' }, valueUpdate: 'keyup', hasFocus: true, executeOnEnter: addStockEnter" type="text" class="query" id="wl-query">
						    <a href="#" class="btn" data-bind="click: clearQuery, css : { 'disabled' : dataSourceEmpty() == true }"><i class="icon-remove"></i></a>
					    </div>
					    <div class="live-search-result">
					    	<!-- ko if: suggestWatchList().length > 0 -->
				    	    <table class="table table-hover">
						    	<tbody data-bind="foreach: suggestWatchList">
						    		<tr data-bind="click: $parent.addStock, css: { 'tr-selected' : $data.stock.code == $parent.defaultSelectedStock().stock.code }">
						    			<td class="stock-code" data-bind="text: $data.stock.code"></td>
						    			<td class="stock-name" data-bind="text: $data.stock.name"></td>
						    			<td class="stock-market" data-bind="text: $data.stock.market.name"></td>
						    		</tr>						    		
						    	</tbody>
						    </table>
						    <!-- /ko -->
						    <!-- ko if: query().length > 0 && suggestWatchList().length == 0 -->
						    <span>No matchs found</span>
							<!-- /ko -->
							<!-- ko if: dataSourceEmpty() == false && query().length == 0 -->
							<span>Type something to search stocks ...</span>
							<!-- /ko -->
							<!-- ko if: isLoading() -->
							<div class="loading-overlay">
								<span>Initializing data </span> &nbsp;
								<i class="icon-spin icon-spinner"></i>
							</div>
							<!-- /ko -->
					    </div>
			    	</div>
			    </div>
			    <div class="dlg-footer">
			    	<div class="controls">
			    		<a href="#" class="btn btn-yes" data-bind="visible: addedWatchList().length > 0, click: saveAddedStock">{% trans %}OK{% endtrans %}</a>
			    		<button class="btn btn-yes" data-bind="click: closeAddWL">{% trans %}Close{% endtrans %}</button>
		            </div>
			    </div>
			</form>
		</div>
	</div>
</div>
{% endblock %}
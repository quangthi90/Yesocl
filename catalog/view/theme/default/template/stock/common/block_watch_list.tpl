{% block stock_common_block_watch_list %}
<div class="feed-block stock-block" id="st-watch-list">
	<div class="block-header">
	    <h3 class="block-title">Watch List <i class="icon-caret-right"></i></h3>
	</div>
	<div class="block-content">
	    <ul class="watchlist-items" data-bind="foreach: $root.watchListModel.watchList">
	    	<!-- ko if: $data.isNew() == false -->
	        <li class="wl-item">
	        	<a href="javascript: void()" data-bind="click: $root.watchListModel.removeWatchList" class="wl-remove"><i class="icon-remove"></i></a>
	            <div class="row-fluid">
	                <div class="span6">
	                    <a href="#" class="stock-code" data-bind="text: $data.stockCode"></a>
	                </div>
	                <div class="span6">
	                    <a href="#" class="stock-name" data-bind="text: $data.stockName"></a>
	                </div>
	            </div>
	            <div class="row-fluid">
	                <div class="span6">
	                    <div class="index-status">
	                        <span class="index-icon">
	                        	<i data-bind="css : { 'icon-caret-up' : $data.stockIndexValue() > 0, 'icon-caret-down' : $data.stockIndexValue() <= 0 }"></i>
                        	</span>
	                        <span class="index-mount" data-bind="text: $data.stockIndexValue"></span>
	                    </div>
	                </div>
	                <div class="span6">
	                    <div class="index-status-mount">
	                        <span class="i-top" data-bind="text: $data.stockTopIndexValue"></span> <br />
	                        <span class="i-bottom" data-bind="text: $data.stockBottomIndexValue"></span>
	                    </div>
	                </div>
	            </div>
	        </li>
	        <!-- /ko -->
	        <!-- ko if: $data.isNew() == true -->
	        <li class="wl-item wl-item-new">
	            <a data-bind="click: $root.watchListModel.startAddWL.bind($data,'#new-wl')" class="btn btn-circle link-popup"><i class="icon-plus"></i>
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

			    </div>
			    <div class="dlg-footer">
			    	<div class="controls">
			    		<a href="#" class="btn btn-yes js-post-submit-btn">{% trans %}OK{% endtrans %}</a>
			    		<button class="btn btn-yes js-post-reset-btn" data-bind="$root.watchListModel.closeAddWL">{% trans %}Close{% endtrans %}</button>
		            </div>
			    </div>
			</form>
		</div>
	</div>

</div>
{% endblock %}

{% block stock_common_block_watch_list_javascript %}
	<script type="text/javascript">
		$(document).ready(function(){
	 		$('#st-watch-list .block-content').makeCustomScroll();
	 	});
	</script>
{% endblock %}
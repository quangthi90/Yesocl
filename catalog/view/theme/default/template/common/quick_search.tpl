<div id="search-panel" class="search-panel">
	<div class="input-container">
		<div class="input-append">
		    <input data-bind="value: throttledValue, valueUpdate: 'afterkeydown', hasFocus: true" class="span5" class="input-search" placeholder="{% trans %}Enter your key{% endtrans %} ..." type="text" style="height: 20px;">
		    <button style="display: none;" class="btn btn-yes" type="button" title="Search"><i class="icon-search"></i></button>
	    </div>
	</div>
	<!-- ko if: searchInprocessing() -->
		<div class="search-loadding">Searching ...</div>
	<!-- /ko -->
	<!-- ko if: !searchInprocessing() && query().length > 0 -->
		<!-- ko if: results().users.length == 0 && results().posts.length == 0 && results().stocks.length == 0 -->
			<div class="search-loadding">No results found !</div>
	    <!-- /ko -->
	    <!-- ko if: results().users.length > 0 || results().posts.length > 0 || results().stocks.length > 0 -->
	    <div class="result-container">    	
	        <!-- ko if: results().users.length > 0 -->
		        <div class="result-column">
		            <h3 class="result-title">User</h3>
		            <div class="result-data">
		                <ul data-bind="foreach: results().users">
		                	<li>
			                	<a data-bind="link: { title: username, route: 'WallPage', params: { user_slug: slug } }" class="result-link">
			                		<div class="row-fluid">
			                			<div class="span2 result-avatar">
			                				<img class="fl" data-bind="attr: { src : avatar }">
			                			</div>
				            			<div class="span9 result-text">
				            				<strong class="overflow-text" data-bind="text: username"></strong>
				            				<span class="overflow-text" data-bind="text: current != null ? current: ''"></span>
				            			</div>
			                		</div>
			            		</a>
		                	</li>
		                </ul>
		            </div>
		        </div>
	        <!-- /ko -->
	        <!-- ko if: results().posts.length > 0 -->
		        <div class="result-column">
		            <h3 class="result-title">Post</h3>
		            <div class="result-data">
		                <ul data-bind="foreach: results().posts">
		                	<li>
			                	<a data-bind="link: { title: title, route: 'PostPage', params: { post_type : type, post_slug: slug } }" class="result-link">
			                		<div class="row-fluid">
			                			<div class="span2 result-avatar">
			                				<img class="fl" data-bind="attr: { src : image }">
			                			</div>
				            			<div class="span9 result-text">
				            				<strong class="overflow-text" data-bind="text: title"></strong>
				            				<span class="overflow-text" data-bind="text: description"></span>
				            			</div>
			                		</div>
			            		</a>
		                	</li>
		                </ul>
		            </div>
		        </div>
	        <!-- /ko -->
	        <!-- ko if: results().stocks.length > 0 -->
		        <div class="result-column">
		            <h3 class="result-title">Stock</h3>
		            <div class="result-data">
		                <ul data-bind="foreach: results().stocks">
		                	<li>
			                	<a data-bind="link: { title: name, route: 'StockPage', params: { stock_code: code } }" class="result-link">
			                		<div class="row-fluid">
			                			<div class="span2 result-avatar">
			                				<img class="fl" src="image/stock_icon.png">
			                			</div>
				            			<div class="span9 result-text">
				            				<strong class="overflow-text" data-bind="text: code"></strong>
				            				<span class="overflow-text" data-bind="text: name"></span>
				            			</div>
			                		</div>
			            		</a>
		                	</li>
		                </ul>
		            </div>
		        </div>
	        <!-- /ko -->
		</div>
		<!-- /ko -->
	<!-- /ko -->
</div>
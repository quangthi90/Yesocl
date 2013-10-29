<!DOCTYPE html>
<html>
	<head>		
		<title>{% block title %}Yesocl{% endblock %} | Yesocl - Social Network</title>
		<base href="{{ base }}" />		
		<!-- Icon -->
		<link rel="shortcut icon" href="image/template/favicon.png">		
		<!-- Library css -->
		<link href="{{ asset_css('libs/bootstrap.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/bootstrap-responsive.min.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/fortAwesome/css/font-awesome.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/uniform.default.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/magnific-popup.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/mcustomscrollbar.css') }}" rel="stylesheet" media="screen" />
		<!-- Common css -->
		<link href="{{ asset_css('common/yes.css') }}" rel="stylesheet" media="screen" />
		<!-- Custom css -->
		{% block stylesheet %}
		{% endblock %}
	</head>
	<body>
		{{ include(template_from_string( header )) }}
		{{ include(template_from_string( sidebar_control )) }}
		<div id="y-container">
			{% block body %}
			{% endblock %}			
		</div>
		{{ include(template_from_string( footer )) }}
		<div id="overlay"></div>
		<div style="width: 500px; height: 500px; top: 40px; left: 100px; display: none;" 
			id="user-viewer-container">		
		</div>
		<div style="display: none;" id="user-info-template">
			<div class="user-item fl">
				<div class="user-item-info fl">
					<a href="USER_URL" class="user-item-avatar fl">
						<img src="USER_IMG" alt="USER_NAME" />
					</a>
					<div class="user-item-overview fl">
						<a href="USER_URL" class="user-item-name">USER_NAME</a>
						<span><strong>NUMBER_OF_FRIEND</strong> friend(s)</span>
					</div>
				</div>
				<div class="user-actions fr">
					<a href="#" class="btn-user-actions">
						USER_ACTIONS
					</a>
				</div>
			</div>
		</div>
		<div id="y-loader">
			<div id="y-loader-bg"></div>
			<div id="spinner-wrapper">
				<i class="icon-spinner icon-spin"></i>
				<span>Loading ...</span>
			</div>
		</div>
		<div id="search-panel" class="search-form" data-invoke-search="#btn-search-invoke-on" data-url="{{ path('SearchPage') }}">
		  <input class="search-ctrl" name="keyword" id="searchText" placeholder="Enter your key ..." type="text">
		  <div class="suggestion-container"></div>
		  {% raw %}
		  <div class="hidden search-result-item-template">
		    <a href="${url}">
		      <div class="data-detail">
		        <img src="${image}" alt="" />
		        <div class="data-meta-info">
		          <div class="data-name">${value}</div>
		          <div class="data-more">${metaInfo}</div>
		        </div>
		      </div>
		    </a>
		  </div>
		  {% endraw %}
		</div>		

    	<!-- Library Script -->
    	<script type="text/javascript" src="{{ asset_js('jquery/jquery-1.8.3.min.js') }}"></script>
    	<script type="text/javascript" src="{{ asset_js('libs/jquery.easing.1.3.js') }}"></script>
    	<script type="text/javascript" src="{{ asset_js('libs/jquery.nicescroll.js') }}"></script>
    	<script type="text/javascript" src="{{ asset_js('libs/jquery.uniform.min.js') }}"></script>
    	<script type="text/javascript" src="{{ asset_js('libs/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.tmpl.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.tmplPlus.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.timeago.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.magnific-popup.min.js') }}">
		</script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.mcustomscrollbar.min.js') }}">
		</script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.bootbox.js') }}">
		</script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.typeahead.js') }}">
		</script>	
		<!-- Common Script -->
		<script type="text/javascript" src="{{ asset_js('yes.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('common.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('post.js') }}"></script>		
		<!-- Custom Script -->
    	{% block javascript %}
		{% endblock %}
	</body>
</html>
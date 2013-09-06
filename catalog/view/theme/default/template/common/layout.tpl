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
		<!-- Common css -->
		<link href="{{ asset_css('common/yes.css') }}" rel="stylesheet" media="screen" />

		<!-- Custom css -->
		{% block stylesheet %}
		{% endblock %}
	</head>
	<body>
		<div id="y-sidebar">	
			{{ include(template_from_string( sidebar_control )) }}
		</div>
		<div id="y-container">
			{% block body %}
			{% endblock %}
			{{ include(template_from_string( footer )) }}
			<div id="overlay"></div>
		</div>
    	<!-- Library Script -->
    	<script type="text/javascript" src="{{ asset_js('jquery/jquery-1.8.3.min.js') }}"></script>
    	<script type="text/javascript" src="{{ asset_js('libs/jquery.nicescroll.js') }}"></script>
    	<script type="text/javascript" src="{{ asset_js('libs/jquery.uniform.min.js') }}"></script>
    	<script type="text/javascript" src="{{ asset_js('libs/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.tmpl.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.tmplPlus.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.timeago.js') }}"></script>
		<!-- Common Script -->
		<script type="text/javascript" src="{{ asset_js('yes.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('common.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('post.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.bpopup.min.js') }}"></script>
		<!-- Custom Script -->
    	{% block javascript %}
		{% endblock %}
	</body>
</html>
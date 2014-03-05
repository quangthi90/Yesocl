<!DOCTYPE html>
<html>
	<head>		
		<title>{% block title %}{% trans %}Welcome Page{% endtrans %}{% endblock %} | Yesocl - Social Network</title>
		<base href="{{ base }}" />
		<link rel="shortcut icon" href="image/template/favicon.png">
		<link href="{{ asset_css('libs/bootstrap.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/bootstrap-responsive.min.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/uniform.default.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/fortAwesome/css/font-awesome.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/messi.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('welcome.css') }}" rel="stylesheet" media="screen" /> 
		{% block stylesheet %}
		{% endblock %}
	</head>
	<body>	
		<div id="y-container">
			{{ include(template_from_string( header )) }}

			{% block body %}
			{% endblock %}

			{{ include(template_from_string( footer )) }}
		</div>
    	<div id="overlay"></div>
    	<script type="text/javascript" src="{{ asset_js('jquery/jquery-1.8.3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.uniform.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/messi.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('yes.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('account.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('routing.js') }}"></script>
    	{% block javascript %}
		{% endblock %}
		<!-- Defined Data for Script -->
		<script type="text/javascript">
			var _routing = '{{ get_routing_list()|raw }}';
			window.yRouting = new Routing( JSON.parse(_routing) );
		</script>
		{% block datascript %}
		{% endblock %}
	</body>
</html>
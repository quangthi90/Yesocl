<!DOCTYPE html>
<html>
	<head>		
		<title>{% block title %}Yesocl{% endblock %}</title>
		<base href="{{ base }}" />
		<link rel="shortcut icon" href="image/template/favicon.png">
		<link href="catalog/view/theme/default/stylesheet/libs/bootstrap.css" rel="stylesheet" media="screen" />
		<link href="catalog/view/theme/default/stylesheet/libs/bootstrap-responsive.min.css" rel="stylesheet" media="screen" />
		<link href="catalog/view/theme/default/stylesheet/libs/uniform.default.css" rel="stylesheet" media="screen" />
		<link href="catalog/view/theme/default/stylesheet/libs/fortAwesome/css/font-awesome.css" rel="stylesheet" media="screen" />
		<link href="catalog/view/theme/default/stylesheet/welcome.css" rel="stylesheet" media="screen" /> 
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
    	<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/libs/bootstrap.min.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/libs/jquery.uniform.min.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/yes.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/account.js"></script>
    	{% block javascript %}
		{% endblock %}
	</body>
</html>
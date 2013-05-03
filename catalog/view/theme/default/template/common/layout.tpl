<!DOCTYPE html>
<html>
	<head>		
		<title>{% block title %}Yesocl{% endblock %}</title>
		<base href="{{ base }}" />

		<link href="catalog/view/theme/default/stylesheet/libs/bootstrap.min.css" rel="stylesheet" media="screen" />
		<link href="catalog/view/theme/default/stylesheet/libs/bootstrap-responsive.min.css" rel="stylesheet" media="screen" />
		{% block stylesheet %}
		{% endblock %}
	</head>
	<body>	
		<div id="y-container">
			{{ include(template_from_string( header )) }}
			<div class="clear"></div>

			{% block body %}
			{% endblock %}
			<div class="clear"></div>

			{{ include(template_from_string( footer )) }}
		</div>
    	<div id="overlay"></div>
    	
    	<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/bootstrap/bootstrap.min.js"></script>
    	{% block javascript %}
		{% endblock %}
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>		
		<title>{% block title %}Yesocl{% endblock %}</title>
		<base href="{{ base }}" />

		<link rel="stylesheet" type="text/css" href="catalog/view/javascript/bootstrap/bootstrap.min.css" media="screen" />
		<link href="catalog/view/javascript/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" media="screen" />
		<link href="catalog/view/theme/default/stylesheet/yes.css" rel="stylesheet" media="screen" />
		{% block stylesheet %}
		{% endblock %}
	</head>
	<body>	
		<div id="y-container">
			{% block header %}
		        {{ include(template_from_string( header )) }}
			{% endblock %}
			<div class="clear"></div>

			{% block body %}{% endblock %}
			<div class="clear"></div>

			{% block footer %}
                {{ include(template_from_string( footer )) }}
			{% endblock %}
		</div>
    	<div id="overlay"></div>
    	
    	<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/bootstrap/bootstrap.min.js"></script>
    	{% block javascript %}
		{% endblock %}
	</body>
</html>
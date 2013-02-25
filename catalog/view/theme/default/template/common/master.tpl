<!DOCTYPE html>
<html>
	<head>		
		{% block head %}
			<title>{% block title %}{% endblock %}</title>
			<base href="{{ base }}" />

			{% block stypesheet %}
				<link rel="stylesheet" type="text/css" href="catalog/view/javascript/bootstrap/bootstrap.min.css" media="screen" />
    			<link href="catalog/view/javascript/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" media="screen" />
    			<link href="catalog/view/theme/default/stylesheet/yes.css" rel="stylesheet" media="screen" />
			{% endblock %}

			{% block javascript %}
				<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.8.3.min.js"></script>
    			<script type="text/javascript" src="catalog/view/javascript/bootstrap/bootstrap.min.js"></script>
			{% endblock %}
		{% endblock %}
	</head>
	<body>	
		<div id="y-container">
			{% block header %}
		        {{ include(template_from_string( header )) }}
			{% endblock %}
			<div class="clear"></div>
			{% block content %}{% endblock %}
			<div class="clear"></div>
			{% block footer %}
                {{ include(template_from_string( footer )) }}
			{% endblock %}
		</div>
    	<div id="overlay"></div>
	</body>
</html>
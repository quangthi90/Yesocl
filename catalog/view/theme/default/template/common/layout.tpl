<!DOCTYPE html>
<html>
	<head>		
		<title>{% block title %}Yesocl{% endblock %} | Yesocl - Social Network</title>
		<base href="{{ base }}" />
		
		<!-- Icon -->
		<link rel="shortcut icon" href="image/template/favicon.png">
		
		<!-- Library css -->
		<link href="catalog/view/theme/default/stylesheet/libs/bootstrap.css" rel="stylesheet" media="screen" />
		<link href="catalog/view/theme/default/stylesheet/libs/bootstrap-responsive.min.css" rel="stylesheet" media="screen" />
		<link href="catalog/view/theme/default/stylesheet/libs/fortAwesome/css/font-awesome.css" rel="stylesheet" media="screen" />

		<!-- Common css -->
		<link href="catalog/view/theme/default/stylesheet/common/yes.css" rel="stylesheet" media="screen" />

		<!-- Custom css -->		
		{% block stylesheet %}
		{% endblock %}
	</head>
	<body class="row-fluid">
		<div id="y-sidebar" class="span2">	
			{{ include(template_from_string( column_left )) }}
		</div>
		<div id="y-container" class="span10">
			{{ include(template_from_string( header )) }}

			{% block body %}
			{% endblock %}

			{{ include(template_from_string( footer )) }}
		</div>
    	<!-- Library Script -->
    	<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/bootstrap/bootstrap.min.js"></script>

		<!-- Custom Script -->
    	{% block javascript %}
		{% endblock %}
	</body>
</html>
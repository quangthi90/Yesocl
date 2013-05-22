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
		<link href="catalog/view/theme/default/stylesheet/libs/uniform.default.css" rel="stylesheet" media="screen" />

		<!-- Common css -->
		<link href="catalog/view/theme/default/stylesheet/common/yes.css" rel="stylesheet" media="screen" />
		<link href="catalog/view/theme/default/stylesheet/common/yes-common.css" rel="stylesheet" media="screen" />

		<!-- Custom css -->		
		{% block stylesheet %}
		{% endblock %}
	</head>
	<body class="row-fluid">
		<div id="y-sidebar">	
			{{ include(template_from_string( sidebar_control )) }}
		</div>
		<div id="y-container">
			{{ include(template_from_string( header )) }}

			{% block body %}
			{% endblock %}

			{{ include(template_from_string( footer )) }}
		</div>
    	<!-- Library Script -->
    	<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/libs/bootstrap.min.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/libs/jquery.uniform.min.js"></script>

		<!-- Common Script -->
		<script type="text/javascript" src="catalog/view/javascript/yes.js"></script>

		<!-- Custom Script -->
    	{% block javascript %}
		{% endblock %}
	</body>
</html>
{% use '@template/default/template/account/menu_right.tpl' %}
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial sidebar sidebar-social footer-sticky"><!-- <![endif]-->
	<head>
		<title>{% block title %}{% trans %}Home Feed{% endtrans %}{% endblock %} | Yesocl - {% trans %}Social Network{% endtrans %}</title>
		<base href="{{ base }}" />
	    <!-- Meta -->
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<!-- Icon -->
		<link rel="shortcut icon" href="image/template/favicon.png">
		<!-- Library css -->
		<!--
		**********************************************************
		In development, use the LESS files and the less.js compiler
		instead of the minified CSS loaded by default.
		**********************************************************
		<link rel="stylesheet/less" href="{{ asset_css('platform/less/admin/module.admin.stylesheet-complete.less') }}" />
		-->
	    <!--[if lt IE 9]><link rel="stylesheet" href="{{ asset_css('platform/components/library/bootstrap/css/bootstrap.min.css') }}" /><![endif]-->
	    <link rel="stylesheet" href="{{ asset_css('platform/css/admin/module.admin.stylesheet-complete.min.css') }}" />
	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->
	    {{ block('menu_right_stylesheet') }}
		{% block stylesheet %}
		{% endblock %}
	    <script src="{{ asset_css('platform/library/jquery/jquery.min.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/library/jquery/jquery-migrate.min.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/library/modernizr/modernizr.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/plugins/core_less-js/less.min.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/plugins/charts_flot/excanvas.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/plugins/core_browser/ie/ie.prototype.polyfill.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script>if (/*@cc_on!@*/false && document.documentMode === 10) { document.documentElement.className+=' ie ie10'; }</script>
	</head>
	<body class="menu-right-hidden">
	    <!-- Main Container Fluid -->
	    <div class="container-fluid menu-hidden">
		{% if is_logged() == true %}
			{{ include(template_from_string( sidebar_control )) }}
		{% endif %}
	    {{ block('menu_right') }}
	        <!-- Content START -->
	        <div id="content">
	    	{{ include(template_from_string( header )) }}
			{% block body %}
			{% endblock %}
	        </div>
	        <!-- // Content END -->
	        <div class="clearfix"></div>
	        <!-- // Sidebar menu & content wrapper END -->
		{{ include(template_from_string( footer )) }}
	    </div>
	    <!-- // Main Container Fluid END -->
    	<!-- Library Script -->
	    <!-- Global -->
	    <script data-id="App.Config">
		    var App = {};   var basePath = '',
		    commonPath = '{{ asset_css('platform/') }}',
		    rootPath = '../',
		    DEV = false,
		    componentsPath = '{{ asset_css('platform/components/') }}';
		    var primaryColor = '#25ad9f',
		    dangerColor = '#b55151',
		    successColor = '#609450',
		    infoColor = '#4a8bc2',
		    warningColor = '#ab7a4b',
		    inverseColor = '#45484d';
		    var themerPrimaryColor = primaryColor;
	    </script>
	    <script src="{{ asset_css('platform/library/bootstrap/js/bootstrap.min.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/plugins/core_nicescroll/jquery.nicescroll.min.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/plugins/core_breakpoints/breakpoints.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/plugins/core_preload/pace.min.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/components/core_preload/preload.pace.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/plugins/menu_sidr/jquery.sidr.js?v=v2.0.0-rc8') }}"></script>
	    <script src="{{ asset_css('platform/components/widget_twitter/twitter.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/plugins/media_holder/holder.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/plugins/media_gridalicious/jquery.gridalicious.min.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/components/media_gridalicious/gridalicious.js?v=v2.0.0-rc8') }}"></script>
	    <script src="{{ asset_css('platform/components/maps_google/maps-google.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false&callback=initGoogleMaps"></script>
	    <script src="{{ asset_css('platform/plugins/ui_modals/bootbox.min.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/components/menus/sidebar.main.js?v=v2.0.0-rc8') }}"></script>
	    <script src="{{ asset_css('platform/components/menus/sidebar.collapse.js?v=v2.0.0-rc8') }}"></script>
	    <script src="{{ asset_css('platform/components/menus/menus.sidebar.chat.js?v=v2.0.0-rc8') }}"></script>
	    <script src="{{ asset_css('platform/plugins/other_mixitup/jquery.mixitup.min.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/plugins/other_mixitup/mixitup.js?v=v2.0.0-rc8&sv=v0.0.1.2') }}"></script>
	    <script src="{{ asset_css('platform/components/core/core.js?v=v2.0.0-rc8') }}"></script>
		<!-- Common Script -->
	    {{ block('menu_right_javascript') }}
		<!-- Custom Script -->
    	{% block javascript %}
		{% endblock %}
		<!-- Defined Data for Script -->
		{% block datascript %}
		{% endblock %}
	</body>
</html>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial sidebar sidebar-social footer-sticky"><!-- <![endif]-->
	<head>
		<title>{% block title %}{% trans %}Home Feed{% endtrans %}{% endblock %} | Yesocl - {% trans %}Social Network{% endtrans %}</title>
		<base href="{{ base }}" />
	    {# Meta #}
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		{# Icon #}
		<link rel="shortcut icon" href="image/template/favicon.png">
		
		{# Library css
		**********************************************************
		In development, use the LESS files and the less.js compiler
		instead of the minified CSS loaded by default.
		**********************************************************
		<link rel="stylesheet/less" href="{{ asset_root_less('admin/module.admin.stylesheet-complete.less') }}" />
		<link rel="stylesheet" href="{{ asset_root_css('admin/module.admin.stylesheet-complete.min.css') }}" />
		#}

	    <link rel="stylesheet/less" href="{{ asset_root_less('admin/module.admin.stylesheet-complete.less') }}" />

	    <!--[if lt IE 9]><link rel="stylesheet" href="{{ asset_library('bootstrap/css/bootstrap.min.css') }}" /><![endif]-->
	    {#<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->#}
	    <!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->
		{% block stylesheet %}
		{% endblock %}
	</head>
	<body class="menu-right-hidden">
	    {# Main Container Fluid #}
	    <div class="container-fluid menu-hidden">
	    {% block header %}
		{% endblock %}
	        {# Content START #}
	        <div id="content">
			{% block body %}
			{% endblock %}
	        </div>
	        {# // Content END #}
	        <div class="clearfix"></div>
	        {# // Sidebar menu & content wrapper END #}
	    {% block footer %}
		{% endblock %}
	    </div>
	    {# // Main Container Fluid END #}
	    {# Global #}
	    <script data-id="App.Config">
		    var App = {};   var basePath = '',
		    commonPath = "{{ asset_root('') }}",
		    rootPath = "../",
		    DEV = false,
		    componentsPath = "{{ asset_component('') }}";
		    var primaryColor = "#25ad9f",
		    dangerColor = "#b55151",
		    successColor = "#609450",
		    infoColor = "#4a8bc2",
		    warningColor = "#ab7a4b",
		    inverseColor = "#45484d";
		    var themerPrimaryColor = primaryColor;
	    </script>
	    
    	<!-- Library Script -->
    	<script src="{{ asset_library('jquery/jquery.min.js') }}"></script>
	    <script src="{{ asset_library('jquery/jquery-migrate.min.js') }}"></script>
	    <script src="{{ asset_library('modernizr/modernizr.js') }}"></script>
	    <script src="{{ asset_plugin('core_less-js/less.min.js') }}"></script>
	    <script src="{{ asset_plugin('core_browser/ie/ie.prototype.polyfill.js') }}"></script>
	    <script>if (/*@cc_on!@*/false && document.documentMode === 10) { document.documentElement.className+=' ie ie10'; }</script>
	    <script src="{{ asset_library('bootstrap/js/bootstrap.min.js') }}"></script>
    	<script src="{{ asset_library('knockout/knockout.js') }}"></script>
		<script src="{{ asset_library('momment/moment.min.js') }}"></script>	
	    <script src="{{ asset_plugin('core_nicescroll/jquery.nicescroll.min.js') }}"></script>
	    <script src="{{ asset_plugin('core_breakpoints/breakpoints.js') }}"></script>
	    <script src="{{ asset_plugin('core_preload/pace.min.js') }}"></script>
	    <script src="{{ asset_plugin('menu_sidr/jquery.sidr.js') }}"></script>
	    <script src="{{ asset_plugin('media_holder/holder.js') }}"></script>
	    <script src="{{ asset_plugin('media_gridalicious/jquery.gridalicious.min.js') }}"></script>
	    <script src="{{ asset_plugin('ui_modals/bootbox.min.js') }}"></script>
	    <script src="{{ asset_plugin('other_mixitup/jquery.mixitup.min.js') }}"></script>
	    <script src="{{ asset_plugin('other_mixitup/mixitup.js') }}"></script>	    
    	{% block library_javascript %}
		{% endblock %}
    	{# Common Script #}
	    <script src="{{ asset_component('core_preload/preload.pace.js') }}"></script>
	    <script src="{{ asset_component('widget_twitter/twitter.js') }}"></script>
	    <script src="{{ asset_component('media_gridalicious/gridalicious.js') }}"></script>
	    <script src="{{ asset_component('menus/sidebar.main.js') }}"></script>
	    <script src="{{ asset_component('menus/sidebar.collapse.js') }}"></script>
	    <script src="{{ asset_component('menus/menus.sidebar.chat.js') }}"></script>
	    <script src="{{ asset_root('global.js') }}"></script>
	    <script src="{{ asset_module('common/ko-model.js') }}"></script>
    	{% block common_javascript %}
		{% endblock %}
	    <script src="{{ asset_component('core/core.js') }}"></script>
		{# Custom Script #}
    	{% block javascript %}
		{% endblock %}
		{# Defined Data for Script #}
		{% block datascript %}
		{% endblock %}
	</body>
</html>
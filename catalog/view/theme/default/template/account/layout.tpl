{% use '@template/default/template/account/menu.tpl' %}
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
	    {{ block('menu_stylesheet') }}
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
	    {{ block('menu') }}
	    {{ block('menu_right') }}
	        <!-- Content START -->
	        <div id="content">
			{% block navbar %}
	            <div class="navbar hidden-print navbar-default box main" role="navigation">
	                <div class="user-action user-action-btn-navbar pull-right border-left">
	                    <a href="#menu-right" class="btn btn-sm btn-navbar btn-open-right"><i class="fa fa-comments fa-2x"></i></a>
	                </div>
	                <div class="user-action user-action-btn-navbar pull-left">
	                    <a href="#menu" class="btn btn-sm btn-navbar btn-open-left"><i class="fa fa-bars fa-2x"></i></a>
	                </div>
	                <ul class="notifications pull-left hidden-xs">
	                    <li class="dropdown notif">
	                        <a href="" class="dropdown-toggle"  data-toggle="dropdown"><i class="notif-block icon-envelope-1"></i><span class="fa fa-star"></span></a>
	                        <ul class="dropdown-menu chat media-list">
	                            <li class="media">
	                                <a class="pull-left" href="#"><img class="media-object thumb" src="{{ asset_css('platform/images/people/100/15.jpg') }}" alt="50x50" width="50"/></a>
	                                <div class="media-body">
	                                    <span class="label label-default pull-right">5 min</span>
	                                    <h5 class="media-heading">Adrian D.</h5>
	                                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	                                </div>
	                            </li>
	                            <li class="media">
	                                <a class="pull-left" href="#"><img class="media-object thumb" src="{{ asset_css('platform/images/people/100/16.jpg') }}" alt="50x50" width="50"/></a>
	                                <div class="media-body">
	                                    <span class="label label-default pull-right">2 days</span>
	                                    <h5 class="media-heading">Jane B.</h5>
	                                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	                                </div>
	                            </li>
	                            <li class="media">
	                                <a class="pull-left" href="#"><img class="media-object thumb" src="{{ asset_css('platform/images/people/100/17.jpg') }}" alt="50x50" width="50"/></a>
	                                <div class="media-body">
	                                    <span class="label label-default pull-right">3 days</span>
	                                    <h5 class="media-heading">Andrew M.</h5>
	                                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	                                </div>
	                            </li>
	                        </ul>
	                    </li>
	                </ul>
	                <div class="user-action pull-left menu-right-hidden-xs menu-left-hidden-xs border-left">
	                    <div class="dropdown username pull-left">
	                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                            <span class="media margin-none">
	                                <span class="pull-left"><img src="{{ asset_css('platform/images/people/35/16.jpg') }}" alt="user" class="img-circle"></span>
	                                <span class="media-body">Bill <span class="caret"></span></span>
	                            </span>
	                        </a>
	                        <ul class="dropdown-menu">
	                            <li><a href="about_1.html?lang=en" >About</a></li>
	                            <li><a href="messages.html?lang=en">Messages</a></li>
	                            <li><a href="timeline_3.html?lang=en">Profile</a></li>
	                            <li><a href="login.html?lang=en">Logout</a></li>
	                        </ul>
	                    </div>
	                </div>
	                <div class="input-group hidden-xs pull-left">
	                    <span class="input-group-addon"><i class="icon-search"></i></span>
	                    <input type="text" class="form-control" placeholder="Search a friend"/>
	                </div>
	            </div>
			{% endblock %}
			{% block body %}
			{% endblock %}
	        </div>
	        <!-- // Content END -->
	        <div class="clearfix"></div>
	        <!-- // Sidebar menu & content wrapper END -->
		{% block footer %}
	        <!-- Footer -->
	        <div id="footer" class="hidden-print">
	            <!--  Copyright Line -->
	            <div class="copy">&copy; 2012 - 2014 - <a href="http://www.mosaicpro.biz">MosaicPro</a> - All Rights Reserved. <a href="http://themeforest.net/?ref=mosaicpro" target="_blank">Purchase Social Admin Template</a> - Current version: v2.0.0-rc8 / <a target="_blank" href="../assets/../../CHANGELOG.txt?v=v2.0.0-rc8">changelog</a></div>
	            <!--  End Copyright Line -->
	        </div>
	        <!-- // Footer END -->
		{% endblock %}
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
	    {{ block('menu_javascript') }}
	    {{ block('menu_right_javascript') }}
		<!-- Custom Script -->
    	{% block javascript %}
		{% endblock %}
		<!-- Defined Data for Script -->
		{% block datascript %}
		{% endblock %}
	</body>
</html>
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
	    <!--[if lt IE 9]><link rel="stylesheet" href="{{ asset_css('platform/components/library/bootstrap/css/bootstrap.min.css') }}" /><![endif]-->
	    <link rel="stylesheet" href="{{ asset_css('platform/css/admin/module.admin.stylesheet-complete.min.css') }}" />
	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->
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
	    {% block menu %}
	        <!-- Main Sidebar Menu -->
	        <div id="menu" class="hidden-print hidden-xs sidebar-default sidebar-brand-primary">
	            <div id="sidebar-social-wrapper">
	                <div id="brandWrapper">
	                    <a href="index.html?lang=en"><span class="text">Social Admin Template</span></a>
	                </div>
	                <ul class="menu list-unstyled">
	                    <li class="hasSubmenu">
	                        <a href="#menu-bf3509948e337ef2a1e23f03f7e2aa66" data-toggle="collapse"><i class="icon-tv"></i><span>Layout</span></a>
	                        <ul class="collapse" id="menu-bf3509948e337ef2a1e23f03f7e2aa66">
	                            <li class=""><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&layout_fixed=false" class="no-ajaxify"><i class="fa fa-circle-o"></i><span>Fluid Layout</span></a></li>
	                            <li class=""><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&layout_fixed=true" class="no-ajaxify"><i class="fa fa-square-o"></i><span>Fixed Layout</span></a></li>
	                        </ul>
	                    </li>
	                    <li class="hasSubmenu active">
	                        <a href="#menu-38ce65e83e7e96d97d86eb66bf937bbf" data-toggle="collapse"><i class="icon-ship-wheel"></i><span>Timelines</span></a>
	                        <ul class="collapse in" id="menu-38ce65e83e7e96d97d86eb66bf937bbf">
	                            <li class="active"><a href="index.html?lang=en"><i class="fa fa-clock-o"></i><span>Timeline #1</span></a></li>
	                            <li class=""><a href="timeline_2.html?lang=en"><i class="fa fa-clock-o"></i><span>Timeline #2</span></a></li>
	                            <li class=""><a href="timeline_3.html?lang=en"><i class="fa fa-clock-o"></i><span>Timeline #3</span></a></li>
	                        </ul>
	                    </li>
	                    <li class="hasSubmenu">
	                        <a href="#menu-0610ab2bc09d06b421c4fdd003308e9b" data-toggle="collapse"><i class="icon-flip-camera-fill"></i><span>Photos</span></a>
	                        <ul class="collapse" id="menu-0610ab2bc09d06b421c4fdd003308e9b">
	                            <li class=""><a href="media_1.html?lang=en"><i class="fa fa-camera"></i><span>Photos #1</span></a></li>
	                            <li class=""><a href="media_2.html?lang=en"><i class="fa fa-camera"></i><span>Photos #2</span></a></li>
	                            <li class=""><a href="media_3.html?lang=en"><i class="fa fa-camera"></i><span>Photos #3</span></a></li>
	                        </ul>

	                    </li>
	                    <li class="hasSubmenu">
	                        <a href="#menu-55c974f2f7fe730f686eb11fd03da7f4" data-toggle="collapse"><i class="icon-group"></i><span>Friends</span></a>
	                        <ul class="collapse" id="menu-55c974f2f7fe730f686eb11fd03da7f4">
	                            <li class=""><a href="contacts_1.html?lang=en"><i class="fa fa-group"></i><span>Friends #1</span></a></li>
	                            <li class=""><a href="contacts_2.html?lang=en"><i class="fa fa-group"></i><span>Friends #2</span></a></li>
	                            <li class=""><a href="contacts_3.html?lang=en"><i class="fa fa-group"></i><span>Friends #3</span></a></li>
	                        </ul>
	                    </li>
	                    <li class="hasSubmenu">
	                        <a href="#menu-87fede55065b277c9c8311177147b7cd" data-toggle="collapse">
	                            <i class="icon-user-1"></i>
	                            <span>About</span>
	                        </a>
	                        <ul class="collapse" id="menu-87fede55065b277c9c8311177147b7cd">
	                            <li class="">
	                                <a href="about_1.html?lang=en">
	                                    <i class="fa fa-user"></i>
	                                    <span>About #1</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="about_2.html?lang=en">
	                                    <i class="fa fa-user"></i>
	                                    <span>About #2</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="about_3.html?lang=en">
	                                    <i class="fa fa-user"></i>
	                                    <span>About #3</span>
	                                </a>
	                            </li>
	                        </ul>
	                    </li>
	                    <li class="">
	                        <a href="messages.html?lang=en">
	                            <i class="icon-comment-typing"></i>
	                            <span>Messages</span>
	                        </a>
	                    </li>
	                    <li class="category border-top">
	                        <span>Skins</span>
	                    </li>
	                    <li class="reset">
	                        <div class="innerLR innerB border-bottom">
	                            <ul class="colors">
	                                <li class="active"><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=style-default" style="background-color: #25ad9f" class="no-ajaxify innerAll half"><span class="hide">style-default</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=green-army" style="background-color: #9FB478" class="no-ajaxify innerAll half"><span class="hide">green-army</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=alizarin-crimson" style="background-color: #F06F6F" class="no-ajaxify innerAll half"><span class="hide">alizarin-crimson</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=blue-gray" style="background-color: #5577b4" class="no-ajaxify innerAll half"><span class="hide">blue-gray</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=brown" style="background-color: #d39174" class="no-ajaxify innerAll half"><span class="hide">brown</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=purple-gray" style="background-color: #AF86B9" class="no-ajaxify innerAll half"><span class="hide">purple-gray</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=purple-wine" style="background-color: #CC6788" class="no-ajaxify innerAll half"><span class="hide">purple-wine</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=black-and-white" style="background-color: #979797" class="no-ajaxify innerAll half"><span class="hide">black-and-white</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=amazon" style="background-color: #8BC4B9" class="no-ajaxify innerAll half"><span class="hide">amazon</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=amber" style="background-color: #b0b069" class="no-ajaxify innerAll half"><span class="hide">amber</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=android-green" style="background-color: #A9C784" class="no-ajaxify innerAll half"><span class="hide">android-green</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=antique-brass" style="background-color: #B3998A" class="no-ajaxify innerAll half"><span class="hide">antique-brass</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=antique-bronze" style="background-color: #8D8D6E" class="no-ajaxify innerAll half"><span class="hide">antique-bronze</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=artichoke" style="background-color: #B0B69D" class="no-ajaxify innerAll half"><span class="hide">artichoke</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=atomic-tangerine" style="background-color: #F19B69" class="no-ajaxify innerAll half"><span class="hide">atomic-tangerine</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=bazaar" style="background-color: #98777B" class="no-ajaxify innerAll half"><span class="hide">bazaar</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=bistre-brown" style="background-color: #C3A961" class="no-ajaxify innerAll half"><span class="hide">bistre-brown</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=green" style="background-color: #77ac40" class="no-ajaxify innerAll half"><span class="hide">green</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=bittersweet" style="background-color: #d6725e" class="no-ajaxify innerAll half"><span class="hide">bittersweet</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=blueberry" style="background-color: #7789D1" class="no-ajaxify innerAll half"><span class="hide">blueberry</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=bud-green" style="background-color: #6fa362" class="no-ajaxify innerAll half"><span class="hide">bud-green</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=coral" style="background-color: #7eccc2" class="no-ajaxify innerAll half"><span class="hide">coral</span></a></li>
	                                <li><a href="?module=admin&page=index&url_rewrite=&build=&ajax_option=false&v=v2.0.0-rc8&skin=burnt-sienna" style="background-color: #E4968A" class="no-ajaxify innerAll half"><span class="hide">burnt-sienna</span></a></li>
	                            </ul>
	                        </div>
	                    </li>
	                    <li class="hasSubmenu">
	                        <a href="#menu-9c3ed4c9e4dda9428aaf279dae0e47c9" data-toggle="collapse">
	                            <i class="fa fa-th-large"></i>
	                            <span>Components</span>
	                        </a>
	                        <ul class="collapse" id="menu-9c3ed4c9e4dda9428aaf279dae0e47c9">
	                            <li class="">
	                                <a href="ui.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>UI Elements</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="icons.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Icons</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="typography.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Typography</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="calendar.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Calendar</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="tabs.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Tabs</span>
	                                </a>
	                            </li>
	                            <li class="hasSubmenu">
	                                <a href="#menu-73963b460f8ea31d6b49a71f620e448c" data-toggle="collapse">
	                                    <span class="badge pull-right badge-primary">3</span>
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Tables</span>
	                                </a>
	                                <ul class="collapse" id="menu-73963b460f8ea31d6b49a71f620e448c">
	                                    <li class="">
	                                        <a href="tables.html?lang=en">
	                                            <span>Tables</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="tables_responsive.html?lang=en">
	                                            <span>Responsive Tables</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="tables_pricing.html?lang=en">
	                                            <span>Pricing Tables</span>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </li>
	                            <li class="hasSubmenu">
	                                <a href="#menu-f2c965668bb2adde257a496cb2d1b1e0" data-toggle="collapse">
	                                    <span class="badge pull-right badge-primary">4</span>
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Forms</span>
	                                </a>
	                                <ul class="collapse" id="menu-f2c965668bb2adde257a496cb2d1b1e0">
	                                    <li class="">
	                                        <a href="form_wizards.html?lang=en">
	                                            <span>Form Wizards</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="form_elements.html?lang=en">
	                                            <span>Form Elements</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="form_validator.html?lang=en">
	                                            <span>Form Validator</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="file_managers.html?lang=en">
	                                            <span>File Managers</span>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </li>
	                            <li class="">
	                                <a href="sliders.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Sliders</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="charts.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Charts</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="grid.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Grid</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="notifications.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Notifications</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="modals.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Modals</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="thumbnails.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Thumbnails</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="carousels.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Carousels</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="image_crop.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Image Cropping</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="twitter.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Twitter API</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="infinite_scroll.html?lang=en">
	                                    <i class="fa fa-circle-o"></i>
	                                    <span>Infinite Scroll</span>
	                                </a>
	                            </li>
	                        </ul>
	                    </li>
	                    <li class="hasSubmenu">
	                        <a href="#menu-6b34c160323963872530a888d021ea33" data-toggle="collapse">
	                            <i class="fa fa-gift"></i>
	                            <span>Extra</span>
	                        </a>
	                        <ul class="collapse" id="menu-6b34c160323963872530a888d021ea33">
	                            <li class="hasSubmenu">
	                                <a href="#menu-25ba3c4e0b51c5226b43917a9805a2b1" data-toggle="collapse">
	                                    <i class="fa fa-dashboard"></i>
	                                    <span>Dashboard</span>
	                                </a>
	                                <ul class="collapse" id="menu-25ba3c4e0b51c5226b43917a9805a2b1">
	                                    <li class="">
	                                        <a href="dashboard_analytics.html?lang=en">
	                                            <i class="fa fa-bar-chart-o"></i>
	                                            <span>Analytics</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="dashboard_users.html?lang=en">
	                                            <i class="fa fa-user"></i>
	                                            <span>Users</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="dashboard_overview.html?lang=en">
	                                            <i class="fa fa-dashboard"></i>
	                                            <span>Overview</span>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </li>
	                            <li class="hasSubmenu">
	                                <a href="#menu-6acef886931f1e12c2f4752666b867d1" data-toggle="collapse">
	                                    <span class="badge pull-right badge-primary">30</span>
	                                    <i class="fa fa-envelope"></i>
	                                    <span>Email</span>
	                                </a>
	                                <ul class="collapse" id="menu-6acef886931f1e12c2f4752666b867d1">
	                                    <li class="">
	                                        <a href="email.html?lang=en">
	                                            <i class="fa fa-inbox"></i>
	                                            <span>Inbox</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="email_compose.html?lang=en">
	                                            <i class="fa fa-pencil"></i>
	                                            <span>Compose</span>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </li>
	                            <li class="">
	                                <a href="events.html?lang=en">
	                                    <span class="badge pull-right badge-primary">5</span>
	                                    <i class="fa fa-map-marker"></i>
	                                    <span>Events</span>
	                                </a>
	                            </li>
	                            <li class="hasSubmenu">
	                                <a href="#menu-7ed1ff5ea1a9aa0a5ef62e38b78d1713" data-toggle="collapse">
	                                    <i class="fa fa-map-marker"></i>
	                                    <span>Maps</span>
	                                </a>
	                                <ul class="collapse" id="menu-7ed1ff5ea1a9aa0a5ef62e38b78d1713">
	                                    <li class="">
	                                        <a href="maps_vector.html?lang=en">
	                                            <i class="fa fa-map-marker"></i>
	                                            <span>Vector Maps</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="maps_google.html?lang=en">
	                                            <i class="fa fa-map-marker"></i>
	                                            <span>Google Maps</span>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </li>
	                            <li class="">
	                                <a href="employees.html?lang=en">
	                                    <i class="fa fa-user"></i>
	                                    <span>Employees</span>
	                                </a>
	                            </li>
	                            <li class="hasSubmenu">
	                                <a href="#menu-a593bffa0d18010c284f2b4f6c1cf071" data-toggle="collapse">
	                                    <i class="fa fa-plus-circle"></i>
	                                    <span>Medical</span>
	                                </a>
	                                <ul class="collapse" id="menu-a593bffa0d18010c284f2b4f6c1cf071">
	                                    <li class="">
	                                        <a href="medical_overview.html?lang=en">
	                                            <i class="fa fa-medkit"></i>
	                                            <span>Overview</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="medical_patients.html?lang=en">
	                                            <span class="badge pull-right badge-primary">2</span>
	                                            <i class="fa fa-user-md"></i>
	                                            <span>Patients</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="medical_appointments.html?lang=en">
	                                            <i class="fa fa-stethoscope"></i>
	                                            <span>Appointments</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="medical_memos.html?lang=en">
	                                            <i class="fa fa-file-text-o"></i>
	                                            <span>Memos</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="medical_metrics.html?lang=en">
	                                            <i class="fa fa-bar-chart-o"></i>
	                                            <span>Metrics</span>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </li>
	                            <li class="hasSubmenu">
	                                <a href="#menu-384440b7fb0fff37065f7b8400eb1b2e" data-toggle="collapse">
	                                    <i class="fa fa-graduation-cap"></i>
	                                    <span>Courses</span>
	                                </a>
	                                <ul class="collapse" id="menu-384440b7fb0fff37065f7b8400eb1b2e">
	                                    <li class="">
	                                        <a href="courses_2.html?lang=en">
	                                            <i class="fa fa-graduation-cap"></i>
	                                            <span>Courses Home</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="courses_listing.html?lang=en">
	                                            <i class="fa fa-graduation-cap"></i>
	                                            <span>Courses Listing</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="course.html?lang=en">
	                                            <i class="fa fa-graduation-cap"></i>
	                                            <span>Course page</span>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </li>
	                            <li class="hasSubmenu">
	                                <a href="#menu-12ed86bfd2b8704810036194a6fd47c3" data-toggle="collapse">
	                                    <i class="fa fa-file-text-o"></i>
	                                    <span>Content</span>
	                                </a>
	                                <ul class="collapse" id="menu-12ed86bfd2b8704810036194a6fd47c3">
	                                    <li class="">
	                                        <a href="news.html?lang=en">
	                                            <i class="fa fa-file-text"></i>
	                                            <span>News</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="faq.html?lang=en">
	                                            <i class="fa fa-question-circle"></i>
	                                            <span>FAQ</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="search.html?lang=en">
	                                            <i class="fa fa-search"></i>
	                                            <span>Search</span>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </li>
	                            <li class="hasSubmenu">
	                                <a href="#menu-b874b5d8624a9053d23a26052b2ed6d6" data-toggle="collapse">
	                                    <i class="fa fa-bank"></i>
	                                    <span>Financial</span>
	                                </a>
	                                <ul class="collapse" id="menu-b874b5d8624a9053d23a26052b2ed6d6">
	                                    <li class="">
	                                        <a href="invoice.html?lang=en">
	                                            <i class="fa fa-file-text-o"></i>
	                                            <span>Invoice</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="finances.html?lang=en">
	                                            <i class="fa fa-legal"></i>
	                                            <span>Finances</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="bookings.html?lang=en">
	                                            <i class="fa fa-ticket"></i>
	                                            <span>Bookings</span>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </li>
	                            <li class="hasSubmenu">
	                                <a href="#menu-8a758d610ae3ab630ad2d3ff3b4f6c6d" data-toggle="collapse">
	                                    <i class="fa fa-life-saver"></i>
	                                    <span>Support</span>
	                                </a>
	                                <ul class="collapse" id="menu-8a758d610ae3ab630ad2d3ff3b4f6c6d">
	                                    <li class="">
	                                        <a href="support_tickets.html?lang=en">
	                                            <span class="badge pull-right badge-primary">45</span>
	                                            <i class="fa fa-ticket"></i>
	                                            <span>Tickets</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="support_forum_overview.html?lang=en">
	                                            <i class="fa fa-folder-o"></i>
	                                            <span>Forum Overview</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="support_forum_post.html?lang=en">
	                                            <i class="fa fa-folder-o"></i>
	                                            <span>Forum Post</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="support_kb.html?lang=en">
	                                            <i class="fa fa-file-text-o"></i>
	                                            <span>Knowledge Base</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="support_questions.html?lang=en">
	                                            <span class="badge pull-right badge-primary">7</span>
	                                            <i class="fa fa-question"></i>
	                                            <span>Questions</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="support_answers.html?lang=en">
	                                            <i class="fa fa-info"></i>
	                                            <span>Answers</span>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </li>
	                            <li class="hasSubmenu">
	                                <a href="#menu-f9dca98bffdd7f5e6f978eccffc09cd8" data-toggle="collapse">
	                                    <i class="fa fa-shopping-cart"></i>
	                                    <span>eCommerce</span>
	                                </a>
	                                <ul class="collapse" id="menu-f9dca98bffdd7f5e6f978eccffc09cd8">
	                                    <li class="">
	                                        <a href="shop_products.html?lang=en">
	                                            <i class="fa fa-list"></i>
	                                            <span>Products</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="shop_edit_product.html?lang=en">
	                                            <i class="fa fa-pencil"></i>
	                                            <span>Edit product</span>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </li>
	                            <li class="hasSubmenu">
	                                <a href="#menu-fdd547113b418ca1a0e20ae3446cd99e" data-toggle="collapse">
	                                    <i class="fa fa-user"></i>
	                                    <span>Account</span>
	                                </a>
	                                <ul class="collapse" id="menu-fdd547113b418ca1a0e20ae3446cd99e">
	                                    <li class="">
	                                        <a href="login.html?lang=en" class="no-ajaxify">
	                                            <i class="fa fa-user"></i>
	                                            <span>Login</span>
	                                        </a>
	                                    </li>
	                                    <li class="">
	                                        <a href="signup.html?lang=en" class="no-ajaxify">
	                                            <i class="fa fa-plus-circle"></i>
	                                            <span>Signup</span>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </li>
	                            <li class="">
	                                <a href="surveys_multiple.html?lang=en">
	                                    <i class="fa fa-question-circle"></i>
	                                    <span>Surveys</span>
	                                </a>
	                            </li>
	                            <li class="">
	                                <a href="error.html?lang=en" class="no-ajaxify">
	                                    <i class="fa fa-exclamation-triangle"></i>
	                                    <span>Error</span>
	                                </a>
	                            </li>
	                        </ul>
	                    </li>
	                    <li class="category border-top">
	                        <span>News Feeds</span>
	                    </li>
	                    <li class="reset">
	                        <ul>
	                            <li class="media news-item">
	                                <span class="news-item-success pull-right "><i class="fa fa-circle"></i></span>
	                                <span class="pull-left media-object">
	                                    <i class="fa fa-fw fa-bell"></i>
	                                </span>
	                                <div class="media-body">
	                                    <a href="" class="text-white">Adrian</a> just logged in
	                                    <span class="time">2 min ago</span>
	                                </div>
	                            </li>
	                            <li class="media news-item">
	                                <span class="news-item-success pull-right "><i class="fa fa-circle"></i></span>
	                                <span class="pull-left media-object">
	                                    <i class="fa fa-fw fa-bell"></i>
	                                </span>
	                                <div class="media-body">
	                                    <a href="" class="text-white">Adrian</a> just added  <a href="" class="text-white">mosaicpro</a> as their office
	                                    <span class="time">2 min ago</span>
	                                </div>
	                            </li>
	                            <li class="media news-item">
	                                <span class="pull-left media-object">
	                                    <i class="fa fa-fw fa-bell"></i>
	                                </span>
	                                <div class="media-body">
	                                    <a href="" class="text-white">Adrian</a> just logged in
	                                    <span class="time">2 min ago</span>
	                                </div>
	                            </li>
	                            <li class="media news-item">
	                                <span class="pull-left media-object">
	                                    <i class="fa fa-fw fa-bell"></i>
	                                </span>
	                                <div class="media-body">
	                                    <a href="" class="text-white">Adrian</a> just logged in
	                                    <span class="time">2 min ago</span>
	                                </div>
	                            </li>
	                            <li class="media news-item">
	                                <span class="pull-left media-object">
	                                    <i class="fa fa-fw fa-bell"></i>
	                                </span>
	                                <div class="media-body">
	                                    <a href="" class="text-white">Adrian</a> just logged in
	                                    <span class="time">2 min ago</span>
	                                </div>
	                            </li>
	                        </ul>
	                    </li>
	                    <li class="category">
	                        <span>Filter</span>
	                    </li>
	                    <li class="reset">
	                        <div class="innerLR innerB">
	                            <ul>
	                                <li><a href=""><span class="fa fa-fw fa-circle-o text-success"></span> Work Related</a></li>
	                                <li><a href=""><span class="fa fa-fw fa-circle-o text-primary"></span> Very Important</a></li>
	                                <li><a href=""><span class="fa fa-fw fa-circle-o text-info"></span> Friends &amp; Family</a></li>
	                            </ul>
	                        </div>
	                    </li>
	                </ul>
	            </div>
	        </div>
	        <!-- // Main Sidebar Menu END -->
		{% endblock %}
		{% block menu_right %}
	        <div id="menu-right">
	            <div>
	                <button class="btn btn-inverse btn-xs btn-close" data-toggle="sidr-close" data-menu="menu-right"><i class="fa fa-times"></i></button>
	                <div class="tab-content">
	                    <div class="tab-pane" id="chat-conversation">
	                        <ul>
	                            <li>
	                                <div class="innerAll"><button class="btn btn-primary" data-toggle="tab" data-target="#chat-list"><i class="fa fa-fw fa-user"></i> friends</button></div>
	                            </li>
	                            <li class="conversation innerAll">
	                                <!-- Media item -->
	                                <div class="media">
	                                    <small class="author"><a href="#" title="" class="strong">Jane Doe</a></small>
	                                    <div class="media-object pull-left"><img src="{{ asset_css('platform/images/people/50/1.jpg') }}" alt="Image" class="img-circle" /></div>
	                                    <div class="media-body">
	                                        <blockquote>
	                                            <small class="date"><cite>just now</cite></small>
	                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, sit?</p>
	                                        </blockquote>
	                                    </div>
	                                </div>
	                                <!-- // Media item END -->
	                                <!-- Media item -->
	                                <div class="media primary right">
	                                    <small class="author"><a href="#" title="" class="strong">John Doe</a></small>
	                                    <div class="media-object pull-right"><img src="{{ asset_css('platform/images/people/50/2.jpg') }}" alt="Image" class="img-circle" /></div>
	                                    <div class="media-body">
	                                        <blockquote class="pull-right">
	                                            <small class="date"><cite>15 seconds ago</cite></small>
	                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, molestiae!</p>
	                                        </blockquote>
	                                    </div>
	                                </div>
	                                <!-- // Media item END -->
	                                <!-- Media item -->
	                                <div class="media">
	                                    <small class="author"><a href="#" title="" class="strong">Ricky</a></small>
	                                    <div class="media-object pull-left"><img src="{{ asset_css('platform/images/people/50/1.jpg') }}" alt="Image" class="img-circle" /></div>
	                                    <div class="media-body">
	                                        <blockquote>
	                                            <small class="date"><cite>5 minutes ago</cite></small>
	                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, distinctio!</p>
	                                        </blockquote>
	                                    </div>
	                                </div>
	                                <!-- // Media item END -->
	                            </li>
	                        </ul>
	                    </div>
	                    <div class="tab-pane active" id="chat-list">
	                        <div class="mixitup" id="mixitup-chat" data-show-default="mixit-chat-1" data-layout-mode="list" data-target-selector=".mix" data-filter-selector=".filter-chat">
	                            <ul>
	                                <li class="category">Groups</li>
	                                <li class="reset">
	                                    <div class="innerLR">
	                                        <ul>
	                                            <li class="filter-chat" data-filter="mixit-chat-1"><a href="" class="no-ajaxify"><span class="fa fa-fw fa-circle-o text-success"></span> Work Related</a></li>
	                                            <li class="filter-chat" data-filter="mixit-chat-2"><a href="" class="no-ajaxify"><span class="fa fa-fw fa-circle-o text-primary"></span> Very Important</a></li>
	                                            <li class="filter-chat" data-filter="mixit-chat-3"><a href="" class="no-ajaxify"><span class="fa fa-fw fa-circle-o text-info"></span> Friends &amp; Family</a></li>
	                                        </ul>
	                                    </div>
	                                </li>
	                                <li class="category border-bottom">Online</li>
	                                <li>
	                                    <div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/1.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Perpetua Inger</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/2.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Zoticus Axel</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/3.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Yun Ragna</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/4.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Victor Tacitus</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/5.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Arden Catharine</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/6.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Mihovil Govinda</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/7.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Mariya Hadya</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/8.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Tahir Benedikt</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/9.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Olayinka Kristin</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/10.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Danko Nikodim</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/11.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Zoja Aileas</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/12.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Alphonsus Braidy</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/13.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Helene Liana</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/14.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Sebastian Niklas</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/15.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Elvire Maya</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class=" mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/16.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Kerman Otakar</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
		{% endblock %}
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
		<!-- Custom Script -->
    	{% block javascript %}
		{% endblock %}
		<!-- Defined Data for Script -->
		{% block datascript %}
		{% endblock %}
	</body>
</html>
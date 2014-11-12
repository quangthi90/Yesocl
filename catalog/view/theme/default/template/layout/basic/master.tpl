<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if !IE]><!-->
<html class="sidebar sidebar-social footer-sticky">
<!-- <![endif]-->
<head>
    <title>{% block title %}{% trans %}Home Feed{% endtrans %}{% endblock %} | Yesocl - {% trans %}Social Network{% endtrans %}</title>
    <base href="{{ base }}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="image/template/favicon.png">
    <!--[if lt IE 9]>
        <link rel="stylesheet" href="../assets/components/library/bootstrap/css/bootstrap.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset_css('common/core.css') }}" />
    <link rel="stylesheet" href="{{ asset_css('common/custom.css') }}" />

    {% block stylesheet %}
    {% endblock %}
        
    {#  HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries #}
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif] -->    

    {# HEADER SCRIPTS GO HERE #}
    <script> if ( /*@cc_on!@*/ false && document.documentMode === 10) { document.documentElement.className += ' ie ie10'; } </script>
</head>
<body class="menu-right-hidden">
    <div id="common-loading">
        <div class="spinner">
            <div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div><span class="text">Processing</span>
        </div>    
    </div>    
    <div class="container-fluid menu-hidden">
        <!-- SIDEBAR LEFT -->
        {% block sidebarLeft %}
            {% if is_logged() == true %}
                {{ include(template_from_string( leftsidebar )) }}            
            {% endif %}
        {% endblock %}
        
        <!-- SIDEBAR CHAT RIGHT -->
        {% block sidebarChatRight %}
            {{ include(template_from_string( rightsidebar )) }}
        {% endblock %}  
        <div id="content">
            <!-- NAVBAR FOR FLUID LAYOUT HERE -->
            {% block navbar %}
                {{ include(template_from_string( navbar )) }}
            {% endblock %}
            <!-- CONTENT -->
            {% block body %}
            {% endblock %}                  
        </div>
        <div class="clearfix"></div>
        <!-- FOOTER HERE -->
        {% block footer %}
            {{ include(template_from_string( footer )) }}
        {% endblock %}
    </div>
    {% block common_html %}   
    {% endblock %}    
    <!-- REQUIRED VARIABLES SCRIPTS -->
    <script data-id="App.Config">
        var App = {}; 
        var primaryColor = "#25ad9f",
        dangerColor = "#b55151",
        successColor = "#609450",
        infoColor = "#4a8bc2",
        warningColor = "#ab7a4b",
        inverseColor = "#45484d";
    </script>
    <!-- FOOTER SCRIPTS -->
    <!-- Library Script -->
    <script src="{{ asset_js('library/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset_js('library/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset_js('library/modernizr/modernizr.js') }}"></script>
    <script src="{{ asset_js('library/bootstrap/js/bootstrap.min.js') }}"></script> 
    <script src="{{ asset_js('library/momment/moment.min.js') }}"></script>
    <script src="{{ asset_js('library/knockout/knockout.js') }}"></script>
    <script src="{{ asset_js('library/pusher/pusher.min.js') }}"></script>
    {#<script src="{{ asset_js('library/core_less-js/less.min.js') }}"></script>#}
    <script src="{{ asset_js('library/core_browser/ie/ie.prototype.polyfill.js') }}"></script>     
    <script src="{{ asset_js('library/core_nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset_js('library/core_breakpoints/breakpoints.js') }}"></script>
    <script src="{{ asset_js('library/menu_sidr/jquery.sidr.js') }}"></script>
    <script src="{{ asset_js('library/ui_modals/bootbox.min.js') }}"></script>
    <script src="{{ asset_js('library/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset_js('library/expander/expander.min.js') }}"></script>
    <script src="{{ asset_js('library/autosize/jquery.autosize.min.js') }}"></script>
    <script src="{{ asset_js('library/mention/jquery.elastic.js') }}"></script>
    <script src="{{ asset_js('library/mention/underscore.min.js') }}"></script>
    <script src="{{ asset_js('library/mention/jquery.mentions.js') }}"></script>
    {% block library_javascript %}
    {% endblock %}

    <!-- Common Script -->    
    <script src="{{ asset_js('common/core.global.js') }}"></script>
    <script src="{{ asset_js('common/core.effects_init.js') }}"></script>
    <script src="{{ asset_js('common/sidebar.main_init.js') }}"></script>
    <script src="{{ asset_js('common/sidebar.collapse_init.js') }}"></script>
    <script src="{{ asset_js('common/menus.sidebar.chat_init.js') }}"></script>
    <script src="{{ asset_js('common/ko.common.js') }}"></script>
    <script src="{{ asset_js('models/common-models.js') }}"></script>
    <script src="{{ asset_js('pages/common/widgets.js') }}"></script>    
    <script id="Yes.Global">
        (function(Y, undefined) {
            var routing = '{{ get_routing_list()|raw }}';
            Y.Routing = new Y.RoutingManager( JSON.parse(routing) );
            Y.Routing.BaseUrl = '{{ base }}'.toLowerCase();     
            Y.Constants.PusherMessages = JSON.parse('{{ get_live_time_events()| raw }}');
            var user = '{{ get_current_user()|json_encode()|raw }}';
            if (user){
                Y.Utils.setCurrentUser(JSON.parse(user));
            }            
        }(YesGlobal));
    </script>
    {% block common_javascript %}
    {% endblock %}
    
    {# Custom Script #}
    {% block javascript %} 
    {% endblock %}
    {# Defined Data for Script #}
    {% block datascript %}
    {% endblock %}

</body>
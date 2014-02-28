{% use '@template/default/template/common/language_block.tpl' %}

<!DOCTYPE html>
<html>
	<head>		
		<title>{% block title %}{% trans %}Home Feed{% endtrans %}{% endblock %} | Yesocl - {% trans %}Social Network{% endtrans %}</title>
		<base href="{{ base }}" />		
		<!-- Icon -->
		<link rel="shortcut icon" href="image/template/favicon.png">		
		<!-- Library css -->
		<link href="{{ asset_css('libs/bootstrap.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/bootstrap-responsive.min.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/fortAwesome/css/font-awesome.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/uniform.default.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/magnific-popup.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/mcustomscrollbar.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/mention-input.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/summernote.css') }}" rel="stylesheet" media="screen" />
		<!-- Common css -->
		<link href="{{ asset_css('common/yes.css') }}" rel="stylesheet" media="screen" />
		<!-- Custom css -->
		{% block stylesheet %}
		{% endblock %}
	</head>
	<body>
		{{ include(template_from_string( header )) }}
		{{ include(template_from_string( sidebar_control )) }}
		<div id="y-container">
			{% block body %}
			{% endblock %}
		</div>
		{{ include(template_from_string( footer )) }}
		<div id="overlay"></div>
		
		{{ include('@template/default/template/post/common/liked_user.tpl') }}
		{{ include('@template/default/template/common/quick_search.tpl') }}	
		{{ block('common_language_block') }}
		
		<div id="html-template" class="hidden">
			{% block template %}
			{% endblock %}
		</div>

    	<!-- Library Script -->
    	<script type="text/javascript" src="{{ asset_js('jquery/jquery-1.8.3.min.js') }}"></script>
    	<script type="text/javascript" src="{{ asset_js('libs/jquery.easing.1.3.js') }}"></script>
    	<script type="text/javascript" src="{{ asset_js('libs/jquery.nicescroll.js') }}"></script>
    	<script type="text/javascript" src="{{ asset_js('libs/jquery.uniform.min.js') }}"></script>
    	<script type="text/javascript" src="{{ asset_js('libs/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.tmpl.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.tmplPlus.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.timeago.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.magnific-popup.min.js') }}">
		</script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.mcustomscrollbar.min.js') }}">
		</script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.bootbox.js') }}">
		</script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.typeahead.js') }}">
		</script>
		<script type="text/javascript" src="{{ asset_js('libs/mention/jquery.elastic.js') }}">
		</script>
		<script type="text/javascript" src="{{ asset_js('libs/mention/jquery.events.input.js') }}">
		</script>
		<script type="text/javascript" src="{{ asset_js('libs/mention/underscore.min.js') }}">
		</script>
		<script type="text/javascript" src="{{ asset_js('libs/mention/jquery.mentions.input.js') }}">
		</script>		
		<script type="text/javascript" src="{{ asset_js('libs/jquery.hotkeys.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/summernote.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.hotkeys.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.cookie.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.truncate.min.js') }}"></script>
		<!-- Common Script -->
		<script type="text/javascript" src="{{ asset_js('yes.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('common.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('routing.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('search.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('account.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('friend.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('notification.js') }}"></script>
		<!-- Custom Script -->
    	{% block javascript %}
		{% endblock %}
		<!-- Defined Data for Script -->
		<script type="text/javascript">
			var _routing = '{{ print_routing_list() }}';
			window.yRouting = new Routing( JSON.parse(_routing) );
		</script>
		{% block datascript %}
		{% endblock %}
	</body>
</html>
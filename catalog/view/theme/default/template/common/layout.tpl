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
		<link href="{{ asset_css('libs/select2.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('libs/select2-bootstrap.css') }}" rel="stylesheet" media="screen" />
		<!-- Common css -->
		<link href="{{ asset_css('common/yes.css') }}" rel="stylesheet" media="screen" />
		<!-- Custom css -->
		{% block stylesheet %}
		{% endblock %}
	</head>
	<body>
		{{ include(template_from_string( header )) }}
		{% if is_logged() == true %}
			{{ include(template_from_string( sidebar_control )) }}
		{% endif %}
		<div id="y-container">
			{% block body %}
			{% endblock %}
		</div>
		{{ include(template_from_string( footer )) }}
		<div id="overlay"></div>
		<div id="yes-loading-more" class="hidden">
			<div id="fountainG">
				<div id="fountainG_1" class="fountainG"></div><div id="fountainG_2" class="fountainG"></div>
				<div id="fountainG_3" class="fountainG"></div><div id="fountainG_4" class="fountainG"></div>
				<div id="fountainG_5" class="fountainG"></div><div id="fountainG_6" class="fountainG"></div>
				<div id="fountainG_7" class="fountainG"></div><div id="fountainG_8" class="fountainG"></div>
			</div>
		</div>
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
		<script type="text/javascript" src="{{ asset_js('libs/jquery.magnific-popup.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.mcustomscrollbar.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.bootbox.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.typeahead.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/mention/jquery.elastic.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/mention/jquery.events.input.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/mention/underscore.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/mention/jquery.mentions.input.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.hotkeys.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/summernote.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.hotkeys.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.cookie.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.truncate.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/knockout.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/momment/moment.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/expander/expander.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/select/select2.min.js') }}"></script>
		<!-- Common Script -->
		<script type="text/javascript" src="{{ asset_js('yes.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('common-utils.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('common.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('ko-model.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('object.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('search.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('account.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('friend.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('notification.js') }}"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				var user = '{{ get_user_data()|raw }}';
				var routing = '{{ get_routing_list()|raw }}';
				window.yRouting = new Routing( JSON.parse(routing) );
				if ( user ){
					window.yUser = JSON.parse(user);
				}else{
					$('.post_meta').find('.post_like').hide();
					$('.post_meta').find('.post_cm').hide();
				}
				window.yUsers = new HashTable();
			});

			var sConfirmDeletePost = '{% trans %}Are you sure you want to delete this post {% endtrans %}?',
				sCancel = '{% trans %}Cancel{% endtrans %}',
				sConfirm = '{% trans %}Confirm{% endtrans %}',
				sOk = '{% trans %}Ok{% endtrans %}';
		</script>

		<script type="text/javascript"><!--//
			$(document).ready(function() {
				var oRefreshOptions = {
					'id': 'refresh-page-item',
				}
				var viewModel = {
					'refreshOptionConfigModel': new RefreshOptionConfigModel(oRefreshOptions),
				}
				ko.applyBindings(viewModel, document.getElementById('y-sidebar'));
			});
		//--></script>

		<!-- Custom Script -->
    	{% block javascript %}
		{% endblock %}
		<!-- Defined Data for Script -->
		{% block datascript %}
		{% endblock %}

		{% if get_current_user() == null %}
		<!-- Facebook login -->
		<script src="http://connect.facebook.net/en_US/all.js#appId={{ fb_app_id }}&xfbml=1"></script>
		<script type="text/javascript">
			FB.init({
	            appId   : '{{ get_fb_api_id() }}',
	            status  : true,
	            cookie  : true,
	            xfbml   : true
	        });
	        function callFBLogin(){
	            FB.login(function(response) {
	                if (response.authResponse) {
	                    FB.api('/me', function(response) {
	                        var promise = $.ajax({
	                            type: 'POST',
	                            url:  window.yRouting.generate('FaceBookConnect'),
	                            dataType: 'json',
	                            data: {data: response}
	                        });

	                        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
	                        var $old_icon = $('.btn-fb-login').find('i');
	                        var f        = function() {
	                            $spinner.remove();
	                            $('.btn-fb-login').removeClass('disabled').find('a').prepend($old_icon);
	                        };

	                        $old_icon.remove();
	                        $('.btn-fb-login').addClass('disabled').find('a').prepend($spinner);

	                        promise.then(f, f);

	                        promise.then(function(data){
	                            if (data != null && data.success == 'ok' ) {
	                                window.location.reload();
	                            }else{
	                                showMessage('Error', data.error);
	                            }
	                        });
	                    });
	                }else{
	                    /*Todo: add message login facebook fail here...*/
	                    alert("Access not authorized.");
	                }
	            },{scope: 'email,user_birthday'});
	        }
	        $('.btn-fb-login').click(function(){
	            if ( $(this).hasClass('disabled') ){
	                return false;
	            }
	            $(this).addClass('disabled');
	            callFBLogin();
	        });
		</script>
		{% endif %}
	</body>
</html>
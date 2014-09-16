<!DOCTYPE html>
<html>
	<head>		
		<title>{% block title %}{% trans %}Welcome Page{% endtrans %}{% endblock %} | Yesocl - Social Network</title>
		<base href="{{ base }}" />
		<link rel="shortcut icon" href="image/template/favicon.png">
		<link href="{{ asset_css('old/libs/bootstrap.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('old/libs/bootstrap-responsive.min.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('old/libs/uniform.default.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('old/libs/fortAwesome/css/font-awesome.css') }}" rel="stylesheet" media="screen" />
		<link href="{{ asset_css('old/welcome.css') }}" rel="stylesheet" media="screen" /> 
		{% block stylesheet %}
		{% endblock %}
	</head>
	<body>	
		<div id="y-container">
			{{ include(template_from_string( header )) }}

			{% block body %}
			{% endblock %}

			{{ include(template_from_string( footer )) }}
		</div>
    	<div id="overlay"></div>
    	<script type="text/javascript" src="{{ asset_js('jquery/jquery-1.8.3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.uniform.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('libs/jquery.bootbox.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('yes.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('account.js') }}"></script>
		<script type="text/javascript" src="{{ asset_js('object.js') }}"></script>
    	{% block javascript %}
		{% endblock %}
		<!-- Defined Data for Script -->
		<script type="text/javascript">
			var _routing = '{{ get_routing_list()|raw }}';
			window.yRouting = new Routing( JSON.parse(_routing) );
		</script>
		{% block datascript %}
		{% endblock %}
		<script src="http://connect.facebook.net/en_US/all.js#appId={{ fb_app_id }}&xfbml=1"></script>
	    <script type="text/javascript">
	        function showMessage (titleName, messageToShow){
	            bootbox.dialog({
	                message: messageToShow,
	                title: titleName,
	                buttons: {                    
	                    success: {
	                        label: "Ok",
	                        className: "btn-primary"
	                    }
	                }
	            });
	        };

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
	</body>
</html>
{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/common/html_block.tpl' %}
{% use '@template/default/template/post/common/post_item_list.tpl' %}
{% use '@template/default/template/post/common/comment_post_list.tpl' %}

{% block title %}{% trans %}Home Feed{% endtrans %}{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('home.css') }}" rel="stylesheet" media="screen" />
    {{ block('post_common_comment_post_list_style') }}
{% endblock %}

{% block body %}
	<div id="y-content" class="no-header-fixed">
		<div id="y-main-content" class="has-horizontal post-has-block">
		{% for branch in branches %}
			{% set posts = all_posts[branch.slug] %}
			{% if posts|length > 0 %}
		        {% set style = random([1, 2]) %}
	            {% set block_info = branch %}
	            {% set post_type = branch_type %}
	            {% set block_href = path('BranchCategories', {branch_slug: branch.slug}) %}
	            {{ block('post_common_post_item_list') }}
			{% endif %}
		{% endfor %}
		{% if fl_posts|length > 0 %}
			{% set style = random([1, 2]) %}
			{% set posts = fl_posts %}
            {% set block_info = {name: 'Follow Posts'|trans} %}
            {% set block_href = path('FollowPost') %}
            {% set post_type = user_type %}
            {{ block('post_common_post_item_list') }}
		{% endif %}
		</div>
	</div>
	{{ block('post_common_comment_post_list') }}
{% endblock %}

{% block template %}
    {{ block('post_common_comment_post_list_template') }}
{% endblock %}

{% block javascript %}
	{{ block('post_common_comment_post_list_javascript') }}
	
	{% if warning_active is defined %}
	<script type="text/javascript">
		bootbox.dialog({
			message: "{{warning_active}}",
			title: "Active warning !",
			buttons: {
				resend: {
					label: "Resend active email",
					className: "btn-primary js-resend-active-link",
					callback: function() {
					    var promise = $.ajax({
			                type: 'POST',
			                url:  yRouting.generate('ReActiveAccount'),
			                dataType: 'json'
			            });
			            var $el = $('.js-resend-active-link');
			            var $spinner = $('<i class="icon-spinner icon-spin"></i>');
				        var $old_icon = $el.find('i');
				        var f        = function() {
				            $spinner.remove();
				            $el.html($old_icon);
				        };

				        $el.addClass('disabled').html($spinner);

				        promise.then(f, f);

			            promise.then(function(data) { 
			                if(data.success == 'ok'){
			                	alert('Resend active link success!');
			                }
			            });
				  	}
				},
				success: {
					label: "Ok",
					className: "btn-primary"
				}
			}
		});
	</script>
	{% endif %}

	{% set currUser = get_current_user() %}
	{% if is_logged() == false or currUser == null %}
	<script src="http://connect.facebook.net/en_US/all.js#appId={{ fb_app_id }}&xfbml=1"></script>
	<script type="text/javascript">
    FB.init({
        appId   : '{{ fb_app_id }}',
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
                        if ( data.success == 'ok' ){
                            window.location.reload();
                        }else{
                            /*Todo: add message error here...*/
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
        return false;
    });
    </script>
    {% endif %}
{% endblock %}
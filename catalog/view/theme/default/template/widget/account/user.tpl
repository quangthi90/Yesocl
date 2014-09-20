{% set currUser = get_current_user() %}
{% if is_logged() and currUser != null %}
	<div class="widget">
		<div class="widget-body text-center">
			<a href="{{ path('WallPage', {user_slug: currUser.slug}) }}"><img src="{{ currUser.avatar }}" width="120" alt="" class="img-circle"></a>
			<h2 class="strong margin-none">{{ currUser.username }}</h2>
			<div class="innerB">{{ currUser.current }}</div>
			<div class="btn-group-vertical btn-block">
				<a href="{{ path('ProfileEdit') }}" class="btn btn-default"><i class="fa fa-cog pull-right"></i> {% trans %}Edit profile{% endtrans %}</a>
				<a href="{{ path('Logout') }}" class="btn btn-default"><i class="fa fa-cog pull-right"></i> {% trans %}Log out{% endtrans %}</a>
			</div>
		</div>
	</div>
{% endif %}
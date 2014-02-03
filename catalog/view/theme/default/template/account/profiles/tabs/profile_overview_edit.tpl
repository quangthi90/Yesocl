{% block profiles_tabs_profile_overview_edit %}
<div class="profile-overview" id="profile-overview-tab" style="opacity: 0;">
	<div class="profile-user">
		<a href="{{ path('WallPage', {user_slug: user.slug}) }}" class="profile-img">
			<img src="{{ user.avatar }}" alt="{{ user.username }}">
		</a>
		<a href="{{ path('WallPage', {user_slug: user.slug}) }}" class="profile-name">{{ user.username }}</a>
		<span class="profile-metainfo">{{ user.current }}</span>
	</div>
	<div class="profile-categories">
		<ul>
			<li class="profile-category-li">
				<a class="btn btn-yes profile-category-item" href="{{ path('ProfilePage', {user_slug: user.slug}) }}">
					<i class="icon-check"></i>
					<span>{% trans %}View your profile{% endtrans %}</span>
				</a>
			</li>
			<li class="profile-category-li">
				<a class="btn btn-yes profile-category-item profile-navigation-item" href="#1">
					<i class="icon-check"></i>
					<span>{% trans %}Personal Information{% endtrans %}</span>
				</a>
			</li>
			<li class="profile-category-li">
				<a class="btn btn-yes profile-category-item profile-navigation-item" href="#2">
					<i class="icon-check"></i>
					<span>{% trans %}Summary{% endtrans %}</span>
				</a>
			</li>
			<li class="profile-category-li">
				<a class="btn btn-yes profile-category-item profile-navigation-item" href="#3">
					<i class="icon-check"></i>
					<span>{% trans %}Education Background{% endtrans %}</span>
				</a>
			</li>
			<li class="profile-category-li">
				<a class="btn btn-yes profile-category-item profile-navigation-item" href="#4">
					<i class="icon-check"></i>
					<span>{% trans %}Work Experience{% endtrans %}</span>
				</a>
			</li>
			<li class="profile-category-li">
				<a class="btn btn-yes profile-category-item profile-navigation-item" href="#5">
					<i class="icon-check"></i>
					<span>{% trans %}Skill Sets{% endtrans %}</span>
				</a>
			</li>
		</ul>
	</div>
</div>
{% endblock %}

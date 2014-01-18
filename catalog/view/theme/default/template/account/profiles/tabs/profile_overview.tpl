{% block profiles_tabs_profile_overview %}
<div class="fl profile-column profile-overview">
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
				<a class="btn btn-yes profile-category-item" href="#profile-column-information">
					<i class="icon-check"></i>
					<span{% trans %}>Personal Information{% endtrans %}</span>
				</a>
			</li>
			<li class="profile-category-li">
				<a class="btn btn-yes profile-category-item" href="#profile-column-summary">
					<i class="icon-check"></i>
					<span>{% trans %}Summary{% endtrans %}</span>
				</a>
			</li>
			<li class="profile-category-li">
				<a class="btn btn-yes profile-category-item" href="#profile-column-education">
					<i class="icon-check"></i>
					<span>{% trans %}Education Background{% endtrans %}</span>
				</a>
			</li>
			<li class="profile-category-li">
				<a class="btn btn-yes profile-category-item" href="#profile-column-experience">
					<i class="icon-check"></i>
					<span>{% trans %}Work Experience{% endtrans %}</span>
				</a>
			</li>
			<li class="profile-category-li">
				<a class="btn btn-yes profile-category-item" href="#profile-column-skill">
					<i class="icon-check"></i>
					<span>{% trans %}Skill Sets{% endtrans %}</span>
				</a>
			</li>
		</ul>
	</div>
</div>
{% endblock %}

{% block profiles_tabs_profile_overview_javascript %}
{% endblock %}
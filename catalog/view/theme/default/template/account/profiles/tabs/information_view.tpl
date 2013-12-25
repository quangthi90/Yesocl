{% block profiles_tabs_information_view %}
<div class="fl profile-column profile-column-information" id="profile-column-information">
	<h3 class="profile-column-title"><i class="icon-list"></i> Personal Information</h3>
	<div class="profile-column-wrapper">
		<div class="profile-column-content">
			<div class="row-fluid">
				<div class="span3 profile-label">Username</div>
				<div class="span9 profile-value">{{ user.username }}</div>
			</div>
			<div class="row-fluid">
				<div class="span3 profile-label">Fullname</div>
				<div class="span9 profile-value">{{ user.fullname }}</div>
			</div>
			<div class="row-fluid">
				<div class="span3 profile-label">Email</div>
				<div class="span9 profile-value profile-emails">
					{% for id, email in user.emails %}
					<div class="email-item">
						<span class="label{% if primary_email == id %} label-success{% endif %}"><i class="icon-envelope"></i></span>
						<span class="">{{ email }}</span> 
					</div>
					{% endfor %}
				</div>
			</div>
			<div class="row-fluid">
				<div class="span3 profile-label">Phone</div>
				<div class="span9 profile-value profile-phones">
					{% for phone in user.phones %}
					<div class="phones-item">
						<span><i class="icon-phone"></i></span>
						<span>{{ phone }}</span>
					</div>
					{% endfor %}
				</div>
			</div>
			<div class="row-fluid">
				<div class="span3 profile-label">Gender</div>
				<div class="span9 profile-value">{{ user.gender }}</div>
			</div>
			<div class="row-fluid">
				<div class="span3 profile-label">Birthday</div>
				<div class="span9 profile-value">{{ user.birthday }}</div>
			</div>
			<div class="row-fluid">
				<div class="span3 profile-label">Address</div>
				<div class="span9 profile-value">{{ user.address }}
				</div>
			</div>
			<div class="row-fluid">
				<div class="span3 profile-label">Living</div>
				<div class="span9 profile-value">{{ user.location }}</div>
			</div>
			<div class="row-fluid">
				<div class="span3 profile-label">Industry</div>
				<div class="span9 profile-value">{{ user.industry }}</div>
			</div>
		</div>
	</div>
</div>
{% endblock %}

{% block profiles_tabs_information_view_javascript %}
{% endblock %}
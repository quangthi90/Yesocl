{% block register_tabs_step4 %}
<div class="row-fluid register-box register-step4">
	<div class="span1 offset1 register-box-left register-box-extend">
		<div class="register-box-background"></div>
	</div>
	<div class="span10 register-box-step">
		<h2 class="row-fluid">
			<span class="span11 offset1 register-box-title">Invite to join Yesocl </span>
		</h2>
		<div class="row-fluid">
			<div class="span10 offset1">
				<div class="pull-left">We found 1 person you know on</div>
				<div class="pull-right">Select the people you’d like to connect to.</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="register-table span10 offset1">
				<div class="row-fluid register-table-heading">
					<div class="pull-left">
						<lable>
							<input type="checkbox" class="register-slect-all-user" /> Select All
						</label>
					</div>
				</div>
				<div class="row-fluid register-table-content">
					{% for i in 1..8 %}
					<div class="clearfix register-user-list {% if i < 2 %}border-top-none{% endif %}">
						<div class="span6 register-user-box">
							<div class="row-fluid register-user-info">
								<div class="clearfix">
									<div class="pull-left">
										<input type="checkbox" name="new_user" />
									</div>
									<div class="span2 register-user-avatar">
										<img src="image/template/register-user-avatar-list.jpg" />
									</div>
									<div class="span8">
										<p class="register-user-name">Username</p>
										<p class="register-user-description">Student at Arizona State University</p>
									</div>
								</div>
							</div>
						</div>
						<div class="span6 register-user-box">
							<div class="row-fluid register-user-info">
								<div class="clearfix">
									<div class="pull-left">
										<input type="checkbox" name="new_user" />
									</div>
									<div class="span2 register-user-avatar">
										<img src="image/template/register-user-avatar-list.jpg" />
									</div>
									<div class="span8">
										<p class="register-user-name">Username</p>
										<p class="register-user-description">Student at Arizona State University</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					{% endfor %}
				</div>
			</div>
		</div>
		<div class="row-fluid space-top-20px">
			<div class="span11 offset1">
				<a href="#myCarousel" data-slide="next"><button class="btn btn-success">Add Connection(s)</button></a>
				or
				<a class="register-skip" href="#myCarousel" data-slide="next">Skip this step</a>
			</div>
		</div>
	</div>
	<div class="span1 register-box-right register-box-extend">
		<div class="register-box-background"></div>
	</div>
</div>
{% endblock %}

{% block register_tabs_step4_javascript %}
<script type="text/javascript">
jQuery(document).ready(function (){
	$('.register-table').on('click', '.register-slect-all-user', function(){
		var selct_all_class = $(this).parent().attr('class');
		$('.register-table').find('input[name*=\'new_user\']').parent().attr('class', selct_all_class);
	});
});
</script>
{% endblock %}
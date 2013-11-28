{% block register_tabs_step3 %}
<div class="row-fluid register-box register-step3">
	<div class="span12 register-box-step">
		<div class="row-fluid">
			<h2 class="span11 offset1 register-box-title">
				<i class="icon-group"></i> Find your friends
			</h2>
		</div>
		<div class="row-fluid">
			<span class="span11 offset1">List of your friends from other social networks</span>
		</div>
		<div class="row-fluid">
			<div class="span10 offset1 register-table">
				<div class="row-fluid register-table-heading">
					<div class="pull-left">
						<lable>
							<input type="checkbox" class="register-slect-all-friend" /> Select All
						</label>
					</div>
				</div>
				<div class="row-fluid register-table-content">
					{% for i in 1..8 %}
					<div class="clearfix register-user-list {% if i < 2 %}border-top-none{% endif %}">
						<div class="span6 clearfix register-user-box">
							<div class="pull-left check-select">
								<input type="checkbox" name="friends" />
							</div>
							<div class="pull-left register-user-avatar">
								<img src="image/template/register-user-avatar-list.jpg" />
							</div>
							<div class="pull-left register-user-info">
								<p class="register-user-name">Username</p>
								<p class="register-user-description">Student at Arizona State University</p>
							</div>
						</div>
						<div class="span6 clearfix register-user-box">
							<div class="pull-left check-select">
								<input type="checkbox" name="friends" />
							</div>
							<div class="pull-left register-user-avatar">
								<img src="image/template/register-user-avatar-list.jpg" />
							</div>
							<div class="pull-left register-user-info">
								<p class="register-user-name">Username</p>
								<p class="register-user-description">Student at Arizona State University</p>
							</div>
						</div>
					</div>
					{% endfor %}
				</div>
			</div>
		</div>
		<div class="row-fluid space-top-20px">
			<div class="span11 offset1">
				<a href="#myCarousel" class="btn btn-yes" id="btn-finished-step3">
		    		Invite friend(s)
		    	</a>
				or
				<a class="register-skip" href="#myCarousel" data-slide="next">Skip this step</a>
			</div>
		</div>
	</div>
</div>
{% endblock %}

{% block register_tabs_step3_javascript %}
<script type="text/javascript">
jQuery(document).ready(function (){
	$('.register-table').on('click', '.register-slect-all-friend', function(){
		var selct_all_class = $(this).parent().attr('class');
		$('.register-table').find('input[name*=\'friends\']').parent().attr('class', selct_all_class);
	});
});
</script>
{% endblock %}
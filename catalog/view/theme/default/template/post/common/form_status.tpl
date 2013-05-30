{% block post_common_form_status %}
	<form class="post post_new form-status" data-url="{{ status_action }}">
		<div class="row-fluid txt_editor">
			<textarea class="post_input" placeholder="What's in your mind ..."></textarea>
		</div>
		<div class="row-fluid"> 
			<div class="span9 post_new_control">
				<a href="#" title="Chèn hình">
					<i class="icon-camera-retro big-icon"></i>
				</a>
			</div>
			<div class="span3 text-right">
				<button type="submit" class="btn btn-success btn-status">Post</button>
			</div>
		</div>
	</form>
{% endblock %}

{% block post_common_form_status_javascript %}
<script type="text/javascript" src="catalog/view/javascript/status.js"></script>
{% endblock %}
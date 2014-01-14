{% block post_common_comment_post_list_style %}
<link href="{{ asset_css('comment.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block post_common_comment_post_list %}
	<div id="comment-box" class="y-box comment-box">
		<div class="comment-container"> 
			<div class="y-box-header">				
				Comment box (<span class="counter"></span>)
				<div class="y-box-expand">
					<a href="#" id="btn-expand" class="btn-expand" title="Expand">
						<i class="icon-indent-left"></i>
					</a>
					<a href="#" id="btn-restore" class="btn-restore" title="Restore" style="display: none;">
						<i class="icon-indent-right"></i>
					</a>
					<a href="#" id="btn-close" class="btn-close" title="Close">
						<i class="icon-remove"></i>
					</a>
				</div>
			</div>
			<div class="y-box-content comment-body">
				<div id="add-more-item"></div>
			</div>
		</div>
		{{ block('common_html_block_comment_quick_form') }}
	</div>
{% endblock %}

{% block template %}
	{{ block('common_html_block_comment_advance_form') }}
	{% set advance_comment_id = 'comment-advance-edit-popup' %}
	{{ block('common_html_block_comment_advance_form') }}
    {{ block('common_html_block_comment_item_template') }}
{% endblock %}

{% block post_common_comment_post_list_javascript %}
<script type="text/javascript" src="{{ asset_js('post.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('comment.js') }}"></script>
{% endblock %}
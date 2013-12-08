{% block post_common_comment_post_list_style %}
<link href="{{ asset_css('comment.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block post_common_comment_post_list %}
	<div id="comment-box" class="y-box">
		<div class="comment-container"> 
			<div class="y-box-header">				
				Comment box (<span class="counter"></span>)
				<div class="y-box-expand">
					<a href="#" class="btn-expand" title="Expand">
						<i class="icon-indent-left"></i>
					</a>
					<a href="#" class="btn-restore" title="Restore" style="display: none;">
						<i class="icon-indent-right"></i>
					</a>
					<a href="#" class="btn-close" title="Close">
						<i class="icon-remove"></i>
					</a>
				</div>
			</div>
			<div class="y-box-content comment-body">
				<div id="add-more-item"></div>
			</div>
		</div>
		{{ block('common_html_block_comment_quick_form') }}
		{{ block('common_html_block_comment_advance_form') }}
	</div>
	{{ block('common_html_block_comment_item_template') }}
{% endblock %}

{% block post_common_comment_post_list_javascript %}
<script type="text/javascript" src="{{ asset_js('post.js') }}"></script>
{% endblock %}
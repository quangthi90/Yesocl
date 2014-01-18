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
		{% for branch in branchs %}
	        {% set style = random([1, 2]) %}
			{% set posts = all_posts[branch.slug] %}
			{% if posts|length > 0 %}
	            {% set block_info = branch %}
	            {% set block_href = path('BranchPage', {branch_slug: branch.slug}) %}
	            {{ block('post_common_post_item_list') }}
			{% endif %}
		{% endfor %}
		</div>
	</div>
	{{ block('post_common_comment_post_list') }}
{% endblock %}

{% block javascript %}
	{{ block('post_common_comment_post_list_javascript') }}
	<script type="text/javascript" src="{{ asset_js('libs/modernizr.custom.js') }}"></script>
	{% if warning_active is defined %}
	<script type="text/javascript">
		bootbox.dialog({
			message: "{{warning_active}}",
			title: "Active warning !",
			buttons: {
				resend: {
					label: "Resend active email",
					className: "btn-primary",
					callback: function() {
					    alert('Add code for resending email ...');
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
{% endblock %}
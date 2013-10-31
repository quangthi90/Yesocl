{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_block_list.tpl' %}
{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('home.css') }}" rel="stylesheet" media="screen" />
    {{ block('post_common_post_comment_style') }}
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
	<div id="y-main-content" class="has-horizontal has-block">
	{% for branch in branchs %}
        {% set style = random([1, 2]) %}
		{% set posts = all_posts[branch.slug] %}
		{% if posts|length > 0 %}
            {% set block_info = branch %}
            {% set block_href = path('BranchPage', {branch_slug: branch.slug}) %}
            {{ block('post_common_post_block_list') }}
		{% endif %}
	{% endfor %}
	</div>
</div>
{{ block('post_common_post_comment') }}
{% endblock %}

{% block javascript %}
{{ block('post_common_post_comment_javascript') }}
<script type="text/javascript" src="{{ asset_js('libs/modernizr.custom.js') }}"></script>
{% endblock %}
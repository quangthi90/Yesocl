{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_block_ex1.tpl' %}
{% use '@template/default/template/post/common/post_block_ex2.tpl' %}
{#% use '@template/default/template/post/common/post_block_ex3.tpl' %#}
{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/home.css" rel="stylesheet" media="screen" />
    {{ block('post_common_post_comment_style') }}
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
	<div id="y-main-content" class="has-horizontal has-block">
		{% for branch in branchs %}
        {% set style = random([1, 2]) %}
		{% set posts = all_posts[branch.id] %}
		{% if posts|length > 0 %}
		<div class="feed-block">
            <h3 class="block-title">
                <a href="#"><i class="icon-th-large"></i> Test{{ branch.name }}</a>
            </h3>
            {% if style == 1 %}
            	{{ block('post_common_post_block_ex1') }}
            {% else %}
            	{{ block('post_common_post_block_ex2') }}
            {% endif %}
		</div>
		{% endif %}
		{% endfor %}		
	</div>
</div>
{{ block('post_common_post_comment') }}
{% endblock %}

{% block javascript %}
{{ block('post_common_post_comment_javascript') }}
{% endblock %}
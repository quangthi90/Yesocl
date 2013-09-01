{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_block_ex1.tpl' %}
{% use '@template/default/template/post/common/post_block_ex2.tpl' %}
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
		<div class="feed-block">
            <div class="block-header">
                <a class="fl" href="{{ path('BranchPage', {branch_slug: branch.slug}) }}">{{ branch.name }}  <i class="icon-angle-right"></i></a>
                <a class="block-seemore fl" href="{{ branch.href_categories|raw }}"> 
                    <i class="icon-angle-right"></i>
                </a>           
            </div>
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
<script type="text/javascript" src="{{ asset_js('libs/modernizr.custom.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/jquery.hoverdir.js') }}"></script>
<script type="text/javascript">
    $(function() {    
        $('.feed-block .feed').each( function() {
            $(this).hoverdir(); 
        });
    });
</script>
{% endblock %}
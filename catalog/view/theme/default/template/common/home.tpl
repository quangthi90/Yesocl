{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_block.tpl' %}
{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/home.css" rel="stylesheet" media="screen" />
    {{ block('post_common_post_comment_style') }}
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
	<div id="y-main-content" class="has-horizontal">
    	{% for post in posts %}        	
			{{ block('post_common_post_block') }}			
		{% endfor %}
		{{ block('post_common_post_comment') }}
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
	$(document).ready(function() {
		$('#y-content').makeScroll();	
	});	
</script>
{{ block('post_common_post_comment_javascript') }}
{% endblock %}
{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_block.tpl' %}
{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/home.css" rel="stylesheet" media="screen" />
    <link href="catalog/view/theme/default/stylesheet/post-detail.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
	<div id="y-main-content"> 		           
        <ul class="list-content columns">
        	{% for post in posts %}
        	<li class="feed-item">
				{{ block('post_common_post_block') }}
			</li>
			{% endfor %}
			<li class="feed-item" id="feed-end"></li>							
		</ul>
		{{ block('post_common_post_comment') }}
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript" src="catalog/view/javascript/post.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		//MakeScroll:
		makeScroll('y-content');	
	});	
	window.onresize=function() {
		makeScroll('y-content');	
	};
</script>
{{ block('post_common_post_comment_javascript') }}
{% endblock %}
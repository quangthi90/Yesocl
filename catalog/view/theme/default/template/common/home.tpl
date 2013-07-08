{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_block_s4block.tpl' %}
{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/home.css" rel="stylesheet" media="screen" />
    {{ block('post_common_post_comment_style') }}
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
	<div id="y-main-content" class="has-horizontal has-block">
		<div class="feed-block">
            <div class="block-header">
                <a class="fl" href="#">Yestoc</a>
                <a class="fr" href="#"><i class="icon-chevron-right"></i></a>
            </div>
            <div class="block-content">
		    	{% for post in posts %}        	
					{{ block('post_common_post_block_s4block') }}			
				{% endfor %}
				
			</div>
		</div>
		<div class="feed-block">
            <div class="block-header">
                <a class="fl" href="#">Follower</a>
                <a class="fr" href="#"><i class="icon-chevron-right"></i></a>
            </div>
            <div class="block-content">
		    	{% for post in posts %}        	
					{{ block('post_common_post_block_s4block') }}			
				{% endfor %}
				
			</div>
		</div>
	</div>
</div>
{{ block('post_common_post_comment') }}
{% endblock %}

{% block javascript %}
<script type="text/javascript">
    $(document).ready(function() {
    	new FlexibleElement($(this));	
    	new HorizontalBlock($('.has-horizontal'));  
    });
</script>
{{ block('post_common_post_comment_javascript') }}
{% endblock %}
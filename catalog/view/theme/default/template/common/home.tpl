{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_block_ex1.tpl' %}
{% use '@template/default/template/post/common/post_block_ex2.tpl' %}
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
                <a class="fl" href="#">Yestoc Template 1</a>
                <a class="fr" href="#"><i class="icon-chevron-right"></i></a>
            </div>
            <div class="block-content">		    		
            	<div class="column">
					<div class="feed-container feed1">	
						{{ block('post_common_post_block_ex2') }}	    			
    				</div>
	    			<div class="feed-container feed2">	
	    				{{ block('post_common_post_block_ex1') }}	    			
	    			</div>
    			</div>					
		    	<div class="column">
					<div class="feed-container feed3">	
						{{ block('post_common_post_block_ex2') }}	    			
    				</div>
	    			<div class="feed-container feed4">	
	    				{{ block('post_common_post_block_ex2') }}	    			
	    			</div>
    			</div>	
    			<div class="column">
					<div class="feed-container feed5">	
						{{ block('post_common_post_block_ex2') }}	    			
    				</div>
	    			<div class="feed-container feed6">	
	    				{{ block('post_common_post_block_ex1') }}	    			
	    			</div>
    			</div>		
			</div>
		</div>
		<div class="feed-block">
            <div class="block-header">
                <a class="fl" href="#">Yestoc Template 2</a>
                <a class="fr" href="#"><i class="icon-chevron-right"></i></a>
            </div>
            <div class="block-content">
		    	<div class="column column-special">
					<div class="feed-container feed1">	
						{{ block('post_common_post_block_ex2') }}	    			
    				</div>
	    			<div class="feed-container feed2">	
	    				{{ block('post_common_post_block_ex1') }}	    			
	    			</div>
    			</div>					
		    	<div class="column">
					<div class="feed-container feed3">	
						{{ block('post_common_post_block_ex2') }}	    			
    				</div>
	    			<div class="feed-container feed4">	
	    				{{ block('post_common_post_block_ex2') }}	    			
	    			</div>
    			</div>	
    			<div class="column column-special">
					<div class="feed-container feed5">	
						{{ block('post_common_post_block_ex2') }}	    			
    				</div>
	    			<div class="feed-container feed6">	
	    				{{ block('post_common_post_block_ex1') }}	    			
	    			</div>
    			</div>		            	
			</div>
		</div>
		<div class="feed-block">
            <div class="block-header">
                <a class="fl" href="#">Yestoc Template 3</a>
                <a class="fr" href="#"><i class="icon-chevron-right"></i></a>
            </div>
            <div class="block-content">
            	<div class="column">
		    		<div class="feed-container feed1">	
		    			{{ block('post_common_post_block_ex1') }}	 	    			
		    		</div>
		    		<div class="feed-container feed2">
		    			{{ block('post_common_post_block_ex2') }}			    			
		    		</div>
		    	</div>					
		    	<div class="column">
		    		<div class="feed-container feed3">	
		    			{{ block('post_common_post_block_ex2') }}		    			
		    		</div>
		    		<div class="feed-container feed4">
		    			{{ block('post_common_post_block_ex1') }}			    			
		    		</div>		    	
		    		<div class="feed-container feed5">
		    			{{ block('post_common_post_block_ex1') }}			    			
		    		</div>
		    	</div>	
			</div>
		</div>
	</div>
</div>
{{ block('post_common_post_comment') }}
{% endblock %}

{% block javascript %}
{{ block('post_common_post_comment_javascript') }}
{% endblock %}
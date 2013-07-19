{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/post-detail.css" rel="stylesheet" media="screen" />
    {{ block('post_common_post_comment_style') }}
{% endblock %}

{% block body %}
<div id="y-content">
	<div id="y-main-content"> 
		<div id="post-detail">
			<div id="post-detail-header">
				<div class="group-header">
					<div class="row-fluid">
						<div class="span2">
							<a class="link-btn" onclick="history.go(-1); return false;" href="#" title="Go back"> 
								<i class="icon-chevron-sign-left icon-2x fl"></i> 
								<span>Back</span>
							</a>
						</div>						
						<div class="span6 post-category">
							<a href="#" title="View post in this category">{{ post.category }}</a>
						</div>
						<div class="span4 post-action">
							<a href="#"><i class="icon-eye-open medium-icon"></i> View (1000)</a>
							<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like (10)</a>
							<a href="#" class="open-comment-detail"><i class="icon-comments medium-icon"></i> Comment ({{ post.comment_count }})</a>
						</div>
					</div>
				</div>
				<div class="post-metadata">
					<div class="row-fluid">
						<div class="span1 avatar-thumb">
							<a href="{{ post.href_user|raw }}">
								<img src="{{ post.avatar }}" alt="user">
							</a>
						</div>
						<div class="span11 post-info">
							<div class="post-user-time">
								<a href="{{ post.href_user|raw }}">{{ post.author }}</a> - <span class="post-time">{{ post.created|date('h:i A d/m/Y') }}</span>
							</div>
							<h4 class="post_title">
								{{ post.title }}
							</h4>
						</div>	
					</div>									
				</div>
			</div>			
			<div id="post-content">{{ post.content|raw }}</div>
		</div>
		{{ block('post_common_post_comment') }}
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
$(document).ready(function() {
	$('#y-main-content').makeScrollWithoutCalResize();

	//Open comment box
	$('.open-comment-detail').click(function(e){
		e.preventDefault();
		$('#comment-box').animate({"right": "0px"}, "slow", function(){
			//$('#comment-box .y-box-content').makeScrollWithoutCalResize();
		});
	});
});
</script>
{{ block('post_common_post_comment_javascript') }}
{% endblock %}
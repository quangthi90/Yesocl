{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/post-detail.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
	<div id="y-main-content"> 
		<div id="post-detail">
			<div id="post-detail-header">
				<div class="group-header">
					<div class="row-fluid">
						<div class="span2 link-btn" onclick="history.go(-1);">
							<a href="#" title="Go back">Back</a>
						</div>
						<div class="span4 post-category">
							<a href="#" title="View post in this category">{{ post.category }}</a>
						</div>
						<div class="span6 post-action">
							<a href="#"><i class="icon-eye-open medium-icon"></i> View (1000)</a>
							<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like (10)</a>
							<a href="#" class="open-comment-detail"><i class="icon-comments medium-icon"></i> Comment ({{ post.comment_count }})</a>
						</div>
					</div>
				</div>
				<div class="post-metadata">
					<div class="avatar-thumb">
						<a href="{{ post.href_user|raw }}">
							<img src="{{ post.avatar }}" alt="user">
						</a>
					</div>
					<div class="post-info">
						<div class="post-user-time">
							<a href="{{ post.href_user|raw }}">{{ post.author }}</a> - <span class="post-time">{{ post.created|date('h:i A d/m/Y') }}</span>
						</div>
						<h4 class="post_title">
							<a>{{ post.title }}</a>
						</h4>
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
	makeScrollWithoutCalResize('y-content');

	//Open comment box
	$('.open-comment-detail').click(function(e){
		e.preventDefault();
		$('#comment-box').animate({"right": "0px"}, "slow", function(){
			makeVerticalCommentBox();
		});
	});
});
</script>
{{ block('post_common_post_comment_javascript') }}
{% endblock %}
{% extends '@template/default/template/common/layout_feed.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/post-category.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
	<div id="y-main-content"> 
		<div id="post-detail-header">
			<div class="group-header">
				<div class="row-fluid">
					<div class="span2 link-btn">
						<a href="#" title="Go back">Back</a>
					</div>
					<div class="span4 post-category">
						<a href="#" title="View post in this category">Yestock</a>
					</div>
					<div class="span6 post-action">
						<a href="#"><i class="icon-eye-open medium-icon"></i> View (1000)</a>
						<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like (10)</a>
						<a href="#" class="open-comment"><i class="icon-comments medium-icon"></i> Comment (100)</a>
					</div>
				</div>
			</div>
			<div class="post-metadata">
				<div class="avatar-thumb">
					<a href="#">
						<img src="image/template/user-avatar.png" alt="user">
					</a>
				</div>
				<div class="post-info">
					<div class="post-user-time">
						<a href="#">Username</a> - <span class="post-time">00:00 21/05/2013</span>
					</div>
					<h4 class="post_title">
						<a href="#">Nhận định chứng khoán tuần 20.05 – 24.05.2013</a>
					</h4>
				</div>					
			</div>
		</div>			
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
	$(document).ready(function() {
		makeScrollWithoutCalResize('y-content');		
	});
</script>
{% endblock %}
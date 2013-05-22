{% extends '@template/default/template/common/layout_feed.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/home.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
	<div id="y-main-content"> 		           
        <ul class="list-content columns">
			<li class="feed-item">
				<div class="post post_new">
					<div class="row-fluid txt_editor">
						<textarea class="post_input" placeholder="What's in your mind ..."></textarea>
					</div>
					<div class="row-fluid"> 
						<div class="span10 post_new_control">
							<a href="#" title="Chèn hình">
								<i class="icon-camera-retro big-icon"></i>
							</a>
						</div>
						<div class="span2">
							<a href="#" class="btn  btn-success">Post</a>
						</div>
					</div>
				</div>
			</li>
			<li class="feed-item" id="feed-end"></li>							
		</ul>
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
	$(document).ready(function() {
		//MakeScroll:
		makeScroll('y-content');	
	});	
	window.onresize=function() {
		makeScroll('y-content');	
	};
</script>
{% endblock %}
{% block post_common_post_comment %}
	<div id="comment-box" class="y-box">
		<div class="comment-container"> 
			<div class="y-box-header">
				Comment box (100)
				<a href="#" class="close">X</a>
			</div>
			<div class="y-box-content">				
				<div class="comment-item">
					<div class="row-fluid">
						<div class="span2 avatar_thumb">
							<a href="#">
								<img src="image/template/user-avatar.png" alt="user">
							</a>
						</div>
						<div class="span10">
							<div class="comment-info">
								<a href="#">Username</a> - <span class="comment-time">20:35 10/10/2013</span>
							</div>
							<div class="comment-content">
								chỉ có tính chất khuyến nghị để nhà đầu tư tham khảo, tác giả mail sẽ hoàn toàn không chịu trách nhiệm !!
							</div>
						</div>
					</div>
					<div class="comment-footer">
						<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like (10)</a>
					</div>
				</div>	
				<div class="comment-item">
					<div class="row-fluid">
						<div class="span2 avatar_thumb">
							<a href="#">
								<img src="image/template/user-avatar.png" alt="user">
							</a>
						</div>
						<div class="span10">
							<div class="comment-info">
								<a href="#">Username</a> - <span class="comment-time">20:35 10/10/2013</span>
							</div>
							<div class="comment-content">
								chỉ có tính chất khuyến nghị để nhà đầu tư tham khảo, tác giả mail sẽ hoàn toàn không chịu trách nhiệm !!
							</div>
						</div>
					</div>
					<div class="comment-footer">
						<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like (10)</a>
					</div>
				</div>	
				<div class="comment-item">
					<div class="row-fluid">
						<div class="span2 avatar_thumb">
							<a href="#">
								<img src="image/template/user-avatar.png" alt="user">
							</a>
						</div>
						<div class="span10">
							<div class="comment-info">
								<a href="#">Username</a> - <span class="comment-time">20:35 10/10/2013</span>
							</div>
							<div class="comment-content">
								chỉ có tính chất khuyến nghị để nhà đầu tư tham khảo, tác giả mail sẽ hoàn toàn không chịu trách nhiệm !!
							</div>
						</div>
					</div>
					<div class="comment-footer">
						<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like (10)</a>
					</div>
				</div>	
				<div class="comment-item">
					<div class="row-fluid">
						<div class="span2 avatar_thumb">
							<a href="#">
								<img src="image/template/user-avatar.png" alt="user">
							</a>
						</div>
						<div class="span10">
							<div class="comment-info">
								<a href="#">Username</a> - <span class="comment-time">20:35 10/10/2013</span>
							</div>
							<div class="comment-content">
								chỉ có tính chất khuyến nghị để nhà đầu tư tham khảo, tác giả mail sẽ hoàn toàn không chịu trách nhiệm !!
							</div>
						</div>
					</div>
					<div class="comment-footer">
						<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like (10)</a>
					</div>
				</div>	
				<div class="comment-item">
					<div class="row-fluid">
						<div class="span2 avatar_thumb">
							<a href="#">
								<img src="image/template/user-avatar.png" alt="user">
							</a>
						</div>
						<div class="span10">
							<div class="comment-info">
								<a href="#">Username</a> - <span class="comment-time">20:35 10/10/2013</span>
							</div>
							<div class="comment-content">
								chỉ có tính chất khuyến nghị để nhà đầu tư tham khảo, tác giả mail sẽ hoàn toàn không chịu trách nhiệm !!
							</div>
						</div>
					</div>
					<div class="comment-footer">
						<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like (10)</a>
					</div>
				</div>				
			</div>	
			<div class="y-comment-reply post post_new">
				<div class="row-fluid txt_editor">
					<textarea class="post_input" placeholder="What's in your mind ..."></textarea>
				</div>
				<div class="row-fluid"> 
					<div class="span9 post_new_control">
						<a href="#" title="Chèn hình">
							<i class="icon-camera-retro big-icon"></i>
						</a>
					</div>
					<div class="span3 btn-container">
						<a href="#" class="btn  btn-success">Post</a>
					</div>
				</div>
			</div>		
		</div>			
	</div>
{% endblock %}

{% block post_common_post_comment_javascript %}
<script type="text/javascript">
	$(document).ready(function() {
		makeScrollWithoutCalResize('y-content');
		
		//Open comment box:
		$('.open-comment').click(function(e){
			e.preventDefault();
			$('#comment-box').animate({"right": "0px"}, "slow", function(){
				makeVerticalCommentBox();
			});
		});

		//Close comment box:
		$('.y-box-header a.close').click(function(e){
			e.preventDefault();
			$('#comment-box').animate({"right": "-500px"}, "slow");
		});
	});
</script>
{% endblock %}
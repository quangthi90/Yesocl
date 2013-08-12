{% block post_common_post_block_ex2 %}
	<div class="block-content">
		{% set special = random(['column-special', '']) %}
    	<div class="column {{ special }}">
    		{#% for post in posts|slice(0, 5) %#}
    		{% for post in 1..6 %}
			<div class="feed-container feed{{ loop.index }}">
				<div class="feed post post_in_block">
					<a href="#" class="post_block_link">
						<div class="post_header">
							<h4 class="post_title">
								<a href="#">
									Lăng kính Yestoc phiên 30/07: “Thị trường có thể tăng nhẹ khi chạm hỗ trợ”
								</a>
							</h4>				
						</div>
						<div class="post_body">
							<div class="post_image">
								<img src="image/template/img2.jpg" alt="title">
							</div>
							<div class="post_text_raw">												
								Thị trường tiếp tục phiên giảm khá mạnh tiếp nối đà giảm của tuần trước. Vnindex và HNX đều hình thành các cây nến đỏ thân lớn cho thấy tâm lý nhà đầu tư vẫn đang bi quan. 
							</div>	
						</div>
					</a>
					<div class="hover post_overlay">
						<div class="post_virtual_overlay">							
						</div>
						<div class="post_overlay_wrapper">
							<div class="post_action">
								<a href="#" title="Like"><i class="icon-thumbs-up medium-icon"></i></a>
								<a href="#" title="Comment (0)" class="open-comment" data-url="index.php?route=post/post/getCommentByPost" data-comment-count="0" data-post-id="51aa52c2471dee980a00001d" data-post-type="company"><i class="icon-comments medium-icon"></i></a>
								<a href="#" title="View (1k)"><i class="icon-eye-open medium-icon"></i></a>
							</div>	
							<div class="post_date">
								01/06/2013
							</div>						
						</div>						
					</div>
				</div>   			
			</div>
			{% if loop.index % 2 == 0 and loop.index != 6 %}
			{% set special = random(['column-special', '']) %}
		</div>
		<div class="column {{ special }}">
			{% endif %}
			{% endfor %}
		</div>
	</div>
{% endblock %}
{% block post_common_post_block_ex1 %}
	{% set special = random([2, 3]) %}
	<div class="block-content">
    	<div class="column {% if special == 3 %}column-special bommer-column-special{% endif %}">
    		{% for post in 1..5 %}
			<div class="feed-container feed{{ loop.index }}">
				<div class="feed post post_in_block">
					<div class="post_header">
						<h4 class="post_title">
							<a href="#">
								Lăng kính Yestoc 31/05: “chúng tôi vẫn duy trì quan điểm thận trọng”
							</a>
						</h4>				
					</div>
					<div class="post_body">
						<div class="post_image">
							<img src="image/template/img.jpg" alt="title">
						</div>
						<div class="post_text_raw">													
							Tin Nhanh Thế Giới-Tăng trưởng kinh tế Mỹ đạt 2.4%, 
							thấp hơn so với dự báo ban đầu do xây dựng 
							và hàng tồn kho vẫn ở mức cao.
						</div>	
					</div>
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
			{% if loop.index % special == 0 and loop.index != 5 %}
			{% if special == 2 %}
				{% set special = 3 %}
			{% else %}
				{% set special = 6 %}
			{% endif %}
		</div>
		<div class="column {% if special == 3 %}column-special bommer-column-special{% endif %}">
			{% set special = 6 %}
			{% endif %}
			{% endfor %}
		</div>
	</div>
{% endblock %}
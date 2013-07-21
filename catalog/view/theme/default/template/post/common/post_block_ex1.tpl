{% block post_common_post_block_ex1 %}
	{% set special = random([2, 3]) %}
	<div class="block-content">
    	<div class="column">
    		{#% for post in posts|slice(0, 4) %#}
    		{% for post in 1..5 %}
			<div class="feed-container">
				<div class="feed post post_in_block">
					<div class="post_header">
						<h4 class="post_title"><a href="#">
						Lăng kính Yestoc 31/05: “chúng tôi vẫn duy trì quan điểm thận trọng”</a></h4>				
					</div>
					<div class="post_body">
						<div class="post_text_raw">
							<p>
								Tin Nhanh Thế Giới-Tăng trưởng kinh tế Mỹ đạt 2.4%, 
								thấp hơn so với dự báo ban đầu do xây dựng 
								và hàng tồn kho vẫn ở mức cao.
							</p>
						</div>	
					</div>
					<div class="row-fluid post_footer">
						<div class="span8 post_action">
							<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like</a>
							<a href="#" class="open-comment" data-url="index.php?route=post/post/getCommentByPost" data-comment-count="0" data-post-id="51aa52c2471dee980a00001d" data-post-type="company"><i class="icon-comments medium-icon"></i> Comment (0)</a>
						</div>
						<div class="span4 post_date">
							01/06/2013
						</div>
					</div>
				</div>   			
			</div>
			{% if loop.index % special == 0 and loop.index != 5 %}
			{% set special = 6 %}
		</div>
		<div class="column">
			{% endif %}
			{% endfor %}
		</div>
	</div>
{% endblock %}
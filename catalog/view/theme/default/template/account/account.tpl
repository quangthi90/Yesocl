{% extends '@template/default/template/common/layout.tpl' %}

{#% use '@template/default/template/post/common/form_status.tpl' %#}
{% use '@template/default/template/post/common/post_block.tpl' %}
{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}{{ user_info.username }}{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/home.css" rel="stylesheet" media="screen" />
    {{ block('post_common_post_comment_style') }}
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
    <div id="y-main-content" class="has-horizontal">
        {#{ block('post_common_form_status') }#}

        {% for post in posts %}
            {{ block('post_common_post_block') }}
        {% endfor %}

        <div class="feed post" data-width="422" data-height="190">
            <div class="row-fluid post_header">
                <div class="span2 avatar_thumb">
                    <a href="index.php?route=account/edit&amp;user_slug=user1">
                        <img src="http://www.gravatar.com/avatar/eb7c8c7791f4f4c7cdd712635277a1f2?s=180" alt="user">
                    </a>
                </div>
                <div class="span10">
                    <div class="row-fluid">
                        <div class="span8 post_user">
                            <a href="index.php?route=account/edit&amp;user_slug=user1">user1</a>
                        </div>
                        <div class="span4 post_time">
                            <i class="icon-time icon-2x"></i> 01/06/2013
                        </div>
                    </div>
                    <h6 class="post_title"><a href="index.php?route=post/detail&amp;post_slug=lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51aa52c2471dee980a00001c">Lăng kính Yestoc 31/05: “chúng tôi vẫn duy trì quan điểm thận trọng”</a></h6>
                </div>
            </div>
            <div class="post_body">
                            <p>
        Tin Nhanh Thế Giới-Tăng trưởng kinh tế Mỹ đạt 2.4%, thấp hơn so với dự báo ban đầu do xây dựng và hàng tồn kho vẫn ở mức cao.</p>

            </div>
            <div class="row-fluid post_footer">
                <div class="span10 post_action">
                    <a href="#"><i class="icon-thumbs-up medium-icon"></i> Like</a>
                    <a href="#" class="open-comment" data-url="index.php?route=post/post/getCommentByPost" data-comment-count="0" data-post-id="51aa52c2471dee980a00001d" data-post-type="company"><i class="icon-comments medium-icon"></i> Comment (0)</a>
                </div>
                <div class="span2">
                    <a href="index.php?route=post/detail&amp;post_slug=lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51aa52c2471dee980a00001c"><i class="icon-eye-open medium-icon"></i> More</a>
                </div>
            </div>
        </div>
        <div class="feed post" data-width="422" data-height="190">
            <div class="row-fluid post_header">
                <div class="span2 avatar_thumb">
                    <a href="index.php?route=account/edit&amp;user_slug=user1">
                        <img src="http://www.gravatar.com/avatar/eb7c8c7791f4f4c7cdd712635277a1f2?s=180" alt="user">
                    </a>
                </div>
                <div class="span10">
                    <div class="row-fluid">
                        <div class="span8 post_user">
                            <a href="index.php?route=account/edit&amp;user_slug=user1">user1</a>
                        </div>
                        <div class="span4 post_time">
                            <i class="icon-time icon-2x"></i> 01/06/2013
                        </div>
                    </div>
                    <h6 class="post_title"><a href="index.php?route=post/detail&amp;post_slug=lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51aa52c2471dee980a00001c">Lăng kính Yestoc 31/05: “chúng tôi vẫn duy trì quan điểm thận trọng”</a></h6>
                </div>
            </div>
            <div class="post_body">
                            <p>
        Tin Nhanh Thế Giới-Tăng trưởng kinh tế Mỹ đạt 2.4%, thấp hơn so với dự báo ban đầu do xây dựng và hàng tồn kho vẫn ở mức cao.</p>

            </div>
            <div class="row-fluid post_footer">
                <div class="span10 post_action">
                    <a href="#"><i class="icon-thumbs-up medium-icon"></i> Like</a>
                    <a href="#" class="open-comment" data-url="index.php?route=post/post/getCommentByPost" data-comment-count="0" data-post-id="51aa52c2471dee980a00001d" data-post-type="company"><i class="icon-comments medium-icon"></i> Comment (0)</a>
                </div>
                <div class="span2">
                    <a href="index.php?route=post/detail&amp;post_slug=lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51aa52c2471dee980a00001c"><i class="icon-eye-open medium-icon"></i> More</a>
                </div>
            </div>
        </div>
        <div class="feed post" data-width="422" data-height="190">
            <div class="row-fluid post_header">
                <div class="span2 avatar_thumb">
                    <a href="index.php?route=account/edit&amp;user_slug=user1">
                        <img src="http://www.gravatar.com/avatar/eb7c8c7791f4f4c7cdd712635277a1f2?s=180" alt="user">
                    </a>
                </div>
                <div class="span10">
                    <div class="row-fluid">
                        <div class="span8 post_user">
                            <a href="index.php?route=account/edit&amp;user_slug=user1">user1</a>
                        </div>
                        <div class="span4 post_time">
                            <i class="icon-time icon-2x"></i> 01/06/2013
                        </div>
                    </div>
                    <h6 class="post_title"><a href="index.php?route=post/detail&amp;post_slug=lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51aa52c2471dee980a00001c">Lăng kính Yestoc 31/05: “chúng tôi vẫn duy trì quan điểm thận trọng”</a></h6>
                </div>
            </div>
            <div class="post_body">
                            <p>
        Tin Nhanh Thế Giới-Tăng trưởng kinh tế Mỹ đạt 2.4%, thấp hơn so với dự báo ban đầu do xây dựng và hàng tồn kho vẫn ở mức cao.</p>

            </div>
            <div class="row-fluid post_footer">
                <div class="span10 post_action">
                    <a href="#"><i class="icon-thumbs-up medium-icon"></i> Like</a>
                    <a href="#" class="open-comment" data-url="index.php?route=post/post/getCommentByPost" data-comment-count="0" data-post-id="51aa52c2471dee980a00001d" data-post-type="company"><i class="icon-comments medium-icon"></i> Comment (0)</a>
                </div>
                <div class="span2">
                    <a href="index.php?route=post/detail&amp;post_slug=lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51aa52c2471dee980a00001c"><i class="icon-eye-open medium-icon"></i> More</a>
                </div>
            </div>
        </div>
        <div class="feed post" data-width="422" data-height="190">
            <div class="row-fluid post_header">
                <div class="span2 avatar_thumb">
                    <a href="index.php?route=account/edit&amp;user_slug=user1">
                        <img src="http://www.gravatar.com/avatar/eb7c8c7791f4f4c7cdd712635277a1f2?s=180" alt="user">
                    </a>
                </div>
                <div class="span10">
                    <div class="row-fluid">
                        <div class="span8 post_user">
                            <a href="index.php?route=account/edit&amp;user_slug=user1">user1</a>
                        </div>
                        <div class="span4 post_time">
                            <i class="icon-time icon-2x"></i> 01/06/2013
                        </div>
                    </div>
                    <h6 class="post_title"><a href="index.php?route=post/detail&amp;post_slug=lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51aa52c2471dee980a00001c">Lăng kính Yestoc 31/05: “chúng tôi vẫn duy trì quan điểm thận trọng”</a></h6>
                </div>
            </div>
            <div class="post_body">
                            <p>
        Tin Nhanh Thế Giới-Tăng trưởng kinh tế Mỹ đạt 2.4%, thấp hơn so với dự báo ban đầu do xây dựng và hàng tồn kho vẫn ở mức cao.</p>

            </div>
            <div class="row-fluid post_footer">
                <div class="span10 post_action">
                    <a href="#"><i class="icon-thumbs-up medium-icon"></i> Like</a>
                    <a href="#" class="open-comment" data-url="index.php?route=post/post/getCommentByPost" data-comment-count="0" data-post-id="51aa52c2471dee980a00001d" data-post-type="company"><i class="icon-comments medium-icon"></i> Comment (0)</a>
                </div>
                <div class="span2">
                    <a href="index.php?route=post/detail&amp;post_slug=lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51aa52c2471dee980a00001c"><i class="icon-eye-open medium-icon"></i> More</a>
                </div>
            </div>
        </div>
        <div class="feed post" data-width="422" data-height="190">
            <div class="row-fluid post_header">
                <div class="span2 avatar_thumb">
                    <a href="index.php?route=account/edit&amp;user_slug=user1">
                        <img src="http://www.gravatar.com/avatar/eb7c8c7791f4f4c7cdd712635277a1f2?s=180" alt="user">
                    </a>
                </div>
                <div class="span10">
                    <div class="row-fluid">
                        <div class="span8 post_user">
                            <a href="index.php?route=account/edit&amp;user_slug=user1">user1</a>
                        </div>
                        <div class="span4 post_time">
                            <i class="icon-time icon-2x"></i> 01/06/2013
                        </div>
                    </div>
                    <h6 class="post_title"><a href="index.php?route=post/detail&amp;post_slug=lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51aa52c2471dee980a00001c">Lăng kính Yestoc 31/05: “chúng tôi vẫn duy trì quan điểm thận trọng”</a></h6>
                </div>
            </div>
            <div class="post_body">
                            <p>
        Tin Nhanh Thế Giới-Tăng trưởng kinh tế Mỹ đạt 2.4%, thấp hơn so với dự báo ban đầu do xây dựng và hàng tồn kho vẫn ở mức cao.</p>

            </div>
            <div class="row-fluid post_footer">
                <div class="span10 post_action">
                    <a href="#"><i class="icon-thumbs-up medium-icon"></i> Like</a>
                    <a href="#" class="open-comment" data-url="index.php?route=post/post/getCommentByPost" data-comment-count="0" data-post-id="51aa52c2471dee980a00001d" data-post-type="company"><i class="icon-comments medium-icon"></i> Comment (0)</a>
                </div>
                <div class="span2">
                    <a href="index.php?route=post/detail&amp;post_slug=lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51aa52c2471dee980a00001c"><i class="icon-eye-open medium-icon"></i> More</a>
                </div>
            </div>
        </div>
        <div class="feed post" data-width="422" data-height="190">
            <div class="row-fluid post_header">
                <div class="span2 avatar_thumb">
                    <a href="index.php?route=account/edit&amp;user_slug=user1">
                        <img src="http://www.gravatar.com/avatar/eb7c8c7791f4f4c7cdd712635277a1f2?s=180" alt="user">
                    </a>
                </div>
                <div class="span10">
                    <div class="row-fluid">
                        <div class="span8 post_user">
                            <a href="index.php?route=account/edit&amp;user_slug=user1">user1</a>
                        </div>
                        <div class="span4 post_time">
                            <i class="icon-time icon-2x"></i> 01/06/2013
                        </div>
                    </div>
                    <h6 class="post_title"><a href="index.php?route=post/detail&amp;post_slug=lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51aa52c2471dee980a00001c">Lăng kính Yestoc 31/05: “chúng tôi vẫn duy trì quan điểm thận trọng”</a></h6>
                </div>
            </div>
            <div class="post_body">
                            <p>
        Tin Nhanh Thế Giới-Tăng trưởng kinh tế Mỹ đạt 2.4%, thấp hơn so với dự báo ban đầu do xây dựng và hàng tồn kho vẫn ở mức cao.</p>

            </div>
            <div class="row-fluid post_footer">
                <div class="span10 post_action">
                    <a href="#"><i class="icon-thumbs-up medium-icon"></i> Like</a>
                    <a href="#" class="open-comment" data-url="index.php?route=post/post/getCommentByPost" data-comment-count="0" data-post-id="51aa52c2471dee980a00001d" data-post-type="company"><i class="icon-comments medium-icon"></i> Comment (0)</a>
                </div>
                <div class="span2">
                    <a href="index.php?route=post/detail&amp;post_slug=lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51aa52c2471dee980a00001c"><i class="icon-eye-open medium-icon"></i> More</a>
                </div>
            </div>
        </div>
        
        {{ block('post_common_post_comment') }}
    </div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
  $(document).ready(function() {
    new SingleListFeed($('#y-content'));
  }); 
</script>
{{ block('post_common_post_comment_javascript') }}
{#{ block('post_common_form_status_javascript') }#}
{% endblock %}
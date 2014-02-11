{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/common/html_block.tpl' %}
{% use '@template/default/template/post/common/post_status_wall.tpl' %}
{% use '@template/default/template/post/common/post_item_wall.tpl' %}
{% use '@template/default/template/post/common/comment_post_list.tpl' %}
{% use '@template/default/template/account/common/profile_column.tpl' %}

{% block title %}{% trans %}Wall Page of{% endtrans %} {{ users[current_user_id].username }}{% endblock %}

{% block stylesheet %}
    {{ block('post_common_comment_post_list_style') }}
    {{ block('post_common_post_status_wall_style') }}
{% endblock %}

{% block body %}
    <div id="y-content">
        <div id="y-main-content" class="has-horizontal post-per-column" style="width: 9999px;">
            {% if current_user_id != get_current_user().id %}
                {% set user = users[current_user_id] %}
                {{ block('common_profile_column') }}
            {% endif %}
            <div class="feed-block block-post-new">
                <div class="block-header">
                    <a class="block-title fl" href="#">
                        {% trans %}Post{% endtrans %}                   
                    </a>  
                    <a class="block-seemore fl" href="#"> 
                        <i class="icon-angle-right"></i>
                    </a>           
                </div>
                <div class="block-content">
                    <div class="column has-new-post">
                        {% set user = users[current_user_id] %}
                        {{ block('post_common_post_status_wall') }}
                    </div>
                    {% for post in posts %}
                        <div class="column">
                            {% set user = users[post.user_id] %}
                            {{ block('post_common_post_item_wall') }}
                        </div>
                    {% endfor %}
                </div>
            </div>
            {{ block('post_common_comment_post_list') }}
        </div>
    </div>
{% endblock %}

{% block template %}
    {{ block('post_common_post_status_wall_html_template') }}
    {{ block('post_common_comment_post_list_template') }}
{% endblock %}

{% block javascript %}
<script type="text/javascript">
$(function(){
    $(document).trigger('FRIEND_ACTION', [false]);    
});
</script>
{{ block('post_common_comment_post_list_javascript') }}
{{ block('post_common_post_status_wall_javascript') }}
{% endblock %}
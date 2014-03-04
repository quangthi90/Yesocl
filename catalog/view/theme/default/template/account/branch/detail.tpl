{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/common/html_block.tpl' %}
{% use '@template/default/template/post/common/post_status_branch.tpl' %}
{% use '@template/default/template/post/common/post_item_wall.tpl' %}
{% use '@template/default/template/post/common/comment_post_list.tpl' %}

{% block title %}{{ branch.name }}|{% trans %}Branch Detail Page{% endtrans %}{% endblock %}

{% block stylesheet %}
    {{ block('post_common_comment_post_list_style') }}
    {{ block('post_common_post_status_branch_style') }}
{% endblock %}

{% block body %}
    <div id="y-content">
        <div id="y-main-content" class="has-horizontal post-per-column" style="width: 9999px;">
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
                    <div class="column has-new-post branch-info">
                        {% set user = users[current_user_id] %}
                        {{ block('post_common_post_status_branch') }}
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
    {{ block('post_common_post_status_branch_html_template') }}
    {{ block('post_common_comment_post_list_template') }}
{% endblock %}

{% block datascript %}
    {{ block('post_common_post_status_branch_html_datascript') }}
    <script type="text/javascript">
        var _members = '{{ members|json_encode()|raw }}';
        window.members = JSON.parse(_members);
    </script>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
    $('.js-branch-member').on('click', function(){
        window.userFunction.showPopupUserList( window.members );
        return false;
    });
</script>
{{ block('post_common_comment_post_list_javascript') }}
{{ block('post_common_post_status_branch_javascript') }}
{% endblock %}
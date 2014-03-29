{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/common/html_block.tpl' %}
{% use '@template/default/template/post/common/post_status_wall.tpl' %}
{% use '@template/default/template/post/common/post_item_wall.tpl' %}
{% use '@template/default/template/post/common/comment_post_list.tpl' %}
{% use '@template/default/template/account/common/profile_column.tpl' %}
{% use '@template/default/template/post/template.tpl' %}

{# format post created #}
{% set date_timeago = get_datetime_from_now(-2) %}
{% set aPosts = [] %}
{% for key, post in posts %}
    {% if post.created >= date_timeago %}
        {% set post = post|merge({'created': post.created|date('c'), 'timeago': true}) %}
    {% else %}
        {% set post = post|merge({
            'created_full': post.created|localizeddate('full', 'short', get_cookie('language'), null, "cccc, d MMMM yyyy '" ~ 'at'|trans ~ "' hh:ss"), 
            'created_short': post.created|localizeddate('full', 'none', get_cookie('language'), null, "d MMMM '" ~ 'at'|trans ~ "' hh:ss"), 
            'timeago': false
        }) %}
    {% endif %}
    {% if post.content|length > 200 %}
        {% set post = post|merge({'see_more': true}) %}
    {% else %}
        {% set post = post|merge({'see_more': false}) %}
    {% endif %}
    {% set post = post|merge({'type': sPostType}) %}
    {% set aPosts = aPosts|merge({(loop.index0): post}) %}
{% endfor %}
{# end format #}

{% block title %}{% trans %}Wall Page of{% endtrans %} {{ users[current_user_id].username }}{% endblock %}

{% block stylesheet %}
    {{ block('post_common_comment_post_list_style') }}
    {{ block('post_common_post_status_wall_style') }}
{% endblock %}

{% block body %}
    <div id="y-content">
        <div id="y-main-content" class="has-horizontal post-per-column" style="width: 9999px;">
            {% set user = users[current_user_id] %}
            {% if current_user_id != get_current_user().id %}
                {{ block('account_common_profile_column') }}
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
                    {% if user.fr_status == 2 or user.fr_status == 1 %}
                    <div class="column has-new-post">
                        {{ block('post_common_post_status_wall') }}
                    </div>
                    {% endif %}
                    {{ block('post_template_item_single') }}
                    {#% for post in posts %}
                        <div class="column">
                            {% set user = users[post.user_id] %}
                            {{ block('post_common_post_item_wall') }}
                        </div>
                    {% endfor %#}
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

{% block datascript %}
    {{ block('post_common_post_status_wall_html_datascript') }}
    <script type="text/javascript">
        var _users = JSON.parse( '{{ users|json_encode()|raw }}' );
        for ( var key in _users ){
            window.yUsers.setItem( key, _users[key] );
        }
        var _posts = '{{ aPosts|json_encode()|raw }}';
        window.yPosts = new PostController( JSON.parse(_posts) );
        var sPostType = '{{ post_type }}';
    </script>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
$(function(){
    $(document).trigger('FRIEND_ACTION', [false]);    
});
</script>
<script type="text/javascript" src="{{ asset_js('post.js') }}"></script>
{#{ block('post_common_comment_post_list_javascript') }#}
{{ block('post_common_post_status_wall_javascript') }}
{% endblock %}
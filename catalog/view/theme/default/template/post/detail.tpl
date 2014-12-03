{% extends '@template/default/template/layout/basic/master.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %} 
<style type="text/css">
    html, body {
        background-color: #FFF;
    }
    .container-fluid {
        background-color: #FFF;   
    }
</style> 
{% endblock %}

{% block body %}
<div class="bg-white post-details">
    <div class="innerAll inner-2x bg-gray detail-header"> 
        <div class="media innerB half post-meta">
            <a href="{{ path('WallPage', {user_slug: post.user_slug}) }}">
                <img class="pull-left" width="80" class="small-avatar" src="{{ post.user.avatar }}" alt="{{ post.author }}">
            </a>
            <div class="media-body innerL">
                <h3 class="margin-none innerB half post-title" title="{{ post.title }}">{{ post.title }}</h3>           
                <div class="row">
                    <div class="col-md-6">
                        <a class="text-black strong post-author" href="{{ path('WallPage', {user_slug: post.user_slug}) }}">{{ post.author }}</a>
                        <span style="color: #CCC;">&nbsp;|&nbsp;</span>
                        <span class="post-time" data-bind="timeAgo: {{ post.created }}"></span>
                        {% if post.is_owner == false %}
                            <span style="color: #CCC;">&nbsp;|&nbsp;</span>
                            <a class="text-black strong post-owner" href="{{ post.owner.href }}">{{ post.owner.username }}</a>
                        {% endif %}
                    </div>
                    <div class="col-md-6">
                        <div class="post-actions text-right">
                            <ybutton-like params="likeCount: {{ post.like_count }}, isLiked: {{ post.isLiked }}, postType: '{{ post.type }}', postSlug: '{{ post.slug }}' "></ybutton-like>
                            <span style="color: #CCC;">&nbsp;|&nbsp;</span>
                            <a class="innerAll text-center text-muted"><i class="icon-comment-fill-2"></i> <span class="innerL half">{{ post.comment_count }}</span></a>
                            <span style="color: #CCC;">&nbsp;|&nbsp;</span>
                            <a class="innerAll text-center text-muted"><i class="icon-visual-eye-fill"></i> <span class="innerL half">{{ post.count_viewer }}</span></a>                            
                        </div>
                    </div>
                </div>                
            </div>
        </div>        
    </div>
    <div class="innerAll inner-2x post-content">
        {{ post.content|raw }}
    </div>
</div>
{% endblock %}
{% block javascript %}
<script src="{{ asset_js('pages/post/detail.js') }}"></script>
{% endblock %}
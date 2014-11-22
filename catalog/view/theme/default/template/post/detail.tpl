{% extends '@template/default/template/layout/basic/master.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %}       
{% endblock %}

{% block body %}
<div class="innerAll">
    <div id="post-detail" data-bind="with: detailModel">
        <div id="detail-header">
            <div class="goback-link fl">
                <a class="tooltip-bottom btn-goback" title="Go back" > 
                    <i class="icon-arrow-left medium-icon"></i>                 
                </a>
            </div>
            <div class="post-title-container">              
                <h2 class="post-title" title="{{ post.title }}">{{ post.title }}</h2>
                <div class="post-detail-meta">
                    <div class="post-user-time fl">
                        <a href="{{ path('WallPage', {user_slug: post.user_slug}) }}">
                            <img class="small-avatar" src="{{ post.user.avatar }}" alt="{{ post.author }}">
                        </a>
                        <a href="{{ path('WallPage', {user_slug: post.user_slug}) }}">
                            {{ post.author }}
                        </a>
                        <span style="color: #CCC;">&nbsp;|&nbsp;</span>
                        <span class="post-time" data-bind="timeAgo: {{ post.created }}"></span>
                        {% if post.is_owner == false %}
                            <span style="color: #CCC;">&nbsp;|&nbsp;</span>
                            <a href="{{ post.owner.href }}">{{ post.owner.username }}</a>
                        {% endif  %}                    
                    </div>
                    <ul class="post-actions fr post-item">
                        {% if is_logged() == true %}
                        <li>
                            <!-- ko if: !postData.isLiked() -->
                            <a class="like-post hidden" title="{% trans %}Like{% endtrans %}" data-bind="click: likePost">
                                <i class="icon-thumbs-up medium-icon"></i>
                            </a>
                            <!-- /ko -->
                            <!-- ko if: postData.isLiked() -->
                            <span class="unlike-post hidden" data-bind="click: likePost">
                                <a title="{% trans %}Unlike{% endtrans %}">
                                    <i class="icon-thumbs-down"></i>
                                </a>
                            </span>
                            <!-- /ko -->
                            <span class="number">
                                <a class="post-liked-list" title="View who liked" data-bind="click: showLikers">
                                    <d data-bind="text: postData.likeCount">{{ post.like_count }}</d>
                                </a>
                            </span>
                        </li>
                        <li class="toggle-comment">
                            <a class="open-comment" data-bind="click: showComment" title="{% trans %}Open comment box{% endtrans %}">
                                <i class="icon-comments-alt"></i>
                            </a>
                            <span class="number">
                                <d data-bind="text: postData.commentCount">{{ post.comment_count }}</d>
                            </span>
                        </li>
                        {% else %}
                        <li>
                            <a class="disabled">
                                <i class="icon-thumbs-up medium-icon"></i>
                            </a>
                            <span class="number">
                                <d>{{ post.like_count }}</d>
                            </span>
                        </li>
                        <li class="toggle-comment">
                            <a class="disabled">
                                <i class="icon-comments-alt"></i>
                            </a>
                            <span class="number">
                                <d>{{ post.comment_count }}</d>
                            </span>
                        </li>
                        {% endif  %}
                        <li>
                            <a class="disabled">
                                <i class="icon-eye-open"></i>
                            </a>
                            <span class="number">
                                <d>{{ post.count_viewer }}</d>
                            </span>
                        </li>           
                    </ul>           
                    <div class="clear"></div>   
                </div>
            </div>
        </div>
        <div id="detail-content">
            <div id="post-content">
                {{ post.content|raw }}
            </div>
            <div id="detail-scroll">
                <a class="btn-link-round fl" id="detail-first" style="display: none;">
                    <i class="icon-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</div>
{% endblock %}
{% block javascript %}
{% endblock %}
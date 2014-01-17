{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}{{ users[current_user_id].username }} | {% trans %}Notification{% endtrans %} {% endblock %}

{% block stylesheet %}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal notification-page">
        <div class="feed-block" style="width: 100%;">
            <div class="block-header">
                <a class="block-title fl" href="#">{% trans %}All Notifications{% endtrans %}</a>  
                <a class="block-seemore fl" href="#"> 
                    <i class="icon-angle-right"></i>
                </a>
            </div>
            <div class="block-content">               
               <div class="ntf-container">
                   <ul class="ntf-list">
                        <li class="ntf-date">{% trans %}Sent Today{% endtrans %}</li>
                        {% for i in 0..10 %}
                       <li class="ntf-item">
                           <i class="icon-thumbs-up-alt"></i>
                           <span class="ntf-content">Nguyen Van A likes your comment: "^^"</span>
                           <span class="ntf-time">23:59</span>
                       </li>
                       <li class="ntf-item">
                           <i class="icon-comments"></i>
                           <span class="ntf-content">Nguyen Van A commments on your status: "^^"</span>
                           <span class="ntf-time">23:59</span>
                       </li>
                       {% endfor %}
                       <li class="ntf-date">Sent Yesterday</li>
                        {% for i in 0..10 %}
                       <li class="ntf-item">
                           <i class="icon-thumbs-up-alt"></i>
                           <span class="ntf-content">Nguyen Van A likes your comment: "^^"</span>
                           <span class="ntf-time">23:59</span>
                       </li>
                       <li class="ntf-item">
                           <i class="icon-comments"></i>
                           <span class="ntf-content">Nguyen Van A commments on your status: "^^"</span>
                           <span class="ntf-time">23:59</span>
                       </li>
                       {% endfor %}
                       <li class="ntf-date">Sent December 09</li>
                        {% for i in 0..10 %}
                       <li class="ntf-item">
                           <i class="icon-thumbs-up-alt"></i>
                           <span class="ntf-content">Nguyen Van A likes your comment: "^^"</span>
                           <span class="ntf-time">23:59</span>
                       </li>
                       <li class="ntf-item">
                           <i class="icon-comments"></i>
                           <span class="ntf-content">Nguyen Van A commments on your status: "^^"</span>
                           <span class="ntf-time">23:59</span>
                       </li>
                       {% endfor %}
                       <li class="ntf-date">Sent December 08</li>
                        {% for i in 0..10 %}
                       <li class="ntf-item">
                           <i class="icon-thumbs-up-alt"></i>
                           <span class="ntf-content">Nguyen Van A likes your comment: "^^"</span>
                           <span class="ntf-time">23:59</span>
                       </li>
                       <li class="ntf-item">
                           <i class="icon-comments"></i>
                           <span class="ntf-content">Nguyen Van A commments on your status: "^^"</span>
                           <span class="ntf-time">23:59</span>
                       </li>
                       {% endfor %}
                       <li class="ntf-date">Sent December 07</li>
                        {% for i in 0..10 %}
                       <li class="ntf-item">
                           <i class="icon-thumbs-up-alt"></i>
                           <span class="ntf-content">Nguyen Van A likes your comment: "^^"</span>
                           <span class="ntf-time">23:59</span>
                       </li>
                       <li class="ntf-item">
                           <i class="icon-comments"></i>
                           <span class="ntf-content">Nguyen Van A commments on your status: "^^"</span>
                           <span class="ntf-time">23:59</span>
                       </li>
                       {% endfor %}
                   </ul>
               </div>               
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascript %}    
{% endblock %}
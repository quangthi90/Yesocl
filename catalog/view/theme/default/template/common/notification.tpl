{% extends '@template/default/template/common/layout.tpl' %}

{% block title %} {% trans %}Notification{% endtrans %} {% endblock %}

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
               <div class="ntf-container" style="opacity: 0;">
                   <ul class="ntf-list">
                    {% for time, notis in notifications %}
                      <li class="ntf-date">{% trans %}Sent{% endtrans %} {{ times[time] }}</li>
                      {% for noti in notis %}
                        {% set user = users[noti['actor_id']] %}
                      <li class="ntf-item">
                        <i class="icon-thumbs-up-alt"></i>
                        <span class="ntf-content">{{ user.username }} {{ noti.action }} "{{ noti.title|raw }}"</span>
                        <span class="ntf-time">{{ noti.created|date('H:i') }}</span>
                      </li>                      
                      {% endfor %}
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
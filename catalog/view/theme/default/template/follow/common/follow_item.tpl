{% block follow_common_follow_item %}
    <div class="block-content-item follow-item" data-user-id="" data-user-name="" data-user-email="">
        <a href="#" class="follow-img">
            <img src="image/no_user_avatar.png" alt="user name">
        </a>
        <div class="follow-info">
            <a href="#" class="follow-name">User Name</a>
            <ul class="friend-infolist">
                <li>working at Yesocl</li>
                <li><b>10</b> friends</li>
            </ul>
        </div>
        {{ block('follow_common_follow_button') }}
    </div>
{% endblock %}

{% block follow_common_follow_item_javascript %}
{% endblock %}
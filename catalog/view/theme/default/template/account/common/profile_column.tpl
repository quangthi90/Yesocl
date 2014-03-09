{% use '@template/default/template/common/user_block/user_button.tpl' %}

{% block account_common_profile_column %}
    <div class="free-block fl" style="width: 180px;">
        <div class="free-block-content">
            <div class="user_info_overview">
                <a href="{{ path('WallPage', {user_slug: user.slug}) }}" class="user_info_avatar">
                    <img src="{{ user.avatar }}" alt="{{ user.username }}" />
                </a>
                <a href="{{ path('WallPage', {user_slug: user.slug}) }}" class="user_info_name"><i class="icon-{% if user.gender == 1 %}male{% else %}female{% endif %}"></i> {{ user.username }}</a>
                <div class="user_relationship">
                    {% set fr_status = user.fr_status %}
                    {{ block('common_user_block_user_button') }}
                    {{ block('common_user_block_user_button_template') }}
                    <a href="#" class="btn btn-yes">
                        <i class="icon-random"></i> {% trans %}Follow{% endtrans %}
                    </a>
                    {#<a href="#" class="btn btn-yes">
                        <i class="icon-share-alt"></i> {% trans %}Message{% endtrans %}
                    </a>#}
                </div>                    
            </div>
            <ul class="user_actions">
                <li>
                    <i class="icon-list-alt"></i><a href="{{ path('ProfilePage', {user_slug: user.slug}) }}">{% trans %}Profile{% endtrans %}</a>
                </li>
                <li>
                    <i class="icon-fire"></i><a href="{{ path('FriendPage', {user_slug: user.slug}) }}">{% trans %}Friends{% endtrans %}</a>
                </li>
                {#<li>
                    <i class="icon-file-alt"></i><a href="#">{% trans %}Posts{% endtrans %}</a>
                </li>
                <li>
                    <i class="icon-group"></i><a href="#">{% trans %}Groups{% endtrans %}</a>
                </li>
                <li>
                    <i class="icon-tasks"></i><a href="#">{% trans %}Activities{% endtrans %}</a>
                </li>#}
            </ul>
        </div>
    </div>
{% endblock %}
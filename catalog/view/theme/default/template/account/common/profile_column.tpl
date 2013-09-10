{% block common_profile_column %}
    <div class="free-block fl" style="width: 180px;">
        <div class="free-block-content">
            <div class="user_info_overview">
                <a href="#" class="user_info_avatar">
                    <img src="{{ user.avatar }}" alt="Name" />
                </a>
                <a href="#" class="user_info_name"><i class="icon-male"></i> {{ user.username }}</a>
                <div class="user_relationship">
                    <a href="#" class="btn btn-yes">
                        <i class="icon-plus-sign"></i> Add friend
                    </a>
                    <a href="#" class="btn btn-yes">
                        <i class="icon-random"></i> Follow
                    </a>
                    <a href="#" class="btn btn-yes">
                        <i class="icon-share-alt"></i> Message
                    </a>
                </div>                    
            </div>
            <ul class="user_actions">
                <li>
                    <i class="icon-list-alt"></i><a href="#">Profile</a>
                </li>
                <li>
                    <i class="icon-fire"></i><a href="#">Friends</a>
                </li>
                <li>
                    <i class="icon-file-alt"></i><a href="#">Posts</a>
                </li>
                <li>
                    <i class="icon-group"></i><a href="#">Groups</a>
                </li>
                <li>
                    <i class="icon-tasks"></i><a href="#">Activities</a>
                </li> 
            </ul>
        </div>
    </div>
{% endblock %}
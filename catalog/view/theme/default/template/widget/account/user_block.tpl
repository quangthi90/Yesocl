{% block timeline_cover %}
    <div class="timeline-cover">
        <div class="cover image">
            <div class="top">
                <img src="{{ asset_img('cover_demo.jpg') }}" class="img-responsive" />
            </div>
            <ul class="list-unstyled">
                <li class="active"><a href="index.html?lang=en"><i class="fa fa-fw fa-clock-o"></i> <span>Timeline</span></a></li>
                <li><a href="about_1.html?lang=en"><i class="fa fa-fw fa-user"></i> <span>About</span></a></li>
                <li><a href="media_1.html?lang=en"><i class="fa fa-fw icon-photo-camera"></i> <span>Photos</span> <small>(102)</small></a></li>
                <li><a href="contacts_1.html?lang=en"><i class="fa fa-fw icon-group"></i><span> Friends </span><small>(19)</small></a></li>
                <li><a href="messages.html?lang=en"><i class="fa fa-fw icon-envelope-fill-1"></i> <span>Messages</span> <small>(2 new)</small></a></li>
            </ul>
        </div>
        {% set currUser = get_current_user() %}
        {% if is_logged() and currUser != null %}
            <div class="widget cover image">    
                <div class="widget-body padding-none margin-none">
                    <div class="photo">
                        <img src="{{ currUser.avatar }}" width="120" alt="" class="img-circle">
                    </div>
                    <div class="innerAll border-right pull-left">
                        <h3 class="margin-none">{{ currUser.username }}</h3>
                        <span>{{ currUser.current }}</span>
                    </div>
                    <div class="innerAll pull-left">
                        <p class="lead margin-none "> <i class="fa fa-quote-left text-muted fa-fw"></i> What a fun Partyyy</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        {% endif %}
    </div>    
{% endblock %}
{% block user_cover %}
    {% set currUser = get_current_user() %}
    <div class="timeline-cover">
    <div class="widget border-bottom">
        <div class="widget-body border-bottom">
            <div class="media">
                <div class="pull-left innerAll">
                    <img src="{{ currUser.avatar }}" width="120" alt="" class="img-circle">
                </div>
                <div class="media-body">
                    <h4><strong>{{ currUser.username }}</strong><a class="text-muted" href=""><i class="fa fa-envelope"></i></a>
                    </h4>
                    <div class="clearfix"></div>
                    <p>{{ currUser.current }}</p>
                    <div>
                        <a class="btn btn-info btn-sm" href=""><i class="icon-turn-right"></i> Follow</a>
                        <a class="btn btn-info btn-sm" href=""><i class="fa fa-plus-square"></i> Add friend</a>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="">
            <ul class="navigation">
                <li class="active"><a><i class="fa fa-fw icon-road-sign"></i><span> Timeline</span></a></li>                
                <li><a href="{{ path('FriendPage', {user_slug: currUser.slug}) }}"><i class="fa fa-fw icon-group"></i><span> Friends</span></a></li>
                <li><a href="{{ path('MessagePage') }}"><i class="fa fa-fw fa-envelope"></i><span> Messages</span></a></li>
                <li><a href="{{ path('ProfilePage', { user_slug: currUser.slug }) }}"><i class="fa fa-fw fa-user"></i><span> Profile</span></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
{% endblock %}

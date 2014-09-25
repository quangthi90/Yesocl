{% block timeline_cover %}
    <div class="timeline-cover">
        <div class="cover">
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
        <div class="widget">
            <div class="widget-body padding-none margin-none">
                <div class="innerAll">
                    <i class="fa fa-quote-left text-muted pull-left fa-fw"></i>
                    <p class="lead margin-none">What a fun Partyyy</p>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
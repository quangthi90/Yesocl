{% extends '@template/default/template/layout/basic/master.tpl' %}

{% use '@template/default/template/post/wall_post.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %}
    {{ block('wall_post_block_stylesheet') }}
{% endblock %}
{% block body %}
    <div class="innerAll">
        <div class="row">
            <div class="col-lg-9 col-md-8">
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
            {{ block('wall_post_block') }}
            </div>
            <!-- WIDGET -->
            <div class="col-md-4 col-lg-3">
            {{ include(template_from_string( user )) }}
            {% block widget_recent_news %}
                <div class="widget">
                    <h5 class="innerAll margin-none border-bottom bg-gray">Recent News</h5>
                    <div class="widget-body padding-none">
                        <div class="media border-bottom innerAll margin-none">
                            <img src="{{ asset_img('no_user_avatar.png') }}" height="50px" width="50px" class="pull-left media-object"/>
                            <div class="media-body">
                                <a href="" class="pull-right text-muted innerT half">
                                    <i class="fa fa-comments"></i> 4
                                </a>
                                <h5 class="margin-none"><a href="" class="text-inverse">Social Admin Released</a></h5>
                                <small>on February 2nd, 2014 </small>
                            </div>
                        </div>
                        <div class="media border-bottom innerAll margin-none">
                            <img src="{{ asset_img('no_user_avatar.png') }}" height="50px" width="50px" class="pull-left media-object"/>
                            <div class="media-body">
                                <a href="" class="pull-right text-muted innerT half">
                                    <i class="fa fa-comments"></i> 4
                                </a>
                                <h5 class="margin-none"><a href="" class="text-inverse">Timeline Cover Page</a></h5>
                                <small>on February 2nd, 2014 </small>
                            </div>
                        </div>
                    </div>
                </div>
            {% endblock %}
            </div>
            <!-- END WIDGET -->
        </div>
    </div>
{% endblock %}
{% block library_javascript %}
{% endblock %}
{% block common_javascript %}
{% endblock %}
{% block javascript %}
    {# block('wall_post_block_javascript') #}
{% endblock %}
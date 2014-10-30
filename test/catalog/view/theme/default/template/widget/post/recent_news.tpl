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
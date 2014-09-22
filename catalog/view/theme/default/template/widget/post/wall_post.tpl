{% block wall_post_block_stylesheet %}
{% endblock %}
{% block wall_post_block %}    
    <div data-bind="with: WallPostList" id="wall-post-list" class="gridalicious-row wall-post-list" data-toggle="gridalicious" data-gridalicious-width="340" data-gridalicious-gutter="12" data-gridalicious-selector=".gridalicious-item">
        <!-- ko if: !isLoadSuccess()-->
        <div class="innerAll inner-2x loading text-center text-medium"><i class="fa fa-fw fa-spinner fa-spin"></i> {% trans %}Loading{% endtrans %}</div>
        <!-- /ko -->
        <div class="loaded hide2">
            <!-- ko foreach: postList -->
            <!-- Widget -->
            <div class="widget gridalicious-item not-responsive">
                <!-- Info -->
                <div class="bg-primary">
                    <div class="media">
                        <a class="pull-left" data-bind="attr: { title: $data.user.username, href: '/yesocl/wall-page/' + $data.user.slug + '/' }"><img width="50" class="media-object" data-bind="attr: {src: $data.user.avatar, alt: $data.user.username}"></a>
                        <div class="media-body innerTB half">
                            <a href="#" class="pull-right innerT innerR text-white">
                                <i class="icon-reply-all-fill fa fa-2x "></i>
                            </a>
                            <a class="text-white strong display-block" data-bind="attr: { title: $data.user.username, href: '/yesocl/wall-page/' + $data.user.slug + '/' }, text: $data.user.username"></a>
                            <span data-bind="timeAgo: $data.created"></span>
                        </div>
                    </div>
                </div>
                <!-- Content -->
                <div class="innerAll" data-bind="html: $data.content()">
                </div>
                <!-- Comment -->
                <div class="bg-gray innerAll border-top border-bottom text-small ">
                    <span>{% trans %}View all{% endtrans %} <a class="text-primary" href="#"><span data-bind="text: $data.commentCount"></span> <span data-bind="text: $data.commentCount > 1 ? '{% trans %}Comments{% endtrans %}' : '{% trans %}Comment{% endtrans %}'"></span></a></span>
                </div>
                <!-- First Comment -->
                <div class="media margin-none bg-gray">
                    <a href="" class="pull-left innerAll"><img src="{{ asset_img('no_user_avatar.png') }}" alt="50x50" width="50" class="media-object"></a>
                    <div class="media-body innerTB">
                        <a href="#" class="pull-right innerT innerR text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                        <a href="" class="strong text-inverse">Adrian Demian</a>
                        <small class="text-muted display-block ">on Jan 15th, 2014</small>
                            <a href="" class="text-small">mark it</a>
                        <div>- Happy B-Day!</div>
                    </div>
                </div>
                <div class="input-group comment">
                    <input type="text" class="form-control" placeholder="{% trans %}Your comment here...{% endtrans %}">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary" href="#"><i class="fa fa-comment"></i></button>
                    </div>
                </div>
            </div>
            <!-- //End Widget -->
            <!-- /ko -->
        </div>
    </div>
{% endblock %}
{% block wall_post_block_javascript %}
{% endblock %}
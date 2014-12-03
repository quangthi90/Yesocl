{% block post_item_base_block %}    
    {% set user = users[post.user_id] %}
    <div class="item">
        <div class="box-generic padding-none margin-none overflow-hidden">
            <div class="relativeWrap overflow-hidden" data-height="175px">
                <a href="{{ path('PostPage', {post_type: post_type, post_slug: post.slug}) }}"><img src="{{ post.image }}" alt="{{ post.title }}" class="img-responsive padding-none border-none"></a>
                <div class="fixed-bottom bg-inverse-faded">
                    <div class="media margin-none innerAll">
                        <a class="pull-left" href="{{ path('WallPage', {user_slug: user.slug}) }}">
                            <img width="50" class="img-responsive padding-none border-none" src="{{ user.avatar }}" alt="{{ user.username }}" />
                        </a>
                        <div class="media-body text-white">
                            <a href="{{ path('WallPage', {user_slug: user.slug}) }}" class="text-white">{{ user.username }}</a>
                            <p class="text-small margin-none" data-bind="dateTimeText: {{ post.created}}">{{ post.created}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="innerAll inner-2x border-bottom">
                <h4 style="height: 60px; overflow: hidden;">
                    <a class="strong" href="{{ path('PostPage', { post_type: post_type, post_slug: post.slug}) }}">{{ post.title }}</a>
                </h4>
                <p class="margin-none" style="overflow: hidden; height: 50px;">{{ post.description|raw }}</p>
            </div>
            <div class="row row-merge">
                <div class="col-md-4">
                    <a class="innerAll text-center display-block text-muted"><i class="icon-thumbs-up-fill"></i> <span class="innerL half">{{ post.like_count }}</span></a>
                </div>
                <div class="col-md-4">
                    <a class="innerAll text-center display-block text-muted"><i class="icon-comment-fill-2"></i> <span class="innerL half">{{ post.comment_count }}</span></a>
                </div>
                <div class="col-md-4">
                    <a class="innerAll text-center display-block text-muted"><i class="icon-visual-eye-fill"></i> <span class="innerL half">{{ post.count_viewer }}</span></a>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
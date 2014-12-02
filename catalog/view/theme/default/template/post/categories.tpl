{% extends '@template/default/template/layout/basic/master.tpl' %}

{% use '@template/default/template/widget/post/recent_news.tpl' %}

{% block stylesheet %}     
{% endblock %}

{% block title %}{{ heading_title }}{% endblock %}

{% block body %}
    <div class="innerAll inner-2x">
        {% for category in categories %}
            {% set posts = all_posts[category.id] %}
                {% set block_info = category %}
                {% set block_href = path('BranchCategory', {category_slug: category.slug}) %}
                <div class="widget widget-heading-simple widget-body-white category-block">
                    <div class="widget-head">
                        <h3 class="heading glyphicons show_thumbnails"><i></i> <a class="text-uppercase text-black" href="{{block_href}}">{{block_info.name}}</a></h3>
                    </div>
                    <div class="widget-body">
                        {% if posts|length > 0 %}
                            <div id="category-{{block_info.id}}" class="owl-carousel owl-theme">
                                {% for post in posts %}
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
                                                <a class="innerAll text-center display-block text-muted"><i class="icon-visual-eye-fill"></i> <span class="innerL half">{{ post.view_count }}</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {% endfor %}
                            </div>
                        {% endif %}
                        {% if posts|length == 0 %}
                            <p class="innerAll bg-default">No posts found !</p>
                        {% endif %}
                    </div>
                </div>
                <div class="innerAll"></div>         
        {% endfor %}
    </div>
{% endblock %}
{% block library_javascript %}
<script src="{{ asset_js('library/owl_carousel/owl.carousel.min.js') }}"></script>
{% endblock %}
{% block common_javascript %}
{% endblock %}
{% block javascript %}
<script src="{{ asset_js('pages/post/categories.js') }}"></script>
{% endblock %}
{% extends '@template/default/template/layout/basic/master.tpl' %}

{% use '@template/default/template/widget/post/recent_news.tpl' %}
{% use '@template/default/template/widget/post/post_item_base.tpl' %}

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
                                {{ block('post_item_base_block')}}                                
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
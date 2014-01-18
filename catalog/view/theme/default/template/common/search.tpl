{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/common/html_block.tpl' %}
{% use '@template/default/template/friend/common/friend_list.tpl' %}
{% use '@template/default/template/friend/common/friend_button.tpl' %}

{% block title %}{% trans %}Search Page{% endtrans %}{% endblock %}

{% block stylesheet %}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal search-page">
        <div class="feed-block" style="width: 100%;">
            <div class="block-header">
                <a class="block-title fl" href="#">{% trans %}Search{% endtrans %}</a>  
                <a class="block-seemore fl" href="#"> 
                    <i class="icon-angle-right"></i>
                </a>
            </div>
            {% set numCategoryHasResult = 2 %}
            <div class="block-content search-container-{{numCategoryHasResult}}">
                <div class="column search-category">
                    <h3>{% trans %}People{% endtrans %} ({{ users|length }})</h3>
                    <div class="search-result-container">
                        {% for user in users %}
                            {% set friend = user %}
                            {{ block('friend_common_friend_list') }}
                        {% endfor %}
                        {{ block('friend_common_friend_button_template') }}
                    </div>
                </div>
                <div class="column search-category">
                    <h3>{% trans %}Post{% endtrans %} ({{ posts|length }})</h3>
                    <div class="search-result-container">
                        <ul>
                            {% for post in posts %}
                            <li>
                                <a href="{{ path('PostPage', {post_type: post.type, post_slug: post.slug}) }}" title="{{ post.title }}" class="data-detail">
                                    <img src="{{ post.image }}" alt="{{ post.title }}" />
                                    <div class="data-meta-info">
                                      <div class="data-name">{{ post.title }}</div>
                                      <div class="data-more">{{ post.metaInfo }}</div>
                                    </div>
                                </a>
                            </li>
                            {% endfor %}  
                        </ul>
                    </div>
                </div>
                {#<div class="column search-category">
                    <h3>Group (10)</h3>
                    <div class="search-result-container">
                        <ul>
                            {% for i in 1..10 %}
                            <li>
                                <a href="#" class="data-detail">
                                    <img src="http://findicons.com/icon/download/51187/clipping_picture/48/png" alt="" />
                                    <div class="data-meta-info">
                                      <div class="data-name">Cộng đồng Chứng Khoáng Hồ Chí Minh</div>
                                      <div class="data-more">100 members</div>
                                    </div>
                                </a>
                            </li>  
                            {% endfor %}                        
                        </ul>
                    </div>
                </div>#}
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascript %}
    
{% endblock %}
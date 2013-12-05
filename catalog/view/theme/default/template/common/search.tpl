{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/friend/common/friend_button.tpl' %}

{% block title %}{{ users[current_user_id].username }} | Search {% endblock %}

{% block stylesheet %}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal search-page">
        <div class="feed-block" style="width: 100%;">
            <div class="block-header">
                <a class="block-title fl" href="#">Search</a>  
                <a class="block-seemore fl" href="#"> 
                    <i class="icon-angle-right"></i>
                </a>
            </div>
            {% set numCategoryHasResult = 3 %}
            <div class="block-content search-container-{{numCategoryHasResult}}">
                <div class="column search-category">
                    <h3>People (50)</h3>
                    <div class="search-result-container">
                        <ul>
                            {% for user in users %}
                            <li>
                                <a href="#" class="data-detail">
                                    <img src="{{ user.avatar }}" alt="{{ user.username }}" />
                                    <div class="data-meta-info">
                                      <div class="data-name">{{ user.username }}</div>
                                      <div class="data-more">{{ user.metaInfo }}</div>
                                    </div>
                                    {% set fr_status = user.fr_status.status %}
                                    {% set fr_slug = user.slug %}
                                    {{ block('friend_common_friend_button') }}
                                </a>
                            </li>
                            {% endfor %}
                        </ul>
                        {{ block('friend_common_friend_button_template') }}
                    </div>
                </div>
                <div class="column search-category">
                    <h3>Post (20)</h3>
                    <div class="search-result-container">
                        <ul>
                            {% for i in 1..20 %}
                            <li>
                                <a href="#" class="data-detail">
                                    <img src="http://findicons.com/icon/download/51187/clipping_picture/48/png" alt="" />
                                    <div class="data-meta-info">
                                      <div class="data-name">Chỉ số VN-Index</div>
                                      <div class="data-more">10 likes - 10 comments</div>
                                    </div>
                                </a>
                            </li>
                            {% endfor %}  
                        </ul>
                    </div>
                </div>
                <div class="column search-category">
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
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascript %}
    
{% endblock %}
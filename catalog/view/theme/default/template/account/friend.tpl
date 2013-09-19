{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}{{ user_info.username }} | Friends {% endblock %}

{% block stylesheet %}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal account-friend" style="width: 9999px; padding-right: 250px;">
        {% if current_user_id != get_current_user().id %}
            {% set user = users[current_user_id] %}
            {{ block('common_profile_column') }}
        {% endif %}
        <div class="feed-block">
            <div class="block-header">
                <a class="block-title fl" href="#">Friend                                      
                </a>  
                <a class="block-seemore fl" href="#"> 
                    <i class="icon-angle-right"></i>
                </a>           
            </div>
            <div class="block-content">
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>                                
            </div>
        </div>  
        <div id="friend-filter">
            <div class="friend-search">
                <input type="text" placeholder="quick search ..." size="50" name="friend-key" id="friend-key" />
                <a href="#" class="friend-search-btn"><i class="icon-search"></i></a>
            </div>
            <ul class="friend-conditions">
                <li>
                    <i class="icon-list"></i><a href="#">All Friends</a>
                </li>                
                <li>
                    <i class="icon-star"></i><a href="#">Recently Added</a>
                </li>
                <li>
                    <i class="icon-male"></i><a href="#">Male Friends</a>
                </li>
                <li>
                    <i class="icon-female"></i><a href="#">Female Friends</a>
                </li>
                <li>
                    <i class="icon-ok"></i><a href="#">Mutual Friends</a>
                </li>
                <li>
                    <i class="icon-ok"></i><a href="#">Same College</a>
                </li>
                <li>
                    <i class="icon-ok"></i><a href="#">Same Company</a>
                </li>
                <li>
                    <i class="icon-ok"></i><a href="#">Same Country</a>
                </li>
                <li>
                    <i class="icon-ok"></i><a href="#">Same City</a>
                </li>                
            </ul>
        </div>
    </div>
</div>
{% endblock %}

{% block javascript %}
{% endblock %}
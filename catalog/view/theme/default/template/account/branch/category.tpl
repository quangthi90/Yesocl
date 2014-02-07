{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/common/html_block.tpl' %}

{% block title %}{% trans %}Branch Page{% endtrans %}{% endblock %}

{% block body %}
    <div id="y-content">
        <div id="y-main-content" class="has-horizontal account-friend" style="width: 9999px;">
            <div class="feed-block">
                <div class="block-header">
                    <a class="block-title fl" href="#">My Branches</a>  
                    <a class="block-seemore fl" href="#"> 
                        <i class="icon-angle-right"></i>
                    </a>
                </div>
                <div class="block-content user-container">
                    <div class="block-content-item">
                        <a href="#" class="fl friend-img">
                            <img src="{{ friend.avatar }}">
                        </a>
                        <div class="fl friend-info">
                            <a href="#" class="friend-name">Technology</a>
                            <ul class="friend-infolist">
                                <li>1000 posts</li>
                                <li>100 members</li>                            
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
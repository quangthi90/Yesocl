{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/common/html_block.tpl' %}

{% block title %}{% trans %}My Branch Page{% endtrans %}{% endblock %}

{% block body %}
    <div id="y-content">
        <div id="y-main-content"  data-block-width="400" data-block-height="130" class="has-horizontal block-auto-floatleft full-width" style="width: 9999px;">
            <div class="feed-block">
                <div class="block-header">
                    <a class="block-title fl" href="#">{% trans %}My Branches{% endtrans %}</a>  
                    <a class="block-seemore fl" href="#"> 
                        <i class="icon-angle-right"></i>
                    </a>
                </div>
                <div class="block-content user-container">
                    {% for branch in branches %}
                    <div class="block-content-item branch-item">
                        <a href="{{ path('BranchDetail', {branch_slug: branch.slug}) }}" class="fl branch-img">
                            <img src="{{ branch.logo }}" alt="{{ branch.name }}">
                        </a>
                        <div class="fl branch-info">
                            <a href="{{ path('BranchDetail', {branch_slug: branch.slug}) }}" class="branch-name">{{ branch.name }}</a>
                            <ul class="branch-infolist">
                                <li><i class="icon-group"></i> <span class="count-number">{{ branch.member_count }}</span> {% trans %}members{% endtrans %}</li>
                                <li><i class="icon-pencil"></i> <span class="count-number">{{ branch.post_count }}</span> {% trans %}posts{% endtrans %}</li>                    
                            </ul>
                        </div>
                        {#<div class="yes-dropdown">
                            <div class="dropdown">
                               <a class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-caret-down"></i>
                               </a>
                               <ul class="dropdown-menu">
                                    <li><a href="#">Leave branch</a></li>
                                    <li><a href="#">...</a></li>
                                </ul>
                            </div>
                        </div>#}
                    </div>                  
                    {% endfor %}
                </div>
            </div>     
        </div>
    </div>
{% endblock %}

{% block javascript %}
{% endblock %}
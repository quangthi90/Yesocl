{% block widget_templates %}
<template id='template-yFriendButton'>
  <div class="y-friend-button">    
    <!-- ko if: friendStatus() == 4 -->
    <a class="btn btn-primary btn-sm btn-friend" data-bind="click: addFriend"><i class="icon-add-symbol"></i> {% trans %}Make Friend{% endtrans %}</a>
    <!-- /ko -->
    <!-- ko if: friendStatus() == 2 -->
    <div class="dropdown btn-friend">
        <a class="btn btn-primary btn-sm btn-friend dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-checkmark-thick"></i> {% trans %}Friend{% endtrans %}</a>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a data-bind="click: unFriend">{% trans %}Unfriend{% endtrans %}</a>
            </li>
        </ul>
    </div>
    <!-- /ko -->
    <!-- ko if: friendStatus() == 3 -->
    <div class="dropdown btn-friend">
        <a class="btn btn-primary btn-sm btn-friend dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-checkmark"></i> {% trans %}Sent Request{% endtrans %}</a>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a data-bind="click: cancelRequest">{% trans %}Cancel Request{% endtrans %}</a>
            </li>
        </ul>
    </div>
    <!-- /ko -->    
    <!-- ko if: followStatus() == 2 -->
    <div class="dropdown btn-friend">
        <a class="btn btn-primary btn-sm btn-friend dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-refresh-star-fill"></i> {% trans %}Following{% endtrans %}</a>
        <ul class="dropdown-menu" role="menu">
            <li><a data-bind="click: unFollow">{% trans %}Unfollow{% endtrans %}</a></li>
        </ul>
    </div>
    <!-- /ko -->
    <!-- ko if: followStatus() == 3 -->
    <a class="btn btn-primary btn-sm btn-friend" data-bind="click: follow"><i class="fa fa-rss"></i> {% trans %}Follow{% endtrans %}</a>
    <!-- /ko -->
  </div>
</template>
<template id='template-yLikePost'>
    <a class="innerAll text-center text-muted">
        <!-- ko if: isLiked() -->
        <span data-bind="click: like"><i class="icon-thumbs-down"></i></span>
        <!-- /ko -->
        <!-- ko ifnot: isLiked() -->
        <span data-bind="click: like"><i class="icon-thumbs-up-fill"></i></span>        
        <!-- /ko -->
        <span class="innerL half" data-bind="text: likeCount"></span>
    </a>
</template>
{% endblock %}}
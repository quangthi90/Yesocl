{% use '@template/default/template/post/common_ko/post_item_small_style.tpl' %}

{% block post_common_ko_post_statistics %}
<div class="feed-block block-tabable block-post-statistics" data-bind="style: { 'width' : $root.postStatisticsModel.width }, attr: { 'id' : $root.postStatisticsModel.id }, with: $root.postStatisticsModel">
    <div class="block-header">
        <ul class="block-tabs">
            <li class="block-tab-item">
                <a href="{{ path('WallPage', {user_slug: current_user.slug}) }}">{% trans %}Overview{% endtrans %}</a>
            </li>
            <li class="block-tab-item active">
                <a href="#">{% trans %}Statistics{% endtrans %}</a>
            </li>
        </ul>
    </div>
    <div class="block-content">
        <div class="post-container">
            <!-- ko if: isLoadSuccess() && postList().length > 0 -->
                <div data-bind="foreach: postList" class="masonry-horizontal">
                    {{ block('post_common_ko_post_item_small') }}
                </div>
            <!-- /ko -->
            <!-- ko if: isLoadSuccess() && postList().length == 0 -->
            <p>No posts found ! </p>
            <!-- /ko -->
            <!-- ko if: !isLoadSuccess() && postList().length == 0 -->
            <p><i class="icon-spinner icon-spin"></i> Loading ...</p>
            <!-- /ko -->
        </div>
        <div class="post-filters">
            <h5 class="header" >Filters</h5>
            <ul class="nav nav-list">
                <li class="nav-header">Type
                    <ul data-bind="foreach: types">
                        <li>
                           <a data-bind="click: $parent.updateType">
                                <!-- ko if: $data == $parent.currentType() -->
                                <i class="icon-ok" style="color: green;"></i>
                                <!-- /ko -->
                                <!-- ko if: $data != $parent.currentType() -->
                                <i class="icon-arrow-right"></i>
                                <!-- /ko -->
                                <span data-bind="text: $data"></span>
                           </a>
                        </li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li>
                    <a data-bind="click: loadPopularPost">
                        <!-- ko if: currentTime() == 0 -->
                        <i class="icon-ok" style="color: green;"></i>
                        <!-- /ko -->
                        <!-- ko if: currentTime() != 0 -->
                        <i class="icon-arrow-right"></i>
                        <!-- /ko -->
                        <span>Popular posts</span> (<b style="font-size: 9px;" data-bind="text: totalPopularPost">0</b>)
                    </a>
                </li>
                <li>
                    <ul data-bind="foreach: times">
                        <li>
                           <a data-bind="click: $parent.loadPosts">
                                <!-- ko if: $parent.currentTime() == time -->
                                <i class="icon-ok" style="color: green;"></i>
                                <!-- /ko -->
                                <!-- ko if: $parent.currentTime() != time -->
                                <i class="icon-arrow-right"></i>
                                <!-- /ko -->
                                <span data-bind="dateTimeText: time, dateFormat: 'YYYY/MM'"></span> 
                                (<b data-bind="text: count"></b>)
                            </a> 
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
{% endblock %}
{% block post_common_ko_post_statistics_javascript %}
    {{ block('post_common_ko_post_item_add_edit_javascript') }}
{% endblock %}

{% use '@template/default/template/post/common_ko/post_item_small_style.tpl' %}

{% block post_common_ko_post_statistics %}
<div class="feed-block block-tabable" data-bind="style: { 'width' : $root.postStatisticsModel.width }, attr: { 'id' : $root.postStatisticsModel.id }, with: $root.postStatisticsModel">
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
        <div class="post-container fl" style="width: 85%;">
            <!-- ko if: postList().length > 0 -->
                <div data-bind="foreach: postList">
                    {{ block('post_common_ko_post_item_small') }}
                </div>
            <!-- /ko -->
        </div>
        <div class="post-filters fr" style="width: 15%;">
            <ul class="nav nav-list">
                <li class="active"><a href="#"><i class="icon-fixed-width icon-star"></i> Popular posts</a></li>
                <li class="nav-header">By time
                    <ul>
                        <li>
                           <a href=""><i class="icon-fixed-width icon-arrow-right"></i> 2013/12 <strong>(10)</strong></a> 
                        </li>
                        <li>
                           <a href=""><i class="icon-fixed-width icon-arrow-right"></i> 2013/12 <strong>(10)</strong></a> 
                        </li>
                        <li>
                           <a href=""><i class="icon-fixed-width icon-arrow-right"></i> 2013/12 <strong>(10)</strong></a> 
                        </li>
                        <li>
                           <a href=""><i class="icon-fixed-width icon-arrow-right"></i> 2013/12 <strong>(10)</strong></a> 
                        </li>
                        <li>
                           <a href=""><i class="icon-fixed-width icon-arrow-right"></i> 2013/12 <strong>(10)</strong></a> 
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

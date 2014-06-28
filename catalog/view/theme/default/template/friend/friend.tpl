{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}{{ users[current_user_id].username }} | {% trans %}Friend Page{% endtrans %} {% endblock %}

{% block stylesheet %}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" data-block-width="380" data-block-height="90" class="has-horizontal stock-page" style="min-width: inherit; display: inline-block;">
        {% if current_user_id != get_current_user().id %}
            {{ block('account_common_profile_column') }}
        {% endif %}
        <div class="feed-block stock-block" data-bind="with: $root.friendViewModel">
            <div class="block-header">
                <h3 class="block-title"><a href="#">{% trans %}Friend{% endtrans %} <i class="icon-caret-right"></i></a></h3>
            </div>
            <div class="block-content user-container">
                <!-- ko if: userList().length  -->
                <!-- ko foreach: userList() -->
                <div class="user-item js-friend-info">
                    <a class="user-img" data-bind="link: { title: $data.name, route: 'WallPage', params: { user_slug: $data.slug } }">
                        <img data-bind="attr: {src: $data.avatar, alt: $data.username}">
                    </a>
                    <div class="user-info">
                        <a class="user-name" data-bind="link: { title: $data.name, route: 'WallPage', params: { user_slug: $data.slug } }, text: $data.username"></a>
                        <ul class="user-infolist">
                            <li><span class="js-current-status" data-bind="attr: {title: $data.current }, text: $data.current"></span></li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <!-- ko if: $data.friendStatus() == 4 -->
                        <a class="btn btn-yes btn-friend friend-group"><i class="icon-plus-sign"></i> {% trans %}Make Friend{% endtrans %}</a>
                        <!-- /ko -->
                        <!-- ko if: $data.friendStatus() == 2 -->
                        <div class="dropdown friend-group">
                            <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Friend{% endtrans %}</a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a>{% trans %}Unfriend{% endtrans %}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /ko -->
                        <!-- ko if: $data.friendStatus() == 3 -->
                        <div class="dropdown friend-group">
                            <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Sent Request{% endtrans %}</a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#">{% trans %}Cancel Request{% endtrans %}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /ko -->
                        <!-- ko if: $data.followStatus() == 2 -->
                        <div class="dropdown follow-group">
                            <a href="#" class="btn btn-yes btn-friend dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Following{% endtrans %}</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">{% trans %}Unfollow{% endtrans %}</a></li>
                            </ul>
                        </div>
                        <!-- /ko -->
                        <!-- ko if: $data.followStatus() == 3 -->
                        <a href="#" class="btn btn-yes btn-follow follow-group"><i class="icon-rss"></i> {% trans %}Follow{% endtrans %}</a>
                        <!-- /ko -->
                    </div>
                </div>
                <!-- /ko -->
                <!-- /ko -->
                <!-- ko if: canLoadMore() -->
                <div class="load-more-wrapper" style="position: absolute; right: 0px; top: 0px; bottom: 0px; width: 10px;">
                    <!-- ko ifnot: isLoadingMore() -->
                    <a title="Load more ..." data-bind="click: loadMore" class="btn-load-more" style="display: block; height: 100%;">
                        <i class="icon-chevron-right"></i>
                    </a>
                    <!-- /ko -->
                </div>
                <!-- /ko -->
                <!-- ko if: isLoadSuccess() && userList().length == 0 -->
                <div class="empty-data">
                    {% trans %}No friends found{% endtrans %}
                </div>
                <!-- /ko -->
                <!-- ko ifnot: isLoadSuccess() -->
                <div class="empty-data">
                    {% trans %}Loading data ...{% endtrans %}
                </div>
                <!-- /ko -->
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascript %}
    {{ block('common_user_block_user_item_javascript') }}
    <script type="text/javascript" src="{{ asset_js('ko-vms.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var currUser = JSON.parse('{{ users[current_user_id]|json_encode()|raw }}');

            var friendViewModelOptions = {
                limit: 10,
                urls: {
                    loadData : { name: "ApiGetAllFriends",  params: { } },
                },
                doInit: true,
            };

            var wallUserColumnOptions = {
                wallUser : currUser
            };

            var viewModel = {
                userInfoColumnModel : new UserInfoColumnViewModel(wallUserColumnOptions),
                friendViewModel : new FriendViewModel(friendViewModelOptions),
            };

            ko.applyBindings(viewModel, document.getElementById(YesGlobal.Configs.defaultBindingElement));
        });
    </script>
{% endblock %}
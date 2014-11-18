{% extends '@template/default/template/layout/basic/master.tpl' %}
{% use '@template/default/template/widget/account/user_block.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %}
 {% endblock %}

{% block body %}
    <div class="innerAll">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                {{ block('timeline_cover')}}
                <div id="#friend-list" class="innerT inner-2x" data-bind="with:PageFriendView">
                    <div class="innerB inner-2x">
                        <input data-bind="value: query, valueUpdate: 'afterkeydown'" type="text" class="form-control" placeholder="Search contacts">
                    </div>
                    <div class="row row-merge">    
                        <div class="friend-list">
                        <!-- ko foreach: friendListView -->
                            <div class="col-md-12 col-lg-6">
                                <div class="media bg-white user-item">
                                    <a class="pull-left margin-none" data-bind="link: {route: 'WallPage', params: { user_slug: $data.userslug } }">
                                        <img class="img-clean" data-bind="attr : { 'src' : $data.avatar, alt : $data.username }">
                                    </a>
                                    <div class="media-body innerAll inner-2x padding-right-none padding-bottom-none">
                                        <h5 class="media-heading truncated-text strong" data-bind="attr:{ 'title': $data.username }">
                                            <a class="text-inverse" data-bind="text: $data.username, link: {route: 'WallPage', params: { user_slug: $data.userslug } }"></a>
                                        </h5>
                                         <!-- ko if: $data.current -->
                                        <p class="truncated-text" data-bind="attr:{ 'title': $data.current }"><span data-bind="text: $data.current"></span>
                                        </p> 
                                         <!-- /ko -->                                    
                                    </div>
                                    <div class="user-item-options">
                                        <div class="btn-group-vertical btn-group-xs" role="group">
                                            <button class="btn btn-primary" data-bind="click: $parent.unFriend">
                                                <i class="fa fa-check"></i> {% trans %} Unfriend {% endtrans%}
                                            </button> 
                                            <!-- ko if: $data.followStatus() == 0 || $data.followStatus() == 3 -->
                                            <button class="btn btn-default" data-bind="click: $parent.follow">
                                                <i class="fa fa-check"></i>&nbsp; {% trans %} Follow {% endtrans %}  
                                            </button> 
                                            <!-- /ko -->
                                            <!-- ko if: $data.followStatus() == 2 -->
                                            <button class="btn btn-default" data-bind="click: $parent.unFollow">
                                                <i class="fa fa-rss"></i>&nbsp; {% trans %} UnFollow {% endtrans %}
                                            </button> 
                                            <!-- /ko -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /ko -->
                        <!-- ko if: !friendListView() || friendListView().length == 0 -->
                            <div class="bg-gray innerAll">
                                {% trans %} You don't have any friend now ! {% endtrans%}
                            </div>
                        <!-- /ko -->
                        </div>
                    </div>
                </div>                
            </div>
            <!-- WIDGET -->
            <div class="col-md-4 col-lg-3">         
            </div>
            <!-- END WIDGET -->
        </div>
    </div>
{% endblock %}
{% block library_javascript %}
{% endblock %}
{% block common_javascript %}
<script src="{{ asset_js('pages/account/friend.js') }}"></script>
{% endblock %}
{% block javascript %}
    <script type="text/javascript">
        (function($, ko, Y, undefined) {
                Y.GlobalKoModel = Y.GlobalKoModel || {};
                var options = { 
                     apiUrls : "ApiGetFriends"
                };
                var oViewModel = new Y.Widgets.FriendView(options, $("#friend-list"));
                Y.GlobalKoModel.PageFriendView = oViewModel;
               
                // //Apply Knockout
                ko.applyBindings(Y.GlobalKoModel);
        }(jQuery, ko, YesGlobal));
    </script>
{% endblock %}
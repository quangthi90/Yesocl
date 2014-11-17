{% extends '@template/default/template/layout/basic/master.tpl' %}
{% use '@template/default/template/widget/account/user_block.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %}
 <style type="text/css">
    .menu_friend{
        color: #25AD9F;
    }
    .option_friend_follow{
        /*margin-top: 9px;*/
        width: 100px;
    }
 </style>   
{% endblock %}
{% block body %}
    <div class="innerAll">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                {{ block('timeline_cover')}}
                <div class="input-group innerB inner-2x">
                    <input type="text" class="form-control " placeholder="Search contacts">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="row row-merge">                    
                    <div id="#friend-list" class="friend-list" data-bind="with:PageFriendView">
                    <!-- ko foreach: friendList-->
                        <div class="col-md-12 col-lg-6">
                            <div class="media bg-white user-item">
                                <a class="pull-left margin-none" data-bind="link: {route: 'WallPage', params: { user_slug: $data.userslug } }">
                                    <img class="img-clean" data-bind="attr : { 'src' : $data.avatar, alt : $data.username }">
                                </a>
                                <div class="media-body innerAll inner-2x padding-right-none padding-bottom-none">
                                    <h4 class="media-heading truncated-text" data-bind="attr:{ 'title': $data.username }"><a class="text-inverse" data-bind="text: $data.username, link: {route: 'WallPage', params: { user_slug: $data.userslug } }"></a></h4>
                                     <!-- ko if: $data.current -->
                                    <p class="truncated-text" data-bind="attr:{ 'title': $data.current }"><i class="fa fa-fw fa-map-marker text-muted" ></i><span data-bind="text: $data.current"></span>
                                    </p> 
                                     <!-- /ko -->                                    
                                </div>
                                <div class="user-item-options">
                                    <div class="btn-group-vertical btn-group-xs" role="group">
                                        <button class="btn btn-primary" data-bind="click: $parent.unFriend">
                                            <i class="fa fa-check"></i> {% trans %} Unfriend {% endtrans%}
                                        </button> 
                                        <button class="btn btn-default" data-bind="click: clickFollow">
                                            <!-- ko if: $data.followStatus() == 0 || $data.followStatus() == 3 -->
                                            <i class="fa fa-check"></i>&nbsp; {% trans %} Follow {% endtrans %}
                                            <!-- /ko -->
                                            <!-- ko if: $data.followStatus() == 2-->
                                            <i class="fa fa-rss"></i>&nbsp; {% trans %} UnFollow {% endtrans %}
                                            <!-- /ko -->                                            
                                        </button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- /ko -->
                    <!-- <button type="button" class=" pull-right btn btn-info" data-bind="click: $data.loadMore">Load More</button> -->
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
<script src="{{ asset_js('models/friend-models.js') }}"></script>
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
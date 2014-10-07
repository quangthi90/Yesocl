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
				<!-- Friend page -->
                {{ block('timeline_cover')}}
                {#<h1 data-bind="text: Hello"></h1>
                <h1 data-bind="text: UserList"></h1>#}
                <div class="input-group innerB">
                    <input type="text" class="form-control " placeholder="Search contacts">
                    <div class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                </div>
                <div class="row row-merge">                    
                    <div id="#friend-list" data-bind="with:PageFriendView">
                    <!-- ko foreach: friendList-->
                        <div class="col-md-12 col-lg-6 bg-white border-bottom">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="media">
                                        <a class="pull-left margin-none" data-bind="link: {route: 'WallPage', params: { user_slug: $data.userslug } }">
                                            <img class="img-clean" data-bind="attr : { 'src' : $data.avatar, alt : $data.username }">
                                        </a>
                                        <div class="media-body innerAll inner-2x padding-right-none padding-bottom-none">
                                             <h4 class="media-heading"><a class="text-inverse" data-bind="text: $data.username, link: {route: 'WallPage', params: { user_slug: $data.userslug } }"></a></h4>
                                             <p>
                                                <i class="fa fa-fw fa-map-marker text-muted" ></i><span data-bind="text: $data.current"></span></p> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-right" style="margin-top: 9px;">
                                        <div class="option_friend_follow btn-group-vertical btn-group-sm pull-left ">
                                            <div class="dropdown"  style="width: 100%">
                                                <a class="dropdown-toggle btn btn-primary btn-sm option_friend_follow" id="btn_option_friend" data-toggle="dropdown" style="width: 100%"><i class="fa fa-user"></i><span></span>&nbsp; {% trans %} Friend {% endtrans %}</a>
                                                <ul class="dropdown-menu">
                                                    <li class="pull-left "><a data-bind="click: $parent.unFriend">{% trans %} Unfriend {% endtrans%}</a></li>
                                                </ul>
                                            </div>
                                            <a class="btn btn-default option_friend_follow" data-bind="click: clickFollow"><i class="fa fa-check  "></i><!-- ko if: $data.followStatus() == 0 || $data.followStatus() == 3 -->
                                           {% trans %} Follow {% endtrans %} 
                                            <!-- /ko -->
                                            <!-- ko if: $data.followStatus() == 2-->
                                            {% trans %} UnFollow {% endtrans %}
                                            <!-- /ko -->
                                            </a>
                                          
                                            <!-- <a class="btn btn-default" style="margin-left: -4px" data-toggle="sidr-open" data-menu="menu-right"><i class="fa fa-weixin  "></i> {% trans %} &nbsp; Chat {% endtrans %}</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- /ko -->
                    </div>
                </div>
            </div>
            <!-- WIDGET -->
            <div class="col-md-4 col-lg-3">
            {{ block('widget_recent_news') }}           
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
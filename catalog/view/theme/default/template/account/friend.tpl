{% extends '@template/default/template/layout/basic/master.tpl' %}
{% use '@template/default/template/widget/account/user_block.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %}
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
                    <div class="block-content user-container">
                        {% if friend_ids|length > 0 %}
                            {% for friend_id in friend_ids %}
                                {% set friend = users[friend_id] %}
                                {{ block('common_user_block_user_item') }}
                            {% endfor %}
                        {% else %}
                            <div class="empty-data">
                                {% trans %}No friends found{% endtrans %}
                            </div>
                        {% endif %}
                        {{ block('common_user_block_user_button_template') }}        
                    </div>
                    <div id="#friend-list" data-bind="with:PageFriendView">
                    <!-- ko foreach: friendList-->
                        <div class="col-md-12 col-lg-6 bg-white border-bottom">
                            <div class="row">
                                <div class="col-sm-9">
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
                                <div class="col-sm-3" style="padding: auto">
                                    <div class="innerAll text-right">
                                        <div class="btn-group-vertical btn-group-sm dropdown" >
                                                <a class="dropdown-toggle btn btn-primary  " style="margin-left: -4px" id="btn_option_friend" data-toggle="dropdown"><i class="fa fa-user"></i>{% trans %}&nbsp; Friend {% endtrans %} </a>
                                                <ul class="dropdown-menu">
                                                    <li><a data-bind="click: unFriend "></a>{% trans %} Unfriend {% endtrans%}</li>
                                                </ul>
                                            <a class="dropdown-toggle btn btn-default" style="margin-left: -4px"    ><i class="fa fa-check  "></i> {% trans %} &nbsp; Follow {% endtrans %}</a>
                                            <ul class="dropdown-menu">
                                                    <!-- ko if: $data.followStatus == 2-->
                                                    <li><a data-bind="click: unFollow "></a>{% trans %} UnFollow {% endtrans%}</li>
                                                    <!-- !ko-->
                                                    <!-- ko if: $data.followStatus == 2 -->
                                                    <li><a data-bind="click: addFollow "></a>{% trans %} UnFollow {% endtrans%}</li>
                                                    <!-- !ko -->
                                            </ul>
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
            {{ include(template_from_string( user )) }}
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
                     apiUrls : "ApiGetAllFriends"
                };
                var oViewModel = new Y.Widgets.FriendView(options, $("#friend-list"));
                Y.GlobalKoModel.PageFriendView = oViewModel;
               
                // //Apply Knockout
                ko.applyBindings(Y.GlobalKoModel);
        }(jQuery, ko, YesGlobal));

        status_btn_friend = false;

        $(document).ready(function(){
            $("#btn_friend").click(function(){
                 
                status_btn_friend = (!status_btn_friend);
                if(status_btn_friend == false) // Click to unfriend
                {
                    var btn_friend_options = {
                    apiUrls: "ApiPutUnfriend"
                    };
                }
                else // Click to addfriend
                {
                     var btn_friend_options = {
                    apiUrls: "ApiPutAddFollower"
                    };
                }
            });

            $("#btn_option_friend").hover(function(){
                 var btn_friend_options = {
                    apiUrls: "ApiPutRemoveFollower"
                };
            });
        });
    </script>
{% endblock %}
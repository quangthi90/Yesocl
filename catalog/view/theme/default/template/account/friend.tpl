{% extends '@template/default/template/layout/basic/master.tpl' %}
{% use '@template/default/template/widget/account/user_block.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %}
{% endblock %}
{% block body %}
    <div class="innerAll">
        <div class="row">
            <div class="col-lg-9 col-md-8" id="friend-list" data-bind="with: FriendView" > 
				<!-- Friend page -->
                {{ block('timeline_cover')}}
                <h1 data-bind="text: Hello"></h1>
                <h1 data-bind="text: UserList"></h1>
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
                    <div class="col-md-12 col-lg-6 bg-white border-bottom">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="media">
                                    <a class="pull-left margin-none" href="#">
                                        <img class="img-clean" src="../assets//images/people/100/1.jpg" alt="...">
                                    </a>
                                    <div class="media-body innerAll inner-2x padding-right-none padding-bottom-none">
                                         <h4 class="media-heading"><a href="" class="text-inverse">Perpetua Inger</a></h4>
                                         <p>
                                            <!-- <span class="text-success strong"><i class="fa fa-check"></i> Friend</span> &nbsp;  -->
                                            <i class="fa fa-fw fa-map-marker text-muted"></i> Living in Missouri, USA</p> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="innerAll text-right">
                                    <div class="btn-group-vertical btn-group-sm">
                                        <a href="" class="btn btn-primary"><i class="fa fa-fw fa-thumbs-up"></i> Like</a>
                                        <a href="" class="btn btn-default" data-toggle="sidr-open" data-menu="menu-right"><i class="fa fa-fw fa-envelope-o"></i> Chat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        (function($, ko,  Y, undefined) {
                Y.GlobalKoModel = Y.GlobalKoModel || {};
                var options = { 
                    Hello: "hello Thao",
                    UserList: [
                        { UserId : "1", UserName: "ABC" }
                    ]               
                };
                var viewModel = new Y.Widgets.FriendView(options, $("#friend-list"));
                Y.GlobalKoModel.FriendView = viewModel;

                //Apply Knockout
                ko.applyBindings(Y.GlobalKoModel);
        }(jQuery, ko, YesGlobal));
    </script>
{% endblock %}
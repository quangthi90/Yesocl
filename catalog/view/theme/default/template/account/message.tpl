{% extends '@template/default/template/layout/basic/master.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %}
    <link rel="stylesheet" href="{{ asset_css('pages/message.css') }}" />
    <link rel="stylesheet" href="{{ asset_css('library/bootstrap-controls/bootstrap-select2.css') }}" />
{% endblock %}
{% block body %}
    <div class="innerAll">
		<div data-bind="with: MesageView" id="widget-messages" class="widget widget-messages widget-heading-simple widget-body-white">
            <div id="widget-message-container" class="widget-body padding-none margin-none widget-message-container">
                <div id="message-rooms" class="border-top border-left message-rooms">
                    <div class="message-rooms-container">
                        <div class="innerAll">
                            <input type="text" class="form-control border-none large-text strong" placeholder="{% trans %}Search rooms ...{% endtrans %}" />
                        </div>
                        <div class="bg-gray text-center strong border-top border-bottom innerAll half">
                            <span data-bind="text: totalRoom() + ( totalRoom() > 1 ? ' {% trans %}rooms{% endtrans %}' : ' {% trans %}room{% endtrans %}')"></span>
                        </div>
                        <ul class="list-unstyled room-list" data-bind="foreach: { data: $data.roomList, afterRender: addMoreEvents }">
                            <li class="border-bottom cursor-pointer room-item" data-bind="click: $parent.clickRoomItem, css: { 'active' : $data.id == ($parent.activeRoom() != null ? $parent.activeRoom().id : 0) }">
                                <div class="media innerAll">
                                    <div class="media-object pull-left hidden-phone">
                                        <a data-bind="link: { title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }" >
                                            <img data-bind="attr: {src: $data.user.avatar}" width="35px" alt="Image" />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div><span class="strong text-small" data-bind="text: $data.name"></span> <small class="text-italic pull-right label label-default" data-bind="timeAgo: $data.lastMessage().created"></small></div>
                                        <div class="text-small truncated-text" data-bind="text: $data.lastMessage().content"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="message-thread" class="border-top border-left border-right message-thread">
                    <div data-bind="with: activeRoom" class="active-room-container">
                        <div class="bg-gray innerAll" class="room-info-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="innerT half margin-none truncated-text display-block text-capitalize" data-bind="text: $data.name"></h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="pull-right">
                                        <a href="#type" class="btn btn-default bg-white btn-sm" data-bind="click: $parent.toggleNewMessage"><i class="fa fa-pencil"></i> <span class="hidden-xs">{% trans %}New Message{% endtrans %}</span></a> 
                                    </div>
                                </div>
                            </div>
                        </div>                 
                        <div class="border-top padding-none margin-none message-list js-message-list" data-bind="foreach: messageList">
                            <!--  Message -->
                            <div class="media margin-none innerAll border-bottom message-item" data-bind="css: { 'sending': $data.status() === 1, 'sent': $data.status() === 2, 'seen': $data.status() === 3 , 'error': $data.status() === 4 }">
                                <a data-bind="link: { title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }" class="pull-left hidden-xs message-creator">
                                    <img data-bind="attr: {src: $data.user.avatar}" width="35" class="media-object">
                                </a>
                                <div class="media-body">
                                    <div class="message-body">
                                        <div class="pull-left">
                                            <a class="strong text-inverse text-small" data-bind="link: { text: $data.user.username, title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }"></a>
                                        </div>
                                        <div class="pull-right">
                                            <span class="text-right text-muted text-small" data-bind="timeAgo: $data.created"></span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="message-content" data-bind="text: $data.content"></div>
                                </div>
                            </div>
                        </div> 
                        <div class="new-messsage-container" data-bind="with: $data.newMessage">
                            <div class="border-top border-bottom">
                                <textarea type="text" class="form-control rounded-none border-none no-resize" placeholder="{% trans %}Write your messages{% endtrans %}..." data-bind="value: content, valueUpdate:'afterkeydown', executeOnEnter: $parent.addMessage, shiftKeyRequired: true"></textarea>
                            </div>
                        </div>                          
                    </div>
                </div>                
            </div>
        </div>
    </div>
{% endblock %}
{% block library_javascript %}
{% endblock %}
{% block common_javascript %}
    <script src="{{ asset_js('models/message-models.js') }}"></script>
    <script src="{{ asset_js('pages/account/message.js') }}"></script>
{% endblock %}
{% block javascript %}
    <script type="text/javascript">
        (function($, ko,  Y, undefined) {
                Y.GlobalKoModel = Y.GlobalKoModel || {};
                var mesageOptions = {
                    apiUrls : {
                        loadRoomMessage: {
                            name: "ApiGetRooms"
                        }
                    }
                };
                var mesageView = new Y.Widgets.MessageView(mesageOptions, $("#widget-messages"));
                Y.GlobalKoModel.MesageView = mesageView;

                //Apply Knockout
                ko.applyBindings(Y.GlobalKoModel);
        }(jQuery, ko, YesGlobal));
    </script>
{% endblock %}
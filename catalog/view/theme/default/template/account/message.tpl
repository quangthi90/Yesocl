{% extends '@template/default/template/layout/basic/master.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %}
    <link rel="stylesheet" href="{{ asset_css('pages/message.css') }}" />
    <link rel="stylesheet" href="{{ asset_css('library/emoticons/emoticons.css') }}" />
    <link rel="stylesheet" href="{{ asset_css('library/select2/select2.css') }}" />
{% endblock %}
{% block body %}
    <div class="innerAll">
		<div data-bind="with: MesageView" id="widget-messages" class="widget widget-messages widget-heading-simple widget-body-white widget-message-page">
            <div id="widget-message-container" class="widget-body padding-none margin-none widget-message-container">
                <div id="message-rooms" class="border-top border-left message-rooms">
                    <div class="message-rooms-container">
                        <div class="innerAll">
                            <input data-bind="value: $data.roomQuery, valueUpdate: 'afterkeydown'" type="text" class="form-control border-none large-text strong" placeholder="{% trans %}Search rooms ...{% endtrans %}" />
                        </div>
                        <div class="bg-gray text-center strong border-top border-bottom innerAll half">
                            <span data-bind="text: totalRoom() + ( totalRoom() > 1 ? ' {% trans %}rooms{% endtrans %}' : ' {% trans %}room{% endtrans %}')"></span>
                        </div>
                        <ul class="list-unstyled room-list" data-bind="foreach: { data: $data.roomList, afterRender: addMsgScrollHandlers}">
                            <li class="border-bottom cursor-pointer room-item" data-bind="click: $parent.clickRoomItem, css: { 'active' : $data.id == ($parent.activeRoom() != null ? $parent.activeRoom().id : 0), 'hidden' : !$data.visible() }">
                                <div class="media innerAll">
                                    <div class="media-object pull-left hidden-phone">
                                        <a data-bind="link: { title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }" >
                                            <img data-bind="attr: {src: $data.user.avatar}" width="35px" alt="Image" />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div><span class="strong text-small" data-bind="text: $data.name"></span> <small class="text-italic pull-right label label-default" data-bind="timeAgo: $data.lastMessage().created"></small></div>
                                        <div class="text-small truncated-text" data-bind="html: $data.lastMessageContent"></div>
                                    </div>
                                </div>
                            </li>                            
                        </ul>
                        <!-- ko if: $data.noRoomAvailable() -->
                        <div class="innerAll strong text-center text-small truncated-text">
                            {% trans %}No rooms available{% endtrans %}
                        </div>
                        <!-- /ko -->
                    </div>
                </div>
                <div id="message-thread" class="border-top border-left border-right message-thread">
                    <div data-bind="with: $data.activeRoom, css: { 'hide' : $data.activeRoom() == null || $data.isNewMessage() }" class="active-room-container">
                        <div class="bg-gray innerAll" class="room-info-container">
                            <div class="row">
                                <div class="col-xs-8">
                                    <h4 class="innerT half margin-none truncated-text display-block text-capitalize" data-bind="text: $data.name"></h4>
                                </div>
                                <div class="col-xs-4">
                                    <div class="pull-right">
                                        <a class="btn btn-default bg-white btn-sm" data-bind="click: $parent.toggleNewMessage"><i class="fa fa-pencil"></i> <span class="hidden-xs">{% trans %}New Message{% endtrans %}</span></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center innerAll half bg-primary message-loading hide" data-bind="css: { 'hide': !$data.isLoadingMore() }">
                            <i class="fa fa-spin fa-refresh"></i> {% trans %}Loading more messages {% endtrans %} ...
                        </div>
                        <div class="border-top padding-none margin-none message-list js-message-list" data-bind="foreach: { data: $data.messageList, afterRender: $parent.addMsgScrollHandlers }">
                            <!--  Message -->
                            <div class="media margin-none innerAll border-bottom message-item" data-bind="css: { 'fadeIn': $data.status() > 0, 'msg-sending': $data.status() === 1, 'msg-sent': $data.status() === 2, 'msg-seen': $data.status() === 3 , 'msg-error': $data.status() === 4 }">
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
                                            <span>&nbsp;</span>
                                            <span class="text-right text-muted text-small">
                                                <!-- ko if: $data.status() === 1 -->
                                                <i class="fa fa-spin fa-refresh"></i> Sending
                                                <!-- /ko -->
                                                <!-- ko if: $data.status() === 2 -->
                                                <i class="fa fa-check"></i> Sent
                                                <!-- /ko -->
                                                <!-- ko if: $data.status() === 3 -->
                                                <i class="fa fa-check-circle"></i> Seen
                                                <!-- /ko -->
                                                <!-- ko if: $data.status() === 4 -->
                                                <i class="fa fa-warning"></i> Error
                                                <!-- /ko -->
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="message-content" data-bind="html: $data.contentDisplay"></div>
                                </div>
                            </div>
                        </div>
                        <div class="new-messsage-container" data-bind="with: $data.newMessage, emoticon: true">
                            <div class="border-top border-bottom">
                                <textarea type="text" class="form-control rounded-none border-none no-resize" placeholder="{% trans %}Write new message{% endtrans %}..." data-bind="mention: content, autoSize: content, valueUpdate:'afterkeydown', executeOnEnter: $parent.addMessage, shiftKeyRequired: true"></textarea>
                            </div>
                            <div class="btn-toolbar" role="toolbar">
                                <div class="btn-group btn-group-sm pull-right">                                    
                                    <a class="btn btn-nobg" title="Add a image"><i class="fa fa-picture-o"></i></a>
                                    <a class="btn btn-nobg emotion-show" title="Add a icon"><i class="fa fa-meh-o"></i></a>
                                </div>
                            </div>                      
                        </div>                          
                    </div>                    
                    <!-- ko ifnot: $data.activeRoom() != null && !$data.isNewMessage() -->
                    <div class="active-room-container">
                        <div class="bg-gray innerAll" class="room-info-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="innerT half margin-none text-capitalize">New message</h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="pull-right">
                                        <a class="btn btn-default bg-white btn-sm" data-bind="click: toggleNewMessage"><i class="fa fa-list"></i> <span class="hidden-xs">{% trans %}Message list{% endtrans %}</span></a> 
                                    </div>
                                </div>
                            </div>
                        </div>   
                        <div class="new-message-info inner-2x innerAll">
                            <input data-bind="autoCompleteTag: toTags, autoOptions: { dataRequest: $data.userDataRequest, formatResult: $data.formatResult }" type="text" id="msg-to" class="form-control" placeholder="Find user(s) to send ...">
                        </div>                     
                        <div class="new-messsage-container" data-bind="with: $data.globalNewMessage, emoticon: true">
                            <div class="border-top border-bottom">
                                <textarea type="text" class="form-control rounded-none border-none no-resize" placeholder="{% trans %}Write new message{% endtrans %}..." data-bind="mention: content, autoSize: content, valueUpdate:'afterkeydown', executeOnEnter: $parent.addGlobalMessage, shiftKeyRequired: true"></textarea>
                            </div>
                            <div class="btn-toolbar" role="toolbar">
                                <div class="btn-group btn-group-sm pull-right">                                    
                                    <a class="btn btn-nobg" title="Add a image"><i class="fa fa-picture-o"></i></a>
                                    <a class="btn btn-nobg emotion-show" title="Add a icon"><i class="fa fa-meh-o"></i></a>
                                </div>
                            </div>                      
                        </div>                          
                    </div>
                    <!-- /ko -->
                </div>
            </div>
        </div>
    </div>
{% endblock %}
{% block library_javascript %}
    <script src="{{ asset_js('library/emoticons/emoticons.js') }}"></script>
    <script src="{{ asset_js('library/select/select2.min.js') }}"></script>
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
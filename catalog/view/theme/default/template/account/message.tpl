{% extends '@template/default/template/layout/basic/master.tpl' %}
{% use '@template/default/template/common/dialogs.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %}
    <link rel="stylesheet" href="{{ asset_css('pages/message.css') }}" />
    <link rel="stylesheet" href="{{ asset_css('library/emoticons/emoticons.css') }}" />
    <link rel="stylesheet" href="{{ asset_css('library/select2/select2.css') }}" />
{% endblock %}
{% block common_html %}
    <div data-bind="with: MesageView.roomMemberManager">
        {{ block('modal_msg_members') }}
    </div>    
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
                        <ul class="list-unstyled room-list" data-bind="foreach: { data: $data.roomList, afterRender: addMsgScrollHandlers }, niceScroll: $parent.addMsgScrollHandlers">
                            <li class="border-bottom cursor-pointer room-item" data-bind="click: $parent.clickRoomItem, css: { 'active bg-primary' : $data.id == ($parent.activeRoom() != null ? $parent.activeRoom().id : 0), 'hidden' : !$data.visible() }">
                                <div class="media innerAll">
                                    <div class="media-object pull-left hidden-phone">
                                        <a data-bind="link: { title: $data.lastUser().username, route: 'WallPage', params: { user_slug: $data.lastUser().slug } }" >
                                            <img data-bind="attr: {src: $data.lastUser().avatar}" width="35px" alt="Image" />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <span class="strong text-small truncated-text display-block room-name" data-bind="text: $data.name"></span> 
                                            <small class="text-italic pull-right label label-default room-time" data-bind="dateTimeText: $data.lastMessage().created"></small>
                                            <!-- ko if: $data.unread() > 0 -->
                                            <span class="badge badge-success room-notification" data-bind=", text: $data.unread, notify: $data.unread"></span>
                                            <!-- /ko -->
                                        </div>
                                        <div class="text-small truncated-text room-last-content" data-bind="html: $data.lastMessageContent"></div>
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
                                    <!-- ko ifnot: isRoomEditing() -->
                                    <h4 class="innerT half margin-none truncated-text display-block text-capitalize" data-bind="text: $data.name"></h4>
                                    <!-- /ko -->
                                    <!-- ko if: isRoomEditing() -->
                                    <input class="form-control input-sm" type="text" data-bind="valueUpdate:'afterkeydown', value: $data.name, hasFocus: hasFocusEditingRoom(), executeOnEnter: $data.editRoomName, executeOnEscape: $data.offEditRoom, shiftKeyRequired: true" placeholder="{% trans %}Room name{% endtrans %}..."/>
                                    <!-- /ko -->
                                </div>
                                <div class="col-xs-4">
                                    <div class="pull-right">
                                        <a class="btn btn-default bg-white btn-sm" data-bind="click: $parent.toggleNewMessage"><i class="fa fa-pencil"></i> <span class="hidden-xs">{% trans %}New Message{% endtrans %}</span></a>
                                    </div>
                                    <div class="btn-group btn-group-sm pull-right">
                                        <button data-toggle="dropdown" class="btn btn-default bg-white dropdown-toggle" type="button">
                                            <i class="fa fa-cog"></i>
                                            <span class="hidden-xs">{% trans %}Actions{% endtrans %}</span>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li data-bind="visible: isCreator"><a data-bind="click: toggleEditRoom">{% trans %}Edit room name{% endtrans %}</a></li>
                                            <li><a data-bind="click: $parent.openMembers">{% trans %}Members{% endtrans %}</a></li>
                                            <li><a>{% trans %}Leave room{% endtrans %}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center innerAll half bg-primary message-loading hide" data-bind="css: { 'hide': !$data.isLoadingMore() }">
                            <i class="fa fa-spin fa-refresh"></i> {% trans %}Loading more messages {% endtrans %} ...
                        </div>
                        <div class="border-top padding-none margin-none message-list js-message-list" data-bind="foreach: { data: $data.messageList, afterRender: $parent.addMsgScrollHandlers }, niceScroll: $parent.addMsgScrollHandlers">
                            <div class="media margin-none innerAll border-bottom message-item" data-bind="css: { 'fadeIn': $data.status() > 0, 'msg-seen': $data.status() === 3 , 'msg-error': $data.status() === 4 }">
                                <a data-bind="link: { title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }" class="pull-left hidden-xs message-creator">
                                    <img data-bind="attr: {src: $data.user.avatar}" width="35" class="media-object">
                                </a>
                                <div class="media-body">
                                    <div class="message-body">
                                        <div class="pull-left">
                                            <a class="strong text-inverse text-small" data-bind="link: { text: $data.user.username, title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }"></a>
                                        </div>
                                        <div class="pull-right">
                                            <span class="text-right text-muted text-small" data-bind="dateTimeText: $data.created"></span>
                                            <span>&nbsp;</span>
                                            <span class="text-right text-muted text-small">
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
                                    <div class="message-content wraptext" data-bind="html: $data.contentDisplay, seeMore: true"></div>
                                </div>
                            </div>
                        </div>
                        <div class="new-messsage-container" data-bind="with: $data.newMessage, emoticon: true">
                            <div class="border-top border-bottom">
                                <textarea style="min-height: 68px;" type="text" class="form-control rounded-none border-none no-resize" placeholder="{% trans %}Write new message{% endtrans %}..." data-bind="mention: content, valueUpdate:'afterkeydown', executeOnEnter: $parent.addMessage, shiftKeyRequired: true"></textarea>
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
                        <div class="bg-primary hidden" style="opacity: 0.4;z-index: 999;position:absolute;width: 100%; height: 100%;background-color: #F0F0F0;" data-bind="css: { 'hidden': !$data.isProcessNewMessage() }">
                            <p style="text-align: center;padding-top: 20%;font-weight: bold;"><i class="fa fa-spin fa-refresh"></i> {% trans %}Sending{% endtrans %} ...</p>
                        </div>
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
                        <div class="inner-2x innerAll border-top new-message-info">
                            <input data-bind="autoCompleteTag: toUserIds, autoOptions: { dataRequest: $data.userDataRequest, formatResult: $data.formatResult }" type="text" id="msg-to" class="form-control" placeholder="Find user(s) to send ...">
                        </div>                     
                        <div class="new-messsage-container" data-bind="with: $data.globalNewMessage, emoticon: true">
                            <div class="border-top border-bottom">
                                <textarea style="min-height: 68px;" type="text" class="form-control rounded-none border-none no-resize" placeholder="{% trans %}Write new message{% endtrans %}..." data-bind="valueUpdate:'afterkeydown', mention: content, executeOnEnter: $parent.addGlobalMessage, shiftKeyRequired: true"></textarea>
                            </div>
                            <div class="btn-toolbar" role="toolbar">
                                <div class="btn-group btn-group-sm pull-right">                                    
                                    <a class="btn btn-nobg hidden" title="Add a image"><i class="fa fa-picture-o"></i></a>
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
                    },
                    eventType: '{{ event_type["new-message"] }}'
                };
                var mesageView = new Y.Widgets.MessageView(mesageOptions, $("#widget-messages"));
                Y.GlobalKoModel.MesageView = mesageView;

                //Apply Knockout
                ko.applyBindings(Y.GlobalKoModel);
        }(jQuery, ko, YesGlobal));
    </script>
{% endblock %}
{% extends '@template/default/template/layout/basic/master.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block stylesheet %}
    <link rel="stylesheet" href="{{ asset_css('library/bootstrap-controls/bootstrap-select2.css') }}" />
{% endblock %}
{% block body %}
    <div class="innerAll">
		<div data-bind="with: MesageView" id="widget-messages" class="widget widget-messages widget-heading-simple widget-body-white">
            <div class="widget-body padding-none margin-none">
                <div class="row row-merge borders">
                    <div class="col-md-9 detailsWrapper">
                        <!-- ko if: $data.activeRoom() == null -->
                        <div class="alert alert-info" role="alert">{% trans %}No active room(s) available{% endtrans %}</div>
                        <!-- /ko -->
                        <div data-bind="with: activeRoom">
                            <!-- User -->
                            <div class="bg-gray innerAll">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4 class="innerT half margin-none truncated-text display-block text-uppercase" data-bind="text: $data.name"></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="pull-right">
                                            <a href="#type" class="btn btn-default bg-white btn-sm" data-toggle="collapse" data-bind="click: $parent.clickNewMessage"><i class="fa fa-pencil"></i> {% trans %}New Message{% endtrans %}</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>                 
                            <div class="border-top padding-none margin-none" data-bind="foreach: messageList">
                                <!--  Message -->
                                <div class="media margin-none innerAll">
                                    <a data-bind="link: { title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }" class="pull-left hidden-xs">
                                        <img data-bind="attr: {src: $data.user.avatar}" width="60" class="media-object">
                                    </a>
                                    <div class="media-body innerTB">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="innerT half">
                                                    <div class="media">
                                                        <div class="pull-left">
                                                            <a class="strong text-inverse" data-bind="link: { text: $data.user.username, title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }"></a>
                                                            <span class="innerR text-muted visible-xs" data-bind="timeAgo: $data.created"></span>
                                                        </div>
                                                        <div class="media-body" data-bind="text: $data.content"></div>
                                                    </div>
                                                </div>  
                                            </div>
                                            <div class="col-sm-6 hidden-xs">
                                                <i class="icon-time-clock pull-right text-muted innerT half fa fa-2x"></i>
                                                <span class="pull-right innerR innerT text-right  text-muted" data-bind="timeAgo: $data.created"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div> 
                        <div class="innerAll">
                            <div class="border-top">
                                <input id="js-mess-to" type="text" class="form-control rounded-none border-none" placeholder="{% trans %}To{% endtrans %}..." data-bind="visible: isNewMessage(), value: $data.messageTo"/>
                            </div>
                            <div class="border-top border-bottom">
                                <textarea id="js-mess-content" type="text" class="form-control rounded-none border-none" placeholder="{% trans %}Write your messages{% endtrans %}..." data-bind="value: $data.messageContent"></textarea>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-default" data-bind="click: clickSendMessage">{% trans %}Send{% endtrans %}</a>
                            </div>
                        </div>                       
                    </div>
                    <div class="col-md-3 listWrapper">
                        <div class="innerAll">
                            <input type="text" class="form-control border-none large-text strong" placeholder="{% trans %}Search rooms ...{% endtrans %}" />
                        </div>
                        <div class="bg-gray text-center strong border-top innerAll half">
                            <span data-bind="text: totalRoom() + ( totalRoom() > 1 ? ' {% trans %}rooms{% endtrans %}' : ' {% trans %}room{% endtrans %}')"></span>
                        </div>
                        <ul class="list-unstyled" id="js-list-message" data-bind="foreach: { data: $data.roomList, afterRender: addMoreEvents }">
                            <li class="border-bottom" data-bind="click: $parent.clickRoomItem, css: { 'active' : $data.id == ($parent.activeRoom() != null ? $parent.activeRoom().id : 0) }">
                                <div class="media innerAll">
                                    <div class="media-object pull-left hidden-phone">
                                        <a data-bind="link: { title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }" >
                                            <img data-bind="attr: {src: $data.user.avatar}" height="40px" width="40px" alt="Image" />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div><span class="strong" data-bind="text: $data.name"></span> <small class="text-italic pull-right label label-default" data-bind="timeAgo: $data.lastMessage().created"></small></div>
                                        <div data-bind="text: $data.lastMessage().content"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
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
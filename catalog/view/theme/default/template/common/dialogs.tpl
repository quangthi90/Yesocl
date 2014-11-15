{% block modal_msg_members %}
    <div id="modal-msg-members" class="modal" data-backdrop="static" aria-hidden="false">    
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h3 class="modal-title" style="color: #FFF;">{% trans %}Room members{% endtrans %} </h3>
                </div>
                <div class="modal-body bg-gray">                    
                    <div class="widget widget-tabs widget-tabs-responsive widget-tabs-sm">    
                        <div class="widget-head">
                            <ul>
                                <li class="active"><a data-toggle="tab" href="#tab-1" class="glyphicons group"><i></i>Members</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2" class="glyphicons user_add"><i></i>Add member(s)</a></li>
                            </ul>
                        </div>                        
                        <div class="widget-body">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="innerAll half">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" class="form-control input-sm" placeholder="{% trans %}Search member{% endtrans %} ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="innerAll half nice-scroll">
                                        <ul class="list-unstyled clearfix user-list" data-bind="foreach: members">
                                            <li class="box-shadow-light pull-left bg-white user-item">
                                                <div class="media innerAll">
                                                    <div class="media-object pull-left">
                                                        <a data-bind="link: { title: $data.username, route: 'WallPage', params: { user_slug: $data.slug } }" >
                                                            <img data-bind="attr: {src: $data.avatar}" width="35px" alt="Image" />
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a data-bind="link: { title: $data.username, text: $data.username, route: 'WallPage', params: { user_slug: $data.slug } }" class="strong text-small truncated-text display-block"></a>
                                                        <div class="text-small truncated-text" data-bind="text: $data.current">working on fly</div>
                                                    </div>
                                                    <a data-bind="click: $parent.removeMember, visible: $data.id != $parent.currentUserId" class="btn btn-default btn-sm border-none remove"><i class="fa fa-trash-o"></i></a>
                                                </div>
                                            </li>
                                        </ul>                        
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="innerAll half">
                                        <!--ko if: numberOfAddedMember() == 1 -->
                                        <div class="bg-success innerAll half bottom10">
                                            {% trans %}<strong>1</strong> user has been added to room !{% endtrans %}
                                        </div>
                                        <!-- /ko -->
                                        <!--ko if: numberOfAddedMember() > 1 -->
                                        <div class="bg-success innerAll half bottom10">
                                            {% trans %}<strong data-bind="text: numberOfAddedMember"></strong> user has been added to room !{% endtrans %}
                                        </div>
                                        <!-- /ko -->
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input data-bind="autoCompleteTag: addedUserIds, autoOptions: { dataRequest: $data.userDataRequest, formatResult: $data.formatResult }" type="text" id="more-member-input" class="form-control input-sm" placeholder="Find user(s) to add ...">
                                            </div>
                                        </div>
                                        <div style="height: 20px;"></div>
                                        <div class="row">
                                            <div class="col-xs-12 text-center">
                                                <button data-bind="enable: canAddMore, click: addMember" class="btn btn-primary btn-sm" title="{% trans %}Add to room{% endtrans %}"><i class="fa fa-plus"></i> Add to room</button>
                                                <button data-bind="click: clearTags, enable: canAddMore" class="btn btn-default btn-sm" title="{% trans %}Clear{% endtrans %}"><i class="fa fa-trash-o"></i> Clear</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
{% endblock %}
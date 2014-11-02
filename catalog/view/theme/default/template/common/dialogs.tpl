{% block modal_msg_members %}
    <div id="modal-msg-members" class="modal" data-backdrop="static" aria-hidden="false">    
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h3 class="modal-title">{% trans %}Room members{% endtrans %} </h3>
                </div>
                <div class="modal-body bg-gray">
                    <div class="innerAll half">
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="text" class="form-control input-sm" placeholder="{% trans %}Search member{% endtrans %} ...">
                            </div>
                            <div class="col-xs-6">                                
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm" placeholder="{% trans %}Find people{% endtrans %} ..." />
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" title="{% trans %}Add more{% endtrans %}"><i class="fa fa-plus"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="innerAll half nice-scroll" style="max-height: 500px;">
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
                                    <a class="btn btn-default btn-sm border-none remove"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </li>
                        </ul>                        
                    </div>
                </div>
            </div>
        </div>        
    </div>
{% endblock %}
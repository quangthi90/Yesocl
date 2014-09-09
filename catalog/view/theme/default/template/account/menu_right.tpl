		{% block menu_right_stylesheet %}
		{% endblock %}
		{% block menu_right %}
	        <div id="menu-right">
	            <div>
	                <button class="btn btn-inverse btn-xs btn-close" data-toggle="sidr-close" data-menu="menu-right"><i class="fa fa-times"></i></button>
	                <div class="tab-content">
	                    <div class="tab-pane" id="chat-conversation">
	                        <ul>
	                            <li>
	                                <div class="innerAll"><button class="btn btn-primary" data-toggle="tab" data-target="#chat-list"><i class="fa fa-fw fa-user"></i> friends</button></div>
	                            </li>
	                            <li class="conversation innerAll">
	                                <!-- Media item -->
	                                <div class="media">
	                                    <small class="author"><a href="#" title="" class="strong">Jane Doe</a></small>
	                                    <div class="media-object pull-left"><img src="{{ asset_css('platform/images/people/50/1.jpg') }}" alt="Image" class="img-circle" /></div>
	                                    <div class="media-body">
	                                        <blockquote>
	                                            <small class="date"><cite>just now</cite></small>
	                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, sit?</p>
	                                        </blockquote>
	                                    </div>
	                                </div>
	                                <!-- // Media item END -->
	                                <!-- Media item -->
	                                <div class="media primary right">
	                                    <small class="author"><a href="#" title="" class="strong">John Doe</a></small>
	                                    <div class="media-object pull-right"><img src="{{ asset_css('platform/images/people/50/2.jpg') }}" alt="Image" class="img-circle" /></div>
	                                    <div class="media-body">
	                                        <blockquote class="pull-right">
	                                            <small class="date"><cite>15 seconds ago</cite></small>
	                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, molestiae!</p>
	                                        </blockquote>
	                                    </div>
	                                </div>
	                                <!-- // Media item END -->
	                                <!-- Media item -->
	                                <div class="media">
	                                    <small class="author"><a href="#" title="" class="strong">Ricky</a></small>
	                                    <div class="media-object pull-left"><img src="{{ asset_css('platform/images/people/50/1.jpg') }}" alt="Image" class="img-circle" /></div>
	                                    <div class="media-body">
	                                        <blockquote>
	                                            <small class="date"><cite>5 minutes ago</cite></small>
	                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, distinctio!</p>
	                                        </blockquote>
	                                    </div>
	                                </div>
	                                <!-- // Media item END -->
	                            </li>
	                        </ul>
	                    </div>
	                    <div class="tab-pane active" id="chat-list">
	                        <div class="mixitup" id="mixitup-chat" data-show-default="mixit-chat-1" data-layout-mode="list" data-target-selector=".mix" data-filter-selector=".filter-chat">
	                            <ul>
	                                <li class="category">Groups</li>
	                                <li class="reset">
	                                    <div class="innerLR">
	                                        <ul>
	                                            <li class="filter-chat" data-filter="mixit-chat-1"><a href="" class="no-ajaxify"><span class="fa fa-fw fa-circle-o text-success"></span> Work Related</a></li>
	                                            <li class="filter-chat" data-filter="mixit-chat-2"><a href="" class="no-ajaxify"><span class="fa fa-fw fa-circle-o text-primary"></span> Very Important</a></li>
	                                            <li class="filter-chat" data-filter="mixit-chat-3"><a href="" class="no-ajaxify"><span class="fa fa-fw fa-circle-o text-info"></span> Friends &amp; Family</a></li>
	                                        </ul>
	                                    </div>
	                                </li>
	                                <li class="category border-bottom">Online</li>
	                                <li>
	                                    <div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/1.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Perpetua Inger</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/2.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Zoticus Axel</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/3.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Yun Ragna</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/4.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Victor Tacitus</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/5.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Arden Catharine</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/6.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Mihovil Govinda</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/7.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Mariya Hadya</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/8.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Tahir Benedikt</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/9.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Olayinka Kristin</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/10.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Danko Nikodim</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/11.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Zoja Aileas</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/12.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Alphonsus Braidy</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/13.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Helene Liana</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/14.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Sebastian Niklas</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/15.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Elvire Maya</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
	                                        </div>
	                                    </div>
	                                    <div class=" mix media border-bottom innerAll margin-none">
	                                        <a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="{{ asset_css('platform/images/people/35/16.jpg') }}" class="img-circle" /></a>
	                                        <div class="media-body">
	                                            <a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
	                                                <i class="fa fa-comments"></i> 4
	                                            </a>
	                                            <h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Kerman Otakar</a></h5>
	                                            <small>Hey, the party is on tonight!</small>
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
		{% block menu_right_javascript %}
		{% endblock %}
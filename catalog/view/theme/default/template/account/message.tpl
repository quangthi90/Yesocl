{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}Messages - Yesocl - Social Network{% endblock %}

{% use '@template/default/template/common/html_block.tpl' %}

{% block stylesheet %}
<link href="{{ asset_css('message.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
{% set current_user = get_current_user() %}
<div id="y-content" class="message-page">
	<div id="y-main-content">
		<div class="feed-block">
            <div class="block-header">
                <a class="block-title fl" href="#">Messages</a>
                <a class="block-seemore fl" href="#"> 
                    <i class="icon-angle-right"></i>
                </a>
            </div>
            <div class="block-content message-box">
            	<div class="user-box">
            		<div class="user-box-menu" id="user-box-menu">
            			<a href="#">Inbox ({{ messages|length }})</a>
            			{#<a href="#">Other (10)</a>#}
            		</div>
            		<div class="user-box-search" id="user-box-search">
            			<input type="text" id="message-search" placeholder="Search ..." />
            		</div>
            		<div class="user-box-users">
            			<div class="user-box-scroll">
            				<ul>
            					{% for message in messages %}
                                    {% set user = users[message.object_id] %}
	            				<li class="user-message-li">
	            					<a href="#" class="user-message-link">
	            						<img src="{{ user.avatar }}" alt="{{ user.username }}">
	            						<span class="user-message-info">
	            							<strong class="user-name">{{ user.username }}</strong>
	            							<span class="message-overview">{{ message.content }}</span>
	            							<span class="message-time timeago" title="{{ date_format(message.created) }}"></span>
	            						</span>
	            					</a>          					
	            				</li>
	            				{% endfor %}
	            			</ul>
            			</div>
            		</div>
            	</div>
            	<div class="message-box-list">
                    {% if messages|length > 0 %}
                        {% set message = messages[0] %}
                        {% set user = users[message.object_id] %}
                    {% endif %}
            		<div class="mesasage-box-header">
            			<h3 class="message-box-name">
                        {% if user is defined %}
                            {{ user.username }}
                        {% endif %}
            			</h3>
            			<div class="message-box-tools dropdown">
            				<a class="btn btn-yes dropdown-toggle tool-item" data-toggle="dropdown">
                                <i class="icon-gear"></i>Action <i class="icon-caret-down"></i>
                           </a>
                           <a href="#" data-mfp-src="#new-message-form" class="btn btn-yes tool-item link-popup">
                           		<i class="icon-plus-sign"></i> New Message
                           	</a>
                           <ul class="dropdown-menu">
                                <li>
                                    <a href="#"><i class="icon-remove"></i> Remove</a>
                                </li>
                            </ul>       				
            			</div>
            			<div class="clear"></div>
            		</div>
            		<div class="mesasage-box-body">
            			<div class="mesasage-box-container">
            				<ul>
            					{% for message in curr_messages %}
                                    {% set user = users[object_id] %}
            					<li class="message-item">
            						<a href="#">
            							<img src="{{ user.avatar }}" alt="{{ user.username }}">
            						</a>
            						<div class="message-body">
            							<h6 class="sender-name">{{ user.username }}</h6>
            							<span class="sender-time"><i class="icon-calendar"></i> {{ date_format(message.created) }}</span>
            							<div class="message-content">{{ message.content }}</div>
            						</div>
            						<div class="yes-dropdown">
			                            <div class="dropdown">
			                               <a class="dropdown-toggle" data-toggle="dropdown">
			                                    <i class="icon-caret-down"></i>
			                               </a>
			                               <ul class="dropdown-menu">
			                                    <li>
			                                        <a href="#"><i class="icon-remove"></i> Delete</a>
			                                    </li>
			                                </ul>
			                            </div>
			                        </div>
            					</li>
                                {% else %}
                                Not have new message
            					{% endfor %}         					
            				</ul>
            			</div>
            		</div>
          	  		<div class="mesasage-box-footer">
            			<textarea class="message-editor" placeholder="Write a message ..."></textarea>
            			<div class="new-message-footer">
            				<a href="" class="btn btn-yes btn-send btn-send-msg">Send</a>
            				<label class="enter-option">
            					<input type="checkbox" class="enter-check" checked="checked"> Press enter to send
            				</label>            				
            			</div>
            		</div>
            	</div>
            </div>
        </div>
	</div>
</div>
{{ block('common_html_block_new_message_form') }}
{% endblock %}

{% block javascript %}
<script type="text/javascript" src="{{ asset_js('message.js') }}"></script>
{% endblock %}
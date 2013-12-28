{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}Messages - Yesocl - Social Network{% endblock %}

{% use '@template/default/template/common/html_block.tpl' %}

{% block stylesheet %}
<link href="{{ asset_css('message.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
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
            			<a href="#">Inbox (10)</a>
            			<a href="#">Other (10)</a>
            		</div>
            		<div class="user-box-search" id="user-box-search">
            			<input type="text" id="message-search" placeholder="Search ..." />
            		</div>
            		<div class="user-box-users">
            			<div class="user-box-scroll">
            				<ul>
            					{% for i in 1..30 %}
	            				<li class="user-message-li">
	            					<a href="#" class="user-message-link">
	            						<img src="http://www.gravatar.com/avatar/c38e39c8422969437d01e758d120c9d8?s=180" alt="wmthiet">
	            						<span class="user-message-info">
	            							<strong class="user-name">WM Thiet</strong>
	            							<span class="message-overview">hello</span>
	            							<span class="message-time">9:11</span>
	            						</span>
	            					</a>          					
	            				</li>
	            				{% endfor %}
	            			</ul>
            			</div>
            		</div>
            	</div>
            	<div class="message-box-list">
            		<div class="mesasage-box-header">
            			<h3 class="message-box-name">
            				WM Thiet
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
            					{% for i in 1..30 %}
            					<li class="message-item">
            						<a href="#">
            							<img src="http://www.gravatar.com/avatar/c38e39c8422969437d01e758d120c9d8?s=180">
            						</a>
            						<div class="message-body">
            							<h6 class="sender-name">WMThiet</h6>
            							<span class="sender-time"><i class="icon-calendar"></i> 10:00 AM</span>
            							<div class="message-content">
            								Lipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            							</div>            							
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
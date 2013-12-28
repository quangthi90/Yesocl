{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}Messages - Yesocl - Social Network{% endblock %}

{% block stylesheet %}
<link href="{{ asset_css('message.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="message-page">
	<div id="y-main-content" class="has-horizontal" >
		<div class="feed-block">
            <div class="block-header">
                <a class="block-title fl" href="#">Messages</a>
                <a class="block-seemore fl" href="#"> 
                    <i class="icon-angle-right"></i>
                </a>
            </div>
            <div class="block-content message-box">
            	<div class="user-box">
            		<div class="user-box-menu">
            			<a href="#">Inbox (10)</a>
            			<a href="#">Other (10)</a>
            		</div>
            		<div class="user-box-search">
            			<input type="text" id="message-search" placeholder="" />
            		</div>
            		<div class="user-box-users">
            			<ul>
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
            				<li class="user-message-li">
            					<a href="#" class="user-message-link">
            						<img src="http://www.gravatar.com/avatar/c38e39c8422969437d01e758d120c9d8?s=180">
            						<span class="user-message-info">
            							<strong class="user-name">WM Thiet</strong>
            							<span class="message-overview">hello</span>
            							<span class="message-time">9:11</span>
            						</span>
            					</a>          					
            				</li>
            				<li class="user-message-li">
            					<a href="#" class="user-message-link">
            						<img src="http://www.gravatar.com/avatar/c38e39c8422969437d01e758d120c9d8?s=180">
            						<span class="user-message-info">
            							<strong class="user-name">WM Thiet</strong>
            							<span class="message-overview">hello</span>
            							<span class="message-time">9:11</span>
            						</span>
            					</a>          					
            				</li>
            			</ul>
            		</div>
            	</div>
            	<div class="message-box-list">
            		<div class="mesasage-box-header">
            			<h3 class="message-box-name">
            				WM Thiet
            			</h3>
            			<div class="message-box-tools">
            				<a href="#" class="btn btn-yes tool-item"><i class="icon-oke"></i> New Message</a>            				
        					<a href="#" class="btn btn-yes tool-item"><i class="icon-config"></i> Action</a>            				
            			</div>
            		</div>
            		<div class="mesasage-box-body">
            			<div class="mesasage-box-container">
            				<ul>
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
            					</li>
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
            					</li>
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
            					</li>
            				</ul>
            			</div>
            		</div>
          	  		<div class="mesasage-box-footer">
            			
            		</div>
            	</div>
            </div>
        </div>
	</div>
</div>
{% endblock %}

{% block javascript %}
{% endblock %}
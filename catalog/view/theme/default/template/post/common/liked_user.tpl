{% block post_common_post_liked_user_style %}
{% endblock %}

{% block post_common_liked_user %}
	<div style="display: none;" id="user-info-template"></div>
	{% raw %}
    <div class="hidden">
    	<div id="list-user-liked-template">
			<div class="user-item add-friend">
				<div class="user-item-info fl">
					<a href="${href_user}" class="user-item-avatar fl">
						<img src="${avatar}" alt="${username}" />
					</a>
					<div class="user-item-overview fl">
						<a href="${href_user}" class="user-item-name">${username}</a>
						<span><strong>${multi_number}</strong> friend(s)</span>
					</div>
				</div>
				<div class="user-actions fr friend-actions">
					{{if fr_status == 2}}
					<div class="dropdown friend-group">
						<a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Friend</a>
	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                            <a class="btn-unfriend" data-id="${id}" data-url="${fr_href}">Unfriend</a>
	                        </li>
	                    </ul>
	                </div>
					{{/if}}

					{{if fr_status == 3}}
					<div class="dropdown friend-group">
						<a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Sent Request</a>
	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                            <a class="btn-friend" href="#" data-id="${id}" data-url="${fr_href}" data-cancel="1">Cancel Request</a>
	                        </li>
	                    </ul>
	                </div>
					{{/if}}

					{{if fr_status == 4}}
					<button data-url="${fr_href}" data-id="${id}" class="btn btn-yes btn-friend friend-group" data-cancel="0">
						<i class="icon-plus-sign"></i> Make Friend
					</button>
					{{/if}}
				</div>
			</div>
		</div>
        <div id="send-request">
            <button data-cancel="0" data-id="${id}" data-url="${href}" class="btn btn-yes btn-friend friend-group"><i class="icon-plus-sign"></i> Make Friend</button>
        </div>
        <div id="cancel-request">
            <div class="dropdown friend-group">
                <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Sent Request</a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a data-cancel="1" class="btn-friend" data-id="${id}" href="#" data-url="${href}">Cancel Request</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	{% endraw %}
{% endblock %}

{% block post_common_liked_user_javascript %}

{% endblock %}
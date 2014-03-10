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
						<!--<span><strong>${multi_number}</strong> {% endraw %}{% trans %}friend{% endtrans %}{% raw %}(s)</span>-->
						<span class="js-current-status" title="${current}">${current}</span>
					</div>
				</div>
				<div class="user-actions fr friend-actions">
					{{if fr_status == 2}}
					<div class="dropdown friend-group">
						<a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% endraw %}{% trans %}Friend{% endtrans %}{% raw %}</a>
	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                            <a class="btn-unfriend" data-id="${id}" data-url="${fr_href}">{% endraw %}{% trans %}Unfriend{% endtrans %}{% raw %}</a>
	                        </li>
	                    </ul>
	                </div>
					{{/if}}

					{{if fr_status == 3}}
					<div class="dropdown friend-group">
						<a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% endraw %}{% trans %}Sent Request{% endtrans %}{% raw %}</a>
	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                            <a class="btn-friend" href="#" data-id="${id}" data-url="${fr_href}" data-cancel="1">{% endraw %}{% trans %}Cancel Request{% endtrans %}{% raw %}</a>
	                        </li>
	                    </ul>
	                </div>
					{{/if}}

					{{if fr_status == 4}}
					<button data-url="${fr_href}" data-id="${id}" class="btn btn-yes btn-friend friend-group" data-cancel="0">
						<i class="icon-plus-sign"></i> {% endraw %}{% trans %}Make Friend{% endtrans %}{% raw %}
					</button>
					{{/if}}

					<div class="dropdown friend-group">
						<a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-rss-sign"></i> {% endraw %}{% trans %}Following{% endtrans %}{% raw %}</a>
	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                            <a class="btn-unfollow">{% endraw %}{% trans %}Unfollow{% endtrans %}{% raw %}</a>
	                        </li>
	                    </ul>
	                </div>
	                <!-- OR -->
	                <button class="btn btn-yes btn-friend friend-group">
						<i class="icon-rss"></i> {% endraw %}{% trans %}Follow{% endtrans %}{% raw %}
					</button>
				</div>
			</div>
		</div>
        <div id="send-request">
            <button data-cancel="0" data-id="${id}" data-url="${href}" class="btn btn-yes btn-friend friend-group"><i class="icon-plus-sign"></i> {% endraw %}{% trans %}Make Friend{% endtrans %}{% raw %}</button>
        </div>
        <div id="cancel-request">
            <div class="dropdown friend-group">
                <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% endraw %}{% trans %}Sent Request{% endtrans %}{% raw %}</a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a data-cancel="1" class="btn-friend" data-id="${id}" href="#" data-url="${href}">{% endraw %}{% trans %}Cancel Request{% endtrans %}{% raw %}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	{% endraw %}
{% endblock %}

{% block post_common_liked_user_javascript %}

{% endblock %}
<div style="display: none;" id="user-info-template"></div>
{% raw %}
<div class="hidden">
	<div id="list-user-liked-template">
		<div class="user-item add-friend js-friend-info" data-user-id="${id}" data-user-slug="${slug}">
			<div class="user-item-info">
				<a href="${href_user}" class="user-item-avatar fl">
					<img src="${avatar}" alt="${username}" />
				</a>
				<div class="user-item-overview fl">
					<a href="${href_user}" class="user-item-name">${username}</a>
					<!--<span><strong>${multi_number}</strong> {% endraw %}{% trans %}friend{% endtrans %}{% raw %}(s)</span>-->
					<span class="js-current-status" title="${current}">${current}</span>
				</div>
			</div>
			<div class="user-actions friend-actions">
				{{if fr_status == 2}}
				<div class="dropdown friend-group">
					<a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% endraw %}{% trans %}Friend{% endtrans %}{% raw %}</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="js-unfriend-btn">{% endraw %}{% trans %}Unfriend{% endtrans %}{% raw %}</a>
                        </li>
                    </ul>
                </div>
				{{/if}}

				{{if fr_status == 3}}
				<div class="dropdown friend-group">
					<a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% endraw %}{% trans %}Sent Request{% endtrans %}{% raw %}</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="js-cancel-request-friend-btn" href="#">{% endraw %}{% trans %}Cancel Request{% endtrans %}{% raw %}</a>
                        </li>
                    </ul>
                </div>
				{{/if}}

				{{if fr_status == 4}}
				<button class="btn btn-yes friend-group js-makefriend-btn">
					<i class="icon-plus-sign"></i> {% endraw %}{% trans %}Make Friend{% endtrans %}{% raw %}
				</button>
				{{/if}}
				{{if fl_status == 2}}
				<div class="dropdown follow-group">
					<a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% endraw %}{% trans %}Following{% endtrans %}{% raw %}</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="btn-unfollow">{% endraw %}{% trans %}Unfollow{% endtrans %}{% raw %}</a>
                        </li>
                    </ul>
                </div>
                {{/if}}
                {{if fl_status == 3}}
                <button class="btn btn-yes btn-friend follow-group">
					<i class="icon-rss"></i> {% endraw %}{% trans %}Follow{% endtrans %}{% raw %}
				</button>
				{{/if}}
			</div>
		</div>
	</div>
	{% endraw %}
    <div id="send-request">
        <a class="btn btn-yes btn-friend friend-group js-makefriend-btn"><i class="icon-plus-sign"></i> {% trans %}Make Friend{% endtrans %}</a>
    </div>
    <div id="cancel-request">
        <div class="dropdown friend-group">
            <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Sent Request{% endtrans %}</a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a class="btn-friend js-cancel-request-friend-btn" href="#">{% trans %}Cancel Request{% endtrans %}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
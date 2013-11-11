{% block post_common_post_liked_user_style %}
{% endblock %}

{% block post_common_liked_user %}
	<div style="display: none;" id="user-info-template">
		{#<div class="user-item user-is-friend">
			<div class="user-item-info fl">
				<a href="#" class="user-item-avatar fl">
					<img src="http://community.nasdaq.com/common/images/defaultUserAvatar.jpg" alt="USER_NAME" />
				</a>
				<div class="user-item-overview fl">
					<a href="#" class="user-item-name">User A</a>
					<span><strong>100</strong> friend(s)</span>
				</div>
			</div>
			<div class="user-actions fr">
				<div class="dropdown friend-group">
                    <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Friend</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="btn-unfriend" data-url="{{ path('UnFriend', {user_slug: user.slug}) }}">Unfriend</a>
                        </li>
                    </ul>
                </div>
			</div>
		</div>
		<div class="user-item send-request">
			<div class="user-item-info fl">
				<a href="#" class="user-item-avatar fl">
					<img src="http://community.nasdaq.com/common/images/defaultUserAvatar.jpg" alt="USER_NAME" />
				</a>
				<div class="user-item-overview fl">
					<a href="#" class="user-item-name">User A</a>
					<span><strong>100</strong> friend(s)</span>
				</div>
			</div>
			<div class="user-actions fr">
				<div class="dropdown friend-group">
                    <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Sent Request</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="btn-friend" href="#" data-url="{{ path('MakeFriend', {user_slug: friend.slug}) }}" data-cancel="1">Cancel Request</a>
                        </li>
                    </ul>
                </div>
			</div>
		</div>#}
	</div>
	{% raw %}
	<div id="list-user-liked-template" class="hidden">
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
			<div class="user-actions fr">
				<button data-url="${href_makefriend}" 
					class="btn btn-yes btn-friend friend-group" data-cancel="0">
					<i class="icon-plus-sign"></i> Make Friend
				</button>
			</div>
		</div>
	</div>
	{% endraw %}
{% endblock %}

{% block post_common_liked_user_javascript %}

{% endblock %}
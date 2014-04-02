<div style="display: none;">
	<div id="user-viewer-container" class="user-viewer">
		<div id="list-user-liked-template" data-bind="foreach: popup_users()">
			<div class="user-item">
				<div class="user-item-info">
					<a class="user-item-avatar fl" data-bind="attr: {href: href}">
						<img data-bind="attr: {src: avatar, alt: username}" />
					</a>
					<div class="user-item-overview">
						<a class="user-item-name" data-bind="attr: {href: href}, text: username"></a>
						{#<!--<span><strong>${multi_number}</strong> {% trans %}friend{% endtrans %}(s)</span>-->#}
						<span class="js-current-status" data-bind="attr: {title: current}, text: current"></span>
					</div>
				</div>
				<div class="user-actions friend-actions">
					<!-- ko if: fr_status() == 2 -->
					<div class="dropdown friend-group">
						<a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Friend{% endtrans %}</a>
	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                            <a class="js-unfriend-btn">{% trans %}Unfriend{% endtrans %}</a>
	                        </li>
	                    </ul>
	                </div>
					<!-- /ko -->

					<!-- ko if: fr_status() == 3 -->
					<div class="dropdown friend-group">
						<a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Sent Request{% endtrans %}</a>
	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                            <a class="js-cancel-request-friend-btn" href="#">{% trans %}Cancel Request{% endtrans %}</a>
	                        </li>
	                    </ul>
	                </div>
					<!-- /ko -->

					<!-- ko if: fr_status() == 4 -->
					<button class="btn btn-yes friend-group js-makefriend-btn">
						<i class="icon-plus-sign"></i> {% trans %}Make Friend{% endtrans %}
					</button>
					<!-- /ko -->

					<!-- ko if: fl_status() == 2 -->
					<div class="dropdown follow-group">
						<a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Following{% endtrans %}</a>
	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                            <a class="btn-unfollow">{% trans %}Unfollow{% endtrans %}</a>
	                        </li>
	                    </ul>
	                </div>
	                <!-- /ko -->

	                <!-- ko if: fl_status() == 3 -->
	                <button class="btn btn-yes btn-friend follow-group">
						<i class="icon-rss"></i> {% trans %}Follow{% endtrans %}
					</button>
					<!-- /ko -->
				</div>
			</div>
		</div>
	</div>
</div>
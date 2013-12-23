// Show dropdown list for notification
(function($, document, undefined) {
	function Notification(el){
		this.root = el;
		this.notificationItem = el.find('.notification-item');
		this.allNotificationBtn = el.find('.btn-notification');
		this.allNotificationList = el.find('.notification-content-list');
		this.notInclude = $('#y-container, #y-sidebar,#y-footer');
		this.attachEvents();
	}
	Notification.prototype.attachEvents = function() {
		var that = this;
		that.notificationItem.each(function(){
			var me = $(this);
			var btnInvoke = $(this).children('.btn-notification');
			var listNotification = $(this).children('.notification-content-list');
			listNotification.makeCustomScroll(false);
			listNotification.css('opacity', '1').hide(10);
			btnInvoke.on('click', function(e){
				e.preventDefault();
				var hasActive = me.hasClass('active');
				that.allNotificationList.slideUp(10);
				that.notificationItem.removeClass('active');
				if(!hasActive){
					listNotification.slideDown(200, function(){
						me.addClass('active');
					});	
				}
			});
		});
		var notificationLink = that.notificationItem.find('.notification-content-item[data-link]');
		if(notificationLink.length > 0){
			notificationLink.each(function(){
				$(this).on('click', function(){
					that.notInclude.trigger('click');
					location.href= $(this).attr('data-link');
				});
			});
		}
		that.notInclude.on('click', function(){ 
			that.allNotificationList.slideUp(10);
			that.notificationItem.removeClass('active');
		});
	}

	$(document).ready(function() {
		if($('#user-notification').length > 0){
			new Notification($('#user-notification'));
		}
	});
}(jQuery, document));

// Notification request make friend
(function($, document, undefined) {
	function NotifyFriendBtn( $el ){
		this.$el			= $el;
		this.$accept_btn	= $el.find('.btn-accept');
		this.$ignore_btn	= $el.find('.btn-ignore');

		this.slug 			= $el.data('slug');

		this.attachEvents();
	}
	NotifyFriendBtn.prototype.attachEvents = function(){
		var that = this;

		this.$accept_btn.click(function(e) {
			e.preventDefault();
			
			if(that.$accept_btn.hasClass('disabled')) {
				return false;
			}

			that.url = yRouting.generate('ConfirmFriend', {user_slug: that.slug});
			
			that.submit( that.$accept_btn );

			return false;
		});

		this.$ignore_btn.click(function(e) {
			e.preventDefault();
			
			if(that.$ignore_btn.hasClass('disabled')) {
				return false;
			}

			that.url = yRouting.generate('IgnoreFriend', {user_slug: that.slug});
			
			that.submit( that.$ignore_btn );

			return false;
		});
	};	
	NotifyFriendBtn.prototype.submit = function($button){
		var that = this;

		var promise = $.ajax({
			type: 'POST',
			url: that.url,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) { 
			if(data.success == 'ok'){			
				var $group = that.$el.parents('.notification-item').find('.notification-item-count');
				
				var count_request = parseInt($group.data('count'), 10) - 1;
				
				$group.data('count', count_request);

				$group.html(count_request).addClass('hidden');
				
				that.$el.remove();
			}
		});	
	};
	NotifyFriendBtn.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-spinner icon-spin"></i>');
		var $old_icon = $el.find('i');
		var f        = function() {
			$spinner.remove();
			$el.html($old_icon);
		};

		$el.addClass('disabled').html($spinner);

		promise.then(f, f);
	};

	$(document).ready(function() {
		$('.notify-actions').each(function(){
			new NotifyFriendBtn( $(this) );
		});
	});
}(jQuery, document));

// Notification like, comment, tag
(function($, document, undefined) {
	function NotificationCommon( $el ){
		this.$el 				= $el;
		this.$see_notify_btn  	= $el.find('.js-btn-see-notify');

		this.slug 				= $el.data('slug');

		this.attachEvents();
	}
	NotificationCommon.prototype.attachEvents = function(){
		var that = this;

		this.$see_notify_btn.click(function(e) {
			e.preventDefault();
			
			if(that.$el.data('notification-count') == 0 || that.$see_notify_btn.hasClass('disabled')) {
				return false;
			}
			
			that.url = yRouting.generate('NotificationReadAll');
			
			that.submit( that.$see_notify_btn );

			return false;
		});
	};	
	NotificationCommon.prototype.submit = function($button){
		var that = this;

		var promise = $.ajax({
			type: 'POST',
			url: that.url,
			dataType: 'json'
		});

		// this.triggerProgress($button, promise);

		promise.then(function(data) { 
			if(data.success == 'ok'){			
				that.$el.find('.notification-item-count').addClass('hidden');
				// that.$el.find('.notification-content-list').addClass('hidden');
			}
		});	
	};
	NotificationCommon.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-spinner icon-spin"></i>');
		var $old_icon = $el.find('i');
		var f        = function() {
			$spinner.remove();
			$el.html($old_icon);
		};

		$el.addClass('disabled').html($spinner);

		promise.then(f, f);
	};

	$(document).ready(function() {
		$('.js-notification-common').each(function(){
			new NotificationCommon( $(this) );
		});
	});
}(jQuery, document));
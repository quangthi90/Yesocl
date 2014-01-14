// Show dropdown list for notification
(function($, document, undefined) {
	function Notification(el){
		this.root = el;
		this.notificationItem = el.find('.notification-item');
		this.allNotificationBtn = el.find('.btn-notification');
		this.allNotificationList = el.find('.notification-content-list');
		this.notInclude = $('#y-container, #y-sidebar,#y-footer, #toggle-user-menu');
		this.attachEvents();
	}
	Notification.prototype.attachEvents = function() {
		var that = this;
		that.notificationItem.each(function(){
			var me = $(this);
			var listNotification = me.children('.notification-content-list');
			if(!listNotification.hasClass('empty')){
				var notificationText = me.find('.notification-text');
				notificationText.each(function(){
					if($(this).height() > 32){
						$(this).truncate({
		                    width: 'auto',
		                    token: '&hellip;',
		                    side: 'right',
		                    multiline: true
		                });	
					}					
				});
				listNotification.makeCustomScroll(false);				
			}
			setTimeout(function(){
				listNotification.fadeOut(100, function(){
					$(this).css({'opacity': '1'});
				});
			}, 300);

			//Click on notification item to go to post:
			var notificationLink = me.find('.notification-content-item[data-link]');
			if(notificationLink.length > 0){
				notificationLink.on('click', function(){
					that.notInclude.trigger('click');
					location.href= $(this).attr('data-link');
				});
			}		
		});
		
		that.allNotificationBtn.on('click', function(e){
			e.preventDefault();
			that.allNotificationList.fadeOut(10);
			that.notificationItem.removeClass('active');
			var ni = $(this).parent('.notification-item');
			if(!ni.data('isShowing')) {
				ni.children('.notification-content-list').fadeIn(100);
				ni.addClass('active');
				ni.data('isShowing', true);
			}else {
				ni.data('isShowing', false);
			}
		});
		that.notInclude.on('click', function(){ 
			that.allNotificationList.fadeOut(10);
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

			that.url = window.yRouting.generate('ConfirmFriend', {user_slug: that.slug});
			
			that.submit( that.$accept_btn );

			return false;
		});

		this.$ignore_btn.click(function(e) {
			e.preventDefault();
			
			if(that.$ignore_btn.hasClass('disabled')) {
				return false;
			}

			that.url = window.yRouting.generate('IgnoreFriend', {user_slug: that.slug});
			
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
		this.url 				= window.yRouting.generate('NotificationReadAll');

		this.attachEvents();
	}
	NotificationCommon.prototype.attachEvents = function(){
		var that = this;

		this.$see_notify_btn.click(function(e) {
			e.preventDefault();
			
			if(that.$el.data('notification-count') == 0 || that.$see_notify_btn.hasClass('disabled')) {
				return false;
			}
			
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

// Notification new message
(function($, document, undefined) {
	function NotificationMessage( $el ){
		this.$el 				= $el;
		this.$messBtn  			= $el.find('.js-btn-noti-mess');
		this.$messList			= $el.find('.js-noti-mess-list');

		this.url 				= window.yRouting.generate('MessageGetLast');

		this.attachEvents();
	}
	NotificationMessage.prototype.attachEvents = function(){
		var that = this;

		this.$messBtn.click(function(e) {
			e.preventDefault();
			
			that.submit( that.$messBtn );

			return false;
		});
	};	
	NotificationMessage.prototype.submit = function($button){
		var that = this;

		that.$messList.html('');
		var messages = that.$el.data('messages');
		if ( typeof messages == 'undefined' ){
			messages = [];

			var promise = $.ajax({
				type: 'POST',
				url: that.url,
				dataType: 'json'
			});

			this.triggerProgress($button, promise);

			promise.then(function(data) { 
				if(data.success == 'ok'){
					that.$el.find('.notification-item-count').addClass('hidden').html(0);

					for ( var key in data.messages ){
						message = data.messages[key];
						var _class = ' ';
						
						if ( message.is_sender == true ){
							_class += 'sent-box';
						}else{
							_class += 'inbox';
						}

						if ( message.read == true ){
							_class += ' read';
						}else{
							_class += ' unread';
						}

						message['_class'] = _class;

						messages.push( message );
						that.$messList.prepend( $.tmpl($('#message-item-header'), message) );
					}

					that.$el.data('messages', messages);
					$('.timeago').timeago();
				}
			});
		}else{
			for ( var key in messages ){
				var message = messages[key];
				that.$messList.prepend( $.tmpl($('#message-item-header'), message) );
			}

			$('.timeago').timeago();
		}
	};
	NotificationMessage.prototype.triggerProgress = function($el, promise){
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
		$('.js-noti-mess').each(function(){
			new NotificationMessage( $(this) );
		});
	});
}(jQuery, document));
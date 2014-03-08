// Friend action button
(function($, document, undefined) {
	'use strict';

	function FriendAction( $el, removeUnFriend ){
		this.$el				= $el;
		this.$makeFriendBtn		= $el.find('.js-makefriend-btn');
		this.$unFriendBtn		= $el.find('.js-unfriend-btn');
		this.$cancelRequestBtn	= $el.find('.js-cancel-request-friend-btn');
		this.$makeFollowBtn		= $el.find('.js-makefollow-btn');
		this.$unFollowBtn		= $el.find('.js-unfollow-btn');
		
		this.userSlug			= $el.parents('.js-friend-info').data('user-slug');
		this.userId 			= $el.parents('.js-friend-info').data('user-id');

		this.isRemoveFriend = removeUnFriend;

		this.attachEvents();
	}

	FriendAction.prototype.attachEvents = function(){
		var that = this;

		this.$makeFriendBtn.click(function(e) {
			if( $(this).hasClass('disabled') ) {
				e.preventDefault();

				return false;
			}

			that.url = window.yRouting.generate('MakeFriend', {user_slug: that.userSlug});
			that.frStatus = 1;

			that.submitFriend($(this));

			return false;
		});

		this.$cancelRequestBtn.click( function (e) {
			if ( $(this).hasClass('disabled') ) {
				e.preventDefault();

				return false;
			}

			that.url = window.yRouting.generate('MakeFriend', {user_slug: that.userSlug});
			that.frStatus = 2;

			that.submitFriend($(this));

			return false;
		});

		this.$unFriendBtn.click( function (e) {
			if ( $(this).hasClass('disabled') ) {
				e.preventDefault();

				return false;
			}

			that.url = window.yRouting.generate('UnFriend', {user_slug: that.userSlug});
			that.frStatus = 3;

			that.submitFriend($(this));

			return false;
		});

		this.$makeFollowBtn.click( function (e) {
			if ( $(this).hasClass('disabled') ) {
				e.preventDefault();

				return false;
			}

			that.url = window.yRouting.generate('AddFollower', {user_slug: that.userSlug});
			that.isUnFollow = 0;

			that.submitFollow($(this));

			return false;
		});

		this.$unFollowBtn.click( function (e) {
			if ( $(this).hasClass('disabled') ) {
				e.preventDefault();

				return false;
			}

			that.url = window.yRouting.generate('RemoveFollower', {user_slug: that.userSlug});
			that.isUnFollow = 1;

			that.submitFollow($(this));

			return false;
		});
	};
		
	FriendAction.prototype.submitFriend = function($button){
		var that = this;

		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) {
			if(data.success == 'ok'){
				var $htmlOutput = '',
					status = 1,
					user = window.yUsers.getItem(that.userId);

				if ( that.frStatus === 1 ){
					$htmlOutput = $.tmpl( $('#cancel-request') );
					status = 3;
				}else if ( that.frStatus === 2 ){
					$htmlOutput = $.tmpl( $('#send-request') );
					status = 4;
				}else{
					// Remove friend
					if ( that.isRemoveFriend === true ){
						that.$el.parents('.js-friend-info').remove();
						return false;

					// Change status to not relationship
					// And show button make friend
					}else{
						$htmlOutput = $.tmpl( $('#send-request') );
						status = 4;
					}
				}

				// Update user status
				if ( user !== undefined ){
					user.fr_status = status;
					window.yUsers.setItem( that.userId, user );
				}
				
				that.$el.find('.friend-group').remove();
				that.$el.prepend( $htmlOutput );
				new FriendAction( that.$el );
			}

		});
	};

	FriendAction.prototype.submitFollow = function($button){
		var that = this;

		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) {
			if(data.success == 'ok'){
				var $htmlOutput = '',
					fl_status = 1,
					user = window.yUsers.getItem(that.userId);

				if ( that.isUnFollow === 0 ){
					$htmlOutput = $.tmpl( $('#unfollow') );
					fl_status = 2;
				}else{
					$htmlOutput = $.tmpl( $('#send-follow') );
					fl_status = 3;
				}

				if ( user !== undefined ){
					user.fl_status = fl_status;
					window.yUsers.setItem(that.userId, user);
				}
				
				that.$el.find('.follow-group').remove();
				that.$el.append( $htmlOutput );
				new FriendAction( that.$el );
			}

		});
	};

	FriendAction.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-spinner icon-spin"></i>');
		var $old_icon = $el.find('i');
		var f        = function() {
			$spinner.remove();
			$el.prepend($old_icon);
		};

		$old_icon.remove();
		$el.addClass('disabled').prepend($spinner);

		promise.then(f, f);
	};

	$(function(){
        $(document).bind('FRIEND_ACTION', function(e, remove) {
            $('.friend-actions').each(function(){
                new FriendAction($(this), remove);
            });
        });
    });
}(jQuery, document));

// Filter friend
(function($, document, undefined) {
	'use strict';
	function UserFilter( $el ){
		this.$el = $el;
		this.$rootContent = $('#y-content');
		this.$mainContent = $('#y-main-content');
		
		this.$friendConditions	= $el.find('.filter-condition');
		this.$inputFilter		= $el.find('#filter-input');
		this.$userContainer = this.$mainContent.find('.user-container');
		this.$friendList		= this.$userContainer.find('.user-item');
		this.$isDone = true;
		this.attachEvents();
	}

	UserFilter.prototype.attachEvents = function () {
		var that = this;

		if(!String.prototype.trim) {
		  String.prototype.trim = function () {
		    return this.replace(/^\s+|\s+$/g,'');
		  };
		}

		that.$inputFilter.keyup(function(){
			if(that.$friendList.length === 0 || that.$isDone === false )
				return;
			var userId = '', userName='', userEmail='';
			var query = $(this).val().toString().trim().toLowerCase();
			if(query.length === 0) {
				that.showResult(that.$friendList);
				return;
			}
			that.$isDone = false;
			var resultFilter = that.$friendList.filter(function() {
				if($(this).data('user-id')) {
					userId = $(this).data('user-id');
				}else {
					userId = '*';
				}
				if($(this).data('user-name')) {
					userName = $(this).data('user-name');
				}else {
					userName = '*';
				}
				if($(this).data('user-email')) {
					userEmail = $(this).data('user-email');
				}else {
					userEmail = '*';
				}
				return (userId.toLowerCase().indexOf(query) > -1 ||
						userName.toLowerCase().indexOf(query) > -1 ||
						userEmail.toLowerCase().indexOf(query) > -1);
			});
			that.showResult(resultFilter);
		});

		this.$friendConditions.each( function () {
			$(this).click(function(e){
				e.preventDefault();
				if ( $(this).hasClass('active') ){
					return false;
				}
				that.$friendConditions.each(function(){
					$(this).removeClass('active');
				});
				$(this).addClass('active');
				var typeFilter = $(this).data('filter');
				var resultFriend = that.$friendList.filter(function() {
					return $(this).hasClass(typeFilter);
				});
				that.showResult(resultFriend);
				return true;
			});
		});
	};
	UserFilter.prototype.showResult = function (result) {
		var that = this;
		
		that.$friendList.fadeOut(10);
		//Empty result
		if(typeof result == 'undefined'){
			that.$mainContent.width(that.$rootContent.width() - 10);
		}else {
			var numberRow = Math.floor(that.$mainContent.find('.feed-block').height()/(85 + 10));
			var numberCol = Math.floor(result.length/numberRow) + 1;
			var freeBlock = that.$mainContent.find('.free-block');
			var blockContent = that.$mainContent.find('.feed-block');
			if(freeBlock.length === 0){
				that.$mainContent.width(numberCol*(320 + 15));
			}else{
				blockContent.width(numberCol*(320 + 15));
				that.$mainContent.width(freeBlock.width() + 60 + numberCol*(320 + 15));
			}
			result.stop(true,true).fadeIn(300);
		}
		that.$rootContent.getNiceScroll().resize();
		that.$rootContent.animate({scrollLeft : '0px'}, 200);
		that.$isDone = true;
	};

	$(function(){
		$('.user-box-filter').each(function(){
            new UserFilter( $(this) );
        });
    });
}(jQuery, document));
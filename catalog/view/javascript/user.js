// User Controller generate view (html)
function UserController(){
	'use strict';

	var that = this;

	// Connect user data with knockout
	function UsersViewModel(){
		var self = this;

	    self.popup_users = ko.observableArray();

	    function UserModel(_user){
	        var self = this;
	        // Create data
	        self.slug           = ko.observable( _user.slug );
	        self.href           = ko.observable( _user.href );
	        self.username	    = ko.observable( _user.username );
	        self.avatar	        = ko.observable( _user.avatar );
	        self.current        = ko.observable( _user.current );
	        self.fr_status      = ko.observable( _user.fr_status );
	        self.fl_status		= ko.observable( _user.fl_status );
	    }

	    self.addUser = function(_user){
			self.popup_users.push( new UserModel(_user) );
	    };

	    self.setUsers = function(_users){
			self.popup_users([]);

			for ( var key in _users ){
				// console.log(_users[key]);
				self.popup_users.push( new UserModel(_users[key]) );
			}
			// console.log(self.popup_users.length);
	    };
	}
	var $userTemplatePopup = document.getElementById('list-user-liked-template');
	var userModelView = new UsersViewModel();
	ko.cleanNode($userTemplatePopup);
	ko.applyBindings(userModelView, $userTemplatePopup);

	// Add new User to knockout
	this.addUser = function(_userId){
		var user = window.yUsers.getItem(_userId);
		if ( typeof user == 'undefined' ){
			var promise = $.ajax({
				type: 'POST',
                url:  window.yRouting.generate('GetUsers'),
                data: {
					user_ids: [_userId]
                },
                dataType: 'json'
            });

            promise.then(function(data) {
                if(data.success == 'ok'){
                    window.yUsers.setItem(_userId, data.users[0]);
                    this.addUser(_userId);
                }
            });
		}else{
			userModelView.addUser(user);
		}
	};

	// Set list Users againt
	this.setUsers = function(_userIds){
		var users = [];
		for ( var key in _userIds ){
			var user = window.yUsers.getItem(_userIds[key]);
			if ( typeof user == 'undefined' ){
				var promise = $.ajax({
					type: 'POST',
	                url:  window.yRouting.generate('GetUsers'),
	                data: {
						user_ids: _userIds
					},
					dataType: 'json'
	            });

	            promise.then(function(data) {
	                if(data.success == 'ok'){
						for ( var key in data.users ){
		                    window.yUsers.setItem(data.users[key].id, data.users[key]);
						}
						that.setUsers(_userIds);
	                }
	            });
				return;
			}else{
				user.href = window.yRouting.generate('WallPage', {user_slug: user.slug});
				users.push(user);
			}
		}
		userModelView.setUsers(users);
	};

	// Set list users to show popup
	this.showPopupUsers = function(_userIds){
		var users = [];
		for ( var key in _userIds ){
			var user = window.yUsers.getItem(_userIds[key]);
			if ( typeof user == 'undefined' ){
				var promise = $.ajax({
					type: 'POST',
	                url:  window.yRouting.generate('GetUsers'),
	                data: {
						user_ids: _userIds
					},
					dataType: 'json'
	            });

	            promise.then(function(data) {
	                if(data.success == 'ok'){
						for ( var key in data.users ){
		                    window.yUsers.setItem(data.users[key].id, data.users[key]);
						}
						that.showPopupUsers(_userIds);
	                }
	            });
				return;
			}else{
				user.href = window.yRouting.generate('WallPage', {user_slug: user.slug});
				users.push(user);
			}
		}
		userModelView.setUsers(users);
		window.userFunction.showPopupUserList( users );
	};
}
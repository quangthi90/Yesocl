YesGlobal.Models = YesGlobal.Models || {};

(function($, ko, Y, undefined) {
	
	Y.Models.PostModel = function (data) {
		var that = this;
		that.id = data.id || '';
		that.user = data.user || {};
		that.title = ko.observable(data.title || '');
		that.content = ko.observable(data.content || '');
		that.thumb = ko.observable(data.thumb || '');
		that.image = ko.observable(data.image || '');
		that.created = data.created || null;
		that.description = data.description || '';
		that.slug = data.slug || '';
		that.type = data.type || '';
		that.email = data.email || '';
		that.isOwner = data.is_owner || false;
		that.isEdit = data.can_edit || false;
		that.isDelete = data.can_delete || false;
		that.owner = data.owner || {};
		that.ownerName = ko.observable(that.owner.username || "");
		that.ownerHref = ko.observable(that.owner.href || "");
		that.category = data !== undefined ? {
			id : data.category_id,
			slug: data.category_slug,
			name : data.category_name
		} : { };		
		that.commentCount = ko.observable(data.comment_count || 0);
		that.currentCommentPage = ko.observable(1);
		that.likeCount = ko.observable(data.like_count || 0);
		that.likers = ko.observableArray(data.liker_ids || []);
		that.countViewer = ko.observable(data.count_viewer || 0);
		that.isLiked = ko.observable(data.isLiked || false);
		that.userTags = ko.observableArray(data.user_tags || []);
		that.stockTags = ko.observableArray(data.stock_tags || []);
		that.comment = ko.observable(data.comment || {});
		that.isEditMode = ko.observable(false);

		that.contentDisplay = ko.computed(function(){
			var rawContent = that.content();
			if(rawContent){
				rawContent = rawContent.replace(/(?:\r\n|\r|\n)/g, '<br />');
				return Y.Utils.parseTaggedText(rawContent);
			}
			return "";
		});

		that.likePost = function() {
			var ajaxOptions = {
				url : Y.Routing.generate('ApiPutPostLike', {
					post_type: that.type,
					post_slug: that.slug
				})
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					that.isLiked(!that.isLiked());
					that.likeCount( data.like_count);
				}
			};
			YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		};

		that.showLikers = function(){
			var context = YesGlobal.Utils.getKoContext();
			if(context !== null){
				var apiUrl = yRouting.generate("ApiGetPostLiker", {
					post_type: that.type,
					post_slug: that.slug
				})
				context.$data.userBoxModel.showUserList(apiUrl, function(count){
					if(count !== undefined){
						that.likeCount(count);
					}
				});
			}else {
				console.log("Ko content not found !");
			}
		};

		if(that.comment().totalComments){
			that.comment().totalComments.subscribe(function(value){
				that.commentCount(value);
			});
		}	

		that.toJson = function(){
			return {
				post_type: that.type,
				post_slug: that.slug
			};
		};

		that.fullyToJSON = function(){
			return {
				id : ko.utils.unwrapObservable(that.id),
				title : ko.utils.unwrapObservable(that.title),
				content : ko.utils.unwrapObservable(that.content),
				thumb : ko.utils.unwrapObservable(that.thumb),
				image : ko.utils.unwrapObservable(that.image),
				created : ko.utils.unwrapObservable(that.created),
				description : ko.utils.unwrapObservable(that.description),
				slug : ko.utils.unwrapObservable(that.slug),
				type : ko.utils.unwrapObservable(that.type),
				email : ko.utils.unwrapObservable(that.email),
				isOwner : ko.utils.unwrapObservable(that.isOwner),
				isEdit : ko.utils.unwrapObservable(that.isEdit),
				isDelete : ko.utils.unwrapObservable(that.isDelete),
				owner : ko.utils.unwrapObservable(that.owner),
				ownerName : ko.utils.unwrapObservable(that.ownerName),
				ownerHref : ko.utils.unwrapObservable(that.ownerHref),
				category : ko.utils.unwrapObservable(that.category),
				commentCount : ko.utils.unwrapObservable(that.commentCount),
				currentCommentPage : ko.utils.unwrapObservable(that.currentCommentPage),
				likeCount : ko.utils.unwrapObservable(that.likeCount),
				likers : ko.utils.unwrapObservable(that.likers),
				countViewer : ko.utils.unwrapObservable(that.countViewer),
				isLiked : ko.utils.unwrapObservable(that.isLiked)
			};
		};
	};

	Y.Models.CommentModel = function (data) {
		var that = this;

		that.id = data.id || '';
		that.created = data.created || '';
		that.user = data.user || {};
		that.canDelete = data.can_delete || false;
		that.canEdit = data.can_edit || false;
		that.content = ko.observable(data.content || '');
		that.userTags = ko.observable(data.user_tags || []);
		that.stockTags = ko.observable(data.stock_tags || []);
		that.isLiked = ko.observable(data.like_count || false);
		that.likeCount = ko.observable(data.like_count || 0);

		that.contentDisplay = ko.computed(function(){
			var rawContent = that.content();
			if(rawContent){
				rawContent = rawContent.replace(/(?:\r\n|\r|\n)/g, '<br />');
				return Y.Utils.parseTaggedText(rawContent);
			}
			return "";
		});

		that.reset = function() {
			that.id = "";
			that.created = "";
			that.canDelete = false;
			that.canEdit = false;
			that.content("");
			that.isLiked(false);
			that.likeCount(0);
			that.userTags([]);
			that.stockTags([]);
		};

		that.toJson = function() {
			return {
				id : ko.utils.unwrapObservable(that.id),
				content: ko.utils.unwrapObservable(that.content)
			};
		};
	};

	Y.Models.CommentListModel = function (data){
		var that = this;
		that.commentList = ko.observableArray([]);
		that.postData = data.postData || {};
		that.currentEditComment = ko.observable(null);
		that.currentComment = ko.observable(null);
		that.newComment = ko.observable();
		that.totalComments = ko.observable(data.totalComments || 0);
		that.currentPage = ko.observable(1);
		that.canLoadMore = ko.observable(data.commentList && data.commentList.length == 3);
		that.isProcessing = ko.observable(false);
		that.hasEditFocus = ko.observable(undefined);

		that.like = function(item) {
			var ajaxOptions = {
				url : Y.Routing.generate("ApiPutCommentLike", {
					post_type: that.postData.type,
					comment_id : item.id
				})
			};
			var successCallback = function(data){
				if(data.success === "ok") {
					item.isLiked(!item.isLiked());
					item.likeCount(data.like_count);
				}else {
					//Message
				}
			};
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		};

		that.loadComment = function(){
			_loadMore(function(data) {
				//Callback after load more
			});
		};

		that.add = function(model, ele) {
			var content = that.newComment().content();
			var tags = Y.Utils.parseTagsInfo(content);
			if(content && content.trim().length > 0 && !that.isProcessing()) {
				_addComment({
					content : content,
					userTags: tags.userTags,
					stockTags: tags.stockTags
				}, function(data) {
					that.newComment().reset();
					$(ele).trigger(Y.Constants.Triggers.INPUT_CONTENT_CHANGED);
				});
			}		
		};

		that.delete = function(item) {
			Y.Utils.showConfirmMessage(Y.Constants.Messages.COMMON_CONFIRM, function(){
				_deleteComment(item, function(){
					//Callback after delete post
				});
			});
		};

		that.edit = function(item) {
			that.currentComment(item);
			var editItem = new Y.Models.CommentModel(item.toJson());
			that.currentEditComment(editItem);
			that.hasEditFocus(true);
		};

		that.cancelEdit = function(item) {
			that.currentEditComment(null);
			that.hasEditFocus(undefined);
		};

		that.submitEdit = function(item) {
			var content = item.content();		
			if(content && content.trim().length > 0 && !that.isProcessing()) {
				var tags = Y.Utils.parseTagsInfo(content);
				_saveComment({
					id: item.id,
					content : content,
					userTags: tags.userTags,
					stockTags: tags.stockTags
				}, function(data) {
					that.currentEditComment(null);
					that.hasEditFocus(undefined);
					that.currentComment().content(data.content);
				});
			}	
		};

		that.canSubmitEdit = ko.computed(function(){
			if(that.currentEditComment() == null)
				return false;
			var content = that.currentEditComment().content();	
			return (content && content.trim().length > 0 && !that.isProcessing());
		});

		//START PRIVATE METHODS
		function _loadMore(sucCallback, failCallback) {
			if(!that.canLoadMore()) return;

			var ajaxOptions = {
				url : Y.Routing.generate('ApiGetComments', {
					post_type: that.postData.type,
					post_slug: that.postData.slug,
					page: that.currentPage()
				}),
				data: {
					limit: 20
				}
			};
			var successCallback = function(data) {
				if(data.success === "ok") {
					ko.utils.arrayForEach(data.comments, function(p) {
						if(that.currentPage() === 1) {
							var existing = ko.utils.arrayFirst(that.commentList(), function(item){
								return p.id === item.id;
							});
							if(existing === null || existing === undefined) {
								var newCommentItem = new Y.Models.CommentModel(p);
								that.commentList.unshift(newCommentItem);
							}
						} else {
							var newCommentItem = new Y.Models.CommentModel(p);
							that.commentList.unshift(newCommentItem);
						}					
					});
					if(sucCallback && typeof sucCallback == "function") {
						sucCallback(data);
					}
					that.currentPage(that.currentPage() + 1);
					that.totalComments(data.comment_count);
					that.canLoadMore(data.comments.length > 0 && data.comment_count > that.commentList().length);
				} else {
					if(failCallback && typeof failCallback == "function") {
						failCallback();
					}
				}
			};
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, failCallback);
		};

		function _addComment(commentData, sucCallback, failCallback) {
			var ajaxOptions = {
				url : Y.Routing.generate("ApiPostComment", {
					post_type: that.postData.type,
					post_slug: that.postData.slug
				}),
				data: commentData
			};
			var successCallback = function(data){
				if(data.success === "ok") {
					that.newComment().reset();
					var newComment = new Y.Models.CommentModel(data.comment);
					that.commentList.push(newComment);
					if(data.comment_count >= 0){
						that.totalComments(data.comment_count);
					}
					if(sucCallback && typeof sucCallback == "function") {
						sucCallback(data);
					}
				}else{
					//Show message
					if(failCallback && typeof failCallback == "function") {
						failCallback();
					}
				}
				that.isProcessing(false);
			};
			Y.Utils.ajaxCall(ajaxOptions, function() { 
				that.isProcessing(true); 
			}, successCallback, function() {
				that.isProcessing(false) ; 
			});
		}

		function _saveComment(commentData, sucCallback, failCallback) {
			var ajaxOptions = {
				url : Y.Routing.generate("ApiPutComment", {
					post_type: that.postData.type,
					comment_id : commentData.id
				}),
				data: commentData
			};

			var successCallback = function(data){
				if(data.success === "ok") {
					if(sucCallback && typeof sucCallback == "function") {
						sucCallback(data.comment);
					}
				}else{
					//Show message
					if(failCallback && typeof failCallback == "function") {
						failCallback(data.error);
					}
				}
				that.isProcessing(false);
			};
			Y.Utils.ajaxCall(ajaxOptions, function() { 
				that.isProcessing(true); 
			}, successCallback, function() {
				that.isProcessing(false) ; 
			});
		}

		function _deleteComment(item, callback) {
			var ajaxOptions = {
				url : Y.Routing.generate("ApiDeleteComment", {
					post_type: that.postData.type,
					comment_id : item.id
				})
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					that.commentList.remove(item);
					that.totalComments(data.comment_count);
				} else {
					Y.Utils.showInfoMessage(data.error);
				}
				if(callback && typeof callback === "function"){
					callback(data);
				}
			}
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}

		function _init() {
			//inits
			var commentList = ko.utils.arrayMap(data.commentList, function(p) {
				return new Y.Models.CommentModel(p);		
			});
			if(commentList) {
				that.commentList(commentList);
			}

			var newItem = new Y.Models.CommentModel({
				can_delete : true,
				can_edit : true,
				user : Y.CurrentUser
			});
			that.newComment(newItem);
		}
		_init();
		//END PRIVATE METHODS
	};

})(jQuery, ko, YesGlobal);
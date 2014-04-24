function MarketModel(data) {
	'use strict';

	var that = this;

	that.id = ko.observable('');
	that.name = ko.observable('');
	that.code = ko.observable('');

	ko.mapping.fromJS(data, {}, this);
}

function PostModel(data) {
	var that = this;

	that.id = data.id || '';
	that.author = data.author || '';
	that.authorId = data.user_id || '';
	that.authorSlug = data.user_slug || '';
	that.title = data.title || '';
	that.description = data.description || '';
	that.content = data.content || '';
	that.created = data.created || null;
	that.thumb = data.thumb || '';
	that.slug = data.slug || '';
	that.email = data.email || '';
	that.category = data !== undefined ? {
		id : data.category_id,
		slug: data.category_slug,
		name : data.category_name
	} : { };
	that.commentCount = ko.observable(data.comment_count || 0);
	that.likeCount = ko.observable(data.like_count || 0);
	that.likers = ko.observableArray(data.liker_ids || []);
	that.countViewer = ko.observable(data.count_viewer || 0);
	that.isLiked = ko.observable(data.isUserLiked || false);


}
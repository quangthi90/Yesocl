(function($, document, undefined) {
	function FriendFilter( $element ){
		this.$element			= $element;
		this.$inputSearch		= $element.find('#search-input');

		this.attachEvents();
	}

	FriendFilter.prototype.attachEvents = function () {
		var that = this;

		this.$inputSearch.typeahead({
            source: function (query, process) {
            	friendList = [];
                map = {};      
                		
            	$.ajax({
            		type: 'POST',
            		url: that.$inputSearch.data('url'),
            		data: { 'filter_name': query },
            		dataType: 'json',
            		success: function ( json ) {
            			if ( json.success != 'ok' ) {
            				
            			}else {
				            $.each(json.friends, function (i, item) {
				                friendList.push(item.id + '-' + item.name);
				                map[item.id + '-' + item.name] = item;
				            });            
                			process(friendList);
            			}
            		},
            		error: function (xhr, error) {
            			alert(xhr.responseText);
            		},
            	});
            },
            updater: function (item) {
                var selectedFriend = map[item];
                return selectedFriend.name;
            },
            matcher: function (item) {
                if (item.toLowerCase().indexOf(this.query.trim().toLowerCase()) != -1) {
                    return true;
                }
            },
            sorter: function (items) {
                return items.sort();
            },
            highlighter: function (item) {
                var selectedFriend = map[item];
                var regex = new RegExp( '(' + this.query + ')', 'gi' );
                var boldItem = selectedFriend.name.replace( regex, "<strong>$1</strong>" );
                var htmlContent = '<div class="friend-dropdown-info">'
                                + '<img src="' + selectedFriend.image + '" alt="" />'
                                + '<div class="friend-meta-info">'
                                + '<span class="friend-name">' + boldItem + '</span>' 
                                + '<span class="num-friend">' + selectedFriend.numFriend + '</span>'   
                                + '</div>'
                                + '</div>';
                return htmlContent;
            }
        });
	}

	$(function(){
		$('#friend-filter').each(function(){
			new FriendFilter( $(this) );
		});
	});
}(jQuery, document));
function getURLVar(urlVarName) {
	var urlHalves = String(document.location).toLowerCase().split('?');
	var urlVarValue = '';
	
	if (urlHalves[1]) {
		var urlVars = urlHalves[1].split('&');

		for (var i = 0; i <= (urlVars.length); i++) {
			if (urlVars[i]) {
				var urlVarPair = urlVars[i].split('=');
				
				if (urlVarPair[0] && urlVarPair[0] == urlVarName.toLowerCase()) {
					urlVarValue = urlVarPair[1];
				}
			}
		}
	}	
	return urlVarValue;
} 
/*
Quick access functions
*/
jQuery.fn.makeScrollWithoutCalResize = function() {
	$(this).niceScroll();	
}

jQuery.fn.makeContentHorizontalScroll = function() {
	$('#y-content').niceScroll();	
}
/*
End quick access functions
*/

/*
Single List Post
*/
function SingleListFeed(el) {
	this.horizontalElement = el.find('.has-horizontal');
	this.mainContent = el.find('#y-main-content');
	this.maxHeight = this.mainContent.height();
	this.rootElement = el;
	this.setSize();
	this.makeScroll();
}

SingleListFeed.prototype.setSize = function() {
	var feeds = this.mainContent.find('.feed');
	feeds.each(function() {
		$(this).attr('data-width', $(this).outerWidth()); 
		$(this).attr('data-height', $(this).outerHeight() + parseInt($(this).css('margin-bottom'))); 
	});
}

SingleListFeed.prototype.makeScroll = function(){
	if(typeof this.horizontalElement == "undefined" || this.horizontalElement.length == 0){
		return;
	}
	var firstEl = this.horizontalElement.first();
	var feedSet = firstEl.find('.feed'); 
	var width=0, height=0, totalHeight = 0, totalWidth=0,columnIndex=0, columnId, newColoumn;

	//Remove all columns:
	firstEl.find('.column').attr('id','').css('display','none'); 

	for (var i = 0; i < feedSet.length; i++) {
		width = parseInt($(feedSet[i]).attr('data-width'), 10);
		height = parseInt($(feedSet[i]).attr('data-height'), 10);
		if(totalHeight == 0){
			columnId = 'column-' + columnIndex;
			newColoumn = $("<div class='column' id='" + columnId + "'></div>");
			newColoumn.width(width);
			newColoumn.height('100%');
			newColoumn.css('float','left');
			newColoumn.css('margin-right','25px');
			firstEl.append(newColoumn);
			totalWidth += width + 27;
		}
		if(totalHeight + height >=this.maxHeight) { 
			columnIndex ++;
			totalHeight = height;
			columnId = 'column-' + columnIndex;
			newColoumn = $("<div class='column' id='" + columnId + "'></div>");
			newColoumn.width(width);
			newColoumn.height('100%');
			newColoumn.css('float','left');
			newColoumn.css('margin-right','25px');
			firstEl.append(newColoumn);
			totalWidth += width + 27;
			$('#' + columnId).append(feedSet[i]);
		}else{
			totalHeight += height;			
			$('#' + columnId).append(feedSet[i]);
		}
	}
	this.mainContent.width(totalWidth);
	this.rootElement.niceScroll();
	this.resizeListFeed();
}

SingleListFeed.prototype.resizeListFeed = function() {
	var that = this;
	$(window).resize(function() {
	    if(this.resizeTO) 
	    	clearTimeout(this.resizeTO);
	    this.resizeTO = setTimeout(function() {
	        $(this).trigger('resizeEnd');
	    }, 800);
	});

	$(window).bind('resizeEnd', function() {
		that.makeScroll();		
	});
}
/*
End Single List Post
*/

/*
Jquery effects
*/
function FlexibleElement(el) {
	this.sidebar = el.find('#y-sidebar');
	this.main = el.find('#y-content');
	this.footerBar = el.find('#yes-footer-bar');
	this.sidebarControl = this.sidebar.find('.sidebar-controls');
	this.closeSidebar = this.sidebar.find('#close-bottom-sidebar');
	this.openSidebar = this.sidebar.find('#open-bottom-sidebar');
	this.openSearch = this.footerBar.find('.search');
	this.searchTxt = this.openSearch.find('#searchText'); 
	this.attachEvents();
}
FlexibleElement.prototype.attachEvents = function() { 
	var sb = this.sidebar;
	var m = this.main;
	var sc = this.sidebarControl;
	var os = this.openSidebar;
	var cl = this.closeSidebar;
	var sT = this.searchTxt;
	this.closeSidebar.show();
	this.openSidebar.hide();

	this.closeSidebar.click(function(e) {
		e.preventDefault();
		$(this).hide();	
		m.animate({"paddingLeft": "147px","left" : "0px"}, 200, function() {
			sc.slideUp(300, function() {
				sb.animate({ "width" : "120px"}, 200, function() {
					sb.css("bottom","auto");
					os.show();
				});				
			});
		});		
	});
	this.openSidebar.click(function(e) {
		e.preventDefault();
		$(this).hide();	
		sc.slideDown(200, function() {
			sb.animate({ "bottom" : "68px", "width" : "150px"}, 200, function() {
				m.animate({"left": "152px" , "paddingLeft": "25px"}, 500); 	
				cl.show();
			});			
		});			
	});
	this.openSearch.hover(function() {
		sT.slideDown(100); 		
	}, function() {
		if(sT.is(":focus") && sT.val().trim().length > 0) {
			return;
		}
		sT.slideUp(100);
	});
}

/*
Custom List Post
*/
function HorizontalBlock(el) {
	this.root = el;
	this.feeds = el.find('.feed');
	this.heightMain =  el.height();
	this.widthMain = el.width();
	if(this.root.hasClass('has-block')) {
		this.blocks = el.find('.feed-block');
		this.blockContent = el.find('.block-content');		
		this.heightBlockHeader = this.blocks.find('.block-header').first().outerHeight() + 10;
		this.hasBlock = true;
	}else {
		this.hasBlock = false;
	}
	
	this.initializeBlock();
}
HorizontalBlock.prototype.initializeBlock = function() {
	if(this.hasBlock) {
		var heightBlockContent = this.heightMain - this.heightBlockHeader;
		var heightPost = (heightBlockContent - 2*20)/2;
		var widthPost = this.widthMain*5/18 - 20;
		this.blockContent.height(heightBlockContent);		
		this.feeds.each(function() {
			$(this).height(heightPost);
			$(this).width(widthPost);
			var headerPost = $(this).children('.post_header').first().outerHeight();
			var footerPost = $(this).children('.post_footer').first().outerHeight();
			$(this).children('.post_body').height(heightPost - headerPost - footerPost - 20);
		});		
		this.blocks.width((5/6)*this.widthMain);
		this.blocks.each(function(index) {
			var blockFeed = new BlockFeed($(this), index, heightPost);
			blockFeed.putFeeds();
		});
		this.root.width(this.blocks.length*((5/6)*this.widthMain + 35));
	}else {		
	}
	this.root.makeContentHorizontalScroll();	
}

function BlockFeed(el, id, hp) { 
	this.block = el;
	this.blockContent = el.find('.block-content'); 
	this.feeds = el.find('.feed');
	this.height = this.blockContent.height();
	this.index = id;
	this.heightPost = hp;
}

BlockFeed.prototype.putFeeds1 = function() { 
	var totalHeight = 0, columnIndex=0, columnId, newColoumn;
	var that = this.blockContent; 
	var max_height = this.height; 
	var heightPostAv = this.heightPost;
	var id = this.index; 	
	for (var i = 0; i < this.feeds.length; ) {
		var feed1 = $(this.feeds[i]);   
		var feed2 = 0;
		if(i + 1 < length) {
			feed2 = $(this.feeds[i + 1]); 
		}
		if(feed2 == 0) { // so post le
			if(feed1.find('.post_image').length > 0){
				feed1.height(max_height - 2);
			}else {
				feed1.height(heightPostAv);
			}
		}else{
			if(feed1.find('.post_image').length > 0 && feed2.find('.post_image').length > 0) {
				feed1.height(heightPostAv);
				feed2.height(heightPostAv);
			}else if (feed1.find('.post_image').length > 0 && feed2.find('.post_image').length < 0) {
				if(feed2.outerHeight() > heightPostAv) {
					feed2.height(heightPostAv);
				}
				feed1.height(max_height - feed2.outerHeight());
			} else if (feed1.find('.post_image').length < 0 && feed2.find('.post_image').length > 0) {
				if(feed1.outerHeight() > heightPostAv) {
					feed1.height(heightPostAv);
				}
				feed2.height(max_height - feed2.outerHeight());
			}else {
				feed1.height(heightPostAv);
				feed2.height(heightPostAv);
			}
		}
		columnId = 'column-' + id + '-' + columnIndex;
		newColoumn = $("<div class='column' id='" + columnId + "'></div>");
		newColoumn.width('100%');
		newColoumn.height(max_height);
		newColoumn.css('float','left');
		newColoumn.css('margin-right','20px'); 
		newColoumn.append(feed1);
		if(feed2 != 0) {
			newColoumn.append(feed2);
		}
		that.append(newColoumn);
		columnIndex ++;
		i += 2;
	};	
}

BlockFeed.prototype.putFeeds = function() { 
	var width=0, height=0, totalHeight = 0, columnIndex=0, columnId, newColoumn;
	var that = this.blockContent; 
	var max_height = this.height; 
	var id = this.index; 		
	this.feeds.each(function() {
		var feed = $(this);     
		width = feed.outerWidth();
		height = feed.outerHeight();
		feed.attr('data-width', width);	
		feed.attr('data-height', height); 
		
		if(totalHeight == 0){
			columnId = 'column-' + id + '-' + columnIndex;
			newColoumn = $("<div class='column' id='" + columnId + "'></div>");
			newColoumn.width(width);
			newColoumn.height(max_height);
			newColoumn.css('float','left');
			newColoumn.css('margin-right','20px'); 
			that.append(newColoumn);
		}
		if(totalHeight + height >= max_height) {
			columnIndex ++;
			totalHeight = height;
			columnId = 'column-' + id + '-' + columnIndex;
			newColoumn = $("<div class='column' id='" + columnId + "'></div>");
			newColoumn.width(width);
			newColoumn.height(max_height);
			newColoumn.css('float','left');
			newColoumn.css('margin-right','20px');
			that.append(newColoumn);
			$('#' + columnId).append(feed);
		}else{
			totalHeight += height;			
			$('#' + columnId).append(feed);
		}
	});
}
/*
End Custom List Post
*/
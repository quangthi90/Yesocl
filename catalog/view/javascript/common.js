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

jQuery.fn.makeScrollWithoutCalResize = function() {
	$(this).niceScroll();	
}

jQuery.fn.makeContentHorizontalScroll = function() {
	$('#y-content').niceScroll();	
}

function HorizontalBlock(el) {

	this.root = el;
	this.blocks = el.find('.feed-block');	

	this.initializeBlock();
}
HorizontalBlock.prototype.initializeBlock = function() {
	var widthTotal = 0;
	this.blocks.each(function(index) {
		var block = new BlockFeed($(this), index);
		block.putFeeds();
		widthTotal += block.actualWidth + 37;
	});
	this.root.width(widthTotal);
	
	this.root.makeContentHorizontalScroll();
	this.resizeBlock();
}

HorizontalBlock.prototype.resizeBlock = function() {
	var that = this;
	$(window).resize(function() {
	    if(this.resizeTO) 
	    	clearTimeout(this.resizeTO);
	    this.resizeTO = setTimeout(function() {
	        $(this).trigger('resizeEnd');
	    }, 1000);
	});

	$(window).bind('resizeEnd', function() {
		//that.initializeBlock();		
	});

}

function BlockFeed(el, id) { 
	this.block = el;
	this.blockContent = el.find('.block-content'); 
	this.feeds = el.find('.feed');
	this.actualWidth = el.outerWidth();
	this.height = el.height();
	this.index = id;
}

BlockFeed.prototype.putFeeds = function() { 
	this.blockContent.find('.column').addClass('column-backup');
	var width=0, height=0, totalHeight = 0, totalWidth=0,columnIndex=0, columnId, newColoumn;
	var that = this.blockContent; 
	var max_height = this.height - 60; 
	var id = this.index; 		
	this.feeds.each(function() {
		var feed = $(this);     
		width = feed.outerWidth();
		height = feed.outerHeight() + 20;
		feed.attr('data-width', width);	
		feed.attr('data-height', height); 
		
		if(totalHeight == 0){
			columnId = 'column-' + id + '-' + columnIndex;
			newColoumn = $("<div class='column' id='" + columnId + "'></div>");
			newColoumn.width(width);
			newColoumn.height(max_height);
			newColoumn.css('float','left');
			newColoumn.css('margin-right','25px'); 
			that.append(newColoumn);
			totalWidth += width + 27;
		}
		if(totalHeight + height >= max_height) {
			columnIndex ++;
			totalHeight = height;
			columnId = 'column-' + id + '-' + columnIndex;
			newColoumn = $("<div class='column' id='" + columnId + "'></div>");
			newColoumn.width(width);
			newColoumn.height(max_height);
			newColoumn.css('float','left');
			newColoumn.css('margin-right','25px');
			that.append(newColoumn);
			totalWidth += width + 27;
			$('#' + columnId).append(feed);
		}else{
			totalHeight += height;			
			$('#' + columnId).append(feed);
		}
	});
	this.actualWidth = totalWidth;
	this.block.width(totalWidth);
}

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


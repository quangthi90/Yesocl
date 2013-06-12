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
		var widthTotal = 0; 
		that.blocks.each(function(index) { 
			var block = new BlockFeed($(this), index);
			block.putFeeds();
			widthTotal += block.actualWidth + 37;
		});
		that.root.width(widthTotal);
		that.root.makeContentHorizontalScroll();
		that.resizeBlock();
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
	var feedTem = this.blockContent.find('.column');
	var width=0, height=0, totalHeight = 0, totalWidth=0,columnIndex=0, columnId, newColoumn;
	var that = this.blockContent; 
	var max_height = this.height; 
	var id = this.index; 		
	this.feeds.each(function() {
		var feed = $(this);     
		width = feed.outerWidth();
		height = feed.outerHeight() + 20; console.log('Feed: ' + id + ' -' + width + ' - ' + height);
		if(totalHeight == 0){
			columnId = 'column-' + id + '-' + columnIndex;
			newColoumn = $("<div class='column' id='" + columnId + "'></div>");
			newColoumn.width(width);
			newColoumn.height('100%');
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
			newColoumn.height('100%');
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
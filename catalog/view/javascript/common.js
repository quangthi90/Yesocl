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
		var scrollbarsNice = m.find('.nicescroll-rails');
		$(this).hide();	
		m.animate({"paddingLeft": "142px","left" : "0px"}, 200, function() { 
			scrollbarsNice.animate({ left: '+=132'}, 100);
			sc.slideUp(300, function() {
				sb.animate({ "width" : "120px", "top":"20px", "left" : "10px", "opacity" : "0.85"}, 200, function() {
					sb.css("bottom","auto");
					os.show();
				});				
			});
		});		
	});
	this.openSidebar.click(function(e) {
		e.preventDefault();
		var scrollbarsNice = m.find('.nicescroll-rails');
		$(this).hide();	
		sc.slideDown(200, function() {
			sb.animate({ "bottom" : "68px", "width" : "150px", "top":"0px", "left" : "0px", "opacity" : "1"}, 200, function() {
				m.animate({"left": "152px" , "paddingLeft": "20px"}, 500); 	
				scrollbarsNice.animate({ left: '-=132' }, 100);
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
	this.columns = el.find('.column');
	this.feeds = el.find('.feed');	
	this.heightMain =  el.height();
	this.widthMain = el.width();	
	if(this.root.hasClass('has-block')) {
		this.blocks = el.find('.feed-block');
		this.blockContent = el.find('.block-content');				
		this.hasBlock = true;
	}else {
		this.hasBlock = false;
	}	
	this.initializeBlock();
}
HorizontalBlock.prototype.initializeBlock = function() {	
	if(this.hasBlock) {		
		var heightBlockContent = this.heightMain - 36;
		var heightPost = (heightBlockContent - 2*(10 + 2))/2;
		var widthPost = this.widthMain*5/18 - 10;
		this.columns.width(widthPost);
		this.blockContent.height(heightBlockContent);		
		this.blocks.width((5/6)*this.widthMain);		
		this.blocks.each(function(index) {
			var blockFeed = new BlockFeed($(this), heightPost,widthPost);
			blockFeed.putFeed();
		});
		this.root.width(this.blocks.length*((5/6)*this.widthMain + 35));
		this.feeds.each(function() {
			var hp = $(this).children('.post_header').first().outerHeight();
			var heightUpdated = $(this).height();
			$(this).children('.post_body').first().height(heightUpdated - hp - 20);
		});
	}else {	
		var heightMax = this.heightMain - 25;
		var widthM = this.widthMain;
		var totalWidth = 0;
		this.feeds.each(function() {
			$(this).height(heightMax);
			$(this).css('float','left');
			$(this).css('margin-right','30px');
			var headerPost = $(this).children('.post_header').first().outerHeight();
			var footerPost = $(this).children('.post_footer').first().outerHeight();
			$(this).children('.post_body').height(heightMax - headerPost - footerPost - 20);
			totalWidth += $(this).outerWidth() + 30;
		});
		this.root.width(totalWidth + 30);
	}
	this.root.makeContentHorizontalScroll();	
}
function BlockFeed(block, heightAverPost, widthAverPost) {
	this.blockEle = block;
	this.listFeed = block.find('.feed-container');
	this.numberFeed = block.find('.feed').length;
	this.heightAverPost = heightAverPost;
	this.widthAverPost = widthAverPost;
}
BlockFeed.prototype.putFeed = function() {
	this.listFeed.height(this.heightAverPost);
	if(this.numberFeed == 5) {
		this.blockEle.find('.column-special .feed-container:nth-child(1)').width((this.widthAverPost - 1)*2 + 10);
		this.blockEle.find('.column-special .feed-container:nth-child(1)').addClass('post-special');
		this.blockEle.find('.column-special .feed-container:nth-child(1)').parent('.column').width(this.widthAverPost*2 + 10);
		this.blockEle.find('.column-special .feed-container:nth-child(2)').width(this.widthAverPost - 2).css( {'float': 'left', 'margin-right':'10px'});
		this.blockEle.find('.column-special .feed-container:nth-child(3)').width(this.widthAverPost - 2).css('float', 'left');		
	}else {
		var specialColumn = this.blockEle.find('.column-special'); 
		var heightFirst = this.heightAverPost*4/3;
		var heightLast = this.heightAverPost*3/4 - 20;
		specialColumn.each(function(index) {
			if($(this).children('.feed-container').length ==1)  { 
				$(this).children('.feed-container').height(heightFirst);
				$(this).children('.feed-container').addClass('post-special');	
			}else {
				$(this).children('.feed-container:first-child').height(heightFirst);
				$(this).children('.feed-container:first-child').addClass('post-special');
				$(this).children('.feed-container:last-child').height(heightLast);
				$(this).children('.feed-container:last-child').addClass('post-weak');
			}			
		});
	}
}

/*
End Custom List Post
*/
$(document).ready(function() {
	new FlexibleElement($(this));
	new HorizontalBlock($('.has-horizontal')); 	
});
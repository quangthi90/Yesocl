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
		m.animate({"paddingLeft": "140px","left" : "0px"}, 200, function() { 
			scrollbarsNice.animate({ left: '+=100'}, 100);
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
			sb.animate({ "bottom" : "51px", "width" : "120px", "top":"0px", "left" : "0px", "opacity" : "1"}, 200, function() {
				m.animate({"left": "120px" , "paddingLeft": "20px"}, 500); 	
				scrollbarsNice.animate({ left: '-=100' }, 100);
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
	$('a[title]').tooltip({ container: 'body' });
}

/*
Custom List Post
*/
var marginPost = 5;
var marginPostOnWall = 15;
var marginBlock = 50;
var df_INVIDUAL_BLOCK = 'has-block';
var df_ACCOUNT_MYWALL = 'account-mywall';
var df_CATEGORY_SINGLE = 'post-category';
function HorizontalBlock(el) {	
	this.root = el;
	this.columns = el.find('.column');
	this.feeds = el.find('.feed');	
	this.heightMain =  el.height();
	this.widthMain = el.width();		
	this.initializeBlock();
}
HorizontalBlock.prototype.initializeBlock = function() {	
	if(this.root.hasClass(df_INVIDUAL_BLOCK)) {
		this.blocks = this.root.find('.feed-block');
		this.blockContent = this.root.find('.block-content');				
		var heightBlockContent = this.heightMain - 42;
		var heightPost = (heightBlockContent - 2*marginPost)/2;
		var widthPost = this.widthMain*5/18 - 3*marginPost;
		this.columns.width(widthPost);
		this.columns.css('margin-right', marginPost + 'px');
		this.columns.children('.feed-container').width(widthPost - 5);
		this.blockContent.height(heightBlockContent);		
		this.blocks.css('max-width', (5/6)*this.widthMain + 'px');
		this.blocks.css('margin-right', marginBlock + 'px');	
		var totalWithContent = 0;	
		this.blocks.each(function(index) {
			var blockFeed = new BlockFeed($(this), heightPost,widthPost);
			blockFeed.putFeed();	
			totalWithContent += ($(this).outerWidth() + marginBlock);			
		});
		this.root.width(totalWithContent);
		this.feeds.each(function() {
			$(this).parent('.feed-container').css('margin-bottom', marginPost + 'px');
			var hp = $(this).children('.post_header').first().outerHeight();
			var heightUpdated = $(this).height();
			$(this).children('.post_body').first().height(heightUpdated - hp - 20);
		});
	}
	else if(this.root.hasClass(df_ACCOUNT_MYWALL)) {
		this.blocks = this.root.find('.feed-block');	
		this.freeBlock = this.root.find('.free-block');
		var heightBlockContent = this.heightMain - 42;
		var widthColumnOfFirstBlock = this.widthMain/2 - marginBlock - 10;
		var totalWidth = 0;
		var blockWidth = (5/6)*this.widthMain;
		this.blocks.each(function(index) {
			$(this).css('margin-right', marginBlock + 'px');
			$(this).children('.block-content').height(heightBlockContent);
			var columns = $(this).children('.block-content').children('.column');
			if($(this).hasClass('block-post-new')) {
				//Block containing new post
				$(this).width(blockWidth);
				columns.width((blockWidth - 2*marginPostOnWall)/2) - 4;
				columns.children('.post_status').css('margin-bottom',marginPostOnWall + 'px');
				columns.children('.post_status:last-child').css('margin-bottom','0px');				
				columns.each(function(){
					var firstPost = $(this).children('.post_status:first-child');
					var lastPost = $(this).children('.post_status:last-child');
					var restHeight = heightBlockContent - firstPost.outerHeight() - 30;
					if(restHeight <= 0) {
						lastPost.hide();
					}else if(restHeight < lastPost.outerHeight()) {
						lastPost.find('.post_image').hide();
						lastPost.height(restHeight);						
					}
				});				
			}else{
				$(this).width((5/6)*widthMainParent);
			}			
			columns.css('margin-right', marginPostOnWall + 'px');
			totalWidth += $(this).outerWidth() + marginBlock;
		});
		this.freeBlock.css('margin-right', marginBlock);
		this.root.width(totalWidth == 0 ? this.widthMain : (totalWidth + this.freeBlock.outerWidth() + marginBlock));
	}
	else if(this.root.hasClass(df_CATEGORY_SINGLE)) {
		this.blocks = this.root.find('.feed-block');		
		this.blockContent = this.root.find('.block-content');				
		var heightBlockContent = this.heightMain - 42;
		var heightPost = (heightBlockContent - 2*marginPost)/2;
		var widthPost = this.widthMain*5/18 - 3*marginPost;
		this.columns.width(widthPost);
		this.columns.css('margin-right', marginPost + 'px');
		this.columns.children('.feed-container').width(widthPost - 5);
		this.blockContent.height(heightBlockContent);		
		this.blocks.css('max-width', (5/6)*this.widthMain + 'px');
		var totalWithContent = 0;
		this.blocks.each(function(index) {
			if(index != 0) {
				$(this).find('.block-header').css('visibility','hidden');
			}
			var blockFeed = new BlockFeed($(this), heightPost,widthPost);
			blockFeed.putFeed();	
			totalWithContent += $(this).outerWidth();	
		});
		this.root.width(totalWithContent);
		this.feeds.each(function() {
			$(this).parent('.feed-container').css('margin-bottom', marginPost + 'px');
			var hp = $(this).children('.post_header').first().outerHeight();
			var heightUpdated = $(this).height();
			$(this).children('.post_body').first().height(heightUpdated - hp - 20);
		});
	}
	else{
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
	this.listFeed.height(this.heightAverPost - 2);
	if(this.numberFeed == 5) {
		this.blockEle.find('.column-special .feed-container:nth-child(1)').width(2*(this.widthAverPost) + marginPost - 5);
		this.blockEle.find('.column-special .feed-container:nth-child(1)').addClass('post-bigger');
		this.blockEle.find('.column-special .feed-container:nth-child(1)').parent('.column').width(2*(this.widthAverPost) + marginPost);
		this.blockEle.find('.column-special .feed-container:nth-child(2)').width(this.widthAverPost - 2).css( {'float': 'left', 'margin-right': '5px'});
		this.blockEle.find('.column-special .feed-container:nth-child(3)').width(this.widthAverPost - 5).css('float', 'left');	
	}else {
		var specialColumn = this.blockEle.find('.column-special'); 
		var heightFirst = this.heightAverPost*4/3;
		var heightLast = this.heightAverPost*2 - heightFirst - 4;
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

$(document).ready(function() {
	jQuery(".timeago").timeago();
});
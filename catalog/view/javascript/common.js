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
	this.goLeftBtn = this.footerBar.find('#auto-scroll-left');	
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

	//For show/hide GoLeft
	var goLeftBtn = this.goLeftBtn;
	goLeftBtn.hide();		
	m.scroll(function(e) { 
    	var leftOffset = 0;
    	var freeBlockFirst = $(this).find(".free-block:first-child");
    	if(freeBlockFirst.length != 0 ){
    		leftOffset = freeBlockFirst.width();
    	}
        if($(this).scrollLeft() > leftOffset){
        	goLeftBtn.fadeIn();	
        }
        else {
            goLeftBtn.fadeOut();	
        }
    });
    goLeftBtn.click(function(){
    	m.animate({scrollLeft: 0}, 1000);
    });
}

/*
Custom List Post
*/
var marginPost = 5;
var marginPostOnWall = 15;
var marginBlock = 50;
var minPostEditorWidth = 450;
var minPostStatusWidth = 350;
var marginFriendBlockItem = 10;
var widthFriendBlockItem = 320;
var heightFriendBlockItem = 85;
var df_INVIDUAL_BLOCK = 'has-block';
var df_ACCOUNT_MYWALL = 'account-mywall';
var df_CATEGORY_SINGLE = 'post-category';
var df_FRIEND_ACCOUNT = 'account-friend';

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
		var totalWidth = 0;
		this.blocks.each(function(index) {			
			$(this).find('.block-content').height(heightBlockContent);
			var firstColumn = $(this).find('.column:first-child');
			var columnPerBlock = $(this).find('.column').not(':first-child');
			firstColumn.width(minPostEditorWidth);					
			var totalWidthOfColumns = firstColumn.outerWidth() + marginPostOnWall;
			columnPerBlock.each(function() {
				if($(this).children('.post').length == 2) {
					var firstPost = $(this).children('.post:first-child');
					var lastPost = $(this).children('.post:last-child');					
					$(this).css('margin-right', marginPostOnWall + 'px');
					firstPost.css('margin-bottom', marginPostOnWall + 'px');
					if(lastPost.outerHeight() > (heightBlockContent - firstPost.outerHeight() - marginPostOnWall)) {
						lastPost.find('.post_image').hide();	
					}
					lastPost.height(heightBlockContent - firstPost.outerHeight() - marginPostOnWall);					
				}	
				$(this).width(minPostStatusWidth);			
				totalWidthOfColumns += $(this).outerWidth() + marginPostOnWall;
			});
			firstColumn.css('min-width', minPostEditorWidth + 'px');
			columnPerBlock.css('min-width', minPostStatusWidth + 'px');	
			firstColumn.css('margin-right', marginPostOnWall + 'px');
			totalWidth += totalWidthOfColumns;
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
	else if(this.root.hasClass(df_FRIEND_ACCOUNT)) {
		var heightBlockContent = this.heightMain - 42;
		var totalWidth = 0;
		var numberRow = Math.floor(heightBlockContent/(heightFriendBlockItem + marginFriendBlockItem));
		var listBlockItem = this.root.find('.block-content-item');
		if(listBlockItem.length == 0) {
			console.log('No friend found !');
		}
		var numberCol = Math.floor(listBlockItem.length/numberRow) + 1;
		console.log(numberRow + ' - ' + numberCol);
		this.root.width(numberCol*(widthFriendBlockItem + marginFriendBlockItem));
	}
	else{		
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
	$(".timeago").timeago();
	$(document).bind('HORIZONTAL_POST', function(e) {
	    new HorizontalBlock($('.has-horizontal'));
	});
});
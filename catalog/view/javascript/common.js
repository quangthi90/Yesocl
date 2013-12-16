/*
	JS Utitlity Function
*/
function getActualLengthOfArray(obj) {
	var size = 0;
   	for (var i in obj) {
		if(obj[i] !== undefined) {
			size ++;
		}
	}
	return size;
}
//Define HashTable in JS
function HashTable(obj)
{
    this.length = 0;
    this.items = {};
    for (var p in obj) {
        if (obj.hasOwnProperty(p)) {
            this.items[p] = obj[p];
            this.length++;
        }
    }
    //Add new item to hashtable
    this.setItem = function(key, value)
    {
        var previous = undefined;
        if (this.hasItem(key)) {
            previous = this.items[key];
        }
        else {
            this.length++;
        }
        this.items[key] = value;
        return previous;
    }
    //Get existed item by key
    this.getItem = function(key) {
        return this.hasItem(key) ? this.items[key] : undefined;
    }
    //Check whether item has key existed 
    this.hasItem = function(key)
    {
        return this.items.hasOwnProperty(key);
    }   
    //Remove existed item from hastable
    this.removeItem = function(key)
    {
        if (this.hasItem(key)) {
            previous = this.items[key];
            this.length--;
            delete this.items[key];
            return previous;
        }
        else {
            return undefined;
        }
    }
    //Return list of keys of hashtable
    this.keys = function()
    {
        var keys = [];
        for (var k in this.items) {
            if (this.hasItem(k)) {
                keys.push(k);
            }
        }
        return keys;
    }
    //Return list of values of hashtable
    this.values = function()
    {
        var values = [];
        for (var k in this.items) {
            if (this.hasItem(k)) {
                values.push(this.items[k]);
            }
        }
        return values;
    }
    //Foreach implement
    this.each = function(fn) {
        for (var k in this.items) {
            if (this.hasItem(k)) {
                fn(k, this.items[k]);
            }
        }
    }
    //Clear hashtable
    this.clear = function()
    {
        this.items = {}
        this.length = 0;
    }
}

/*
	End JS Utitlity Function
*/
(function($, document, undefined) {

	jQuery.fn.makeScrollWithoutCalResize = function() {
	$(this).niceScroll();	
	}
	jQuery.fn.makeCustomScroll = function(isHonrizontal) {
		$(this).mCustomScrollbar({
			set_width:false, /*optional element width: boolean, pixels, percentage*/
			set_height:false, /*optional element height: boolean, pixels, percentage*/
			horizontalScroll: isHonrizontal, /*scroll horizontally: boolean*/
			scrollInertia:950, /*scrolling inertia: integer (milliseconds)*/
			mouseWheel:true, /*mousewheel support: boolean*/
			mouseWheelPixels:"auto", /*mousewheel pixels amount: integer, "auto"*/
			autoDraggerLength:true, /*auto-adjust scrollbar dragger length: boolean*/
			autoHideScrollbar:true, /*auto-hide scrollbar when idle*/
			scrollButtons:{ /*scroll buttons*/
				enable: false, /*scroll buttons support: boolean*/
				scrollType:"continuous", /*scroll buttons scrolling type: "continuous", "pixels"*/
				scrollSpeed:"auto", /*scroll buttons continuous scrolling speed: integer, "auto"*/
				scrollAmount:40 /*scroll buttons pixels scroll amount: integer (pixels)*/
			},
			advanced:{
				updateOnBrowserResize:true, /*update scrollbars on browser resize (for layouts based on percentages): boolean*/
				updateOnContentResize:true, /*auto-update scrollbars on content resize (for dynamic content): boolean*/
				autoExpandHorizontalScroll:false, /*auto-expand width for horizontal scrolling: boolean*/
				autoScrollOnFocus:false, /*auto-scroll on focused elements: boolean*/
				normalizeMouseWheelDelta:false /*normalize mouse-wheel delta (-1/1)*/
			},
			contentTouchScroll:true, /*scrolling by touch-swipe content: boolean*/
			callbacks:{
				onScrollStart:function(){}, /*user custom callback function on scroll start event*/
				onScroll:function(){}, /*user custom callback function on scroll event*/
				onTotalScroll:function(){}, /*user custom callback function on scroll end reached event*/
				onTotalScrollBack:function(){}, /*user custom callback function on scroll begin reached event*/
				onTotalScrollOffset:0, /*scroll end reached offset: integer (pixels)*/
				onTotalScrollBackOffset:0, /*scroll begin reached offset: integer (pixels)*/
				whileScrolling:function(){} /*user custom callback function on scrolling event*/
			},
			theme:"light" /*"light", "dark", "light-2", "dark-2", "light-thick", "dark-thick", "light-thin", "dark-thin"*/
		});
	}
	jQuery.fn.makeEditor = function(heightCustom) {
		$(this).summernote({
			height: heightCustom,  
			focus: true,
  			toolbar: [
  				['tag', ['tag']],
			    ['style', ['style']],
			    ['style', ['bold', 'italic', 'underline', 'clear']],
			    //['fontsize', ['fontsize']],
			    //['color', ['color']],
			    ['para', ['ul', 'ol', 'paragraph']],
			    //['table', ['table']],
			    //['height', ['height']],
			    ['insert', ['picture', 'link']],		    
			    ['fullscreen', ['fullscreen']]
		  	]
		});	
	}

	/*
		Left sidebar
	*/
	function Sidebar(el){
		this.sidebarRoot = el.find("#y-sidebar");
		this.sidebarToggle = this.sidebarRoot.find("#sidebar-toggle");
		this.menuContainer = this.sidebarRoot.find(".sidebar-controls");
		this.searchCtrl	   = this.sidebarRoot.find("input#ss-keyword");
		this.closeSidebar  = this.sidebarRoot.find("#sidebar-close");		
		this.makeCustomVerticalScroll();
		this.attachEvents();
	}
	Sidebar.prototype.attachEvents = function(){
		var that = this;
		//Hide/show sidebar:
		that.sidebarRoot.hover(
			function() {
				that.sidebarToggle.stop().fadeOut(110);
				$(this).stop().animate( { left:'0px' }, 400, 'easeOutQuart');			
				setTimeout(function(){ 
					that.menuContainer.show(); 
				}, 50);
			},
			function() {				
				$(this).stop().animate( { left:'-370px'}, 400, 'easeOutQuart', function(){					
					that.menuContainer.hide();
				});
				setTimeout(function(){
					that.sidebarToggle.stop().fadeIn();
				}, 200);
			}
		);		
		//ESC to hide sidebar:
		that.sidebarRoot.keydown(function(e){
			if(e.which == 27){
				that.hideSidebar();
			}
		});
		//Close sidebar btn clicked:
		that.closeSidebar.click(function(){
			that.hideSidebar();
		});
		//Click content to hide sidebar:
		$("#y-header, #y-content, #y-footer").click(function(){
			that.hideSidebar();
		});
	}
	Sidebar.prototype.hideSidebar = function() {
		var that = this;
		if(parseInt(that.sidebarRoot.css('left')) == 0 ) {
			that.sidebarRoot.mouseleave();
			that.searchCtrl.val('');
			that.searchCtrl.blur();
		}
	}
	Sidebar.prototype.makeCustomVerticalScroll = function() {
		this.menuContainer.makeCustomScroll(false);
	}
	/* End Left Sidebar */

	/*
		Start Notification
	*/
	function Notification(el){
		this.root = el;
		this.notificationItem = el.find('.notification-item');
		this.allNotificationBtn = el.find('.btn-notification');
		this.allNotificationList = el.find('.notification-content-list');
		this.notInclude = $('#y-container, #y-sidebar,#y-footer');
		this.attachEvents();
	}
	Notification.prototype.attachEvents = function() {
		var that = this;
		that.notificationItem.each(function(){
			var me = $(this);
			var btnInvoke = $(this).children('.btn-notification');
			var listNotification = $(this).children('.notification-content-list');
			listNotification.makeCustomScroll(false);
			listNotification.css('opacity', '1').hide(10);
			btnInvoke.on('click', function(e){
				e.preventDefault();
				var hasActive = me.hasClass('active');
				that.allNotificationList.slideUp(10);
				that.notificationItem.removeClass('active');
				if(!hasActive){
					listNotification.slideDown(200, function(){
						me.addClass('active');
					});	
				}
			});
		});
		that.notInclude.on('click', function(){ 
			that.allNotificationList.slideUp(10);
			that.notificationItem.removeClass('active');
		});
	}
	/*
		End Notification
	*/
	/*
		Start Mention (Tag)
	*/
	function Tag(el) {
		this.$tagElement = el.find('.mention');
		this.attachEvents();
	}
	Tag.prototype.attachEvents = function() {
		var that = this;
		that.$tagElement.mentionsInput({
			onDataRequest:function (mode,currentMentionCollection,query,callback) {
				//Demo data:
				var img = "http://www.gravatar.com/avatar/c38e39c8422969437d01e758d120c9d8?s=180";
				var data = [
					{ id:'ngo-thiet', name:'Thiet Ngo', 'avatar': img, 'type':'contact' },
					{ id:'quang-thi', name:'Quang Thi', 'avatar':img, 'type':'contact' },
					{ id:'bieu-nguyen', name:'Bieu Nguyen', 'avatar':img, 'type':'contact' },
					{ id:'thiet-ngo-1', name:'Thiệt Ngô', 'avatar':img, 'type':'contact' },
					{ id:'luu-quang-thi', name:'Lưu Quang Thi', 'avatar':img, 'type':'contact' },
					{ id:'nguyen-bieu', name:'Nguyễn Biểu', 'avatar':img, 'type':'contact' }					
				  ];
				data = _.filter(data, function(item) {
					if(currentMentionCollection !== undefined && currentMentionCollection.length > 0) {
						var checkExisted = _.filter(currentMentionCollection, function(tempItem){
							return (item.id === tempItem.id);
						});
						if(checkExisted.length > 0)
							return false;
					}					
					return item.name.toLowerCase().indexOf(query.toLowerCase()) > -1;
				});
				
				//Always return data for autocomplete dropdown list:
				callback.call(this, data);

				//Example for Ajax call:
				//$.getJSON('assets/data.json', function(responseData) {
			    //    responseData = _.filter(responseData, function(item) { return item.name.toLowerCase().indexOf(query.toLowerCase()) > -1 });
			    //    callback.call(this, responseData);
		      	//});
			},
			fullNameTrigger: true
	  	});
	}
	/*
		End Mention (Tag)
	*/
	/*
	Jquery effects
	*/
	function FlexibleElement(el) {
		this.main = el.find('#y-content');
		this.mainContent = el.find("#y-main-content");
		this.goLeftBtn = el.find('#auto-scroll-left');
		this.commentBox = el.find('#comment-box');
		this.linkPopupCommon = el.find('.link-popup');
		this.linkPopupImage = el.find('.img-link-popup');
		this.editor = el.find('.y-editor');
		this.attachEvents();
	}
	FlexibleElement.prototype.attachEvents = function() { 
		var that = this;
		//Tooltip:
		$('a[title]').each(function(){
			if($(this).hasClass('tooltip-bottom')) {
				$(this).tooltip({
						container: 'body', 
						placement: 'bottom'
					}
				);
			}else {
				$(this).tooltip({ container: 'body' });
			}
		})

		//Popup link:
		if(that.linkPopupImage.length > 0) {
			that.linkPopupImage.magnificPopup({type:'image'});	
		}
		that.linkPopupCommon.magnificPopup({
	    	type:'inline',
	    	midClick: true,
	    	removalDelay: 300,
			mainClass: 'mfp-fade'
	    });

	    //Editor:
	    that.editor.each(function() {
	    	$(this).makeEditor(250);
	    }); 

		//For show/hide GoLeft
		var maxScroll = that.mainContent.width() - that.main.width();
		var maxView = 2400 - that.main.width();
		that.main.scroll(function(e) { 
			if($(this).hasClass('scrolling')) {
				that.goLeftBtn.fadeOut(10);
				return;
			}
			var x = $(this).scrollLeft();
	    	var leftOffset = 0;
	    	var freeBlockFirst = $(this).find(".free-block:first-child");
	    	if(freeBlockFirst.length != 0 ){
	    		leftOffset = freeBlockFirst.width();
	    	}
	        if(x > leftOffset){
	        	that.goLeftBtn.fadeIn(500);
	        }
	        else {
	            that.goLeftBtn.fadeOut(300);
	        }
	        //Background move when scroll:	        
    		$(this).css('background-position', parseInt((-1)*x*maxView/maxScroll/10) + 'px 0px');
	    });
	    that.goLeftBtn.click(function(e){
	    	e.preventDefault();
	    	if(that.main.hasClass('scrolling')) return;
	    	that.main.addClass('scrolling');
			that.main.animate( { scrollLeft: 0 }, 1000, function(){
				$(this).removeClass('scrolling');
			});
	    });

	    //Demo alert, confirm, prompt, dialog:
	    var msgCallback = $("<div></div>").css(
	    	{
	    		'position': 'absolute',
	    		'right': '15px',
	    		'top': '60px',
	    		'background-color' : '#ddd',
	    		'color' : '#009B77',
	    		'padding' : '15px',
	    		'font-weight' : 'bold'
	    	}).hide().appendTo('body');
	    $(".y-alert").click(function(e) {
	        bootbox.alert("The post was delete successfully !", function() {
	        	msgCallback.html('Alert: ' + 'Alert callback').fadeIn(1000).delay(2000).fadeOut(300);
	        });
	    });
	    $(".y-confirm").click(function(e) {
	        bootbox.confirm("Are you sure you want to delete this post ?", function(result) {
	        	var text = "OK";
	        	if(!result){ text = "Cancel" }
	        	msgCallback.html('Confirm: ' + text).fadeIn(1000).delay(2000).fadeOut(300);
	        });
	    });
	    $(".y-prompt").click(function(e) {
	        bootbox.prompt("What is your name ?", function(result) { 
	          var text = "Prompt dismissed";
			  if (result !== null) {                                             
			    text = "Hi <b>"+result+"</b>";                       
			  }
			  msgCallback.html(text).fadeIn(1000).delay(2000).fadeOut(300);
			});
	    });
	    $(".y-dialog").click(function(e) {
	        bootbox.dialog({
				message: "I am a custom dialog",
				title: "Custom title",
				buttons: {
					danger: {
						  label: "Warning",
						  className: "btn-danger",
						  callback: function() {
						    msgCallback.html("Result: Warning").fadeIn(1000).delay(2000).fadeOut(300);
						  }
					},
					success: {
						  label: "Continute",
						  className: "btn-success",
						  callback: function() {
						    msgCallback.html("Result: Continute").fadeIn(1000).delay(2000).fadeOut(300);
						  }
					},				
					main: {
						  label: "Cancel",
						  className: "btn-primary",
						  callback: function() {
						    msgCallback.html("Result: Cancel").fadeIn(1000).delay(2000).fadeOut(300);
						  }
						}
					}
				});
	    });	    

	    //Comment box:
	    if(that.commentBox.length > 0) {
	    	that.commentBox.width(that.main.width()/3); 
	    	var expandBtn = that.commentBox.find('#btn-expand');
	    	var restoreBtn = that.commentBox.find('#btn-restore');
	    	expandBtn.fadeIn();
	    	restoreBtn.fadeOut();
	    	expandBtn.on('click', function(e){
	    		e.preventDefault();
	    		var me = $(this);
	    		if(me.hasClass('active')){
	    			return;
	    		}
	    		me.addClass('active');
	    		that.commentBox.animate({
	    			width: that.main.width()*2/3
	    		}, 300, function(){
	    			that.commentBox.find('.comment-meta').width(that.commentBox.width() - 97);
	    			expandBtn.fadeOut(100, function(){
	    				me.removeClass('active');
	    				restoreBtn.fadeIn(200);
	    			});
	    		});	    		
	    	});
	    	restoreBtn.on('click', function(e){
	    		e.preventDefault();
	    		var me = $(this);
	    		if(me.hasClass('active')){
	    			return;
	    		}
	    		me.addClass('active');
	    		that.commentBox.animate({
	    			width: that.main.width()/3
	    		}, 300, function(){
	    			that.commentBox.find('.comment-meta').width(that.commentBox.width() - 97);
	    			restoreBtn.fadeOut(100, function(){
	    				me.removeClass('active');
	    				expandBtn.fadeIn(200);
	    			});
	    		});
	    	});
	    }
	}

	/*
	Custom List Post
	*/
	var marginPost = 5;
	var marginPostPerColumn = 15;
	var marginBlock = 50;
	var minFirstColumn = 450;
	var minPostWidth = 400;
	var minPostStatusWidth = 420;
	var marginFriendBlockItem = 10;
	var widthFriendBlockItem = 320;
	var heightFriendBlockItem = 85;
	var maxHeightBlock = 450;
	var df_POST_HAS_BLOCK = 'post-has-block';
	var df_POST_PER_COLUMN = 'post-per-column';
	var df_CATEGORY_SINGLE = 'post-category';
	var df_FRIEND_ACCOUNT = 'account-friend';
	var df_SEARCH_PAGE 	= 'search-page';
	var df_NOTIFICATION_PAGE 	= 'notification-page';

	function HorizontalBlock(el) {	
		this.rootContent = $("#y-content");
		this.root = el;
		this.columns = el.find('.column');
		this.feeds = el.find('.feed');	
		this.heightMain =  el.height();
		this.widthMain = el.width();
		if(!this.rootContent.hasClass('no-scroll')) {
			this.initializeBlock();
		}
	}
	HorizontalBlock.prototype.initializeBlock = function() {
		if(this.root.hasClass(df_POST_HAS_BLOCK)) {
			this.blocks = this.root.find('.feed-block');
			this.blockContent = this.root.find('.block-content');				
			var heightBlockContent = this.heightMain - 42;
			var heightPost = (heightBlockContent - 2*marginPost)/2;
			var widthPost = this.widthMain*5/18 - 3*(marginPost + 2);
			if(widthPost < minPostWidth){
				widthPost = minPostWidth;
			}
			this.columns.width(widthPost);
			this.columns.css('margin-right', marginPost + 'px');
			this.columns.children('.feed-container').width(widthPost - 5);
			this.blockContent.height(heightBlockContent);		
			//this.blocks.css('max-width', (5/6)*this.widthMain + 'px');
			this.blocks.css('max-width', (widthPost + marginPost + 2 )*3 + 'px');
			this.blocks.css('margin-right', marginBlock + 'px');	
			var totalWithContent = 0;	
			this.blocks.each(function(index) {
				var blockFeed = new BlockFeed($(this), heightPost,widthPost);
				blockFeed.putFeed();	
				totalWithContent += ($(this).outerWidth() + marginBlock);		
			});
			this.root.width(totalWithContent + 10);
			this.feeds.each(function() {
				$(this).parent('.feed-container').css('margin-bottom', marginPost + 'px');
				var hp = $(this).children('.post_header').first().outerHeight();
				var heightUpdated = $(this).height();
				$(this).children('.post_body').first().height(heightUpdated - hp - 20);
			});
			this.columns.css('opacity', '1');
			this.rootContent.niceScroll();
		}
		else if(this.root.hasClass(df_POST_PER_COLUMN)) {
			this.blocks = this.root.find('.feed-block');	
			this.freeBlock = this.root.find('.free-block');
			var totalWidth = 0;
			var heightBlockContent = this.heightMain - 42;
			if(heightBlockContent > maxHeightBlock) {
				var extraPadding = Math.floor((this.heightMain - maxHeightBlock)/2);
				this.rootContent.css({
					'padding-top': extraPadding + 'px',
					'padding-bottom': extraPadding + 'px'
				});
				this.heightMain -= 2*(extraPadding);
				heightBlockContent = maxHeightBlock;
			}			
			this.blocks.each(function(index) {			
				$(this).find('.block-content').height(heightBlockContent);
				var columnPerBlock = $(this).find('.column');
				var firstColumn = $(this).find('.column:first-child');
				var totalWidthOfColumns = 0;
				if(firstColumn.length > 0 && firstColumn.hasClass('has-new-post')){
					firstColumn.width(minFirstColumn);	
					firstColumn.css({ 
						'opacity':'1',
						'min-width': minFirstColumn + 'px',
						'margin-right': marginPostPerColumn + 'px'
					});
					totalWidthOfColumns = firstColumn.outerWidth() + marginPostPerColumn;
					columnPerBlock = $(this).find('.column').not(':first-child');
				}
				columnPerBlock.each(function() {
					$(this).children('.post').height(heightBlockContent - 2*(marginPostPerColumn + 1));
					$(this).width(minPostStatusWidth);
					$(this).css({
						'opacity':'1', 
						'min-width': minPostStatusWidth + 'px'
					});
					totalWidthOfColumns += $(this).outerWidth() + marginPostPerColumn;
				});
				totalWidth += totalWidthOfColumns;
			});
			this.freeBlock.css('margin-right', marginBlock);
			this.root.width(totalWidth == 0 ? this.widthMain : (totalWidth + this.freeBlock.outerWidth() + marginBlock));
			this.rootContent.niceScroll();
		}
		else if(this.root.hasClass(df_CATEGORY_SINGLE)) {
			this.blocks = this.root.find('.feed-block');	
			this.blockContent = this.root.find('.block-content');				
			var heightBlockContent = this.heightMain - 42;
			var heightPost = (heightBlockContent - 2*marginPost)/2;
			var widthPost = this.widthMain*5/18 - 3*(marginPost + 2);
			if(widthPost < minPostWidth){
				widthPost = minPostWidth;
			}
			this.columns.width(widthPost);
			this.columns.css('margin-right', marginPost + 'px');
			this.columns.children('.feed-container').width(widthPost - 5);
			this.blockContent.height(heightBlockContent);		
			//this.blocks.css('max-width', (5/6)*this.widthMain + 'px');
			this.blocks.css('max-width', (widthPost + marginPost + 2 )*3 + 'px');
			var totalWithContent = 0;
			this.blocks.each(function(index) {
				if(index != 0) {
					$(this).find('.block-header').css('visibility','hidden');
				}
				var blockFeed = new BlockFeed($(this), heightPost,widthPost);
				blockFeed.putFeed();	
				totalWithContent += $(this).outerWidth();	
			});
			this.root.width(totalWithContent + 10);
			this.feeds.each(function() {
				$(this).parent('.feed-container').css('margin-bottom', marginPost + 'px');
				var hp = $(this).children('.post_header').first().outerHeight();
				var heightUpdated = $(this).height();
				$(this).children('.post_body').first().height(heightUpdated - hp - 20);
			});
			this.columns.css('opacity', '1');
			this.rootContent.niceScroll();
		}
		else if(this.root.hasClass(df_FRIEND_ACCOUNT)) {
			var heightBlockContent = this.heightMain - 42;
			var totalWidth = 0;
			var numberRow = Math.floor(heightBlockContent/(heightFriendBlockItem + marginFriendBlockItem));
			var listBlockItem = this.root.find('.block-content-item');
			if(listBlockItem.length == 0) {
				this.root.css('min-width', '500px');
			}else {
				var numberCol = Math.floor(listBlockItem.length/numberRow) + 1;
				this.root.width(numberCol*(widthFriendBlockItem + marginFriendBlockItem));
				this.rootContent.css('right','220px');
				listBlockItem.css('opacity','1');
			}
			this.rootContent.niceScroll();
		}
		else if(this.root.hasClass(df_SEARCH_PAGE)){
			this.root.css('min-width', this.widthMain + 'px');
			var heightBlockContent = this.heightMain - 42;
			this.root.find('.block-content').height(heightBlockContent - 5);
			this.columns.height(heightBlockContent - 20).css('opacity', '1');
			this.columns.find('.search-result-container').each(function(){
				var firstItem = $(this).find('.data-detail').first();
				var friendItem = $(this).find('.friend-item').first();
				var maxContentWidth = 250;
				if(firstItem.length > 0) {
					maxContentWidth = Math.floor(firstItem.width() - 60 - 20);
				}else if(friendItem.length > 0) {
					maxContentWidth = Math.floor(friendItem.width() - 60 - 20);
				}
				$(this).find('.data-meta-info').css('max-width', maxContentWidth + 'px');
				$(this).find('.friend-info').css('max-width', maxContentWidth + 'px');
				$(this).makeCustomScroll(false);
			});
			this.rootContent.niceScroll();
		}else if(this.root.hasClass(df_NOTIFICATION_PAGE)){
			this.root.css('min-width', this.widthMain + 'px');
			var heightBlockContent = this.heightMain - 42;
			this.root.find('.block-content').height(heightBlockContent - 5);			
			var ntfContainer = this.root.find('.ntf-container');
			ntfContainer.height(heightBlockContent - 5 - 20).niceScroll();
		}
		
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

	function NotifyFriendBtn( $el ){
		this.$el			= $el;
		this.$accept_btn	= $el.find('.btn-accept');
		this.accept_url		= this.$accept_btn.data('url');
		this.$ignore_btn	= $el.find('.btn-ignore');
		this.ignore_url		= this.$ignore_btn.data('url');

		this.attachEvents();
	}
	NotifyFriendBtn.prototype.attachEvents = function(){
		var that = this;

		this.$accept_btn.click(function(e) {
			e.preventDefault();
			
			if(that.$el.hasClass('disabled')) {
				return false;
			}

			that.submit( that.$accept_btn, that.accept_url );

			return false;
		});

		this.$ignore_btn.click(function(e) {
			e.preventDefault();
			
			if(that.$el.hasClass('disabled')) {
				return false;
			}

			that.submit( that.$ignore_btn, that.ignore_url );

			return false;
		});
	};	
	NotifyFriendBtn.prototype.submit = function($button, url){
		var that = this;

		var promise = $.ajax({
			type: 'POST',
			url: url,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) { 
			if(data.success == 'ok'){			
				var $group = that.$el.parents('.notification-item').find('.notification-item-count');
				
				var count_request = parseInt($group.data('count'), 10) - 1;
				
				$group.data('count', count_request);

				$group.html(count_request).addClass('hidden');
				
				that.$el.remove();
			}
		});	
	};
	NotifyFriendBtn.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-spinner icon-spin"></i>');
		var $old_icon = $el.find('i');
		var f        = function() {
			$spinner.remove();
			$el.html($old_icon);
		};

		$el.addClass('disabled').html($spinner);

		promise.then(f, f);
	};

	/*
	End Custom List Post
	*/
	$(document).ready(function() {
		new HorizontalBlock($('.has-horizontal'));
		new FlexibleElement($(this));
		new Sidebar($(this));
		new Tag($(this));
		if($('#user-notification').length > 0){
			new Notification($('#user-notification'));
		}		
		$(".timeago").timeago();
		
		$('.notify-actions').each(function(){
			new NotifyFriendBtn( $(this) );
		});
	});
}(jQuery, document));
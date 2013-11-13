(function($, document, undefined) {
	/*
	Quick access functions
	*/
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
				enable:false, /*scroll buttons support: boolean*/
				scrollType:"continuous", /*scroll buttons scrolling type: "continuous", "pixels"*/
				scrollSpeed:"auto", /*scroll buttons continuous scrolling speed: integer, "auto"*/
				scrollAmount:40 /*scroll buttons pixels scroll amount: integer (pixels)*/
			},
			advanced:{
				updateOnBrowserResize:true, /*update scrollbars on browser resize (for layouts based on percentages): boolean*/
				updateOnContentResize:false, /*auto-update scrollbars on content resize (for dynamic content): boolean*/
				autoExpandHorizontalScroll:false, /*auto-expand width for horizontal scrolling: boolean*/
				autoScrollOnFocus:true, /*auto-scroll on focused elements: boolean*/
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

	/*
	End quick access functions
	*/

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

	/*Start AUTOCOMPLETE */
	function SearchAutoComplete(el) {
		this.root = el;
		this.autoCtrl = el.find('.search-ctrl');
		this.invokeCtrl = el.data('invoke-search');
		this.template = el.find('.search-result-item-template');	
		this.suggestContainer = el.find('.suggestion-container');
		this.attachEvents();
		this.initAutoComplete();
	}
	SearchAutoComplete.prototype.attachEvents = function() {
		var that = this;
		$(that.invokeCtrl).click(function() {
			if($(this).hasClass('active')) {
				that.closeSearchPanel();
				$(this).removeClass('active');
			}else{
				that.openSearchPanel();
			}				
		});
		that.root.hover(function(){
				that.autoCtrl.focus();
			}
		);
		that.root.click(function(){
				that.autoCtrl.focus();
			}
		);
		//Auto invoke search:
		$(document).keypress(function(e){ 			
			//Check if any input is focused, if so, don't continue:
			var isFocus = false;		
			$('input,textarea').each(function(){
				if ($(this).is(":focus")) isFocus = true;
			});
			if (isFocus) return;
			if((e.which >= 48 && e.which <= 90) || (e.which >= 97 && e.which <= 122)) {
				that.openSearchPanel();	
				if($.browser.mozilla) {
					that.autoCtrl.val(String.fromCharCode(e.which));
				}			
			}
		});
		$(document).keyup(function(e) {
		    if (e.keyCode == 27) { 
		        that.closeSearchPanel();
		    }
		});
	}
	SearchAutoComplete.prototype.initAutoComplete = function() {
		var that = this;

		//Get datasource:
		var tempImg = "http://findicons.com/icon/download/51187/clipping_picture/48/png";
		var dbFriend = [
			{id:"1", category:"Friend", image: tempImg, value: "Nguyễn Văn A", url:"#", metaInfo:"10 friends"},
			{id:"2", category:"Friend", image: tempImg, value: "Trần Văn B", url:"#", metaInfo:"10 friends"},
			{id:"3", category:"Friend", image: tempImg, value: "Nguyễn Thị C", url:"#", metaInfo:"10 friends"},
			{id:"4", category:"Friend", image: tempImg, value: "Võ Văn D", url:"#", metaInfo:"10 friends"},
			{id:"5", category:"Friend", image: tempImg, value: "Lê Thị E", url:"#", metaInfo:"10 friends"}
		]; 
		var dbPost = [
			{id:"6", category:"Post", image: tempImg, value: "Abc def dfdd", url:"#", metaInfo:"100 likes - 30 comments - 1k views"},
			{id:"7", category:"Post", image: tempImg, value: "Lang kinh thi truong hom nay", url:"#", metaInfo:"100 likes - 30 comments - 1k views"},
			{id:"8", category:"Post", image: tempImg, value: "Chi so VN-Index hom nay", url:"#", metaInfo:"100 likes - 30 comments - 1k views"}
		];
		var dbGroup = [
			{id:"9", category:"Group", image: tempImg, value: "Tai Chinh Chung Khoan", url:"#", metaInfo:"100 members"},
			{id:"10", category:"Group", image: tempImg, value: "Dau Tu Bat Dong San", url:"#", metaInfo:"200 members"},
			{id:"11", category:"Group", image: tempImg, value: "Cong Nghe Thong Tin", url:"#", metaInfo:"1k members"}
		];
		that.autoCtrl.typeahead([
		  {
		    name: 'dataset-category category-friend',
		    local: dbFriend,
		    template: function(data){
	            var regex = new RegExp( '(' + that.autoCtrl.val() + ')', 'gi' );
	            var boldItem = data.value.replace( regex, "<strong>$1</strong>" );
	            var htmlContent = '<div class="data-detail">'
	                            + '<img src="' + data.image + '" alt="" />'
	                            + '<div class="data-meta-info">'
	                            + '<div class="data-name">' + boldItem + '</div>' 
	                            + '<div class="data-more">' + data.metaInfo + '</div>'   
	                            + '</div>'
	                            + '</div>';
	            return htmlContent;
		    },
		    header: '<h3 class="category-name">Friend</h3>'
		  },
		  {
		    name: 'dataset-category category-post',
		    local: dbPost,
		    template: function(data){
	            var regex = new RegExp( '(' + that.autoCtrl.val() + ')', 'gi' );
	            var boldItem = data.value.replace( regex, "<strong>$1</strong>" );
	            var htmlContent = '<div class="data-detail">'
	                            + '<img src="' + data.image + '" alt="" />'
	                            + '<div class="data-meta-info">'
	                            + '<div class="data-name">' + boldItem + '</div>' 
	                            + '<div class="data-more">' + data.metaInfo + '</div>'   
	                            + '</div>'
	                            + '</div>';
	            return htmlContent;
		    },
		    header: '<h3 class="category-name">Post</h3>'
		  },
		  {
		    name: 'dataset-category category-group',
		    local: dbGroup,
		    template: function(data){
	            var regex = new RegExp( '(' + that.autoCtrl.val() + ')', 'gi' );
	            var boldItem = data.value.replace( regex, "<strong>$1</strong>" );
	            var htmlContent = '<div class="data-detail">'
	                            + '<img src="' + data.image + '" alt="" />'
	                            + '<div class="data-meta-info">'
	                            + '<div class="data-name">' + boldItem + '</div>' 
	                            + '<div class="data-more">' + data.metaInfo + '</div>'   
	                            + '</div>'
	                            + '</div>';
	            return htmlContent;
		    },
		    header: '<h3 class="category-name">Group</h3>'
		  }
	  	]);
	}
	SearchAutoComplete.prototype.openSearchPanel = function() {
		var that = this;
		that.root.slideDown(200, function(){			
			$(that.invokeCtrl).addClass('active');
			that.autoCtrl.focus();			
		});	
	}
	SearchAutoComplete.prototype.closeSearchPanel = function() {
		var that = this;
		this.root.slideUp(200, function(){
			that.autoCtrl.typeahead('setQuery', '');
			$(that.invokeCtrl).removeClass('active');
		})
	}
	/* End Search AutoComplete */

	/*
	Jquery effects
	*/
	function FlexibleElement(el) {
		this.main = el.find('#y-content');
		this.mainContent = el.find("#y-main-content");
		this.goLeftBtn = el.find('#auto-scroll-left');
		this.goRightBtn = el.find('#auto-scroll-right');
		this.commentBox = el.find('#comment-box');
		//this.loaderBg = el.find('#y-loader');
		this.attachEvents();
	}
	FlexibleElement.prototype.attachEvents = function() { 
		var that = this;
		//Tooltip:
		$('a[title]').tooltip({ container: 'body' });

		//For show/hide GoLeft
		var maxScroll = that.mainContent.width() - that.main.width();
		var maxView = 2400 - that.main.width();
		that.goLeftBtn.addClass('disabled');
		that.main.scroll(function(e) { 
			var x = $(this).scrollLeft();
	    	var leftOffset = 0;
	    	var freeBlockFirst = $(this).find(".free-block:first-child");
	    	if(freeBlockFirst.length != 0 ){
	    		leftOffset = freeBlockFirst.width();
	    	}
	        if(x > leftOffset){
	        	that.goLeftBtn.removeClass('disabled');	
	        }
	        else {
	            that.goLeftBtn.addClass('disabled');	
	        }
	        if(x >= maxScroll) {
	        	that.goRightBtn.addClass('disabled');	
	        }else {
	        	that.goRightBtn.removeClass('disabled');	
	        }
	        //Background move when scroll:	        
    		$(this).css('background-position', parseInt((-1)*x*maxView/maxScroll/10) + 'px 0px');
	    });
	    that.goLeftBtn.click(function(){
	    	if($(this).hasClass('disabled')) return;
			that.main.animate({scrollLeft: 0}, 1000);
	    });
	    that.goRightBtn.click(function() {
			if($(this).hasClass('disabled')) return;
			that.main.animate({scrollLeft: maxScroll }, 1000);
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

	    //Loader:	    
		//$(window).load(function(){
		//	that.loaderBg.fadeOut(100);
		//});
		//$('a:not(a[href="#"])').click(function() { 
		//	that.loaderBg.fadeIn(100);
		//});

	    //Popup link of image:
	    $('.img-link-popup').magnificPopup({type:'image'});
	    $('.link-popup').magnificPopup({
	    	type:'inline',
	    	midClick: true,
	    	removalDelay: 300,
			mainClass: 'mfp-fade'
	    });

	    //Comment box:
	    if(that.commentBox.length > 0) {
	    	that.commentBox.width(that.main.width()/3);
	    	var expandBtn = that.commentBox.find('.btn-expand');
	    	var restoreBtn = that.commentBox.find('.btn-restore');
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
		this.rootContent = $("#y-content");
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
			var widthPost = this.widthMain*5/18 - 3*(marginPost + 2);
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
			this.root.width(totalWithContent + 10);
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
				firstColumn.width(minPostEditorWidth);				
				firstColumn.find('.post').height(heightBlockContent - 100 - marginPostOnWall - 2*marginPostOnWall);
				var columnPerBlock = $(this).find('.column').not(':first-child');
				var totalWidthOfColumns = firstColumn.outerWidth() + marginPostOnWall;
				columnPerBlock.each(function() {
					$(this).children('.post').height(Math.floor((heightBlockContent - marginPostOnWall)/2 - 2*(marginPostOnWall)));
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
			var widthPost = this.widthMain*5/18 - 3*(marginPost + 2);
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
			this.root.width(totalWithContent + 10);
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
			this.root.width(numberCol*(widthFriendBlockItem + marginFriendBlockItem));
		}
		else{				
		}
		this.rootContent.niceScroll();
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

	function SearchBtn( $el ){
		this.$el			= $el;
		this.url			= $el.data('url');
		this.$keyword 		= $el.find('input[name=\'keyword\']');
		this.$btn 			= $el.find('.btn-search');

		// console.log(this.$btn.attr('class'));

		this.attachEvents();
	}
	SearchBtn.prototype.attachEvents = function(){
		var that = this;

		this.$keyword.keydown(function(e){
			if (e.which == 13){
				that.$btn.trigger('click');
			}
		});

		this.$btn.click(function(e) {
			e.preventDefault();
			
			if(that.$el.hasClass('disabled')) {
				return false;
			}

			url = that.generateUrl();

			if ( url ){
				location = url;
			}

			return false;
		});
	};	
	SearchBtn.prototype.generateUrl = function(){
		var url = this.url;
				 
		var search = this.$keyword.val();
		
		if (search) {
			url += encodeURIComponent(search);
		}
		
		return url;
	};

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
		if($('#user-notification').length > 0){
			new Notification($('#user-notification'));
		}		
		$(".timeago").timeago();
		$('.search-form').each(function(){
			new SearchBtn( $(this) );
		});
		$('.notify-actions').each(function(){
			new NotifyFriendBtn( $(this) );
		});
		$('.search-form').each(function(){
			new SearchAutoComplete($(this));
		});
	});
}(jQuery, document));
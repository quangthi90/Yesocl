(function($, document, undefined) {
    var minDetailContent = 500;
    function DetailSection(el) {
        this.root = el;
        this.goBackBtn = el.find('.btn-goback');
        this.detailContentWrapper = el.find('#detail-content');
        this.widthDetail = this.detailContentWrapper.width();
        this.heightDetail = this.detailContentWrapper.height();
        this.postContent = this.detailContentWrapper.find('#post-content');
        this.postComment = this.detailContentWrapper.find('#comment-box');
        this.quickScroll = this.detailContentWrapper.find('#detail-scroll');        
        this.commentList = this.postComment.find('.comment-body');
        this.expandComment = this.postComment.find('.btn-expand');
        this.restoreComment = this.postComment.find('.btn-restore');
        this.closeCommentBox = this.postComment.find('.btn-close');
        this.scrollLeftBtn = this.quickScroll.find('#detail-first');
        this.toggleComment = this.root.find('.toggle-comment'); 
        this.expandCommentLevel = 1;
        this.canScrollLeft = false;
        this.canScrollLast = false;
        this.timeoutId = 0;
        this.attachEvents();
    }
    DetailSection.prototype.attachEvents = function(){
        var that = this;

        //Events:
        that.goBackBtn.on('click', function(){
            history.go(-1); 
            return false;
        });        
        that.expandComment.on('click', function(e){
            e.preventDefault();
            $(this).fadeOut(100);
            that.expandCommentLevel ++;
            that.adjustSize();
        });
        that.restoreComment.on('click', function(e){
            e.preventDefault();
            $(this).fadeOut(100);
            that.expandCommentLevel --;
            that.adjustSize();
        });
        that.toggleComment.children('a').on('click', function(e){
            e.preventDefault();
            that.toggleComment.fadeOut(100);
            that.initializeSize();
        });
        that.closeCommentBox.on('click', function(e){
            e.preventDefault();
            that.makeFullContentVisible();
        });
        that.postContent.scroll(function(){
            if(that.timeoutId != 0) {
                clearTimeout(that.timeoutId);
            }
            var xScroll = $(this).scrollLeft();
            var minWidth = that.scrollLeftBtn.outerWidth() + 25;
            if(xScroll > minWidth) {
                that.scrollLeftBtn.fadeIn(300);
                that.canScrollLeft = true;
            }else {
                that.scrollLeftBtn.fadeOut(200);
                that.canScrollLeft = false;
            }
            if(xScroll < ($(this).width() - minWidth )) {
                that.scrollLastBtn.fadeIn(300);
                that.canScrollLast = true;
            }else{
                that.scrollLastBtn.fadeOut(200);
                that.canScrollLast = false;
            }
            that.timeoutId = setTimeout(function(){
                if(!that.scrollLeftBtn.is(":hover")) {
                    that.scrollLeftBtn.fadeOut(200);    
                }
                if(!that.scrollLastBtn.is(":hover")) {
                    that.scrollLastBtn.fadeOut(200);
                }                
            }, 2000);
        });        
        that.scrollLeftBtn.on('click', function(e){
            e.preventDefault();
            that.postContent.animate({ scrollLeft: 0 }, 1000);
        });

        //Scroll bar:
        that.postContent.niceScroll({
            scrollspeed:150,
            mousescrollstep:330,
            touchbehavior:false,
            horizrailenabled:true,
            smoothscroll:true
        });
        that.commentList.mCustomScrollbar({
            autoHideScrollbar:true,
            advanced:{
                updateOnContentResize: true,
                updateOnContentResize: true
            }
        });
        //Img gallery:
        if(that.postContent.find('img').length > 0) {
            that.postContent.find('img').each(function(){
                if($(this).parent('a').length == 0){
                    var imgWrapper = $("<a class='img-wrapper'></a>");
                    imgWrapper.attr('href', $(this).attr('src'));
                    imgWrapper.attr('title', $(this).attr('alt'));
                    $(this).wrap(imgWrapper);
                }
            });
            that.postContent.magnificPopup({
                delegate: 'a',
                type: 'image',
                closeOnContentClick: false,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                image: {
                    verticalFit: true,
                    titleSrc: function(item) {
                        return item.el.attr('title');
                    }
                },
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300, 
                    opener: function(element) {
                        return element.find('img');
                    }
                }
            });
        }

        //Adjust size:
        setTimeout(function() { 
            that.initializeSize(); 
        }, 1000);
    }
    DetailSection.prototype.initializeSize = function() {
        var that = this;
        that.expandCommentLevel = 1;
        var widthComment  = Math.floor(that.widthDetail/4);
        that.postComment.find('.comment-meta').width(widthComment - 90);
        that.postComment.width(widthComment).animate({ right: '0px' }, 400);
    }
    DetailSection.prototype.makeFullContentVisible = function() {
        var that = this;
        that.postComment.width(0);
        that.toggleComment.fadeIn(100);
        that.toggleComment.children('a').tooltip('show');
        setTimeout(function(){
            that.toggleComment.children('a').tooltip('hide');
        }, 3000); 
    }
    DetailSection.prototype.adjustSize = function() {
        var that = this;
        var widthComment  = Math.floor(that.widthDetail/4)*that.expandCommentLevel;
        if(that.widthDetail - widthComment < minDetailContent){
            widthComment = that.widthDetail - minDetailContent; 
        }
        that.postComment.find('.comment-meta').width(widthComment - 90);
        that.postComment.width(widthComment).animate({ right: '0px' }, 500, function(){
            if(that.expandCommentLevel === 1 || 
                that.expandCommentLevel === 2 ){
                that.expandComment.fadeIn(200);
            }
            if(that.expandCommentLevel === 2 || 
                that.expandCommentLevel === 3 ){
                that.restoreComment.fadeIn(200);
            }
        }); 
    }

    $(document).ready(function(){
        new DetailSection($('#post-detail'));
    });
    
}(jQuery, document));
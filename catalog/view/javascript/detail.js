(function($, document, undefined) {
    var minDetailContent = 500;
    function DetailSection(el) {
        this.root = el;
        this.goBackBtn = el.find('.btn-goback');
        this.detailContentWrapper = el.find('#detail-content');
        this.widthDetail = this.detailContentWrapper.width();
        this.heightDetail = this.detailContentWrapper.height();
        this.postContent = this.detailContentWrapper.find('#post-content');
        this.postComment = this.detailContentWrapper.find('#comment-wrapper');
        this.commentList = this.postComment.find('.comment-body');
        this.commentMeta = this.postComment.find('.comment-meta');
        this.expandComment = this.postComment.find('.btn-expand');
        this.restoreComment = this.postComment.find('.btn-restore');
        this.closeCommentBox = this.postComment.find('.btn-close');
        this.toggleComment = this.root.find('.toggle-comment'); 
        this.expandCommentLevel = 1;
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
            that.makeFullContent();
        });

        //Scroll bar:
        that.postContent.niceScroll();
        that.commentList.mCustomScrollbar({
            autoHideScrollbar:true,
            advanced:{
                updateOnContentResize: true,
                updateOnContentResize: true
            }
        });

        //Adjust size:
        setTimeout(that.initializeSize(), 1000);
    }
    DetailSection.prototype.initializeSize = function() {
        var that = this;
        that.expandCommentLevel = 1;
        var widthComment  = Math.floor(that.widthDetail/4);
        that.postContent.animate({ right : (widthComment + 15) + 'px' }, 700, function(){
            that.postContent.getNiceScroll().resize();
            that.commentMeta.width(widthComment - 90);
            that.postComment.width(widthComment).animate({ right: '0px' }, 400);
        })
    }
    DetailSection.prototype.makeFullContent = function() {
        var that = this;
        var widthComment = 0;
        that.postComment.width(widthComment).animate({ right: '0px' }, 300, function(){
            that.postContent.animate({ right : (widthComment + 15) + 'px' }, 500, function(){
                that.toggleComment.fadeIn(100);
                that.toggleComment.children('a').tooltip('show');
                setTimeout(function(){
                    that.toggleComment.children('a').tooltip('hide');
                }, 3000);
                that.postContent.getNiceScroll().resize();
            });
        });        
    }
    DetailSection.prototype.adjustSize = function() {
        var that = this;
        var widthComment  = Math.floor(that.widthDetail/4)*that.expandCommentLevel;
        if(that.widthDetail - widthComment < minDetailContent){
            widthComment = that.widthDetail - minDetailContent; 
        }
        that.postContent.animate({ right : (widthComment + 15) + 'px' }, 300, function(){
            that.postContent.getNiceScroll().resize();
            that.commentMeta.width(widthComment - 90);
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
        });
    }

    $(document).ready(function(){
        new DetailSection($('#post-detail'));
    });
    
}(jQuery, document));
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
        
        that.expandComment.on('click', function(){
            that.expandCommentLevel ++;
            that.adjustSize();
        });
        that.restoreComment.on('click', function(){
            that.expandCommentLevel --;
            that.adjustSize();
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
    DetailSection.prototype.adjustSize = function() {
        var that = this;
        if(that.expandCommentLevel == 1){
            that.restoreComment.fadeOut(300);
            that.expandComment.fadeIn(300);
        }else if(that.expandCommentLevel == 4){
            that.restoreComment.fadeIn(300);
            that.expandComment.fadeOut(300);
        }else{
            that.restoreComment.fadeIn(300);
            that.expandComment.fadeIn(300);
        }

        var widthComment  = Math.floor(that.widthDetail/4)*that.expandCommentLevel;
        if(that.widthDetail - widthComment < minDetailContent){
            widthComment = that.widthDetail - minDetailContent; 
        }
        that.postContent.animate({ right : (widthComment + 15) + 'px' }, 300, function(){
            that.postContent.getNiceScroll().resize();
            that.commentMeta.width(widthComment - 90);
            that.postComment.width(widthComment).animate({ right: '0px' }, 500);            
        });
    }

    $(document).ready(function(){
        new DetailSection($('#post-detail'));
    });
    
}(jQuery, document));
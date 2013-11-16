(function($, document, undefined) {
    
    function DetailSection(el) {
        this.root = el;
        this.goBackBtn = el.find('.goback-link > a').first();
        this.detailContentWrapper = el.find('#detail-content');
        this.postContent = this.detailContentWrapper.find('#post-content');
        this.postComment = this.detailContentWrapper.find('#comment-wrapper');
        this.commentList = this.postComment.find('.comment-body');
        this.expandComment = this.postComment.find('.btn-expand');
        this.restoreComment = this.postComment.find('.btn-restore');
        this.attachEvents();
    }
    DetailSection.prototype.attachEvents = function(){
        var that = this;
        that.goBackBtn.on('click', function(){
            history.go(-1); 
            return false;
        });

        //Scroll bar:
        that.postContent.niceScroll();
        that.commentList.mCustomScrollbar();
    }

    $(document).ready(function(){
        new DetailSection($('#post-detail'));
    });
    
}(jQuery, document));
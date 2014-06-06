function DetailLayout(el) {
    var that = this;

    this.root = el;
    this.goBackBtn = el.find('.btn-goback');
    this.detailContentWrapper = el.find('#detail-content');
    this.widthDetail = this.detailContentWrapper.width();
    this.heightDetail = this.detailContentWrapper.height();
    this.postContent = this.detailContentWrapper.find('#post-content');
    this.quickScroll = this.detailContentWrapper.find('#detail-scroll');
    this.scrollLeftBtn = this.quickScroll.find('#detail-first');
    this.canScrollLeft = false;
    this.canScrollLast = false;    

    function attachEvents() {
        //Events:
        that.goBackBtn.on('click', function(){
            history.go(-1); 
            return false;
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
            that.timeoutId = setTimeout(function(){
                if(!that.scrollLeftBtn.is(":hover")) {
                    that.scrollLeftBtn.fadeOut(200);    
                }               
            }, 2000);
        });        
        that.scrollLeftBtn.on("click", function(e){
            e.preventDefault();
            that.postContent.animate({ scrollLeft: 0 }, 1000);
        });

        //Scroll bar:
        that.postContent.niceScroll({
            scrollspeed:0,
            mousescrollstep:100,
            touchbehavior:false,
            horizrailenabled:true,
            smoothscroll:true
        });
        //Img gallery:
        that.postContent.find("img").each(function(){
            $(this).on("click", function(){
                var image = $(this).prop("src");
                $.magnificPopup.open({
                    items: {
                        src: image
                    },
                    type: "image"
                });
            });
        });
    }

    attachEvents();
}

function DetailFormView(params) {
    var self = this;
    var detailPage = $("#post-detail");

    self.postData = new PostModel(params.postData);
    self.isLogged = params.isLogged;

    self.likePost = function() {
        if(!self.isLogged){
            return;
        }
        self.postData.likePost();
    };

    self.showLikers = function(){
        self.postData.showLikers();
    };

    self.showComment = function() {
        self.postData.showComment();
    };

    new DetailLayout(detailPage);
}
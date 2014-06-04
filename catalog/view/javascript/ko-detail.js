function DetailFormView(params) {
    var self = this;

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
    }

    self.showComment = function() {
        self.postData.showComment();
    };
}
// MESSAGE JS
(function($, document, undefined) {
    var minWidthContent = 1000;
    function MessageLayout($el) {
        this.$rootContent       = $el.find('#y-content');
        this.$mainContent       = $el.find('#y-main-content');
        this.$messageBoxContent = $el.find('.message-box');
        this.$userBox           = $el.find('.user-box');
        this.$messageBox        = $el.find('.message-box-list');
        this.$userList          = this.$userBox.find('.user-box-scroll');
        this.$messageList       = this.$messageBox.find('.mesasage-box-container');
        this.$enterCheck        = $el.find('.enter-check');
        this.$sendBtn           = $el.find('.btn-send-msg');
        this.makeLayout();
        this.attachEvents();
    };
    MessageLayout.prototype.attachEvents = function() {
        var that = this;
        that.$enterCheck.on('click', function(){
            if($(this).is(':checked')){
                that.$sendBtn.hide(10);
            }else {
                that.$sendBtn.show(10);
            }
        });
        that.$sendBtn.hide(10);
    };
    MessageLayout.prototype.makeLayout = function() {
        var that = this;
        var heightContent = that.$mainContent.outerHeight() - 45;
        var widthContent = that.$mainContent.width() > minWidthContent ? that.$mainContent.width() : minWidthContent;
        that.$messageBoxContent.width(widthContent - 20);
        that.$messageBox.width(that.$messageBoxContent.width() - that.$userBox.width() - 1);
        that.$messageBoxContent.height(heightContent);

        var heightMenu = that.$userBox.find('#user-box-menu').outerHeight();
        var heightSearch = that.$userBox.find('#user-box-search').outerHeight();
        that.$userList.height(heightContent - heightSearch - heightMenu - 10);
        that.$userList.makeCustomScroll();

        var heightHeader = that.$messageBox.find('.mesasage-box-header').outerHeight();
        var heightFooter = 100;
        that.$messageList.height(heightContent - heightHeader - heightFooter - 10);
        that.$messageList.makeCustomScroll();

        that.$messageBoxContent.css('opacity', '1');
    };  

    $(document).ready(function() {
        new MessageLayout($(this));
    });
}(jQuery, document));

// Message form
(function($, document, undefined) {
    function MessageForm($el) {
        var that = this;

        this.$el = $el;
        this.$subject = $el.find('.js-message-to');
        this.$content = $el.find('.js-message-content');
        this.$sendBtn = $el.find('.js-btn-message-send')

        this.attachEvents();
    };
    MessageForm.prototype.attachEvents = function() {
        var that = this;
        that.$enterCheck.on('click', function(){
            if($(this).is(':checked')){
                that.$sendBtn.hide(10);
            }else {
                that.$sendBtn.show(10);
            }
        });
        that.$sendBtn.hide(10);
    };
    MessageForm.prototype.makeLayout = function() {
        var that = this;
        var heightContent = that.$mainContent.outerHeight() - 45;
        var widthContent = that.$mainContent.width() > minWidthContent ? that.$mainContent.width() : minWidthContent;
        that.$messageBoxContent.width(widthContent - 20);
        that.$messageBox.width(that.$messageBoxContent.width() - that.$userBox.width() - 1);
        that.$messageBoxContent.height(heightContent);

        var heightMenu = that.$userBox.find('#user-box-menu').outerHeight();
        var heightSearch = that.$userBox.find('#user-box-search').outerHeight();
        that.$userList.height(heightContent - heightSearch - heightMenu - 10);
        that.$userList.makeCustomScroll();

        var heightHeader = that.$messageBox.find('.mesasage-box-header').outerHeight();
        var heightFooter = 100;
        that.$messageList.height(heightContent - heightHeader - heightFooter - 10);
        that.$messageList.makeCustomScroll();

        that.$messageBoxContent.css('opacity', '1');
    };  

    $(document).ready(function() {
        $('#new-message-form').each(function(){
            new MessageForm($(this));
        });
    });
}(jQuery, document));

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
        this.$el = $el;
        this.$subject = $el.find('.js-message-to');
        this.$content = $el.find('.js-message-content');
        this.$sendBtn = $el.find('.js-btn-message-send');

        this.attachEvents();
    };
    MessageForm.prototype.attachEvents = function() {
        var that = this;

        that.$content.keyup(function(e){
            if(e.keyCode === 13 && $(this).val().trim().length > 0){
                that.$sendBtn.trigger('click');         
            }
        });
        that.$sendBtn.click(function(e){
            e.preventDefault();
            var tagedUsers = that.$subject.data('users'); 
            if(typeof tagedUsers === 'undefined' || tagedUsers.length == 0) {
                that.$subject.focus();
                return false;
            }            
        });        
    };

    $(document).ready(function() {
        $('#new-message-form').each(function(){
            new MessageForm($(this));
        });
    });
}(jQuery, document));

(function($, document, undefined) {
    var friendList = [];
    var map = {};
    var currentTagsGlobal = [];
    var yListFriends = null;
    var is_send_ajax = 0;
    function TagUser($el) {
        this.$root = $el;
        this.$inputTag = $el.find('input.tagText');
        this.$tagGroup = $el.find('.tags-group');
        this.$tagContainer = $el.find('.tags-container');
        this.initAutoComplete();
        this.attachEvents();
    };
    TagUser.prototype.initAutoComplete = function() {
        var that = this;
        var typeaheadData = that.$inputTag.typeahead({
            source: function (query, process) {
              friendList = [];
              map = {};
              if ( yListFriends == null && is_send_ajax == 0 ){
                is_send_ajax = 1;
                $.getJSON(yRouting.generate('GetAllFriends'), function(json) {
                  if ( json.success == 'ok' ){
                    if ( json.friends == undefined ){
                      is_send_ajax = 0;
                    }
                    yListFriends = json.friends;
                  }
                });
              }

              if ( yListFriends == null ){
                return false;
              }

              $.each(yListFriends, function (i, item) {
                  friendList.push(item.id + '-' + item.name);
                  map[item.id + '-' + item.name] = item;
              });
              process(friendList);
            },
            updater: function (item) {
              var selectedTag = map[item];
              return selectedTag.name;
            },
            matcher: function (item) {
              var checkingItem = map[item];
              if(currentTagsGlobal.length != 0 && $.inArray(checkingItem.id, currentTagsGlobal) >= 0){
                return false;
              }
              if (item.toLowerCase().indexOf(this.query.trim().toLowerCase()) >= 0) {
                  return true;
              }
            },
            sorter: function (items) {
              return items.sort();
            },
            highlighter: function (item) {
              that.$inputTag.focus();
              var selectedTag = map[item];
              var htmlContent = '<img src="' + selectedTag.avatar + '" alt="' + selectedTag.name + '" />'
                              + '<span class="user-name">' + selectedTag.name + '</span>';
              return htmlContent;
            }
        }).data('typeahead');  
        typeaheadData.select = function () {
            var val = this.$menu.find('.active').attr('data-value');
            var selectedTag = map[val];
            this.$element.val(this.updater(val)).trigger('selected', [{ selectedItem : selectedTag }]);
            return this.hide();
        };

        that.$inputTag.on('selected', function(e, data){
            var existedTagItem = that.$tagContainer.find('.tagItem').filter(function(index){
                return ($(this).attr('data-value') === data.selectedItem.id);
            });
            //Selected item already existed:
            if(existedTagItem.length > 0){
                that.$inputTag.val('').focus();
                return;
            }
            var tagItem = $('<span class="tagItem"></span>').data('value', data.selectedItem.id);
            var showTagEl = $('<b class="tag-name"></b>').html(data.selectedItem.name);
            var removeTag = $('<i class="icon-remove"></i>').on('click', function(){
                $(this).parent().fadeOut(500, function(){
                    var deletedValue = $(this).data('value');
                    var indexDeletedValue = currentTagsGlobal.indexOf(deletedValue);
                    if(indexDeletedValue >= 0){
                        currentTagsGlobal.splice(indexDeletedValue, 1);
                    }
                    $(this).remove();          
                    if(that.$tagContainer.children('.tagItem').length == 0){
                        that.$tagContainer.addClass('no-tag-item');    
                    }
                });
            });
            tagItem.append(showTagEl).append(removeTag).appendTo(that.$tagContainer);           
            currentTagsGlobal.push(data.selectedItem.id);
            that.$inputTag.data('users', currentTagsGlobal);
            that.$inputTag.val('').focus();
        });
    };
    TagUser.prototype.attachEvents = function() {
        var that = this;
        that.$tagGroup.click(function(){
             $(this).animate({
                scrollTop: that.$inputTag.offset().top
            }, 500, function(){
                that.$inputTag.focus();
            });            
        });
    }
    $(document).ready(function() {
        $('.tag-user-wrapper').each(function(){
            new TagUser($(this));
        });
    });
}(jQuery, document));

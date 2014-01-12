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

// Friend auto complete
(function($, document, undefined) {
    var friendList = [];
    var map = {};
    var currentTagsGlobal = [];
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
              if ( window.yListFriends == null && is_send_ajax == 0 ){
                is_send_ajax = 1;
                $.getJSON(yRouting.generate('GetAllFriends'), function(json) {
                  if ( json.success == 'ok' ){
                    if ( json.friends == undefined ){
                      is_send_ajax = 0;
                    }
                    window.yListFriends = json.friends;
                  }
                });
              }

              if ( window.yListFriends == null ){
                return false;
              }

              $.each(window.yListFriends, function (i, item) {
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

// New Message form
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
            e.preventDefault();

            if(e.keyCode === 13 && $('.js-mess-check').parent().hasClass('checked') && that.validate() ){
                that.$sendBtn.trigger('click');
                return false;
            }
        });
        that.$sendBtn.click(function(e){
            e.preventDefault();
            
            if ( that.validate() == false ){
                return false;
            }
            
            that.submit(that.$sendBtn);

            return false;
        });
    };
    MessageForm.prototype.submit = function($button) {
        var that = this;        

        var promise = $.ajax({
            type: 'POST',
            url:  yRouting.generate('MessageSend'),
            data: {
                user_slugs: this.$subject.data('users'),
                content: this.$content.val().trim()
            },
            dataType: 'json'
        });

        this.triggerProgress($button, promise);

        promise.then(function(data) { 
            if(data.success == 'ok'){
                var content = that.$content.val().trim();

                /*Todo: clear form new message - Thiet*/
                that.$el.find('.tags-container').html('');
                that.$content.val('');

                var user_slugs = that.$subject.data('users');
                for (i in user_slugs) {
                    var $user_item = $('.js-mess-user-list').find('[data-user-slug=\'' + user_slugs[i] + '\']');
                    
                    if ( $user_item.attr('class') == undefined ){
                        if ( window.yListFriends == null || window.yListFriends[user_slugs[i]] == undefined ){
                            window.location.reload();
                        }
                        var user = window.yListFriends[user_slugs[i]];
                        user['content'] = content;
                        $user_item = $.tmpl( $('#message-user-item'), user );
                        $(document).trigger('MESSAGE_LIST', [$user_item]);
                    }else{
                        var users = $('.js-mess-user-list').data('users-messages');
                        if ( typeof users == 'undefined' ){
                            users = new HashTable();
                        }

                        var user_messages = users.getItem(user_slugs[i]);
                        if ( typeof user_messages != 'undefined' ){
                            user_messages.unshift({
                                content: content,
                                created: data.time,
                                user: data.user
                            });
                            users.setItem(user_slugs[i], user_messages);
                            $('.js-mess-user-list').data('users-messages', users);
                        }
                    }
                    
                    // Update time for list message users
                    var $time = $user_item.find('.js-mess-user-time').clone();
                    $user_item.find('.js-mess-user-time').remove();
                    $time.attr('title', data.time).html('').timeago();
                    $user_item.find('.js-mess-user-info').append($time);

                    $user_item.find('.js-mess-user-content').html(content);
                    $('.js-mess-user-list').prepend($user_item);
                };

                $('.mfp-ready').trigger('click');
                $('.js-mess-user-list').find('.js-mess-user-item:first-child > .js-mess-user-link').trigger('click');
            }
        });
    };
    MessageForm.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f        = function() {
            $spinner.remove();
            $el.removeClass('disabled').prepend($old_icon);
        };

        $old_icon.remove();
        $el.addClass('disabled').prepend($spinner);

        promise.then(f, f);
    };
    MessageForm.prototype.validate = function() {
        var tagedUsers = this.$subject.data('users');
        if(typeof tagedUsers === 'undefined' || tagedUsers.length == 0) {
            this.$subject.focus();
            return false;
        }else if( this.$content.val().trim().length == 0 ){
            return false;
        }
        return true;
    };
    $(document).ready(function() {
        $('#new-message-form').each(function(){
            new MessageForm($(this));
        });
    });
}(jQuery, document));

// Submit chat
(function($, document, undefined) {
    function MessageChat($el) {
        this.$el = $el;
        this.$subject = $el.find('.js-mess-username');
        this.$content = $el.find('.js-message-content');
        this.$sendBtn = $el.find('.js-btn-message-send');
        
        this.attachEvents();
    };
    MessageChat.prototype.attachEvents = function() {
        var that = this;

        that.$content.keyup(function(e){
            e.preventDefault();

            if(e.keyCode === 13 && $('.js-mess-check').parent().hasClass('checked') && that.validate() ){
                that.$sendBtn.trigger('click');
                return false;
            }
        });
        that.$sendBtn.click(function(e){
            e.preventDefault();
            
            if ( that.validate() == false ){
                return false;
            }
            
            that.submit(that.$sendBtn);

            return false;
        });
    };
    MessageChat.prototype.submit = function($button) {
        var that = this;        

        var slug = this.$subject.data('user-slug');
        var promise = $.ajax({
            type: 'POST',
            url:  yRouting.generate('MessageSend'),
            data: {
                user_slugs: [slug],
                content: this.$content.val().trim()
            },
            dataType: 'json'
        });

        this.triggerProgress($button, promise);

        promise.then(function(data) { 
            if(data.success == 'ok'){
                var content = that.$content.val().trim();
                that.$content.val('');

                var $mess_item = $('.js-mess-list-content').find('.message-item:first-child').clone();
                var $user_item = $('.js-mess-user-list').find('[data-user-slug=\'' + slug + '\']');

                if ( $mess_item.attr('class') == undefined || $user_item.attr('class') == undefined ){
                    window.location.reload();
                }

                $mess_item.find('.js-mess-content').html( content );
                $mess_item.find('.js-mess-date').html( data.time );
                $('.js-mess-list-content').append($mess_item);

                // Update time for list message users
                var $time = $user_item.find('.js-mess-user-time').clone();
                $user_item.find('.js-mess-user-time').remove();
                $time.attr('title', data.time).html('').timeago();
                $user_item.find('.js-mess-user-info').append($time);

                $('.js-mess-user-list').prepend($user_item);
                var users = $('.js-mess-user-list').data('users-messages');
                if ( typeof users == 'undefined' ){
                    users = new HashTable();
                }

                var user_messages = users.getItem(slug);
                if ( typeof user_messages != 'undefined' ){
                    user_messages.push({
                        content: content,
                        created: data.time,
                        user: data.user
                    });
                    users.setItem(slug, user_messages);
                    $('.js-mess-user-list').data('users-messages', users);
                }
            }
        });
    };
    MessageChat.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f        = function() {
            $spinner.remove();
            $el.removeClass('disabled').prepend($old_icon);
        };

        $old_icon.remove();
        $el.addClass('disabled').prepend($spinner);

        promise.then(f, f);
    };
    MessageChat.prototype.validate = function() {
        if( this.$content.val().trim().length == 0 ){
            return false;
        }
        return true;
    };
    $(document).ready(function() {
        $('.js-mess-box').each(function(){
            new MessageChat($(this));
        });
    });
}(jQuery, document));

// Load list message by user
(function($, document, undefined) {
    function MessageList($el) {
        this.$el = $el;
        this.$userMessBtn = $el.find('.js-mess-user-link');
        
        this.slug = $el.data('user-slug');
        this.username = $el.data('username');

        this.attachEvents();
    };
    MessageList.prototype.attachEvents = function() {
        var that = this;

        that.$userMessBtn.click(function(e){
            e.preventDefault();

            $('.js-mess-user-list').find('.js-mess-user-item.active').removeClass('active');
            that.$el.addClass('active');
            
            that.submit(that.$userMessBtn);

            return false;
        });
    };
    MessageList.prototype.submit = function($button) {
        var that = this;        

        var users_messages = $('.js-mess-user-list').data('users-messages');
        if ( typeof users_messages == 'undefined' ){
            users_messages = new HashTable();
        }
        $('.js-mess-user-list').data('users-messages', users_messages);

        $('.js-mess-username').html( that.username ).data('user-slug', that.slug);

        if ( typeof users_messages.getItem(that.slug) == 'undefined' ){
            var promise = $.ajax({
                type: 'POST',
                url:  yRouting.generate('MessageGetList', {
                    user_slug: that.slug
                }),
                dataType: 'json'
            });

            this.triggerProgress($button, promise);

            promise.then(function(data) { 
                if(data.success == 'ok'){
                    $('.js-mess-list-content').html('');
                    for ( key in data.messages ){
                        $('.js-mess-list-content').prepend( $.tmpl($('#message-detail-item'), data.messages[key]) );
                    }

                    // Cache users message
                    users_messages.setItem(that.slug, data.messages);
                    $('.js-mess-user-list').data('users-messages', users_messages);
                }
            });
        }else{
            $('.js-mess-list-content').html('');
            var messages = users_messages.getItem(that.slug);
            for ( key in messages ){
                $('.js-mess-list-content').prepend( $.tmpl($('#message-detail-item'), messages[key]) );
            }
        }

        /*
        To do: move scroll to bottom code here
        */
    };
    MessageList.prototype.triggerProgress = function($el, promise){
        $('.js-mess-loading').removeClass('hidden');
        var f        = function() {
            $('.js-mess-loading').addClass('hidden');
        };

        promise.then(f, f);
    };
    $(document).ready(function() {
        $('.js-mess-user-list').find('.js-mess-user-item').each(function(){
            new MessageList($(this));
        });

        $(document).bind('MESSAGE_LIST', function(e, $user_item) {
            new MessageList($user_item);
        });
    });
}(jQuery, document));

// Load list message by user
(function($, document, undefined) {
    function MessageFilter($el) {
        this.$el = $el;
        this.$searchText = $el.find('#message-search');
        this.$userListContainer = $el.find('.js-mess-user-list');
        this.$userMessageItems = this.$userListContainer.find('.user-message-li');
        this.$searchLoader = $el.find('.mesage-search-loader');
        this.attachEvents();
    };
    MessageFilter.prototype.attachEvents = function() {
        var that = this;

        if(!String.prototype.trim) {
          String.prototype.trim = function () {
            return this.replace(/^\s+|\s+$/g,'');
          };
        }
        that.$searchText.keyup(function(){
            that.$searchLoader.fadeIn(100);
            var key = $(this).val();
            if(key.trim().length == 0){
                that.$searchText.val('').focus();
                that.$userMessageItems.removeClass('hidden');
                that.$searchLoader.fadeOut(100);
                return;
            }
            that.$userMessageItems.addClass('hidden');
            var matchedItems = that.$userMessageItems.filter(function(index){
                return $(this).data('username').indexOf(key) >= 0;
            });            
            if(matchedItems.length > 0){
                matchedItems.removeClass('hidden');
            }
            that.$searchLoader.fadeOut(100);
        });
    };
    $(document).ready(function() {
        new MessageFilter($('#user-box'));    
    });
}(jQuery, document));

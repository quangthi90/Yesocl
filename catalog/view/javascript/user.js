function UserFunction()
{
    'use strict';
    
    this.showPopupUserList = function( users )
    {
        var usersViewer = $('<div id="#user-viewer-container"></div>');
        for (var key in users) {
            $.tmpl( $('#list-user-liked-template'), users[key]).appendTo(usersViewer);
        }
        bootbox.dialog({
            message: usersViewer.wrap('<div>').parent().html(),
            title: 'Who liked this post',
            onEscape: function(){
                bootbox.hideAll();
                $('.show-liked-list').removeClass('show-liked-list');
            }
        });
        $('.modal-backdrop').on('click', function(){
           bootbox.hideAll();
           $('.show-liked-list').removeClass('show-liked-list');
        });

        $(document).trigger('FRIEND_ACTION', [false]);
    };
}

window.userFunction = new UserFunction();
// Routing to generate url
function Routing( _routing )
{
    'use strict';

    var that = this;

    this.routing = new HashTable();
    
    for ( var key in _routing ){
        that.routing.setItem( key, _routing[key] );
    }
    
    // Generate url by name & params
    this.generate = function(name, params, method)
    {
        if ( typeof method == 'undefined' ){
            method = '';
        }
        var url = this.routing.getItem(name);
        
        for ( var key in params ){
            url = url.replace( '{' + key + '}', params[key] );
        }

        return $('base').attr('href') + method + url;
    };
}

// Object current User info
function User( _user )
{
    'use strict';

    var that = this;

    this.user = new HashTable();
    
    for ( var key in _user ){
        that.user.setItem( key, _user[key] );
    }
    
    this.get = function( value )
    {
        return that.user.getItem( value );
    };
}

function UserFunction()
{
    'use strict';
    
    this.showPopupUserList = function()
    {
        var usersViewer = $('#user-viewer-container');
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
    };
}

window.userFunction = new UserFunction();
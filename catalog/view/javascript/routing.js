// Routing to generate url
function Routing()
{
    var $routing = $('#list-routing').find('.routing');
    this.routing = new HashTable();
    
    for ( var key in $routing ){
        if ( $($routing[key]).data('page') == undefined ){
            break;
        }
        this.routing.setItem( $($routing[key]).data('page'), $($routing[key]).data('link') );
    }

    $('#list-routing').remove();
    
    // Generate url by name & params
    this.generate = function(name, params)
    {
        // console.log(this.routing);
        var url = this.routing.getItem(name);
        // console.log(url);
        for ( key in params ){
            url = url.replace( key, params[key] );
        }

        return url;
    }
}

var yRouting = new Routing();
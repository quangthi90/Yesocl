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

    $routing.remove();
    
    // Generate url by name & params
    this.generate = function(name, params)
    {
        var url = this.routing.getItem(name);
        
        for ( key in params ){
            url = url.replace( '{' + key + '}', params[key] );
        }

        return $('base').attr('href') + url;
    }
}

var yRouting = new Routing();
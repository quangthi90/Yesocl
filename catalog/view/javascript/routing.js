// Routing to generate url
function Routing( _routing )
{
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
        
        for ( key in params ){
            url = url.replace( '{' + key + '}', params[key] );
        }

        return $('base').attr('href') + method + url;
    }
}
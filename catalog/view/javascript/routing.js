// Routing to generate url
function Routing()
{
    var that = this;

    this.routing = new HashTable();
    
    var promise = $.ajax({
        type: 'POST',
        url:  $('base').attr('href') + 'ajax/service/get/routing/',
        dataType: 'json'
    });

    promise.then(function(data) {
        if ( data.success == 'ok' ){
            for ( var key in data.routing ){
                that.routing.setItem( key, data.routing[key] );
            }

            $(document).trigger('LOAD_ROUTING_COMPLETE');
        }
    });
    
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

window.yRouting = new Routing();
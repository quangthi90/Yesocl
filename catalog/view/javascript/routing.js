// Routing to generate url
function Routing()
{
    this.routing = [];
    
    var promise = $.ajax({
        type: 'POST',
        url:  $('base').attr('href') + 'ajax/get/routing/',
        dataType: 'json'
    });

    promise.then(function(data) {
        if ( data.success == 'ok' ){
            this.routing = data.routing;
        }
    });
    
    // Generate url by name & params
    this.generate = function(name, params)
    {
        var url = this.routing[name];
        
        for ( key in params ){
            url = url.replace( '{' + key + '}', params[key] );
        }

        return $('base').attr('href') + url;
    }
}

var yRouting = new Routing();
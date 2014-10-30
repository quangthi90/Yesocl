$(document).ready(function() {	

	//select all the a tag with name equal to modal
	$('a[name=modal]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		
		//Get the A tag
		var id = $(this).attr('href');
	
		//Get the screen height and width
		var overlayHeight = $(document).height();
		var overlayWidth = $(window).width();
	
		//Set heigth and width to overlay to fill up the whole screen
		$('#overlay').css({'width':overlayWidth,'height':overlayHeight});
		
		//transition effect		
		$('#overlay').fadeIn(1000);	
		$('#overlay').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(2000); 
	
	});
	
	//if close button is clicked
    $('.y-frm .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#overlay').hide();
		$('.y-frm').hide();
	});		
	
	//if overlay is clicked
	$('#overlay').click(function () {
		$(this).hide();
		$('.y-frm').hide();
	});	

	$(window).resize(function () {

	    var box = $('.y-frm'); 
        //Get the screen height and width
        var overlayHeight = $(document).height();
        var overlayWidth = $(window).width();
      
        //Set height and width to overlay to fill up the whole screen
        $('#overlay').css({'width':overlayWidth,'height':overlayHeight});
               
        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();

        //Set the popup window to center
        box.css('top',  winH/2 - box.height()/2);
        box.css('left', winW/2 - box.width()/2);
	 
	});	
	
});
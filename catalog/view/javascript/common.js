function getURLVar(urlVarName) {
	var urlHalves = String(document.location).toLowerCase().split('?');
	var urlVarValue = '';
	
	if (urlHalves[1]) {
		var urlVars = urlHalves[1].split('&');

		for (var i = 0; i <= (urlVars.length); i++) {
			if (urlVars[i]) {
				var urlVarPair = urlVars[i].split('=');
				
				if (urlVarPair[0] && urlVarPair[0] == urlVarName.toLowerCase()) {
					urlVarValue = urlVarPair[1];
				}
			}
		}
	}
	
	return urlVarValue;
} 

//Script Yesocl:
jQuery.fn.makeScroll = function () {
	//Calculate size of post:
	 calSizeForFeedItem();
	 //Put feeds:
	 putFeeds();
	 //Scroll:
	$(this).niceScroll();	

	//Windows resize:
	$(window).resize(function() {
		 putFeeds();		
	});
}

jQuery.fn.makeScrollWithoutCalResize = function() {
	$(this).niceScroll();	
}

function calSizeForFeedItem () {
	var feed = $('.feed');
	if(typeof feed == "undefined" || feed.length == 0)
		return;
	var width=0, height=0;
	for (var i = 0; i < feed.length; i++) {
		width = $(feed[i]).outerWidth();
		height = $(feed[i]).outerHeight();
		$(feed[i]).attr('data-width', width);
		$(feed[i]).attr('data-height', height);

		if(i == feed.length - 1) {
			$(feed[i]).addClass('last-feed');
		}
	};	
}	

function putFeeds () {		
	var listFeed = $('.has-horizontal').first();
	if(typeof listFeed == "undefined" || listFeed.length == 0){
		return;
	}

	var feed = $('.feed');
	if(typeof feed == "undefined" || feed.length == 0)
	{
		return;
	}
	var heightMain = $('#y-main-content').height();		
	var width=0, height=0, totalHeight = 0, totalWidth=0,columnIndex=0, columnId, newColoumn;

	//Remove all columns:
	$('.column').remove();

	for (var i = 0; i < feed.length; i++) {
		width = parseInt($(feed[i]).attr('data-width'), 10);
		height = parseInt($(feed[i]).attr('data-height'), 10);
		if(totalHeight == 0){
			columnId = 'column-' + columnIndex;
			newColoumn = $("<div class='column' id='" + columnId + "'></div>");
			newColoumn.width(width);
			newColoumn.height('100%');
			newColoumn.css('float','left');
			newColoumn.css('margin-right','25px');
			listFeed.append(newColoumn);
			totalWidth += width + 27;
		}
		if(totalHeight + height >= heightMain) {
			columnIndex ++;
			totalHeight = height;
			columnId = 'column-' + columnIndex;
			newColoumn = $("<div class='column' id='" + columnId + "'></div>");
			newColoumn.width(width);
			newColoumn.height('100%');
			newColoumn.css('float','left');
			newColoumn.css('margin-right','25px');
			listFeed.append(newColoumn);
			totalWidth += width + 27;
			$('#' + columnId).append(feed[i]);
		}else{
			totalHeight += height;			
			$('#' + columnId).append(feed[i]);
		}
	}

	$('.has-horizontal').width(totalWidth + 330);
}
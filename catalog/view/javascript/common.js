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

var feedSet;
//Script Yesocl:
jQuery.fn.makeScroll = function () {

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

function putFeeds () {		
	var listColumns = $('.has-horizontal').first();
	if(typeof listColumns == "undefined" || listColumns.length == 0){
		return;
	}

	feedSet = $('.feed'); 
	var heightMain = $('#y-main-content').height();		
	var width=0, height=0, totalHeight = 0, totalWidth=0,columnIndex=0, columnId, newColoumn;

	//Remove all columns:
	$('#y-main-content .column').remove(); 

	for (var i = 0; i < feedSet.length; i++) {
		width = $(feedSet[i]).outerWidth();
		height = $(feedSet[i]).outerHeight() + parseInt($(feedSet[i]).css('margin-bottom'));
		if(totalHeight == 0){
			columnId = 'column-' + columnIndex;
			newColoumn = $("<div class='column' id='" + columnId + "'></div>");
			newColoumn.width(width);
			newColoumn.height('100%');
			newColoumn.css('float','left');
			newColoumn.css('margin-right','25px');
			listColumns.append(newColoumn);
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
			listColumns.append(newColoumn);
			totalWidth += width + 27;
			$('#' + columnId).append(feedSet[i]);
		}else{
			totalHeight += height;			
			$('#' + columnId).append(feedSet[i]);
		}
	}

	$('.has-horizontal').width(totalWidth + 330);
}
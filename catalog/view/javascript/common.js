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

var mainContent;
var endFeed;
//Script Yesocl:
function autosizeMaincontent() {
	mainContent = $('#y-main-content');
	endFeed = $('#feed-end');

	if(typeof mainContent == "undefined" ||  typeof endFeed == "undefined") {
		return;
	}
	//get width of main-content:
	var widthContent = $('#y-content').outerWidth();
	var endLeftPosition = endFeed.position() != null ? endFeed.position().left : 0;
	if(endLeftPosition > widthContent) {
		mainContent.width(endLeftPosition);
	}
}

function makeScroll(item) {
	//Auto-size:
	autosizeMaincontent();
	//Scroll:
	$('#' + item).niceScroll();	
}

function makeScrollWithoutCalResize(item) {
	$('#' + item).niceScroll();	
}

function makeVerticalCommentBox() {
	$('#comment-box .y-box-content').niceScroll();		
}
var YesGlobal = YesGlobal || {};

(function($, ko, window, Y, undefined) {	

	function initZoomImageEvent(el){
		var src = el.data("zoom") ? el.data("zoom"): el.attr("src");
		var title = el.attr("title");
		var alt = el.attr("alt");

        el.on("click", function(){
            $.magnificPopup.open({
            	items: {
	           		src: src
	            },
	            type: 'image',
	            image: {
					verticalFit: true
				},
				closeBtnInside: false
            });
        });
	}

	function initImageGallery(el) {
		el.magnificPopup({
			delegate: 'a',
			type: 'image',
			closeOnContentClick: false,
			closeBtnInside: false,
			mainClass: 'mfp-with-zoom mfp-img-mobile',
			image: {
				verticalFit: true,
				titleSrc: function(item) {
					return item.el.attr('title');
				}
			},
			gallery: {
				enabled: true
			},
			zoom: {
				enabled: true,
				duration: 500,
				opener: function(element) {
					return element.find('img');
				}
			}
		});
	}

	function initSeemore(ele) {
		ele.expander({
            slicePoint: 800,
            widow: 2,
            expandSpeed: 100,
            expandText: '[...]',
            expandPrefix: ' ',
            userCollapseText: '[^^^]',
            userCollapsePrefix: ' ', 
            afterExpand: function(){
                ele.find(".readmore-details").css( { "display" : "inline" });
            }
        });
	}

	function initEmoticons(ele){
		var definition = {smile:{title:"Smile",codes:[":)",":=)",":-)"]},"sad-smile":{title:"Sad Smile",codes:[":(",":=(",":-("]},"big-smile":{title:"Big Smile",codes:[":D",":=D",":-D",":d",":=d",":-d"]},cool:{title:"Cool",codes:["8)","8=)","8-)","B)","B=)","B-)","(cool)"]},surprised:{title:"Surprised",codes:[":o",":=o",":-o",":O",":=O",":-O","(surprised)"]},wink:{title:"Wink",codes:[";)",";=)",";-)","(Wink)"]},crying:{title:"Crying",codes:[";(",";-(",";=("]},sweating:{title:"Sweating",codes:["(sweat)","(:|"]},speechless:{title:"Speechless",codes:[":|",":=|",":-|"]},kiss:{title:"Kiss",codes:[":*",":=*",":-*"]},"tongue-out":{title:"Tongue Out",codes:[":P",":=P",":-P",":p",":=p",":-p"]},blush:{title:"Blush",codes:["(blush)",":$",":-$",":=$",':">']},wondering:{title:"Wondering",codes:[":^)"]},sleepy:{title:"Sleepy",codes:["|-)","I-)","I=)","(snooze)"]},dull:{title:"Dull",codes:["|(","|-(","|=("]},"in-love":{title:"In love",codes:["(inlove)"]},"evil-grin":{title:"Evil grin",codes:["]:)",">:)","(grin)"]},talking:{title:"Talking",codes:["(talk)"]},yawn:{title:"Yawn",codes:["(yawn)","|-()"]},puke:{title:"Puke",codes:["(puke)",":&",":-&",":=&"]},doh:{title:"Doh!",codes:["(doh)"]},angry:{title:"Angry",codes:[":@",":-@",":=@","x(","x-(","x=(","X(","X-(","X=("]},"it-wasnt":{title:"It wasn't me",codes:["(wasntme)"]},party:{title:"Party!!!",codes:["(party)"]},worried:{title:"Worried",codes:[":S",":-S",":=S",":s",":-s",":=s"]},mmm:{title:"Mmm...",codes:["(mm)"]},nerd:{title:"Nerd",codes:["8-|","B-|","8|","B|","8=|","B=|","(nerd)"]},"lips-sealed":{title:"Lips Sealed",codes:[":x",":-x",":X",":-X",":#",":-#",":=x",":=X",":=#"]},hi:{title:"Hi",codes:["(hi)"]},call:{title:"Call",codes:["(call)"]},devil:{title:"Devil",codes:["(devil)"]},angel:{title:"Angel",codes:["(angel)"]},envy:{title:"Envy",codes:["(envy)"]},wait:{title:"Wait",codes:["(wait)"]},bear:{title:"Bear",codes:["(bear)","(hug)"]},"make-up":{title:"Make-up",codes:["(makeup)","(kate)"]},giggle:{title:"Covered Laugh",codes:["(giggle)","(chuckle)"]},clapping:{title:"Clapping Hands",codes:["(clap)"]},thinking:{title:"Thinking",codes:["(think)",":?",":-?",":=?"]},bow:{title:"Bow",codes:["(bow)"]},rofl:{title:"Rolling on the floor laughing",codes:["(rofl)"]},whew:{title:"Whew",codes:["(whew)"]},happy:{title:"Happy",codes:["(happy)"]},smirk:{title:"Smirking",codes:["(smirk)"]},nod:{title:"Nodding",codes:["(nod)"]},shake:{title:"Shaking",codes:["(shake)"]},punch:{title:"Punch",codes:["(punch)"]},emo:{title:"Emo",codes:["(emo)"]},yes:{title:"Yes",codes:["(y)","(Y)","(ok)"]},no:{title:"No",codes:["(n)","(N)"]},handshake:{title:"Shaking Hands",codes:["(handshake)"]},skype:{title:"Skype",codes:["(skype)","(ss)"]},heart:{title:"Heart",codes:["(h)","<3","(H)","(l)","(L)"]},"broken-heart":{title:"Broken heart",codes:["(u)","(U)"]},mail:{title:"Mail",codes:["(e)","(m)"]},flower:{title:"Flower",codes:["(f)","(F)"]},rain:{title:"Rain",codes:["(rain)","(london)","(st)"]},sun:{title:"Sun",codes:["(sun)"]},time:{title:"Time",codes:["(o)","(O)","(time)"]},music:{title:"Music",codes:["(music)"]},movie:{title:"Movie",codes:["(~)","(film)","(movie)"]},phone:{title:"Phone",codes:["(mp)","(ph)"]},coffee:{title:"Coffee",codes:["(coffee)"]},pizza:{title:"Pizza",codes:["(pizza)","(pi)"]},cash:{title:"Cash",codes:["(cash)","(mo)","($)"]},muscle:{title:"Muscle",codes:["(muscle)","(flex)"]},cake:{title:"Cake",codes:["(^)","(cake)"]},beer:{title:"Beer",codes:["(beer)"]},drink:{title:"Drink",codes:["(d)","(D)"]},dance:{title:"Dance",codes:["(dance)","\\o/","\\:D/","\\:d/"]},ninja:{title:"Ninja",codes:["(ninja)"]},star:{title:"Star",codes:["(*)"]},mooning:{title:"Mooning",codes:["(mooning)"]},middlefinger:{title:"Finger",codes:["(finger)"]},bandit:{title:"Bandit",codes:["(bandit)"]},drunk:{title:"Drunk",codes:["(drunk)"]},smoke:{title:"Smoking",codes:["(smoking)","(smoke)","(ci)"]},toivo:{title:"Toivo",codes:["(toivo)"]},rock:{title:"Rock",codes:["(rock)"]},headbang:{title:"Headbang",codes:["(headbang)","(banghead)"]},bug:{title:"Bug",codes:["(bug)"]},fubar:{title:"Fubar",codes:["(fubar)"]},poolparty:{title:"Poolparty",codes:["(poolparty)"]},swear:{title:"Swearing",codes:["(swear)"]},tmi:{title:"TMI",codes:["(tmi)"]},heidy:{title:"Heidy",codes:["(heidy)"]},myspace:{title:"MySpace",codes:["(MySpace)"]},malthe:{title:"Malthe",codes:["(malthe)"]},tauri:{title:"Tauri",codes:["(tauri)"]},priidu:{title:"Priidu",codes:["(priidu)"]}};
      	$.emoticons.define(definition);

      	//Init layout
      	if(ele.find(".emotion-show").length === 0){
      		ele.append("<a class='emotion-show'>Matcuoi</a>");
      	}
      	if(ele.find(".emotion-overview-list").length === 0){
      		ele.append("<div class='emotion-overview-list'></div>");
      	}

      	var triggerBtn = ele.find(".emotion-show");
      	var overviewList = ele.find(".emotion-overview-list").html($.emoticons.toString()).hide();
      	triggerBtn.on('click',function(){
			overviewList.slideToggle(500, function(){
				if(overviewList.css("display") === "none"){
					triggerBtn.removeClass("active");
					$("#message-overlay").remove();
				}else {
					triggerBtn.addClass("active");
					$("<div id='message-overlay'></div>").css({
						'position': 'absolute',
						'top': '0',
						'left': '0',
						'bottom': '0',
						'right': '0',
						'z-index': '998'
					}).appendTo(ele).on("click", function(){
						triggerBtn.trigger("click");
					});
				}
			});
		});
		overviewList.find('.emoticon').on('click', function(){
			var targetInput = ele.find("textarea");
			var sCode = $(this).html();
			var sOldText = targetInput.val();
			targetInput.val(sOldText + sCode).trigger("input");
		}); 
	}

	/*
	Custom KO Handlers
	*/
	function initBindingHanler(){
		ko.bindingHandlers.autoCompleteTag = {
		    init: function(element, valueAccessor, allBindingsAccessor) {
		    	var options = allBindingsAccessor().autoOptions;
		        $(element).select2({
		            multiple: options.multiple !== undefined ? options.multiple : true,
		            minimumInputLength: options.minimumInputLength || 1,
		            query: function (query) {
		            	var data = options.dataRequest(query);
		            	query.callback(data);	                    
		            },
		            formatResult: function(item, container, query) {
		            	if(options.formatResult && typeof options.formatResult == "function"){
		            		return options.formatResult(item);
		            	}
		            	return item.text;
		            },
		            formatSelection: function(item) { return item.text },
		            initSelection : function (element, callback) {
		                var data = [];
		                var value = $(element).val();
		                if(value){
		                    var tags = value.split(",");
		                    ko.utils.arrayForEach(tags, function(t){
		                        data.push({ id : t, text: t });
		                    });
		                }
		                callback(data);
		            }
		        });
				$(element).on("change", function(e){
					valueAccessor()($(this).select2("val"));			
				});
		    },
		    update: function(element, valueAccessor, allBindingsAccessor) {
		        if(valueAccessor()().length === 0){
		        	$(element).select2("val", "");
		        	return;
		        }
		        $(element).trigger("change");
		    }
		};
		ko.bindingHandlers.executeOnEnter = {
		    init: function (element, valueAccessor, allBindingsAccessor, viewModel) {
		        var allBindings = allBindingsAccessor();		        
		        $(element).keypress(function (e) {
		            var keyCode = (e.which ? e.which : e.keyCode);
		            var shiftKeyRequired = allBindings.shiftKeyRequired || false;
		            if (keyCode === 13 && e.shiftKey === !shiftKeyRequired) {
		            	e.preventDefault();
		                return allBindings.executeOnEnter.call(viewModel, viewModel, element);
		            }
		            return true;
		        });
		    }
		};
		ko.bindingHandlers.executeOnEscape = {
		    init: function (element, valueAccessor, allBindingsAccessor, viewModel) {
		        var allBindings = allBindingsAccessor();		        
		        $(element).keypress(function (e) {
		            var keyCode = (e.which ? e.which : e.keyCode);
		            if (keyCode === 27) {
		            	e.preventDefault();
		                return allBindings.executeOnEscape.call(viewModel, viewModel, element);
		            }
		            return true;
		        });
		    }
		};
		ko.bindingHandlers.link = {
		    init: function (element, valueAccessor, allBindingsAccessor, viewModel) {
		        var options = valueAccessor();
		        var href = Y.Routing.generate(options.route, options.params);
		        $(element).attr('href', href);
		        var textValue = ko.utils.unwrapObservable(options.text);
		        var titleValue = ko.utils.unwrapObservable(options.title);
		        if(textValue){
		            $(element).html(textValue);
		        }
		        if(titleValue){
		            $(element).attr('title', titleValue);    
		        }
		        if(options.isNewTab){
		            $(element).attr('target', '_blank');
		        }
		    },
		    update: function (element, valueAccessor, allBindingsAccessor, viewModel) {
		        var options = valueAccessor();
		        var textValue = ko.utils.unwrapObservable(options.text);
		        var titleValue = ko.utils.unwrapObservable(options.title);
		        if(textValue){
		            $(element).html(textValue);
		        }
		        if(titleValue){
		            $(element).attr('title', titleValue);    
		        }        
		    }
		}
		ko.bindingHandlers.timeAgo = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        var value = valueAccessor();
		        var timeValue = ko.utils.unwrapObservable(value);
		        if (timeValue) {
		            $(element).text(Y.Utils.convertToTimeAgo(timeValue));
		            $(element).attr('title', Y.Utils.convertDateToString(timeValue, "LLLL"));
		            $(element).data("timeValue", timeValue);
		            if(!$(element).hasClass("ago")) {
		            	$(element).addClass("ago");
		            }
		        } else {
		            $(element).text('-');
		        }
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        var value = valueAccessor();
		        var timeValue = ko.utils.unwrapObservable(value);
		        if (timeValue) {
		            $(element).text(Y.Utils.convertToTimeAgo(timeValue));
		            $(element).attr('title', Y.Utils.convertDateToString(timeValue, "LLLL"));
		            $(element).data("timeValue", timeValue);
		            if(!$(element).hasClass("ago")) {
		            	$(element).addClass("ago");
		            }
		        } else {
		            $(element).text('-');
		        }
		    }
		};
		ko.bindingHandlers.dateTimeText = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        var value = valueAccessor(), allBindings = allBindingsAccessor();
		        var dateFormat = allBindings.dateFormat || "LLLL";
		        var dateValue = ko.utils.unwrapObservable(value);
		        if (dateValue) {
		            $(element).text(Y.Utils.convertDateToString(dateValue, dateFormat));
		            $(element).attr("title", Y.Utils.convertDateToString(dateValue, dateFormat));
		        } else {
		            $(element).text('-');
		        }
		    }
		};
		ko.bindingHandlers.seeMore = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        initSeemore($(element));
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        initSeemore($(element));
		    }
		};
		ko.bindingHandlers.niceScroll = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		    	window.makeNiceScroll($(element));
		    	ko.utils.domNodeDisposal.addDisposeCallback(element, function() {
		            $(element).trigger(Y.Constants.Triggers.ELEMENT_REMOVED_BY_KO);
		        });
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        var acessor = valueAccessor();
		    	window.makeNiceScroll($(element));
		    	ko.utils.domNodeDisposal.addDisposeCallback(element, function() {
		            $(element).trigger(Y.Constants.Triggers.ELEMENT_REMOVED_BY_KO);
		        });
		    }
		};
		ko.bindingHandlers.emoticon = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        initEmoticons($(element));
		    }
		};
		ko.bindingHandlers.autoSize = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        $(element).autosize();
		        if(valueAccessor()()){
		        	$(element).trigger("autosize.resize");
		        }
		        $(element).on(Y.Constants.Triggers.INPUT_CONTENT_CHANGED, function() {
		        	$(element).trigger("autosize.resize");
		        });
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		    }
		};
		ko.bindingHandlers.mention = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        var observableAttr = valueAccessor();
		        $(element).mentionsInput({
		            onDataRequest: function (mode,currentMentionCollection,queryObj,callback) {
		                var query = queryObj.queryString;
		                var firstCharacter = queryObj.firstCharacter;
		                if(firstCharacter === "@") {
		                    Y.Utils.initUserListForTag(function(queryData){
		                        result = _.filter(queryData, function(item) {
		                            if(currentMentionCollection !== null && currentMentionCollection.length > 0) {
		                                var checkExisted = _.find(currentMentionCollection, function(tempItem){
		                                    return (item.id === tempItem.id);
		                                });
		                                if(checkExisted)
		                                    return false;
		                            }                   
		                            return item.name.toLowerCase().indexOf(query.toLowerCase()) > -1;
		                        });
		                        callback.call(this, _.first(result, 5));
		                    });
		                    return;
		                } 
		                if(firstCharacter === "$") {
		                    Y.Utils.initStockList(function(queryData){
		                        result = _.filter(queryData, function(item) {
		                            if(currentMentionCollection !== null && currentMentionCollection.length > 0) {
		                                var checkExisted = _.find(currentMentionCollection, function(tempItem){
		                                    return (item.code === tempItem.id);
		                                });
		                                if(checkExisted)
		                                    return false;
		                            }                   
		                            return item.code.toLowerCase().indexOf(query.toLowerCase()) > -1;
		                        });
		                        var lastResult = _.map(_.first(result, 5), function(obj) {
		                            return {
		                                id : obj.code,
		                                name: obj.code,
		                                wall: Y.Routing.generate("StockPage", { stock_code : obj.code }),
		                                type: "stock",
		                                avatar : "image/stock_icon.png"
		                            }
		                        });
		                        callback.call(this, lastResult);
		                    });
		                    return;
		                }        
		            },
		            onMentionChanged: function(){
		                var content = $(element).mentionsInput("val");
		                observableAttr(content);
		            },
		            fullNameTrigger: false
		        });
				var instance = $(element).data("mentionsInput");
				var initText = observableAttr();
				if(instance && initText) {
					instance.set(initText);
				}
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        var observableAttr = valueAccessor();
		        var resetHeight = allBindingsAccessor().resetHeight || 50;
		        if(observableAttr() === null || observableAttr() === undefined || observableAttr().length === 0){
		            $(element).mentionsInput("reset");
		            $(element).height(resetHeight);
		        }
		    }
		};
		ko.bindingHandlers.mention1 = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        var observableAttr = valueAccessor();
		        $(element).textntags({
		            onDataRequest: function (mode, query, triggerChar, callback) {
		                var query = query.toLowerCase();
		                if(triggerChar === "@") {
		                    Y.Utils.initUserListForTag(function(queryData){
		                        result = _.filter(queryData, function(item) {
		                            return item.name.toLowerCase().indexOf(query) > -1;
		                        });
		                        callback.call(this, _.first(result, 5));
		                    });
		                    return;
		                }
		                if(triggerChar === "$") {
		                    Y.Utils.initStockList(function(queryData){
		                        result = _.filter(queryData, function(item) {		                                            
		                            return item.code.toLowerCase().indexOf(query.toLowerCase()) > -1;
		                        });
		                        var lastResult = _.map(_.first(result, 5), function(obj) {
		                            return {
		                                id : obj.code,
		                                name: obj.code,
		                                wall: Y.Routing.generate("StockPage", { stock_code : obj.code }),
		                                type: "stock",
		                                avatar : "image/stock_icon.png"
		                            }
		                        });
		                        callback.call(this, lastResult);
		                    });
		                    return;
		                }      
		            }
		        });
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        var observableAttr = valueAccessor();
		        if(observableAttr().length === 0){
		            $(element).textntags("reset");
		            $(element).height(50).focus();
		        }
		    }
		};
		ko.bindingHandlers.zoomImageInContent = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        var imgList = $(element).find("img");
		        imgList.each(function(){
		            initZoomImageEvent($(this));
		        });
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        var value = ko.utils.unwrapObservable(valueAccessor());
		        var imgList = $(element).find("img");
		        imgList.each(function(){
		            initZoomImageEvent($(this));
		        });
		    }
		};
		ko.bindingHandlers.loadImage = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        initZoomImageEvent($(element));
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        initZoomImageEvent($(element));
		    }
		};
		ko.bindingHandlers.galleryImage = {
			init: function (element, valueAccessor, allBindingsAccessor) {
		        initImageGallery($(element));
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        initImageGallery($(element));
		    }
		};
		ko.bindingHandlers.uploader = new Y.Uploader();	
	}
	
	initBindingHanler();
	//End KO custom handlers	
	
})(jQuery, ko, window, YesGlobal);
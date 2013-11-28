(function($, document, undefined) {
    var carouselEle = $('#myCarousel');
	function RegisterComplete($element) {
		this.$el = $element;
		this.step1 = new RegisterCompleteStep1($element.find('.register-step1'));
	}

	function RegisterCompleteStep1($element) {
		this.$el = $element;
		this.$inputLocation = $element.find('input[name=\"location\"]');

		this.attachEvents();
	}

	RegisterCompleteStep1.prototype.attachEvents = function () {
		var that = this;

		this.$el.find('input[name=\"current\"]').click(function () {
			if ($(this).val() == 2) {
				that.$el.find('.employed-input').remove();
				that.$el.find('.job-seeker-input').remove();
				that.$el.find('.student-input').remove();
				that.$el.find('#current-input-step1').after($.tmpl($('#employed-inputs')));
			}else if ($(this).val() == 0) {
				that.$el.find('.employed-input').remove();
				that.$el.find('.job-seeker-input').remove();
				that.$el.find('.student-input').remove();
				that.$el.find('#current-input-step1').after($.tmpl($('#job-seeker-inputs')));
			}else if ($(this).val() == 1) {
				that.$el.find('.employed-input').remove();
				that.$el.find('.job-seeker-input').remove();
				that.$el.find('.student-input').remove();
				that.$el.find('#current-input-step1').after($.tmpl($('#student-inputs')));
			}

			new RegisterCompleteStep1(that.$el);
		});

		this.$el.find('input[name=\"company[name]\"]').typeahead({
            source: function (query, process) {
                that.$el.find('input[name=\"company[id]\"]').val('0');

            	companyList = [];
                map = {};      
                		
            	$.ajax({
            		type: 'GET',
            		url: that.$el.find('input[name=\"company[name]\"]').data('url'),
            		data: { 'filter_name': query },
            		dataType: 'json',
            		success: function ( json ) {
            			if ( json.success == 'ok' ) {
				            $.each(json.companies, function (i, item) {
				            	if ( companyList.indexOf(item.name) == -1 ) {
					                companyList.push(item.name);
					                map[item.name] = item;
				            	}
				            });
                			process(companyList);
            			}
            		},
            		error: function (xhr, error) {
            			alert(xhr.responseText);
            		},
            	});
            },
            updater: function (item) {
                var selectedCompany = map[item];
                that.$el.find('input[name=\"company[id]\"]').val(selectedCompany.id);
                return selectedCompany.name;
            },
            matcher: function (item) {
                return true;
            },
            /*sorter: function (items) {
                return items.sort();
            },
            highlighter: function (item) {
                var selectedCompany = map[item];
                var regex = new RegExp( '(' + this.query + ')', 'gi' );
                var boldItem = selectedCompany.name.replace( regex, "<strong>$1</strong>" );
                var htmlContent = '<div class="friend-dropdown-info">'
                                + '<img src="' + selectedFriend.avatar + '" alt="" />'
                                + '<div class="friend-meta-info">'
                                + '<span class="friend-name">' + boldItem + '</span>' 
                                + '<span class="num-friend">' + selectedFriend.numFriend + '</span>'   
                                + '</div>'
                                + '</div>';
                return htmlContent;
            }*/
        });

		this.$el.find('input[name=\"company[title]\"]').typeahead({
            source: function (query, process) {
            	titleList = [];
                map = {};      
                		
            	$.ajax({
            		type: 'GET',
            		url: that.$el.find('input[name=\"company[title]\"]').data('url'),
            		data: { 'keyword': query },
            		dataType: 'json',
            		success: function ( json ) {
				        $.each(json, function (i, item) {
				           	if ( titleList.indexOf(item.name) == -1 ) {
					            titleList.push(item.name);
					            map[item.name] = item;
				            }
				        });
                		process(titleList);
            		},
            		error: function (xhr, error) {
            			alert(xhr.responseText);
            		},
            	});
            },
            updater: function (item) {
                var selectedTitle = map[item];
                return selectedTitle.name;
            },
            matcher: function (item) {
                return true;
            },
        });

		this.$el.find('input[name=\"school[name]\"]').typeahead({
            source: function (query, process) {
                that.$el.find('input[name=\"school[id]\"]').val('0');

            	schoolList = [];
                map = {};      
                		
            	$.ajax({
            		type: 'GET',
            		url: that.$el.find('input[name=\"school[name]\"]').data('url'),
            		data: { 'keyword': query },
            		dataType: 'json',
            		success: function ( json ) {
				        $.each(json, function (i, item) {
				           	if ( schoolList.indexOf(item.name) == -1 ) {
					            schoolList.push(item.name);
					            map[item.name] = item;
				            }
				        });
                		process(schoolList);
            		},
            		error: function (xhr, error) {
            			alert(xhr.responseText);
            		},
            	});
            },
            updater: function (item) {
                var selectedSchool = map[item];
                that.$el.find('input[name=\"school[id]\"]').val(selectedSchool.id);
                return selectedSchool.name;
            },
            matcher: function (item) {
                return true;
            },
        });

		this.$el.find('input[name=\"school[fieldofstudy]\"]').typeahead({
            source: function (query, process) {
            	fieldofstudyList = [];
                map = {};      
                		
            	$.ajax({
            		type: 'GET',
            		url: that.$el.find('input[name=\"school[fieldofstudy]\"]').data('url'),
            		data: { 'keyword': query },
            		dataType: 'json',
            		success: function ( json ) {
				        $.each(json, function (i, item) {
				           	if ( fieldofstudyList.indexOf(item.name) == -1 ) {
					            fieldofstudyList.push(item.name);
					            map[item.name] = item;
				            }
				        });
                		process(fieldofstudyList);
            		},
            		error: function (xhr, error) {
            			alert(xhr.responseText);
            		},
            	});
            },
            updater: function (item) {
                var selectedFieldOfStudt = map[item];
                return selectedFieldOfStudt.name;
            },
            matcher: function (item) {
                return true;
            },
        });

		this.$el.find('input[name=\"industry\"]').typeahead({
            source: function (query, process) {
                that.$el.find('input[name=\"industry_id\"]').val('0');

            	industryList = [];
                map = {};      
                		
            	$.ajax({
            		type: 'GET',
            		url: that.$el.find('input[name=\"industry\"]').data('url'),
            		data: { 'keyword': query },
            		dataType: 'json',
            		success: function ( json ) {
				        $.each(json, function (i, item) {
				           	if ( industryList.indexOf(item.name) == -1 ) {
					            industryList.push(item.name);
					            map[item.name] = item;
				            }
				        });
                		process(industryList);
            		},
            		error: function (xhr, error) {
            			alert(xhr.responseText);
            		},
            	});
            },
            updater: function (item) {
                var selectedIndustry = map[item];
                that.$el.find('input[name=\"industry_id\"]').val(selectedIndustry.id);
                return selectedIndustry.name;
            },
            matcher: function (item) {
                return true;
            },
        });

		this.$inputLocation.typeahead({
            source: function (query, process) {
            	that.$el.find('input[name=\"city_id\"]').val('0');

            	locationList = [];
                map = {};      
                		
            	$.ajax({
            		type: 'GET',
            		url: that.$inputLocation.data('url'),
            		data: { 'keyword': query },
            		dataType: 'json',
            		success: function ( json ) {
				        $.each(json, function (i, item) {
				           	if ( locationList.indexOf(item.name) == -1 ) {
					            locationList.push(item.name);
					            map[item.name] = item;
				            }
				        });
                		process(locationList);
            		},
            		error: function (xhr, error) {
            			alert(xhr.responseText);
            		},
            	});
            },
            updater: function (item) {
                var selectedLocation = map[item];
                that.$el.find('input[name=\"city_id\"]').val(selectedLocation.id);
                return selectedLocation.name;
            },
            matcher: function (item) {
                return true;
            },
        });

		this.$el.find('#btn-finished-step1').click(function () {
			if (that.validate()) {
                carouselEle.carousel('next');
                setTimeout(function(){
                    carouselEle.carousel('pause');
                }, 500);
			}else {
				carouselEle.carousel('pause');
			}
		});
	}

	RegisterCompleteStep1.prototype.validate = function () {
		var that = this;
		var error = true;

		this.$el.find('.yes-warning').remove();

		var location = $.trim(this.$inputLocation.val());
		if (location.length == 0) {
			error = false;
			that.$inputLocation.after($.tmpl($('#yes-warning-tpl'), { 'error': that.$el.data('error-field-required') }));
		}else if (location.length < 3 || location.length > 127) {
			error = false;
			that.$inputLocation.after($.tmpl($('#yes-warning-tpl'), { 'error':  that.$el.data('error-location') }));
		}

		return error;
	}

	$(function(){
		new RegisterComplete($('#y-main-content'));
	});
}(jQuery, document));
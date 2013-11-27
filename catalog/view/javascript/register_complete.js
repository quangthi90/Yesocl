(function($, document, undefined) {
	function RegisterComplete($element) {
		this.$el = $element;
		this.step1 = new RegisterCompleteStep1($element.find('.register-step1'));
	}

	function RegisterCompleteStep1($element) {
		this.$el = $element;

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

		this.$el.find('input[name=\"school[name]\"]').typeahead({
            source: function (query, process) {
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
	}

	$(function(){
		new RegisterComplete($('#y-main-content'));
	});
}(jQuery, document));
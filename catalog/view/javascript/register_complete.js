(function($, document, undefined) {
    var carouselEle = $('#myCarousel');
    
	function RegisterComplete($element) {
		this.$el = $element;
		this.step1 = new RegisterCompleteStep1($element.find('.register-step1'));
	}

    function RegisterCompleteStep1($element) {
        this.$el = $element;
        this.$inputLocation = $element.find('input[name=\"location\"]');
        this.$inputPostalCode = $element.find('input[name=\"postal_code\"]');

        this.attachEvents();
    }

    RegisterCompleteStep1.prototype.attachEvents = function () {
        var that = this;

        this.$el.find('input[name=\"current\"]').click(function () {
            if (that.$el.find('input[name=\"current\"]:checked').val() == '2') {
                that.$el.find('.employed-input').toggleClass('hide', false);
                that.$el.find('.job-seeker-input').toggleClass('hide', true);
                that.$el.find('.student-input').toggleClass('hide', true);
            }else if (that.$el.find('input[name=\"current\"]:checked').val() == '0') {
                that.$el.find('.employed-input').toggleClass('hide', true);
                that.$el.find('.job-seeker-input').toggleClass('hide', false);
                that.$el.find('.student-input').toggleClass('hide', true);
            }else if (that.$el.find('input[name=\"current\"]:checked').val() == '1') {
                that.$el.find('.employed-input').toggleClass('hide', true);
                that.$el.find('.job-seeker-input').toggleClass('hide', true);
                that.$el.find('.student-input').toggleClass('hide', false);
            }
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
                that.submit($(this));
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

        var location = '';
        var city_id = '';
        var postal_code = '';
        var current = '';
        var company_name = '';
        var company_id = '';
        var company_title = '';
        var company_start_month = '';
        var company_start_year = '';
        var company_self_employed = '';
        var school_id = '';
        var school_name = '';
        var school_fieldofstudy = '';
        var school_start = '';
        var school_end = '';
        var industry = '';
        var industry_id = '';

        this.$el.find('.yes-warning').remove();

        location = $.trim(this.$inputLocation.val());
        city_id = $.trim(this.$el.find('input[name=\"city_id\"]').val());
        if (location.length == 0) {
            error = false;
            that.$inputLocation.after($.tmpl($('#yes-warning-tpl'), { 'error': that.$el.data('error-field-required') }));
        }else if (location.length < 3 || location.length > 127) {
            error = false;
            that.$inputLocation.after($.tmpl($('#yes-warning-tpl'), { 'error':  that.$el.data('error-location') }));
        }

        postal_code = $.trim(this.$inputPostalCode.val());
        if (postal_code.length != 0 && !/^[0-9]{3,5}$/.test(postal_code)) {
            error = false;
            that.$inputPostalCode.after($.tmpl($('#yes-warning-tpl'), { 'error':  that.$el.data('error-postal-code') }));
        }

        current = this.$el.find('input[name=\"current\"]:checked').val();
        if (current == '2') {
            var $inputCompanyName = this.$el.find('input[name=\"company[name]\"]');
            var $inputCompanyTitle = this.$el.find('input[name=\"company[title]\"]');
            company_id = this.$el.find('input[name=\"company[id]\"]').val();
            company_name = $inputCompanyName.val();
            if (company_name.length == 0) {
                error = false;
                $inputCompanyName.after($.tmpl($('#yes-warning-tpl'), { 'error': that.$el.data('error-field-required') }));
            }else if (company_name.length < 3 || company_name.length > 127) {
                error = false;
                $inputCompanyName.after($.tmpl($('#yes-warning-tpl'), { 'error':  that.$el.data('error-company-name') }));
            }
            company_title = $inputCompanyTitle.val();
            if (company_title.length == 0) {
                error = false;
                $inputCompanyTitle.after($.tmpl($('#yes-warning-tpl'), { 'error': that.$el.data('error-field-required') }));
            }else if (company_title.length < 3 || company_title.length > 127) {
                error = false;
                $inputCompanyTitle.after($.tmpl($('#yes-warning-tpl'), { 'error':  that.$el.data('error-company-title') }));
            }
            company_self_employed = (this.$el.find('input[name=\"company[self_employed]\"]').attr('checked') === 'checked') ? 1 : 0;
            company_start_month = this.$el.find('input[name=\"company[start][month]\"]').val();
            company_start_year = this.$el.find('input[name=\"company[start][year]\"]').val();
        }else if (current == '1') {
            var $inputSchoolName = this.$el.find('input[name=\"school[name]\"]');
            var $inputSchoolFieldOfStudy = this.$el.find('input[name=\"school[fieldofstudy]\"]');
            school_id = this.$el.find('input[name=\"school[id]\"]').val();
            school_name = $inputSchoolName.val();
            if (school_name.length == 0) {
                error = false;
                $inputSchoolName.after($.tmpl($('#yes-warning-tpl'), { 'error': that.$el.data('error-field-required') }));
            }else if (school_name.length < 3 || school_name.length > 127) {
                error = false;
                $inputSchoolName.after($.tmpl($('#yes-warning-tpl'), { 'error':  that.$el.data('error-school-name') }));
            }
            school_fieldofstudy = $inputSchoolFieldOfStudy.val();
            if (school_fieldofstudy.length == 0) {
                error = false;
                $inputSchoolFieldOfStudy.after($.tmpl($('#yes-warning-tpl'), { 'error': that.$el.data('error-field-required') }));
            }else if (school_fieldofstudy.length < 3 || school_fieldofstudy.length > 127) {
                error = false;
                $inputSchoolFieldOfStudy.after($.tmpl($('#yes-warning-tpl'), { 'error':  that.$el.data('error-school-fieldofstudy') }));
            }
            school_start = this.$el.find('input[name=\"school[start]\"]').val();
            school_end= this.$el.find('input[name=\"school[end]\"]').val();
        }else {
            var $inputIndustry = this.$el.find('input[name=\"industry\"]');
            industry_id = this.$el.find('input[name=\"industry_id\"]').val();
            industry = $inputIndustry.val();
            if (industry.length == 0) {
                error = false;
                $inputIndustry.after($.tmpl($('#yes-warning-tpl'), { 'error': that.$el.data('error-field-required') }));
            }else if (industry.length < 3 || industry.length > 127) {
                error = false;
                $inputIndustry.after($.tmpl($('#yes-warning-tpl'), { 'error':  that.$el.data('error-industry') }));
            }
        }

        if (error) {
            this.data = {
                'location': location,
                'city_id': city_id,
                'postal_code': postal_code,
                'current': current,
                'company_id': company_id,
                'company_name': company_name,
                'company_title': company_title,
                'company_start_month': company_start_month,
                'company_start_year': company_start_year,
                'company_self_employed': company_self_employed,
                'school_id': school_id,
                'school_name': school_name,
                'school_fieldofstudy': school_fieldofstudy,
                'school_start': school_start,
                'school_end': school_end,
                'industry': industry,
                'industry_id': industry_id,
            };
        }

        return error;
    }

    RegisterCompleteStep1.prototype.submit = function ($button) {
        var that = this;

        var promise = $.ajax({
            type: 'POST',
            url:  this.$el.data('url'),
            data: this.data,
            dataType: 'json',
        });

        this.triggerProcess($button, promise);

        promise.then(function(data) {
            if ( data.message != 'success' ) {
                
            }else {
                alert(data.message);
            }
        });
    }

    RegisterCompleteStep1.prototype.triggerProcess = function ($el, promise) {
        var $spinner = $('<i class="icon-refresh icon-spin"></i>');
        var f        = function() {
            $spinner.remove();
            $el.removeClass('disabled');
        };
        
        $el.addClass('disabled');

        promise.then(f, f);
    }

    $(function(){
        new RegisterComplete($('#y-main-content'));
    });
}(jQuery, document));
(function($, document, undefined) {
    var carouselEle = $('#myCarousel');
    
	function RegisterComplete($element) {
		this.$el = $element;
		this.step1 = new RegisterCompleteStep1($element.find('.register-step1'));
        this.step2 = new RegisterCompleteStep2($element.find('.register-step2'));
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
                that.$el.find('.job-seeker-input').toggleClass('hide', true);
                that.$el.find('.student-input').toggleClass('hide', true);
                that.$el.find('.employed-input').toggleClass('hide', false);
            }else if (that.$el.find('input[name=\"current\"]:checked').val() == '0') {
                that.$el.find('.employed-input').toggleClass('hide', true);
                that.$el.find('.student-input').toggleClass('hide', true);
                that.$el.find('.job-seeker-input').toggleClass('hide', false);
            }else if (that.$el.find('input[name=\"current\"]:checked').val() == '1') {
                that.$el.find('.employed-input').toggleClass('hide', true);
                that.$el.find('.job-seeker-input').toggleClass('hide', true);
                that.$el.find('.student-input').toggleClass('hide', false);
            }
        });

        new AutocompleteRegister(that.$el.find('input[name=\"company[name]\"]'), that.$el.find('input[name=\"company[name]\"]').data('url'), 'filter_name', 'name', that.$el.find('input[name=\"company[id]\"]'), 'id');
        new AutocompleteRegister(that.$el.find('input[name=\"mscompany[name]\"]'), that.$el.find('input[name=\"mscompany[name]\"]').data('url'), 'filter_name', 'name', that.$el.find('input[name=\"mscompany[id]\"]'), 'id');

        new AutocompleteRegister(that.$el.find('input[name=\"company[title]\"]'), that.$el.find('input[name=\"company[title]\"]').data('url'), 'keyword', 'name', null, '');
        new AutocompleteRegister(that.$el.find('input[name=\"mscompany[title]\"]'), that.$el.find('input[name=\"mscompany[title]\"]').data('url'), 'keyword', 'name', null, '');

        new AutocompleteRegister(that.$el.find('input[name=\"school[name]\"]'), that.$el.find('input[name=\"school[name]\"]').data('url'), 'keyword', 'name', that.$el.find('input[name=\"school[id]\"]'), 'id');

        new AutocompleteRegister(that.$el.find('input[name=\"school[fieldofstudy]\"]'), that.$el.find('input[name=\"school[fieldofstudy]\"]').data('url'), 'keyword', 'name', null, '');

        new AutocompleteRegister(that.$inputLocation, that.$inputLocation.data('url'), 'keyword', 'name', that.$el.find('input[name=\"city_id\"]'), 'id');

        this.$el.find('#btn-finished-step1').click(function () {
            if (that.validate()) {
                that.submit($(this));
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
        var mscompany_name = '';
        var mscompany_id = '';
        var mscompany_title = '';
        var mscompany_start_month = '';
        var mscompany_start_year = '';
        var mscompany_end_month = '';
        var mscompany_end_year = '';
        var mscompany_self_employed = '';
        var school_id = '';
        var school_name = '';
        var school_fieldofstudy = '';
        var school_start = '';
        var school_end = '';

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
            company_start_month = this.$el.find('select[name=\"company[start][month]\"]').val();
            company_start_year = this.$el.find('select[name=\"company[start][year]\"]').val();
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
            school_start = this.$el.find('select[name=\"school[start]\"]').val();
            school_end= this.$el.find('select[name=\"school[end]\"]').val();
        }else {
            var $inputCompanyName = this.$el.find('input[name=\"mscompany[name]\"]');
            var $inputCompanyTitle = this.$el.find('input[name=\"mscompany[title]\"]');
            mscompany_id = this.$el.find('input[name=\"mscompany[id]\"]').val();
            mscompany_name = $inputCompanyName.val();
            if (company_name.length == 0) {
                error = false;
                $inputCompanyName.after($.tmpl($('#yes-warning-tpl'), { 'error': that.$el.data('error-field-required') }));
            }else if (company_name.length < 3 || company_name.length > 127) {
                error = false;
                $inputCompanyName.after($.tmpl($('#yes-warning-tpl'), { 'error':  that.$el.data('error-company-name') }));
            }
            mscompany_title = $inputCompanyTitle.val();
            if (company_title.length == 0) {
                error = false;
                $inputCompanyTitle.after($.tmpl($('#yes-warning-tpl'), { 'error': that.$el.data('error-field-required') }));
            }else if (company_title.length < 3 || company_title.length > 127) {
                error = false;
                $inputCompanyTitle.after($.tmpl($('#yes-warning-tpl'), { 'error':  that.$el.data('error-company-title') }));
            }
            mscompany_self_employed = (this.$el.find('input[name=\"mscompany[self_employed]\"]').attr('checked') === 'checked') ? 1 : 0;
            mscompany_start_month = this.$el.find('select[name=\"mscompany[start][month]\"]').val();
            mscompany_start_year = this.$el.find('select[name=\"mscompany[start][year]\"]').val();
            mscompany_end_month = this.$el.find('select[name=\"mscompany[end][month]\"]').val();
            mscompany_end_year = this.$el.find('select[name=\"mscompany[end][year]\"]').val();
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
                'mscompany_id': mscompany_id,
                'mscompany_name': mscompany_name,
                'mscompany_title': mscompany_title,
                'mscompany_start_month': mscompany_start_month,
                'mscompany_start_year': mscompany_start_year,
                'mscompany_end_month': mscompany_end_month,
                'mscompany_end_year': mscompany_end_year,
                'mscompany_self_employed': mscompany_self_employed,
                'school_id': school_id,
                'school_name': school_name,
                'school_fieldofstudy': school_fieldofstudy,
                'school_start': school_start,
                'school_end': school_end,
            };
        }

        return error;
    }

    RegisterCompleteStep1.prototype.submit = function ($button) {
        var that = this;

        /*var promise = $.ajax({
            type: 'POST',
            url:  this.$el.data('url'),
            data: this.data,
            dataType: 'json',
            error: function(xhr, error) {
                alert(xhr.responseText);
            }
        });

        this.triggerProcess($button, promise);*/

        //promise.then(function(data) {
        //    if ( data.message != 'success' ) {
        //        carouselEle.carousel('pause');
        //    }else {
                carouselEle.carousel('next');
                setTimeout(function(){
                    carouselEle.carousel('pause');
                }, 500);
        //    }
        //});
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

    function RegisterCompleteStep2($element) {
        this.$el = $element;

        this.$btnGetYahooMail = $element.find('.btn-get-yahoo-mail');
        //this.$btnGetGMail = $element.find('.btn-get-g-mail');

        this.attachEvents();
    }

    RegisterCompleteStep2.prototype.attachEvents = function() {
        var that = this;

        this.$btnGetYahooMail.click(function() {
            window.open(that.$el.data('yahoocnt'), '_parent ','directories=no, location=no, titlebar=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=600,height=280,top=200,left=200');
        });
    }

    function AutocompleteRegister($label_input, url, filter_label , label, $value_input, value) {
        this.url = url;
        this.filter_label = filter_label;
        this.$label_input = $label_input;
        this.label = label;
        this.$value_input = $value_input;
        this.value = value;

        this.attachEvents();
    }

    AutocompleteRegister.prototype.attachEvents = function () {
        var that = this;

        this.$label_input.typeahead({
            source: function (query, process) {
                if (that.$value_input != null) {
                    that.$value_input.val('');
                }

                aDataList = [];
                jMapper = {};   
                data = {};
                data[that.filter_label] = query;
                        
                $.ajax({
                    type: 'GET',
                    url: that.url,
                    data: data,
                    dataType: 'json',
                    success: function ( json ) {
                        $.each(json, function (i, item) {
                            if ( aDataList.indexOf(item[that.label]) == -1 ) {
                                aDataList.push(item[that.label]);
                                jMapper[item[that.label]] = item;
                            }
                        });
                        process(aDataList);
                    },
                    error: function (xhr, error) {
                        alert(xhr.responseText);
                    },
                });
            },
            updater: function (item) {
                var selectedItem = jMapper[item];
                if (that.$value_input != null) {
                    that.$value_input.val(selectedItem[that.value]);
                }
                return selectedItem[that.label];
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
    }

    $(function(){
        new RegisterComplete($('#y-main-content'));
        

    });
}(jQuery, document));

        getFriendList = function(data) {console.log(data);
            if (data.success == 'ok') {
                if (data.type == 'yahoo') {

                }else if (data.type == 'gmail') {

                }
            }
        }
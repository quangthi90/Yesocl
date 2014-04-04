// Form controller generate view (html)
function FormController() {
    'use strict';

    function FormViewModel() {
        var self = this;

        self.image = ko.observable( null );
        self.title = ko.observable( null );
        self.content = ko.observable( null );
        self.id = ko.observable( null );
        self.is_edit = ko.observable( false );

        function FormModel(_form) {
            var self = this;

            self.image = ko.observable( _form.image );
            self.title = ko.observable( _form.title );
            self.content = ko.observable( _form.content );
            self.id = ko.observable( _form.id );
            self.is_edit = ko.observable( true );
        }

        self.setForm = function(_form) {
            // console.log(_form);
            self.form = new FormModel(_form);
        };
    }
    var $postFormTemplate = document.getElementById('js-advance-post');
    ko.cleanNode($postFormTemplate);
    var formModelView = new FormViewModel();
    ko.applyBindings(formModelView, $postFormTemplate);

    this.setForm = function(_form) {
        if ( _form === null || _form === undefined ){
            formModelView.setForm({
                title: null,
                content: null,
                image: null,
                id: null
            });
        }else{
            formModelView.setForm(_form);
        }
    };
}
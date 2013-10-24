{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/account/profiles/tabs/information.tpl' %}
{% use '@template/default/template/account/profiles/tabs/background.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('libs/bootstrap-formhelpers.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset_css('profiles.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
	<div id="y-main-content">
		{{ block('profiles_tabs_information') }}
		{{ block('profiles_tabs_background') }}
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript" src="{{ asset_js('libs/bootstrap-formhelpers-datepicker.en_US.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/bootstrap-formhelpers-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/bootstrap-formhelpers-phone.format.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/bootstrap-formhelpers-phone.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('profiles.js') }}"></script>
<script id="background-skill-item" type="text/x-jquery-tmpl">
    <div class="profiles-tabs-item2 btn" data-id="${ id }" data-remove="${ remove }">${ skill }<a class="btn-remove profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
</script>
<script type="text/javascript">
	function addScroll(warper, column, width, height) {
		$(warper).outerWidth(width);
		$(warper + ' ' + column).outerHeight(height);
		$(warper + ' ' + column).niceScroll();
	}

	$(document).ready( function () {
		$('#y-content').niceScroll();
	} );

	window.onresize=function() {
		window.setTimeout('location.reload()', 1);
	};
</script>
{% endblock %}
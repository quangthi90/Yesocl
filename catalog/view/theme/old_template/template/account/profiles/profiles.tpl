{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/common/html_block.tpl' %}
{% use '@template/default/template/account/profiles/tabs/information.tpl' %}
{% use '@template/default/template/account/profiles/tabs/background.tpl' %}
{% use '@template/default/template/account/profiles/tabs/profile_overview_edit.tpl' %}

{% block title %}Yesocl - {% trans %}Edit Profile{% endtrans %}{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('libs/bootstrap-formhelpers.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset_css('profiles.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
	<div id="y-main-content">
		{{ block('profiles_tabs_profile_overview_edit') }}
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
<script type="text/javascript">
	$(document).ready( function () {
		$('#y-content').niceScroll();
	});
</script>
{% endblock %}
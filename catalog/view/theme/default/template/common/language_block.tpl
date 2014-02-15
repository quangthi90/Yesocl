{% block common_language_block %}
	{% set language_code = get_cookie('language') %}
	<div id="language-data" data-locale-code="{% if get_cookie('language') == '' %}vi{% else %}{{ language_code }}{% endif %}" class="hidden">
		<div id="language-data-time" 
			data-text-suffixago="{% trans %}ago{% endtrans %}" 
			data-text-suffixfrommow="{% trans %}from now{% endtrans %}"
			data-text-seconds="{% trans %}less than a minute{% endtrans %}"
			data-text-minute="{% trans %}about a minute{% endtrans %}"
			data-text-minutes="%d {% trans %}minutes{% endtrans %}"
			data-text-hour="{% trans %}about an hour{% endtrans %}"
			data-text-hours="%d {% trans %}hours{% endtrans %}"
			data-text-day="{% trans %}about a day{% endtrans %}"
			data-text-days="% {% trans %}days{% endtrans %}"
			data-text-month="{% trans %}about a month{% endtrans %}"
			data-text-months="%d {% trans %}months{% endtrans %}"
			data-text-year="{% trans %}about a year{% endtrans %}"
			data-text-years="%d {% trans %}years{% endtrans %}">
		</div>
	</div>
{% endblock %}
{# -- End Language -- #}
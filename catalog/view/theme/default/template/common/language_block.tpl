{% block common_language_block %}
	{% set language_code = get_cookie('language') %}
	<div id="language-data" data-locale-code="{% if get_cookie('language') == '' %}vi{% else %}language_code{% endif %}" style="display: none;">
		<div id="language-data-time" 
			data-text-suffixago="trước" 
			data-text-suffixfrommow="cách đây"
			data-text-seconds="chưa tới 1 phút"
			data-text-minute="khoảng 1 phút"
			data-text-minutes="%d phút "
			data-text-hour="khoảng 1 giờ"
			data-text-hours="%d giờ"
			data-text-day="khoảng 1 ngày"
			data-text-days="% ngày"
			data-text-month="khoảng 1 tháng"
			data-text-months="%d tháng"
			data-text-year="khoảng 1 năm"
			data-text-years="%d năm">
		</div>
	</div>
{% endblock %}
{# -- End Language -- #}
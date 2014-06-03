{% use '@template/default/template/post/common/ko_post_item.tpl' %}

{% block post_common_ko_post_item_wall %}
	<!-- ko if: newsList().length > 0 -->
		<!-- ko foreach: newsList() -->
			{{ block('post_common_ko_post_item') }}
	    <!-- /ko -->
	<!-- /ko -->
{% endblock %}
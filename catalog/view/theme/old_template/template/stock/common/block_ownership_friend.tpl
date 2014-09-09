{% block stock_common_block_ownership_friend %}
<div class="feed-block stock-block">
    <div class="block-header">
        <h3 class="block-title">{% trans %}Fund ownership friend{% endtrans %} <i class="icon-caret-right"></i></h3>
    </div>
    <div class="block-content">
        <div class="vertical-content">
        	<table class="table table-striped funds-table">
			 <thead>
			 	<tr>
			 		<td class="funds">{% trans %}Funds{% endtrans %}</td>
			 		{% for fund in funds %}
			 		<td class="star-rating">{{ fund.name }}</td>
			 		{% endfor %}
			 	</tr>
			 </thead>
			 <tbody>
			 	{% set stock_funds = stock.meta.funds %}
			 	{% for name, fund_details in stock_funds %}
			 	<tr>
			 		<td class="funds">{{ name }}</td>
			 		{% for type, value in fund_details %}
			 		<td class="star-rating">
			 			{% if type == fund_types.rating %}
			 				{% for i in 1..value %}
			 			<i class="icon-star"></i>
			 				{% endfor %}
				 			{% if value < 5 %}
				 				{% for i in 4..value %}
			 			<i class="icon-star-empty"></i>
				 				{% endfor %}
				 			{% endif %}
			 			{% endif %}

			 			{% if type == fund_types.buying %}
			 				{% if value == 'buying' %}
			 			<i class="icon-circle-arrow-up"  style="color: green;"></i>&nbsp; {% trans %}Buying{% endtrans %}
			 				{% else %}
			 			<i class="icon-circle-arrow-down"  style="color: red;"></i>&nbsp; {% trans %}Selling{% endtrans %}
			 				{% endif %}
			 			{% endif %}

			 			{% if type == fund_types.percent %}
			 				{{ value }}%
			 			{% endif %}
			 		</td>
			 		{% endfor %}
			 	</tr>
			 	{% endfor %}
			 </tbody>
			</table>
        </div>
    </div>
</div>
{% endblock %}
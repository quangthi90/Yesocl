{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}Sign up for Yesocl{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/register.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1 row-fluid">
	<div class="main-content-bommer">
    {% for i in 1..15 %}
    {% set height = random([200, 300, 100, 50, 400]) %}
    <div class="box-demo" data-height="{{ height }}" style="height: {{ height }}px;"></div>
    {% endfor %}
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
var screen_height = $(window).height();
var content_height = screen_height - 96;

setHeight();

column();

function setHeight(){
	$('#y-sidebar').attr('style', 'height: ' + screen_height + 'px;');
	$('#y-content').attr('style', 'height: ' + content_height + 'px;');
}

function column(){
	var column_count = parseInt($('.main-content-bommer').css('-moz-column-count'), 10) + 1;
	if ( $('.main-content-bommer').height() > content_height ){
		$('.main-content-bommer').attr('style', '-moz-column-count: ' + column_count);
	}else{
		return false;
	}

	var error = false;
	$('.box-demo').each(function(){
		if ( $(this).width() > 310 ){
			var this_height = $(this).attr('data-height');
			$(this).attr('style', 'margin-top: ' + content_height + 'px; height: ' + this_height + 'px;');
			error = true;
		}
	});

	if ( error == true ){
		column();
	}

	var width_total = column_count * 310;
	$('.main-content-bommer').attr('style', 'width:' + width_total + 'px;');
}
</script>
{% endblock %}
{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}Sign up for Yesocl{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/register.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1 row-fluid">
	<div class="main-content-bommer">
    {% for i in 1..10 %}
    <div class="box-demo"></div>
    {% endfor %}
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
setHeight();

function setHeight(){
	var screen_height = 655;
	$('#y-sidebar').height(screen_height);
	$('#y-content').height(screen_height - 96);
}

column();

function column(){
	var column_count = parseInt($('.main-content-bommer').css('-webkit-column-count'), 10) + 1;
	var error = false;
	if ( $('.main-content-bommer').height() > 655 ){
		$('.main-content-bommer').attr('style', '-webkit-column-count: ' + column_count);
		column();
		error = true;
	}

	$('.box-demo').each(function(){
		if ( $(this).width() > 310 ){
			$('.main-content-bommer').attr('style', '-webkit-column-count: ' + column_count);
			column();
			error = true;
		}
	});

	if ( error == false ){
		var width = column_count * 310;
		$('.main-content-bommer').css({'width': width});
	}
}
</script>
{% endblock %}
{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/account/register/tabs/step1.tpl' %}
{% use '@template/default/template/account/register/tabs/step2.tpl' %}
{% use '@template/default/template/account/register/tabs/step3.tpl' %}
{% use '@template/default/template/account/register/tabs/step4.tpl' %}
{% use '@template/default/template/account/register/tabs/step5.tpl' %}

{% block title %}Sign up for Yesocl{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/register.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
	<div id="y-main-content">
		<div id="myCarousel" class="carousel slide">
		  	<!-- Carousel items -->
		  	<div class="carousel-inner">
		  		<div class="active item">
		  			{{ block('register_tabs_step1') }}
				</div>
				<div class="item">
					{{ block('register_tabs_step2') }}
				</div>
				<div class="item">
					{{ block('register_tabs_step3') }}
				</div>
				<div class="item">
					{{ block('register_tabs_step4') }}
				</div>
				<div class="item">
					{{ block('register_tabs_step5') }}
				</div>
		  	</div>
		  	<!-- Carousel nav -->
		  	<!--a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		  	<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a-->
		</div>
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
jQuery(document).ready(function (){
	
	$('#myCarousel').on('slid', function(){
		$(this).carousel('pause');
	});
});
</script>
{{ block('register_tabs_step1_javascript') }}
{{ block('register_tabs_step2_javascript') }}
{{ block('register_tabs_step3_javascript') }}
{{ block('register_tabs_step4_javascript') }}
{{ block('register_tabs_step5_javascript') }}
{% endblock %}

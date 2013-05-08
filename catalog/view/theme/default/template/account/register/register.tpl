{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/account/register/tabs/step1.tpl' %}

{% block title %}Sign up for Yesocl{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/register.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1 row-fluid">
	<div id="y-main-content">
		<div id="myCarousel" class="carousel slide">
		  	<!-- Carousel items -->
		  	<div class="carousel-inner">
		  		<div class="active item">
		  			{{ block('register_tabs_step1') }}
				</div>
				<div class="item">
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
	updateContentSize();

	function updateContentSize(){
		var wid = $(window).height();
		var hwid = $('#y-header').innerHeight();
		var fwid = $('#y-footer').innerHeight();

		// Main content height
		var mwid = wid - hwid - fwid - 10;
		$('#y-main-content').height( mwid );

		// Register box auto margin-top
		var rwid = $('.register-box').innerHeight();
		$('.register-box').attr('style', 'margin-top:' + (mwid / 2 - rwid / 2) + 'px;');

		// Register box extend
		var stwid = $('.register-box-step').innerHeight();
		$('.register-box-extend').height( stwid - 60 );
	} 
	
	$(window).resize(function() {
		updateContentSize();
	}); 
});

{{ block('register_tabs_step1_javascript') }}

</script>
{% endblock %}
{% extends '@template/default/template/common/layout_feed.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/profiles.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
	<div id="y-main-content">
		<div id="profiles-tabs-basic-infor" class="profiles-tabs">
			<div class="span7">
				<div class="row-fluid profiles-tabs-header">
					<div class="span5 profiles-tabs-title">BASIC INFORMATION</div>
					<a href="#"><i class="icon-chevon-sign-right"></i></a>
				</div>

				<div class="row-fluid profiles-tabs-main">
					<a class="btn profiles-btn-edit"><i class="icon-pencil"></i></a>

					<div class="clear"></div>

					<div class="row-fluid">
						<div class="span2 offset1">Fullname</div>
						<div class="span9">Le Van Bap</div>
					</div>

					<div class="row-fluid">
						<div class="span2 offset1">Email</div>
						<div class="span9">abcd@gmail.com</div>
					</div>

					<div class="row-fluid">
						<div class="span2 offset1">Phone</div>
						<div class="span9">0123456789</div>
					</div>

					<div class="row-fluid">
						<div class="span2 offset1">Sex</div>
						<div class="span9">Male</div>
					</div>

					<div class="row-fluid">
						<div class="span2 offset1">Birthday</div>
						<div class="span9">June, 26</div>
					</div>

					<div class="row-fluid profiles-line"></div>

					<div class="row-fluid">
						<div class="span2 offset1">Living</div>
						<div class="span9">Ho Chi Minh City</div>
					</div>

					<div class="row-fluid">
						<div class="span2 offset1">Interest</div>
						<div class="span9">Footbal/TV</div>
					</div>

					<div class="row-fluid">
						<div class="span2 offset1">Descripntion</div>
						<div class="span9">Lorem ipsum dolor sit amet, ne tale atqui similique mel. Quo no nullam tibique albucius, duo alterum convenire gubergren ex. Errem legendos eu nam, vis ei graeci commodo intellegam. Te quo omnes malorum, duo adolescens abhorreant intellegam ne. Modus dicam reprimique ne vix. In altera referrentur voluptatibus nec.</div>
					</div>
				</div>
			</div>
		</div>

		<div id="profiles-tabs-background" class="profiles-tabs">
			<div class="profiles-tabs-header">
				<div class="span7">
					<div class="row-fluid">
						<div class="profiles-tabs-title span5">Background</div>
					</div>
				</div>

				<div class="clear"></div>
			</div>

			<ul class="profiles-tabs-list">
				<li class="profiles-tabs-list-item">
					<div class="profiles-tabs-main span7">
						<div class="profiles-tabs-list-item-header row-fluid">
							<a href="#" class="btn span3">Sumary</a>
							<a href="#" class="btn profiles-btn-edit"><i class="icon-pencil"></i></a>
						</div>

						<div class="row-fluid">
							<div class="profiles-tabs-list-item-content">
								<p>Lorem ipsum dolor sit amet, graeco mentitum eu usu. Ad eos wisi illud maiestatis, ad pro suscipit intellegebat, nibh albucius mandamus eam cu. Et eam putent menandri, duo magna essent indoctum ei, vim possim delicata ea. Ei esse dolor perfecto usu, ex ius timeam utamur. Et duis semper detracto his, commodo molestiae eum ad. At tota solet quo, has cu utinam graece accommodare.</p>
								<p>Soleat recusabo at pri. Ad sed possim contentiones. In eam posse efficiendi. Case abhorreant te usu, sanctus salutatus id vix. Fabellas deserunt definitiones ne usu, mel reque equidem no.</p>
								<p>Hinc porro movet ex mei, ut everti explicari patrioque sit. Summo consetetur et quo. Eu dicat fastidii his, eam eius delenit id. Ut nostro detraxit qui, libris postulant nam ei, lorem definiebas reprimique mea ad.</p>
								<p>Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.</p>
							</div>
						</div>
					</div>
				</li>

				<li class="profiles-tabs-list-item">
					<div class="profiles-tabs-main span7">
						<div class="profiles-tabs-list-item-header row-fluid">
							<a href="#" class="btn">Experience</a>
							<a href="#" class="btn profiles-btn-edit"><i class="icon-pencil"></i></a>
						</div>

						<div class="row-fluid">
							<ul class="profiles-tabs-list-item-content">
								<li class="profile-tabslist-item-content-item">
									<div class="profile-tabslist-item-content-item-label">From Junly 13th to now</div>
									<div class="profile-tabslist-item-content-item-content">
										<p>PG</p>
										<p>NTT Data VN</p>
										<p>Information Technology</p>
									</div>
								</li>

								<li class="profile-tabslist-item-content-item">
									<div class="profile-tabslist-item-content-item-label">From Junly 13th to now</div>
									<div class="profile-tabslist-item-content-item-content">
										<p>PG</p>
										<p>NTT Data VN</p>
										<p>Information Technology</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</li>

				<li class="profiles-tabs-list-item">
					<div class="profiles-tabs-main span7">
						<div class="profiles-tabs-list-item-header row-fluid">
							<a href="#" class="btn">Skills & Expertise</a>
							<a href="#" class="btn profiles-btn-edit"><i class="icon-pencil"></i></a>
						</div>

						<div class="row-fluid"></div>
					</div>
				</li>

				<li class="profiles-tabs-list-item">
					<div class="profiles-tabs-main span7">
						<div class="profiles-tabs-list-item-header row-fluid">
							<a href="#" class="btn">Education</a>
							<a href="#" class="btn profiles-btn-edit"><i class="icon-pencil"></i></a>
						</div>

						<div class="row-fluid"></div>
					</div>
				</li>

				<li id="feed-end" class="profiles-tabs-list-item"></li>
			</ul>
		</div> 
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
	var mainContent;
	var bgHeader;
	var bgContent;
	var endFeed;
	//Script Yesocl:
	function reautosizeMaincontent() {
		mainContent = $('#y-main-content');
		bgHeader = $('#profiles-tabs-background .profiles-tabs-header');
		bgContent = $('#profiles-tabs-background .profiles-tabs-list');
		endFeed = $('#feed-end');

		if(typeof mainContent == "undefined" ||  typeof endFeed == "undefined") {
			return;
		}
		//get width of main-content:
		var widthContent = $('#y-content').outerWidth();
		var endLeftPosition = endFeed.position() != null ? endFeed.position().left : 0;
		if(endLeftPosition > widthContent) {
			bgHeader.width(endLeftPosition);
			bgContent.width(endLeftPosition);
			mainContent.width(endLeftPosition);
		}
	}

	function remakeScroll(item) {
		//Auto-size:
		//reautosizeMaincontent();
		//alert($('#feed-end').position().left);
		//alert($('#profiles-tabs-background .profiles-tabs-list').attr('columnCount');
		$('#y-main-content').width(3600);
		//$('#profiles-tabs-background .profiles-tabs-list').height($('#y-content').height() - 51);
		$('#profiles-tabs-background .profiles-tabs-list').width(2046);
		//Scroll:
		$('#' + item).niceScroll();	
	}

	$(document).ready(function() {
		//MakeScroll:
		remakeScroll('y-content');
		//$('#y-main-content').height($('#y-main-content').height());
		//$('#y-main-content').width(4100);
		//$('#profiles-tabs-background .profiles-tabs-list').width(2600);
		//$('#profiles-tabs-background .profiles-tabs-list').height(600);	
	});	
	window.onresize=function() {
		//remakeScroll('y-content');	
	};
</script>
{% endblock %}
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
					<div class="span7">
						<div class="profiles-tabs-list-item-header row-fluid">
							<a href="#" class="btn span3" onclick="alert($('#y-content').height());alert($('#profiles-tabs-background .profiles-tabs-list').height());">Sumary</a>
							<a href="#" class="btn profiles-btn-edit"><i class="icon-pencil"></i></a>
						</div>
					</div>
				</li>

				<li class="profiles-tabs-list-item">
					<div class="span7">
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
					<div class="span7">
						<div class="profiles-tabs-list-item-header row-fluid">
							<a href="#" class="btn span3">Experience</a>
							<a href="#" class="btn profiles-btn-edit"><i class="icon-pencil"></i></a>
						</div>
					</div>
				</li>

				<li class="profiles-tabs-list-item">
					<div class="span7">
						<div class="row-fluid">
							<div class="profile-tabslist-item-content-item-label">From Junly 13th to now</div>
							<div class="profile-tabslist-item-content-item-content">
								<p>PG</p>
								<p>NTT Data VN</p>
								<p>Information Technology</p>
							</div>
						</div>
					</div>
				</li>

				<li class="profiles-tabs-list-item">
					<div class="span7">
						<div class="row-fluid">
							<div class="profile-tabslist-item-content-item-label">From Junly 13th to now</div>
							<div class="profile-tabslist-item-content-item-content">
								<p>PG</p>
								<p>NTT Data VN</p>
								<p>Information Technology</p>
							</div>
						</div>
					</div>
				</li>

				<li class="profiles-tabs-list-item">
					<div class="span7">
						<div class="row-fluid">
							<div class="profile-tabslist-item-content-item-label">From Junly 13th to now</div>
							<div class="profile-tabslist-item-content-item-content">
								<p>PG</p>
								<p>NTT Data VN</p>
								<p>Information Technology</p>
							</div>
						</div>
					</div>
				</li>

				<li class="profiles-tabs-list-item">
					<div class="span7">
						<div class="row-fluid">
							<div class="profile-tabslist-item-content-item-label">From Junly 13th to now</div>
							<div class="profile-tabslist-item-content-item-content">
								<p>PG</p>
								<p>NTT Data VN</p>
								<p>Information Technology</p>
							</div>
						</div>
					</div>
				</li>

				<li class="profiles-tabs-list-item">
					<div class="span7">
						<div class="profiles-tabs-list-item-header row-fluid">
							<a href="#" class="btn span3">Skills & Expertise</a>
							<a href="#" class="btn profiles-btn-edit"><i class="icon-pencil"></i></a>
						</div>
					</div>
				</li>

				<li class="profiles-tabs-list-item">
					<div class="span7">
						<div class="profiles-tabs-list-item-header row-fluid">
							<a href="#" class="btn span3">Education</a>
							<a href="#" class="btn profiles-btn-edit"><i class="icon-pencil"></i></a>
						</div>
					</div>
				</li>

				<li class="profiles-tabs-list-item">
					<div class="span7">
						<div class="row-fluid">
							<div class="profile-tabslist-item-content-item-label">From 2008 to 2012</div>
							<div class="profile-tabslist-item-content-item-content">
								<p>HCM City University of Science</p>
								<p>Bachelor</p>
								<p>Information Technology</p>
							</div>
						</div>
					</div>
				</li>

				<li class="profiles-tabs-list-item">
					<div class="span7">
						<div class="row-fluid">
							<div class="profile-tabslist-item-content-item-label">From 2008 to 2012</div>
							<div class="profile-tabslist-item-content-item-content">
								<p>HCM City University of Science</p>
								<p>Bachelor</p>
								<p>Information Technology</p>
							</div>
						</div>
					</div>
				</li>

				<li class="profiles-tabs-list-item">
					<div class="span7">
						<div class="row-fluid">
							<div class="profile-tabslist-item-content-item-label">From 2008 to 2012</div>
							<div class="profile-tabslist-item-content-item-content">
								<p>HCM City University of Science</p>
								<p>Bachelor</p>
								<p>Information Technology</p>
							</div>
						</div>
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
	function remakeScroll(item) {
		var backgroundWidth = ($('#profiles-tabs-background .profiles-tabs-list-item').width() + 15)*(parseInt($('#profiles-tabs-background .profiles-tabs-list').height()/$('#y-main-content').height()) + 1);
		var mainWidth = backgroundWidth + 730;
		//Auto-size:
		$('#profiles-tabs-background .profiles-tabs-list').width(backgroundWidth);
		$('#y-main-content').width(mainWidth);
		//Scroll:
		$('#' + item).niceScroll();
	}

	$(document).ready(function() {
		//MakeScroll:
		remakeScroll('y-content');	
	});	
	window.onresize=function() {
		remakeScroll('y-content');	
	};
</script>
{% endblock %}
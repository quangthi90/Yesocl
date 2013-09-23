{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('profiles.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
	<div id="y-main-content">
		<div id="profiles-tabs-information" class="profiles-tabs" data-url="{{ link_update_profiles }}">
			<div class="profiles-tabs-header">
				<div class="span7">
					<div class="row-fluid">
						<div class="span5 profiles-tabs-title"><i class="icon-list"></i> Basic Information</div>
						<div class="pull-right profiles-btn-next"><a href="#"><i class="icon-chevron-right"></i></a></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="profiles-tabs-main">
				<div class="span7">
					<div class="row-fluid">
						<div class="profiles-tabs-main-header">
							<a class="profiles-btn-edit viewers btn profiles-btn pull-right"><i class="icon-pencil"></i></a>
							<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="clear"></div>
						</div>
						<div class="profiles-tabs-main-body">
							<div class="row-fluid input-group">
								<div class="span2 offset1">Fullname</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.fullname }}</span>
									<input class="profiles-tabs-input editors" type="text" placeholder="Input Text" name="fullname" value="{{ user.fullname }}" />
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Email</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.email }}</span>
									<input class="profiles-tabs-input editors" type="text" placeholder="Input Text" name="email" value="{{ user.email }}" />
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Phone</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">0123456789</span>
									<input class="profiles-tabs-input editors" type="text" placeholder="Input Text" name="phone" value="0123456789" />
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Sex</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.sex }}</span>
									<select class="profiles-tabs-input editors" name="gender">
										<option value="1" {% if user.sex_num == 1 %}selected="selected"{% endif %}>Male</option>
										<option value="2" {% if user.sex_num != 1 %}selected="selected"{% endif %}>Female</option>
									</select>
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Birthday</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.birthday|date('d/m/Y') }}</span>
									<input class="profiles-tabs-input editors" type="text" name="birthday" value="{{ user.birthday|date('d/m/Y') }}" />
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Address</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.address }}</span>
									<input class="profiles-tabs-input editors" type="text" placeholder="Input Text" name="address" value="{{ user.address }}" />
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Living</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.location }}</span>
									<input class="profiles-tabs-input editors" type="text" placeholder="Input Text" name="location" value="{{ user.location }}" />
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Industry</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.industry }}</span>
									<input class="profiles-tabs-input editors" type="text" placeholder="Input Text" name="industry" value="{{ user.industry }}" />
								</div>
							</div>
						</div>
					</div>		
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div id="profiles-tabs-background" class="profiles-tabs">
			<div class="profiles-tabs-header">
				<div class="span7">
					<div class="row-fluid">
						<div class="profiles-tabs-title span5"><i class="icon-list"></i> Background</div>
					</div>
				</div>
				<div class="pull-right profiles-btn-next"><a href="#"><i class="icon-chevron-right"></i></a></div>
				<div class="clear"></div>
			</div>

			<div id="profiles-tabs-background-sumary" class="profiles-tabs-main pull-left">
				<div class="profiles-tabs-main-header">
					<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i>  Sumary</a>
					<a class="profiles-btn-edit viewers btn profiles-btn pull-right"><i class="icon-pencil"></i></a>
					<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
					<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
					<div class="clear"></div>
				</div>

				<div class="input-group">
				<div class="profiles-tabs-main-body viewers">Lorem ipsum dolor sit amet, graeco mentitum eu usu. Ad eos wisi illud maiestatis, ad pro suscipit intellegebat, nibh albucius mandamus eam cu. Et eam putent menandri, duo magna essent indoctum ei, vim possim delicata ea. Ei esse dolor perfecto usu, ex ius timeam utamur. Et duis semper detracto his, commodo molestiae eum ad. At tota solet quo, has cu utinam graece accommodare.
Lorem ipsum dolor sit amet, graeco mentitum eu usu. Ad eos wisi illud maiestatis, ad pro suscipit intellegebat, nibh albucius mandamus eam cu. Et eam putent menandri, duo magna essent indoctum ei, vim possim delicata ea. Ei esse dolor perfecto usu, ex ius timeam utamur. Et duis semper detracto his, commodo molestiae eum ad. At tota solet quo, has cu utinam graece accommodare.
Soleat recusabo at pri. Ad sed possim contentiones. In eam posse efficiendi. Case abhorreant te usu, sanctus salutatus id vix. Fabellas deserunt definitiones ne usu, mel reque equidem no.
Hinc porro movet ex mei, ut everti explicari patrioque sit. Summo consetetur et quo. Eu dicat fastidii his, eam eius delenit id. Ut nostro detraxit qui, libris postulant nam ei, lorem definiebas reprimique mea ad.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
				</div>
				<div>
					<textarea class="profiles-tabs-main-body editors">Lorem ipsum dolor sit amet, graeco mentitum eu usu. Ad eos wisi illud maiestatis, ad pro suscipit intellegebat, nibh albucius mandamus eam cu. Et eam putent menandri, duo magna essent indoctum ei, vim possim delicata ea. Ei esse dolor perfecto usu, ex ius timeam utamur. Et duis semper detracto his, commodo molestiae eum ad. At tota solet quo, has cu utinam graece accommodare.
Lorem ipsum dolor sit amet, graeco mentitum eu usu. Ad eos wisi illud maiestatis, ad pro suscipit intellegebat, nibh albucius mandamus eam cu. Et eam putent menandri, duo magna essent indoctum ei, vim possim delicata ea. Ei esse dolor perfecto usu, ex ius timeam utamur. Et duis semper detracto his, commodo molestiae eum ad. At tota solet quo, has cu utinam graece accommodare.
Soleat recusabo at pri. Ad sed possim contentiones. In eam posse efficiendi. Case abhorreant te usu, sanctus salutatus id vix. Fabellas deserunt definitiones ne usu, mel reque equidem no.
Hinc porro movet ex mei, ut everti explicari patrioque sit. Summo consetetur et quo. Eu dicat fastidii his, eam eius delenit id. Ut nostro detraxit qui, libris postulant nam ei, lorem definiebas reprimique mea ad.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.
Ex his rebum summo probatus. Mel magna graeci reprimique cu, probo ancillae qualisque an mel. Lorem dolore quo cu. Eu populo albucius sensibus vis, nam magna vitae officiis id. Mea no altera probatus, solum detracto ex ius. Quo te quodsi oportere posidonium, ei vim illud omnesque percipitur.</textarea>
				</div>
				</div>
			</div>
			<div id="profiles-tabs-background-education" class="profiles-tabs-main pull-left">
				<div class="profiles-tabs-main-header">
					<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> Education</a>
					<a class="profiles-btn-add btn profiles-btn pull-right"><i class="icon-plus"></i></a>
					<div class="clear"></div>
				</div>
				<div class="profiles-tabs-main-body">
					<div class="profiles-tabs-item1">
						<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">Junly 13th</span><input class="profiles-tabs-input" type="text" value="Junly 13th" /> to <span class="profiles-tabs-value">now</span><input class="profiles-tabs-input" type="text" value="now" /></div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
							<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
							<a class="profiles-btn-cancel profiles-tabs-input btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save profiles-tabs-input btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="profiles-tabs-value">
								<div class="profiles-tabs-value-item">Bachelor</div>
								<div class="profiles-tabs-value-item">HCM City University of Science</div>
								<div class="profiles-tabs-value-item">Information Technology</div>
							</div>
							<div class="profiles-tabs-input">
								<div><input class="profiles-tabs-input" type="text" value="HCM City University of Science" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Bachelor" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Information Technology" /></div>
							</div>
						</div>
					</div>
					
					<div class="profiles-tabs-item1">
						<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">Junly 13th</span><input class="profiles-tabs-input" type="text" value="Junly 13th" /> to <span class="profiles-tabs-value">now</span><input class="profiles-tabs-input" type="text" value="now" /></div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
							<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
							<a class="profiles-btn-cancel profiles-tabs-input btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save profiles-tabs-input btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="profiles-tabs-value">
								<div class="profiles-tabs-value-item">Bachelor</div>
								<div class="profiles-tabs-value-item">HCM City University of Science</div>
								<div class="profiles-tabs-value-item">Information Technology</div>
							</div>
							<div class="profiles-tabs-input">
								<div><input class="profiles-tabs-input" type="text" value="HCM City University of Science" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Bachelor" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Information Technology" /></div>
							</div>
						</div>
					</div>
					
					<div class="profiles-tabs-item1">
						<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">Junly 13th</span><input class="profiles-tabs-input" type="text" value="Junly 13th" /> to <span class="profiles-tabs-value">now</span><input class="profiles-tabs-input" type="text" value="now" /></div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
							<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
							<a class="profiles-btn-cancel profiles-tabs-input btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save profiles-tabs-input btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="profiles-tabs-value">
								<div class="profiles-tabs-value-item">Bachelor</div>
								<div class="profiles-tabs-value-item">HCM City University of Science</div>
								<div class="profiles-tabs-value-item">Information Technology</div>
							</div>
							<div class="profiles-tabs-input">
								<div><input class="profiles-tabs-input" type="text" value="HCM City University of Science" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Bachelor" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Information Technology" /></div>
							</div>
						</div>
					</div>
					
					<div class="profiles-tabs-item1">
						<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">Junly 13th</span><input class="profiles-tabs-input" type="text" value="Junly 13th" /> to <span class="profiles-tabs-value">now</span><input class="profiles-tabs-input" type="text" value="now" /></div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
							<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
							<a class="profiles-btn-cancel profiles-tabs-input btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save profiles-tabs-input btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="profiles-tabs-value">
								<div class="profiles-tabs-value-item">Bachelor</div>
								<div class="profiles-tabs-value-item">HCM City University of Science</div>
								<div class="profiles-tabs-value-item">Information Technology</div>
							</div>
							<div class="profiles-tabs-input">
								<div><input class="profiles-tabs-input" type="text" value="HCM City University of Science" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Bachelor" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Information Technology" /></div>
							</div>
						</div>
					</div>
					
					<div class="profiles-tabs-item1">
						<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">Junly 13th</span><input class="profiles-tabs-input" type="text" value="Junly 13th" /> to <span class="profiles-tabs-value">now</span><input class="profiles-tabs-input" type="text" value="now" /></div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
							<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
							<a class="profiles-btn-cancel profiles-tabs-input btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save profiles-tabs-input btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="profiles-tabs-value">
								<div class="profiles-tabs-value-item">Bachelor</div>
								<div class="profiles-tabs-value-item">HCM City University of Science</div>
								<div class="profiles-tabs-value-item">Information Technology</div>
							</div>
							<div class="profiles-tabs-input">
								<div><input class="profiles-tabs-input" type="text" value="HCM City University of Science" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Bachelor" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Information Technology" /></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="profiles-tabs-background-experience" class="profiles-tabs-main pull-left">
				<div class="profiles-tabs-main-header">
					<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> Experience</a>
					<a class="profiles-btn-add btn profiles-btn pull-right"><i class="icon-plus"></i></a>
					<div class="clear"></div>
				</div>
				<div class="profiles-tabs-main-body">
					<div class="profiles-tabs-item1">
						<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">Junly 13th</span><input class="profiles-tabs-input" type="text" value="Junly 13th" /> to <span class="profiles-tabs-value">now</span><input class="profiles-tabs-input" type="text" value="now" /></div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
							<a class="profiles-btn-edit profiles-tabs-value btn profiles-btn pull-right"><i class="icon-pencil"></i></a>
							<a class="profiles-btn-cancel profiles-tabs-input btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save profiles-tabs-input btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="profiles-tabs-value">
								<div class="profiles-tabs-value-item">PG</div>
								<div class="profiles-tabs-value-item">NTT Data VN</div>
								<div class="profiles-tabs-value-item">Information Technology</div>
							</div>
							<div class="profiles-tabs-input">
								<div><input class="profiles-tabs-input" type="text" value="PG" /></div>
								<div><input class="profiles-tabs-input" type="text" value="NTT Data VN" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Information Technology" /></div>
							</div>
						</div>
					</div>

					<div class="profiles-tabs-item1">
						<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">Junly 13th</span><input class="profiles-tabs-input" type="text" value="Junly 13th" /> to <span class="profiles-tabs-value">now</span><input class="profiles-tabs-input" type="text" value="now" /></div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
							<a class="profiles-btn-edit profiles-tabs-value btn profiles-btn pull-right"><i class="icon-pencil"></i></a>
							<a class="profiles-btn-cancel profiles-tabs-input btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save profiles-tabs-input btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="profiles-tabs-value">
								<div class="profiles-tabs-value-item">PG</div>
								<div class="profiles-tabs-value-item">NTT Data VN</div>
								<div class="profiles-tabs-value-item">Information Technology</div>
							</div>
							<div class="profiles-tabs-input">
								<div><input class="profiles-tabs-input" type="text" value="PG" /></div>
								<div><input class="profiles-tabs-input" type="text" value="NTT Data VN" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Information Technology" /></div>
							</div>
						</div>
					</div>

					<div class="profiles-tabs-item1">
						<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">Junly 13th</span><input class="profiles-tabs-input" type="text" value="Junly 13th" /> to <span class="profiles-tabs-value">now</span><input class="profiles-tabs-input" type="text" value="now" /></div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
							<a class="profiles-btn-edit profiles-tabs-value btn profiles-btn pull-right"><i class="icon-pencil"></i></a>
							<a class="profiles-btn-cancel profiles-tabs-input btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save profiles-tabs-input btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="profiles-tabs-value">
								<div class="profiles-tabs-value-item">PG</div>
								<div class="profiles-tabs-value-item">NTT Data VN</div>
								<div class="profiles-tabs-value-item">Information Technology</div>
							</div>
							<div class="profiles-tabs-input">
								<div><input class="profiles-tabs-input" type="text" value="PG" /></div>
								<div><input class="profiles-tabs-input" type="text" value="NTT Data VN" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Information Technology" /></div>
							</div>
						</div>
					</div>

					<div class="profiles-tabs-item1">
						<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">Junly 13th</span><input class="profiles-tabs-input" type="text" value="Junly 13th" /> to <span class="profiles-tabs-value">now</span><input class="profiles-tabs-input" type="text" value="now" /></div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
							<a class="profiles-btn-edit profiles-tabs-value btn profiles-btn pull-right"><i class="icon-pencil"></i></a>
							<a class="profiles-btn-cancel profiles-tabs-input btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save profiles-tabs-input btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="profiles-tabs-value">
								<div class="profiles-tabs-value-item">PG</div>
								<div class="profiles-tabs-value-item">NTT Data VN</div>
								<div class="profiles-tabs-value-item">Information Technology</div>
							</div>
							<div class="profiles-tabs-input">
								<div><input class="profiles-tabs-input" type="text" value="PG" /></div>
								<div><input class="profiles-tabs-input" type="text" value="NTT Data VN" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Information Technology" /></div>
							</div>
						</div>
					</div>

					<div class="profiles-tabs-item1">
						<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">Junly 13th</span><input class="profiles-tabs-input" type="text" value="Junly 13th" /> to <span class="profiles-tabs-value">now</span><input class="profiles-tabs-input" type="text" value="now" /></div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
							<a class="profiles-btn-edit profiles-tabs-value btn profiles-btn pull-right"><i class="icon-pencil"></i></a>
							<a class="profiles-btn-cancel profiles-tabs-input btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save profiles-tabs-input btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="profiles-tabs-value">
								<div class="profiles-tabs-value-item">PG</div>
								<div class="profiles-tabs-value-item">NTT Data VN</div>
								<div class="profiles-tabs-value-item">Information Technology</div>
							</div>
							<div class="profiles-tabs-input">
								<div><input class="profiles-tabs-input" type="text" value="PG" /></div>
								<div><input class="profiles-tabs-input" type="text" value="NTT Data VN" /></div>
								<div><input class="profiles-tabs-input" type="text" value="Information Technology" /></div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<div id="profiles-tabs-background-skill" class="profiles-tabs-main pull-left">
				<div class="profiles-tabs-main-header">
					<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> Skill & Expertise</a>
					<a class="profiles-btn-edit profiles-tabs-value btn profiles-btn pull-right"><i class="icon-plus"></i></a>
					<a class="profiles-btn-cancel profiles-tabs-input btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
					<a class="profiles-btn-save profiles-tabs-input btn profiles-btn pull-right"><i class="icon-save"></i></a>
					<div class="pull-right"><input class="profiles-tabs-input" type="text" placeholder="Text here..." /></div>
					<div class="clear"></div>
				</div>

				<div class="profiles-tabs-main-body">
					<div class="profiles-tabs-item2 btn">Problem Solving<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Development<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Teamwork<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Pressure<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Solving<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Development<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Teamwork<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Pressure<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Solving<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Development<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Teamwork<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Pressure<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Solving<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Development<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Teamwork<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Pressure<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Solving<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Development<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Teamwork<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Pressure<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Solving<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Development<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Teamwork<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Pressure<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
				</div>
			</div>
		</div>
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript" src="{{ asset_js('profiles.js') }}"></script>
<script type="text/javascript">
	function addScroll(warper, column, width, height) {
		$(warper).outerWidth(width);
		$(warper + ' ' + column).outerHeight(height);
		$(warper + ' ' + column).niceScroll();
	}

	$(document).ready( function () {
		$('#y-content').niceScroll();
		var profiles = new Profiles($('#y-main-content'));

		/*$('.profiles-btn-edit').click(function () {
			$('.profiles-btn-edit').css('disabled', 'disabled');
			$(this).parent().parent().find('.profiles-tabs-value').toggle();
			$(this).parent().parent().find('.profiles-tabs-input').toggle();
		});
		$('.profiles-btn-save').click(function () {
			$(this).parent().parent().find('.profiles-tabs-input').toggle();
			$(this).parent().parent().find('.profiles-tabs-value').toggle();
			$('.profiles-btn-edit').css('disabled', 'none');
		});
		$('.profiles-tabs-item2 .profiles-btn-remove').click(function () {
			return confirm('Do you want to remove this skill?');
		});
		$('#profiles-tabs-background-experience .profiles-tabs-item1 .profiles-btn-remove').click(function () {
			return confirm('Do you want to remove this experience?');
		});
		$('#profiles-tabs-background-education .profiles-tabs-item1 .profiles-btn-remove').click(function () {
			return confirm('Do you want to remove this education?');
		});
		$('#profiles-tabs-background-experience .profiles-btn-add').click(function () {
			var html = '<div class="profiles-tabs-item1">';
				html += '<div class="profiles-tabs-item1-label">From <input class="" type="text" value="Junly 13th" /> to <input type="text" value="" /></div>';
				html += '<div class="profiles-tabs-item1-content">';
				html += '<a class="profiles-btn-remove btn profiles-btn pull-right"><i class="icon-trash"></i></a>';
				html += '<a class="profiles-btn-save btn profiles-btn pull-right"><i class="icon-save"></i></a>';
				html += '<div>';
				html += '<div><input type="text" value="" /></div>';
				html += '<div><input type="text" value="" /></div>';
				html += '<div><input type="text" value="" /></div>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
			$(this).parent().parent().find('.profiles-tabs-main-body').prepend(html);
		});
		$('#profiles-tabs-background-education .profiles-btn-add').click(function () {
			var html = '<div class="profiles-tabs-item1">';
				html += '<div class="profiles-tabs-item1-label">From <input class="" type="text" value="Junly 13th" /> to <input type="text" value="" /></div>';
				html += '<div class="profiles-tabs-item1-content">';
				html += '<a class="profiles-btn-remove btn profiles-btn pull-right"><i class="icon-trash"></i></a>';
				html += '<a class="profiles-btn-save btn profiles-btn pull-right"><i class="icon-save"></i></a>';
				html += '<div>';
				html += '<div><input type="text" value="" /></div>';
				html += '<div><input type="text" value="" /></div>';
				html += '<div><input type="text" value="" /></div>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
			$(this).parent().parent().find('.profiles-tabs-main-body').prepend(html);
		});*/
	} );

	window.onresize=function() {
		window.setTimeout('location.reload()', 1);
	};
</script>
{% endblock %}
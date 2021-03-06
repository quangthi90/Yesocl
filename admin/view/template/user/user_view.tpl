<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <div class="box">    
    <div class="heading">
      <span><img src="view/image/user.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
      	<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-danger"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form method="post" enctype="multipart/form-data" id="form">
      	<ul class="nav nav-tabs">
		    <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo $tab_general; ?></a></li>
		    <li><a href="#tab-email" data-toggle="tab"><?php echo $tab_email; ?></a></li>
		    <li><a href="#tab-info" data-toggle="tab"><?php echo $tab_information; ?></a></li>
        <li><a href="#tab-im" data-toggle="tab"><?php echo $tab_im; ?></a></li>
        <li><a href="#tab-phone" data-toggle="tab"><?php echo $tab_phone; ?></a></li>
        <li><a href="#tab-website" data-toggle="tab"><?php echo $tab_website; ?></a></li>
        <li><a href="#tab-experience" data-toggle="tab"><?php echo $tab_experience; ?></a></li>
        <li><a href="#tab-education" data-toggle="tab"><?php echo $tab_education; ?></a></li>
        <li><a href="#tab-former" data-toggle="tab"><?php echo $tab_former; ?></a></li>
	    </ul>
	    <div class="tab-content">
	    	<!-- General tab -->
		    <div class="tab-pane active" id="tab-general">
		    	<table class="form">
          <tr>
            <td><?php echo $entry_username; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="user[username]" value="<?php echo $username; ?>" disabled="disabled" /></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_group; ?></td>
            <td><select name="user[group]" disabled="disabled">
                <?php foreach ( $groups as $group ){ ?>
                <option <?php if ( $group['id'] == $group_id){ ?>selected="selected"<?php } ?> value="<?php echo $group['id']; ?>"><?php echo $group['name']; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_status; ?></td>
            <td><select name="user[status]" disabled="disabled">
                <?php if ($status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          </table>
		    </div>
		    
		    <!-- Email tab -->
	    	<div class="tab-pane" id="tab-email">
	    		<table class="form">
          <tr>
            <td style="width: 60%;"><b><?php echo $text_email; ?></b></td>
            <td><b><?php echo $text_primary; ?></b></td>
          </tr>
          <?php foreach ( $emails as $key => $email ){ ?>
          <tr>
            <td>
              <input disabled="disabled" class="email input-xxlarge" type="text" name="user[emails][<?php echo $key; ?>][email]" value="<?php echo $email['email']; ?>" />
              <input disabled="disabled" class="primary input-xxlarge" type="hidden" name="user[emails][<?php echo $key; ?>][primary]" value="<?php echo $email['primary']; ?>" />
            </td>
            <td>
              <a class="btn-lost-primary btn btn-success disabled <?php if ( $email['primary'] !== true ){ ?>hide<?php } ?>"><i class="icon-ok"></i></a>
              <a class="btn-set-primary btn btn-danger <?php if ( $email['primary'] === true ){ ?>hide<?php } ?>"><i class="icon-minus"></i></a>
            </td>
          </tr>
          <?php } ?>
          </table>
	    	</div>
		    
		    <!-- Information tab -->
	    	<div class="tab-pane" id="tab-info">
	    		<table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_firstname; ?></td>
            <td><input disabled="disabled" required="required" type="text" name="meta[firstname]" value="<?php echo $firstname; ?>" /></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_lastname; ?></td>
            <td><input disabled="disabled" required="required" type="text" name="meta[lastname]" value="<?php echo $lastname; ?>" /></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_birthday; ?></td>
            <td><input disabled="disabled" required="required" class="input-medium date" type="text" name="meta[birthday]" value="<?php echo $birthday; ?>" /></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_sex; ?></td>
            <td><select disabled="disabled" required="required" class="input-medium" name="meta[sex]" >
            <?php if ($sex == 1) { ?>
            <option value="1" selected="selected"><?php echo $text_male; ?></option>
            <option value="0"><?php echo $text_female; ?></option>
            <option value="2"><?php echo $text_other; ?></option>
            <?php }elseif ($sex == 2) { ?>
            <option value="1"><?php echo $text_male; ?></option>
            <option value="0"><?php echo $text_female; ?></option>
            <option value="2" selected="selected"><?php echo $text_other; ?></option>
            <?php }else { ?>
            <option value="1"><?php echo $text_male; ?></option>
            <option value="0" selected="selected"><?php echo $text_female; ?></option>
            <option value="2"><?php echo $text_other; ?></option>
            <?php } ?>
            </select></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_marital_status; ?></td>
            <td><select disabled="disabled" required="required" class="input-medium" name="background[maritalstatus]" >
            <?php if ($marital_status) { ?>
            <option value="1" selected="selected"><?php echo $text_yes; ?></option>
            <option value="0"><?php echo $text_no; ?></option>
            <?php }else { ?>
            <option value="1"><?php echo $text_yes; ?></option>
            <option value="0" selected="selected"><?php echo $text_no; ?></option>
            <?php } ?>
            </select></td>
          </tr>
          <!--
          <tr>
            <td><span class="required">*</span> <?php echo $entry_country; ?></td>
            <td><input disabled="disabled" required="required" class="input-medium" type="text" name="meta[location][country]" value="<?php echo $country; ?>" /></td>
          </tr>
          <tr>
            <td><span disabled="disabled" class="required">*</span> <?php echo $entry_city; ?></td>
            <td><input disabled="disabled" required="required" class="input-medium" type="text" name="meta[location][city]" value="<?php echo $city; ?>" /></td>
          </tr>
          -->
          <tr>
            <td><span class="required">*</span> <?php echo $entry_location; ?></td>
            <td><input disabled="disabled" required="required" class="input-medium" type="text" name="meta[location][location]" value="<?php echo $location; ?>" /></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_postal_code; ?></td>
            <td><input disabled="disabled" required="required" class="input-medium" type="text" name="meta[postalcode]" value="<?php echo $postal_code; ?>" /></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_address; ?></td>
            <td><input disabled="disabled" required="required" class="input-xxlarge" type="text" name="meta[address]" value="<?php echo $address; ?>" /></td>
          </tr>
          <tr>
            <td><?php echo $entry_advice_for_contact; ?></td>
            <td><input disabled="disabled" class="input-xxlarge" type="text" name="background[adviceforcontact]" value="<?php echo $advice_for_contact; ?>" /></td>
          </tr>
          <tr>
            <td><?php echo $entry_summary; ?></td>
            <td><textarea disabled="disabled" class="input-xxlarge" rows="8" name="background[summary]"><?php echo $summary; ?></textarea></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_industry; ?></td>
            <td><input disabled="disabled" required="required" datalist="industry" class="datalist industry input-medium" type="text" name="meta[industry]" value="<?php echo $industry; ?>" /></td>
          </tr>
          <tr>
            <td><?php echo $entry_headingline; ?></td>
            <td><textarea class="input-xxlarge" disabled="disabled" type="text" name="meta[headingline]"><?php echo $heading_line; ?></textarea></td>
          </tr>
          <tr>
            <td><?php echo $entry_interest; ?></td>
            <td><textarea disabled="disabled" class="input-xxlarge" type="text" name="background[interest]"><?php echo $interest; ?></textarea></td>
          </tr>
          </table>
	    	</div>

        <!-- Im tab -->
        <div class="tab-pane" id="tab-im">
          <table class="form">
          <tr>
            <td><b><?php echo $text_type; ?></b></td>
            <td style="width: 40%;"><b><?php echo $text_im; ?></b></td>
            <td><b><?php echo $text_visible; ?></b></td>
          </tr>
          <?php foreach ($ims as $key => $im) { ?>
          <tr>
            <td>
              <input disabled="disabled" class="input-medium" type="text" value="<?php foreach ($im_types as $im_type) { if($im['type'] == $im_type['code']) echo $im_type['text']; } ?>" />
            </td>
            <td><input disabled="disabled" class="input-medium" type="text" value="<?php echo $im['im']; ?>" /></td>
            <td><input disabled="disabled" class="input-medium" type="text" value="
              <?php foreach ($visible_types as $visible_type) { if($im['visible'] == $visible_type['code'] ) echo $visible_type['text']; } ?>" />
            </td>
          </tr>
          <?php } ?>
          </table>
        </div>

        <!-- Phone tab -->
        <div class="tab-pane" id="tab-phone">
          <table class="form">
          <tr>
            <td><b><?php echo $text_type; ?></b></td>
            <td style="width: 40%;"><b><?php echo $text_phone; ?></b></td>
            <td><b><?php echo $text_visible; ?></b></td>
          </tr>
          <?php foreach ($phones as $key => $phone) { ?>
          <tr>
            <td><select disabled="disabled" class="input-small" name="user[phone][<?php echo $key; ?>][type]" ><?php foreach ($phone_types as $phone_type) { ?><option value="<?php echo $phone_type['code']; ?>" <?php if ($phone['type'] == $phone_type['code']) { ?>selected="selected"<?php } ?>><?php echo $phone_type['text']; ?></option><?php } ?></select></td>
            <td><input disabled="disabled" class="input-medium" type="text" name="user[phone][<?php echo $key; ?>][phone]" value="<?php echo $phone['phone']; ?>" /></td>
            <td><select disabled="disabled" class="visible input-medium" name="user[phone][<?php echo $key; ?>][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>" <?php if ($phone['visible'] == $visible_type['code']) { ?>selected="selected"<?php } ?>><?php echo $visible_type['text']; ?></option><?php } ?></select></td>
            </tr>
            <?php } ?>
          </table>
        </div>

        <!-- Website tab -->
        <div class="tab-pane" id="tab-website">
          <table class="form">
          <tr>
            <td style="width: 40%;"><b><?php echo $text_title; ?></b></td>
            <td><b><?php echo $text_url; ?></b></td>
          </tr>
          <?php foreach ($websites as $website) { ?>
          <tr>
            <td><input disabled="disabled" class="title input-medium" type="text" name="user[websites][<?php echo $key; ?>][title]" value="<?php foreach($title_types as $title_type){ if ($website['title'] == $title_type['code']) echo $website['title']; } ?>" /></td>
            <td><input disabled="disabled" class="url input-large" type="text" name="user[websites][<?php echo $key; ?>][url]" value="<?php echo $website['url']; ?>" /></td>
          </tr>
          <?php } ?>
          </table>
        </div>

        <!-- Experience tab -->
        <div class="tab-pane" id="tab-experience">
          <table class="form">
          <?php foreach ($experiences as $key => $experience) { ?>
          <tr>
            <td>
            <div class="row-fluid">
              <div class="span4">
                <div class="span3"><strong><?php echo $entry_company; ?></strong></div>
                <div class="span9"><input disabled="disabled" class="company input-medium" type="text" name="background[experiences][<?php echo $key; ?>][company]" value="<?php echo $experience['company']; ?>" /></div>
              </div>
              <div class="span4">
                <div class="span3"><?php echo $entry_current; ?></div>
                <div class="span9"><?php if ( $experience['current'] ) { ?><a class="btn-lost-current btn btn-success disabled"><i class="icon-ok"></i></a><a class="btn-set-current btn btn-danger hide"><i class="icon-minus"></i></a><?php }else { ?><a class="btn-lost-current btn btn-success disabled hide"><i class="icon-ok"></i></a><a class="btn-set-current btn btn-danger"><i class="icon-minus"></i></a><?php } ?></div>
              </div>
            </div>
            <div class="row-fluid">
                <div class="span4">
                  <div class="span3"><?php echo $entry_title; ?></div>
                  <div class="span9"><input disabled="disabled" class="title input-medium" type="text" name="background[experiences][<?php echo $key; ?>][title]" value="<?php echo $experience['title']; ?>" /></div>
                </div>
                <div class="span4">
                  <div class="span3"><?php echo $entry_location; ?></div>
                  <div class="span9"><input disabled="disabled" class="localtion input-medium" type="text" name="background[experiences][<?php echo $key; ?>][localtion]" value="<?php echo $experience['location']; ?>" /></div>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span4">
                  <div class="span3"><?php echo $entry_time_period; ?></div>
                  <div class="span9">
                    <?php $cur_year = date('Y'); ?>
                    <?php echo $text_month; ?>
                    <select disabled="disabled" class="started-month input-small" name="background[experiences][<?php echo $key; ?>][started][month]" >
                    <?php for ($i = 1 ; $i < 13; $i++) { ?>
                              <option value="<?php echo $i; ?>" <?php if ($i == $experience['started']['month']) { ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                          </select>
                          <?php echo $text_year; ?>
                          <select disabled="disabled" class="started-year input-small" name="background[experiences][<?php echo $key; ?>][started][year]" >
                          <?php for ($i = $cur_year ; $i > $cur_year - 100; $i--) { ?>
                              <option value="<?php echo $i; ?>" <?php if ($i == $experience['started']['year']) { ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                          </select>
                          <?php echo $text_to; ?>
                          <?php if ($experience['current']) { ?>
                          <?php echo $text_now; ?>
                          <?php }else { ?>
                          <?php echo $text_month; ?>
                          <select disabled="disabled" class="ended-month input-small" name="background[experiences][<?php echo $key; ?>][ended][month]" >
                          <?php for ($i = 1 ; $i < 13; $i++) { ?>
                              <option value="<?php echo $i; ?>" <?php if ($i == $experience['ended']['month']) { ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                          </select>
                          <?php echo $text_year; ?>
                          <select disabled="disabled" class="ended-year input-small" name="background[experiences][<?php echo $key; ?>][ended][year]" >
                          <?php for ($i = $cur_year ; $i > $cur_year - 100; $i--) { ?>
                              <option value="<?php echo $i; ?>" <?php if ($i == $experience['ended']['year']) { ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                          </select>
                          <?php } ?>
                        </div>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span4">
                  <div class="span3"><?php echo $entry_description; ?></div>
                  <div class="span9"><textarea disabled="disabled" class="description input-xxlarge" type="text" name="background[experiences][<?php echo $key; ?>][description]"><?php echo $experience['description']; ?></textarea></div>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span4">
                  <div class="span3"><?php echo $entry_self_employed; ?></div>
                  <div class="span9"><select disabled="disabled" class="self_employed input-medium" name="background[experiences][<?php echo $key; ?>][self_employed]"><?php if ($experience['self_employed']) { ?><option value="1" selected="selected"><?php echo $text_yes; ?></option><option value="0"><?php echo $text_no; ?></option><?php }else { ?><option value="1"><?php echo $text_yes; ?></option><option value="0" selected="selected"><?php echo $text_no; ?></option><?php } ?></select></div>
                </div>
              </div>
            </td>
          </tr>
          <?php } ?>
          </table>
        </div>

        <!-- Education tab -->
        <div class="tab-pane" id="tab-education">
          <table class="form">
               <?php foreach ($educations as $key => $education) { ?>
               <tr>
                    <td>
                    <div class="row-fluid">
                         <div class="span2"><strong><?php echo $entry_school; ?></strong></div>
                         <div class="span9"><input disabled="disabled" class="school input-medium" type="text" name="background[educations][<?php echo $key; ?>][school]" value="<?php echo $education['school']; ?>" /></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_date_attended; ?></div>
                         <div class="span10">
                          <?php $cur_year = date('Y'); ?>
                          <select disabled="disabled" class="started input-small" name="background[educations][<?php echo $key; ?>][started]" >
                          <?php for ($i = $cur_year ; $i > $cur_year - 100; $i--) { ?>
                            <option value="<?php echo $i; ?>" <?php if ($i == $education['started']) { ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                          </select> 
                          <?php echo $text_to; ?> 
                          <select disabled="disabled" class="ended input-small" name="background[educations][<?php echo $key; ?>][ended]" >
                          <?php for ($i = $cur_year ; $i > $cur_year - 100; $i--) { ?>
                            <option value="<?php echo $i; ?>" <?php if ($i == $education['ended']) { ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                          </select>
                          </div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_degree; ?></div>
                         <div class="span10"><input disabled="disabled" class="degree input-medium" type="text" name="background[educations][<?php echo $key; ?>][degree]" value="<?php echo $education['degree']; ?>" /></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_field_of_study; ?></div>
                         <div class="span10"><input disabled="disabled" class="fieldofstudy input-medium" type="text" name="background[educations][<?php echo $key; ?>][fieldofstudy]" value="<?php echo $education['fieldofstudy']; ?>" /></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_grace; ?></div>
                         <div class="span10"><input disabled="disabled" class="grace input-medium" type="text" name="background[educations][<?php echo $key; ?>][grace]" value="<?php echo $education['grace']; ?>" /></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_societies; ?></div>
                         <div class="span10"><textarea disabled="disabled" class="societies input-xxlarge" type="text" name="background[educations][<?php echo $key; ?>][societies]"><?php echo $education['societies']; ?></textarea></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_description; ?></div>
                         <div class="span10"><textarea disabled="disabled" class="description input-xxlarge" type="text" name="background[educations][<?php echo $key; ?>][description]"><?php echo $education['description']; ?></textarea></div>
                    </div>
                    </td>
               </tr>
               <?php } ?>
          </table>
        </div>

        <!-- Former tab -->
        <div class="tab-pane" id="tab-former">
          <table class="form">
          <tr>
            <td><b><?php echo $text_name; ?></b></td>
            <td><b><?php echo $text_value; ?></b></td>
            <td><b><?php echo $text_visible; ?></b></td>
          </tr>
          <?php foreach ($formers as $key => $former) { ?>
          <tr>
            <td><input disabled="disabled" class="name input-medium" type="text" name="user[formers][<?php echo $key; ?>][name]" value="<?php echo $former['name']; ?>" /></td>
            <td><input disabled="disabled" class="value input-medium" type="text" name="user[formers][<?php echo $key; ?>][value]" value="<?php echo $former['value']; ?>" /></td>
            <td><select class="visible input-medium" name="user[formers][<?php echo $key; ?>][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>" <?php if ( $former['visible'] == $visible_type['code'] ) { ?>selected="selected"<?php } ?>><?php echo $visible_type['text']; ?></option><?php } ?></select></td>
          </tr>
          <?php } ?>
          </table>
        </div>
	    </div>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
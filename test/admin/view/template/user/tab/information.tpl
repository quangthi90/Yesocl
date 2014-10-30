<table class="form">
	<tr>
    	<td><span class="required">*</span> <?php echo $entry_firstname; ?></td>
        <td><input required="required" type="text" name="meta[firstname]" value="<?php echo $firstname; ?>" />
        	<?php if ($error_firstname) { ?>
              	<div class="alert alert-error">
				  <strong>Error!</strong> <?php echo $error_firstname; ?>
				</div>
            <?php } ?>
        </td>
	</tr>
    <tr>
    	<td><span class="required">*</span> <?php echo $entry_lastname; ?></td>
        <td><input required="required" type="text" name="meta[lastname]" value="<?php echo $lastname; ?>" />
        	<?php if ($error_lastname) { ?>
              	<div class="alert alert-error">
				  <strong>Error!</strong> <?php echo $error_lastname; ?>
				</div>
            <?php } ?>
        </td>
	</tr>
    <tr>
        <td><span class="required">*</span> <?php echo $entry_birthday; ?></td>
        <td><input required="required" class="input-medium date" type="text" name="meta[birthday]" value="<?php echo $birthday; ?>" /></td>
    </tr>
    <tr>
      <td><span class="required">*</span> <?php echo $entry_sex; ?></td>
      <td><select required="required" class="input-medium" name="meta[sex]" >
      <?php if ($sex == 0) { ?>
        <option value="1"><?php echo $text_male; ?></option>
        <option value="0" selected="selected"><?php echo $text_female; ?></option>
        <option value="2"><?php echo $text_other; ?></option>
      <?php }elseif ($sex == 2) { ?>
        <option value="1"><?php echo $text_male; ?></option>
        <option value="0"><?php echo $text_female; ?></option>
        <option value="2" selected="selected"><?php echo $text_other; ?></option>
      <?php }else { ?>
        <option value="1" selected="selected"><?php echo $text_male; ?></option>
        <option value="0"><?php echo $text_female; ?></option>
        <option value="2"><?php echo $text_other; ?></option>
      <?php } ?>
      </select></td>
    </tr>
    <tr>
        <td><span class="required">*</span> <?php echo $entry_marital_status; ?></td>
        <td><select required="required" class="input-medium" name="background[maritalstatus]" >
            <?php if ($marital_status) { ?>
            <option value="1" selected="selected"><?php echo $text_yes; ?></option>
            <option value="0"><?php echo $text_no; ?></option>
            <?php }else { ?>
            <option value="1"><?php echo $text_yes; ?></option>
            <option value="0" selected="selected"><?php echo $text_no; ?></option>
            <?php } ?>
        </select></td>
    </tr>

    <tr>
      <td><?php echo $entry_avatar; ?></td>
      <td>
        <div class="thumb fileupload fileupload-new" data-provides="fileupload">
          <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="<?php echo $img_avatar; ?>" style="width: 150px; height: 150px;" /></div>
          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
          <div>
            <span class="btn btn-file"><span class="fileupload-new"><?php echo $text_select_image; ?></span><span class="fileupload-exists"><?php echo $text_change; ?></span><input name="avatar" type="file" /></span>
            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload" onclick="$('.thumb img').attr('src', '<?php echo $img_default; ?>');"><?php echo $text_remove; ?></a>
          </div>
        </div>
        <?php if ( $error_thumb ) { ?>
          <div class="alert alert-error">
            <strong>Error!</strong> <?php echo $error_thumb; ?>
          </div>
        <?php } ?>
      </td>
    </tr>

    <tr>
        <td><span class="required">*</span> <?php echo $entry_location; ?></td>
        <td><input required="required" class="input-medium" type="text" name="meta[location][location]" value="<?php echo $location; ?>" /><input required="required" type="hidden" name="meta[location][city_id]" value="<?php echo $city_id; ?>" />
        <?php if ($error_location) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_location; ?>
        </div>
            <?php } ?>
          </td>
    </tr>
    <tr>
        <td><span class="required">*</span> <?php echo $entry_postal_code; ?></td>
        <td><input required="required" class="input-medium" type="text" name="meta[postalcode]" value="<?php echo $postal_code; ?>" /></td>
    </tr>
    <tr>
        <td><span class="required">*</span> <?php echo $entry_address; ?></td>
        <td><input required="required" class="input-large" type="text" name="meta[address]" value="<?php echo $address; ?>" /></td>
    </tr>
    <tr>
        <td><?php echo $entry_advice_for_contact; ?></td>
        <td><input class="input-xxlarge" type="text" name="background[adviceforcontact]" value="<?php echo $advice_for_contact; ?>" /></td>
    </tr>
    <tr>
        <td><?php echo $entry_summary; ?></td>
        <td><textarea class="input-xxlarge" rows="8" name="background[summary]"><?php echo $summary; ?></textarea></td>
    </tr>
    <tr>
        <td><span class="required">*</span> <?php echo $entry_industry; ?></td>
        <td><input required="required" datalist="industry" class="datalist industry input-medium" type="text" name="meta[industry]" value="<?php echo $industry; ?>" /><input name="meta[industry_id]" value="<?php echo $industry_id; ?>" type="hidden" />
        <?php if ($error_industry) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_industry; ?>
        </div>
            <?php } ?>
          </td>
    </tr>
    <tr>
        <td><?php echo $entry_headingline; ?></td>
        <td><textarea class="input-xxlarge" type="text" name="meta[headingline]"><?php echo $heading_line; ?></textarea></td>
    </tr>
    <tr>
        <td><?php echo $entry_interest; ?></td>
        <td><textarea class="input-xxlarge" type="text" name="background[interest]"><?php echo $interest; ?></textarea></td>
    </tr>
</table>
<script type="text/javascript"><!--//
    $('.date').datepicker();
//--></script>
<script type="text/javascript"><!--
$('input[name=\'meta[location][location]\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    var url = '<?php echo $autocomplete_location; ?>&filter_location=';

    $.ajax({
      url: url +  encodeURIComponent(request.term),
      dataType: 'json',
      success: function(json) {   
        response($.map(json, function(item) {
          return {
            label: item.name,
            value: item.id
          }
        }));
      }
    });
  }, 
  focus: function(event, ui) {
    $('input[name=\'meta[location][location]\']').val( ui.item.label );
    return false;
    }, 
  select: function(event, ui) {
    $('input[name=\'meta[location][location]\']').val( ui.item.label );
    $('input[name=\'meta[location][city_id]\']').val( ui.item.value );
            
    return false;
  }
});
//--></script> 
<script type="text/javascript"><!--//
$(function () {
var type;
$('input.datalist').autocomplete({
  delay: 0,
  search: function( event, ui ) {
    type = $(this).attr('datalist');
  },
  source: function(request, response) {
    $.ajax({
      url: '<?php echo $autocomplete_value; ?>&filter_type_code=' + encodeURIComponent(type) + '&filter_name=' +  encodeURIComponent(request.term),
      dataType: 'json',
      success: function(json) {   
        response($.map(json, function(item) {
          return {
            label: item.name,
            value: item.id
          }
        }));
      }
    });
  }, 
  select: function(event, ui) {
    $(this).val(ui.item.label);
    $(this).next().val(ui.item.value);     
    return false;
  },
  focus: function(event, ui) {
     return false;
     }
});
});
//--></script>
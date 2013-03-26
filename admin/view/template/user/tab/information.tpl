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
        <td><input required="required" class="input-medium date" type="text" name="background[birthday]" value="<?php echo $birthday; ?>" /></td>
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
        <td><span class="required">*</span> <?php echo $entry_country; ?></td>
        <td><input required="required" class="input-medium" type="text" name="meta[location][country]" value="<?php echo $country; ?>" />
          <?php if ($error_country) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_country; ?>
        </div>
            <?php } ?>
          </td>
        <input required="required" type="hidden" name="meta[location][country_id]" value="<?php echo $country_id; ?>" />
    </tr>
    <tr>
        <td><span class="required">*</span> <?php echo $entry_city; ?></td>
        <td><input required="required" class="input-medium" type="text" name="meta[location][city]" value="<?php echo $city; ?>" />
        <?php if ($error_city) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_city; ?>
        </div>
            <?php } ?>
          </td>
        <input required="required" type="hidden" name="meta[location][city_id]" value="<?php echo $city_id; ?>" />
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
        <td><span class="required">*</span> <?php echo $entry_industry; ?></td>
        <td><input required="required" datalist="industry" class="datalist industry input-medium" type="text" name="meta[industry]" value="<?php echo $industry; ?>" />
        <?php if ($error_industry) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_industry; ?>
        </div>
            <?php } ?>
          </td>
    </tr>
    <tr>
        <td><?php echo $entry_headingline; ?></td>
        <td><input class="input-xxlarge" type="text" name="meta[headingline]" value="<?php echo $heading_line; ?>" /></td>
    </tr>
    <tr>
        <td><?php echo $entry_interest; ?></td>
        <td><input class="input-xxlarge" type="text" name="background[interest]" value="<?php echo $interest; ?>" /></td>
    </tr>
</table>
<script type="text/javascript"><!--//
    $('.date').datepicker();
//--></script>
<script type="text/javascript"><!--
$('input[name=\'meta[location][country]\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=user/user/autocompleteCountry&filter_name=' +  encodeURIComponent(request.term),
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
    $('input[name=\'meta[location][country]\']').val( ui.item.label );
        
    return false;
    }, 
  select: function(event, ui) {
    $('input[name=\'meta[location][country]\']').val( ui.item.label );
    $('input[name=\'meta[location][country_id]\']').val( ui.item.value );
            
    return false;
  }
});
//--></script> 
<script type="text/javascript"><!--
$('input[name=\'meta[location][city]\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    var url = '';
    if ( $('input[name=\'meta[location][country_id]\']').val() != '' ) {
        url = 'index.php?route=user/user/autocompleteCity&filter_country=' + $('input[name=\'meta[location][country_id]\']').val() + '&filter_name=';
    }else {
        url = 'index.php?route=user/user/autocompleteCity&filter_name=';
    }

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
    $('input[name=\'meta[location][city]\']').val( ui.item.label );
    return false;
    }, 
  select: function(event, ui) {
    $('input[name=\'meta[location][city]\']').val( ui.item.label );
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
      url: 'index.php?route=data/value/autocomplete&filter_type_code=' + encodeURIComponent(type) + '&filter_name=' +  encodeURIComponent(request.term),
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
            
    return false;
  },
  focus: function(event, ui) {
     return false;
     }
});
});
//--></script>
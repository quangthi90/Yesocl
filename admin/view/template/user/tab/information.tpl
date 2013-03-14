<table class="form">
	<tr>
    	<td><span class="required">*</span> <?php echo $entry_firstname; ?></td>
        <td><input required="required" type="text" name="user[meta][firstname]" value="<?php echo $firstname; ?>" />
        	<?php if ($error_firstname) { ?>
              	<div class="alert alert-error">
				  <strong>Error!</strong> <?php echo $error_firstname; ?>
				</div>
            <?php } ?>
        </td>
	</tr>
    <tr>
    	<td><span class="required">*</span> <?php echo $entry_lastname; ?></td>
        <td><input required="required" type="text" name="user[meta][lastname]" value="<?php echo $lastname; ?>" />
        	<?php if ($error_lastname) { ?>
              	<div class="alert alert-error">
				  <strong>Error!</strong> <?php echo $error_lastname; ?>
				</div>
            <?php } ?>
        </td>
	</tr>
    <tr>
        <td><?php echo $entry_birthday; ?></td>
        <td><input class="input-medium" type="text" name="user[background][birthday]" value="<?php echo $birthday; ?>" /></td>
    </tr>
    <tr>
        <td><?php echo $entry_marital_status; ?></td>
        <td><select class="input-medium" name="user[background][maritalstatus]" >
            <?php if ($maritalstatus) { ?>
                <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                <option value="0"><?php echo $text_no; ?></option>
            <?php }else { ?>
                <option value="1"><?php echo $text_yes; ?></option>
                <option value="0" selected="selected"><?php echo $text_no; ?></option>
            <?php } ?>
        </select></td>
    </tr>
    <tr>
        <td><?php echo $entry_country; ?></td>
        <td><input required="required" class="input-medium" type="text" name="user[meta][location][country]" value="<?php echo $coutry; ?>" /></td>
        <input type="hidden" name="user[meta][location][country_id]" value="<?php echo $coutry_id; ?>" />
    </tr>
    <tr>
        <td><?php echo $entry_city; ?></td>
        <td><input required="required" class="input-medium" type="text" name="user[meta][location][city]" value="<?php echo $city; ?>" /></td>
        <input type="hidden" name="user[meta][location][city_id]" value="<?php echo $city_id; ?>" />
    </tr>
    <tr>
        <td><?php echo $entry_postal_code; ?></td>
        <td><input class="input-medium" type="text" name="user[meta][postalcode]" value="<?php echo $postalcode; ?>" /></td>
    </tr>
    <tr>
        <td><?php echo $entry_industry; ?></td>
        <td><input required="required" class="input-medium" type="text" name="user[meta][industry]" value="<?php echo $industry; ?>" /></td>
    </tr>
    <tr>
        <td><?php echo $entry_headingline; ?></td>
        <td><input class="input-xxlarge" type="text" name="user[meta][headingline]" value="<?php echo $headingline; ?>" /></td>
    </tr>
    <tr>
        <td><?php echo $entry_interest; ?></td>
        <td><input class="input-xxlarge" type="text" name="user[background][interest]" value="<?php echo $interest; ?>" /></td>
    </tr>
</table>
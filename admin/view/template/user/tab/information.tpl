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
        <td><input class="input-medium" type="text" name="user[background][birthday]" value="" /></td>
    </tr>
    <tr>
        <td><?php echo $entry_marital_status; ?></td>
        <td><select class="input-medium" name="user[background][maritalstatus]" >
            <option value="1"><?php echo $text_yes; ?></option>
            <option value="0"><?php echo $text_no; ?></option>
        </select></td>
    </tr>
    <tr>
        <td><?php echo $entry_country; ?></td>
        <td><input required="required" class="input-medium" type="text" name="user[meta][location][country]" value="" /></td>
        <input type="hidden" name="user[meta][location][country_id]" />
    </tr>
    <tr>
        <td><?php echo $entry_city; ?></td>
        <td><input required="required" class="input-medium" type="text" name="user[meta][location][city]" value="" /></td>
        <input type="hidden" name="user[meta][location][city]" />
    </tr>
    <tr>
        <td><?php echo $entry_postal_code; ?></td>
        <td><input class="input-medium" type="text" name="user[meta][postalcode]" value="" /></td>
    </tr>
    <tr>
        <td><?php echo $entry_address; ?></td>
        <td><input class="input-large" type="text" name="user[meta][address]" value="" /></td>
    </tr>
    <tr>
        <td><?php echo $entry_advice_of_contact; ?></td>
        <td><input class="input-xxlarge" type="text" name="user[background][adviceofcontact]" value="" /></td>
    </tr>
    <tr>
        <td><?php echo $entry_industry; ?></td>
        <td><input required="required" class="input-medium" type="text" name="user[meta][industry]" value="" /></td>
    </tr>
    <tr>
        <td><?php echo $entry_headingline; ?></td>
        <td><input class="input-xxlarge" type="text" name="user[meta][headingline]" value="" /></td>
    </tr>
    <tr>
        <td><?php echo $entry_interest; ?></td>
        <td><input class="input-xxlarge" type="text" name="user[background][interest]" value="" /></td>
    </tr>
</table>
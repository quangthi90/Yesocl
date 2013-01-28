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
</table>
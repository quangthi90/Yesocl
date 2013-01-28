<table class="form">
	<tr>
    	<td><span class="required">*</span> <?php echo $entry_email; ?></td>
        <td><input required="required" type="text" name="customer[email]" value="<?php echo $email; ?>" /></td>
	</tr>
    <tr>
    	<td><span class="required">*</span> <?php echo $entry_password; ?></td>
        <td><input required="required" type="password" name="customer[password]" value="<?php echo $password; ?>" /></td>
	</tr>
    <tr>
        <td><?php echo $entry_status; ?></td>
    	<td>
    		<select name="customer[status]">
        	<?php if ($status) { ?>
            	<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
            <?php } ?>
            </select>
		</td>
	</tr>
</table>
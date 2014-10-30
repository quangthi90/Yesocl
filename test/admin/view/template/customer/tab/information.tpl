<table class="form">
	<tr>
    	<td><span class="required">*</span> <?php echo $entry_firstname; ?></td>
        <td><input required="required" type="text" name="customer[meta][firstname]" value="<?php echo $firstname; ?>" /></td>
	</tr>
    <tr>
    	<td><span class="required">*</span> <?php echo $entry_lastname; ?></td>
        <td><input required="required" type="text" name="customer[meta][lastname]" value="<?php echo $lastname; ?>" /></td>
	</tr>
	<tr>
    	<td><?php echo $entry_birthday; ?></td>
        <td><input type="text" name="customer[meta][birthday]" value="<?php echo $birthday; ?>" /></td>
	</tr>
</table>
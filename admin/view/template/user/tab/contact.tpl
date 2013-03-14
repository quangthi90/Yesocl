<table class="form">
	<tr>
    	<td><?php echo $entry_im; ?></td>
        <td><select class="input-small" name="im-type" ><?php foreach ($im_types as $im_type) { ?><option value="<?php echo $im_type['code']; ?>" <?php echo ($imtype == $im_type['code']) ? 'selected="selected"' : ''; ?>><?php echo $im_type['text']; ?></option><?php } ?></select>  <input class="input-medium" type="text" name="user[meta][im]" value="<?php echo $id; ?>" /></td>
	</tr>
	<tr>
    	<td><?php echo $entry_phone; ?></td>
        <td><select class="input-small" name="phone-type" ><?php foreach ($phone_types as $phone_type) { ?><option value="<?php echo $phone_type['code']; ?>" <?php echo ($phonetype == $phone_type['code']) ? 'selected="selected"' : ''; ?>><?php echo $phone_type['text']; ?></option><?php } ?></select>  <input class="input-medium" type="text" name="user[meta][phone]" value="<?php echo $phone; ?>" /></td>
	</tr>
	<tr>
    	<td><?php echo $entry_address; ?></td>
        <td><input class="input-large" type="text" name="user[meta][address]" value="<?php echo $address; ?>" /></td>
	</tr>
    <tr>
    	<td><?php echo $entry_advice_of_contact; ?></td>
        <td><input class="input-xxlarge" type="text" name="user[background][adviceofcontact]" value="<?php echo $adviceofcontact; ?>" /></td>
	</tr>
</table>
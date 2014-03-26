<table class="form">
  <tr>
    <td><?php echo $entry_address; ?></td>
    <td><input class="input-xxlarge" required="required" type="text" name="address" value="<?php echo $address; ?>" /></td>
  </tr>
  <tr>
    <td><?php echo $entry_phone; ?></td>
    <td><input class="input-xxlarge" required="required" type="text" name="phone" value="<?php echo $phone; ?>" /><input name="user_id" type="hidden" value="<?php echo $user_id; ?>" /></td>
  </tr>
  <tr>
    <td><?php echo $entry_fax; ?></td>
    <td><input class="input-xxlarge" required="required" type="text" name="fax" value="<?php echo $fax; ?>" /><input name="user_id" type="hidden" value="<?php echo $user_id; ?>" /></td>
  </tr>
  <tr>
    <td><?php echo $entry_website; ?></td>
    <td><input class="input-xxlarge" required="required" type="text" name="website" value="<?php echo $website; ?>" /><input name="user_id" type="hidden" value="<?php echo $user_id; ?>" /></td>
  </tr>
</table>
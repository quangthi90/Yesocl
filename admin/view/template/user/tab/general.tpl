		<table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_group; ?></td>
            <td><select name="user[group]">
                <?php foreach ( $groups as $group ){ ?>
                <option <?php if ( $group['id'] == $group_id){ ?>selected="selected"<?php } ?> value="<?php echo $group['id']; ?>"><?php echo $group['name']; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          <?php if (isset( $password )) { ?>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_password; ?></td>
            <td><input class="input-xxlarge" required="required" type="password" name="user[password]" value="<?php echo $password; ?>" />
            <?php if ($error_password) { ?>
              	<div class="alert alert-error">
				  <strong>Error!</strong> <?php echo $error_password; ?>
				</div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_confirm; ?></td>
            <td><input class="input-xxlarge" required="required" type="password" name="user[confirm]" value="<?php echo $confirm; ?>" />
            <?php if ($error_confirm) { ?>
              	<div class="alert alert-error">
				  <strong>Error!</strong> <?php echo $error_confirm; ?>
				</div>
            <?php } ?></td>
          </tr>
          <?php } ?>
          <tr>
            <td><?php echo $entry_status; ?></td>
            <td><select name="user[status]">
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
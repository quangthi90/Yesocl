<table class="form">
  <tr>
    <td><span class="required">*</span> <?php echo $entry_name; ?></td>
    <td><input class="input-xxlarge" required="required" type="text" name="name" value="<?php echo $name; ?>" />
    <?php if ($error_name) { ?>
        <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_name; ?>
        </div>
    <?php } ?></td>
  </tr>
  <tr>
    <td><span class="required">*</span> <?php echo $entry_owner; ?></td>
    <td><input class="input-xxlarge" required="required" type="text" name="owner" value="<?php echo $owner; ?>" /><input name="user_id" type="hidden" value="<?php echo $user_id; ?>" />
    <?php if ($error_owner) { ?>
        <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_owner; ?>
        </div>
    <?php } ?></td>
  </tr>
  <tr>
    <td><span class="required">*</span> <?php echo $entry_logo; ?></td>
    <td>
      <div class="logo fileupload fileupload-new" data-provides="fileupload">
        <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="<?php echo $img_logo; ?>" style="width: 150px; height: 150px;" /></div>
        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
        <div>
          <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input name="logo" type="file" /></span>
          <a href="#" class="btn fileupload-exists" data-dismiss="fileupload" onclick="$('.logo img').attr('src', '<?php echo $img_default; ?>');">Remove</a>
        </div>
      </div>
      <?php if ( $error_logo ) { ?>
        <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_logo; ?>
        </div>
      <?php } ?>
    </td>
  </tr>
  <tr>
    <td><span class="required">*</span> <?php echo $entry_group; ?></td>
    <td><select class="input-xxlarge" name="group">
      <?php foreach ($groups as $group_info) { ?>
        <option value="<?php echo $group_info['id']; ?>" <?php if ( $group_info['id'] == $group ) { ?>selected="selected"<?php } ?>><?php echo $group_info['name']; ?></option>
      <?php } ?>
    </select>
    <?php if ($error_group) { ?>
        <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_group; ?>
        </div>
    <?php } ?></td>
  </tr>
  <tr>
    <td><span class="required">*</span> <?php echo $entry_description; ?></td>
    <td><textarea class="input-xxlarge" type="text" name="description"><?php echo $description; ?></textarea>
    <?php if ($error_description) { ?>
        <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_description; ?>
        </div>
    <?php } ?></td>
  </tr>
  <tr>
    <td><?php echo $entry_status; ?></td>
    <td><select class="input-large" name="status" ><?php if ( $status ) { ?><option value="1" selected="selected" ><?php echo $text_enable; ?></option><option value="0" ><?php echo $text_disable; ?><?php }else { ?><option value="1" ><?php echo $text_enable; ?></option><option value="0" selected="selected" ><?php echo $text_disable; ?><?php } ?></select></td>
  </tr>
</table>
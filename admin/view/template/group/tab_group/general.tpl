<table class="form">
  <tr>
    <td><span class="required">*</span> <?php echo $entry_author; ?></td>
    <td><input class="input-xxlarge" required="required" type="text" name="author" value="<?php echo $author; ?>" /><input name="user_id" type="hidden" value="<?php echo $user_id; ?>" />
    <?php if ($error_author) { ?>
        <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_author; ?>
        </div>
    <?php } ?></td>
  </tr>
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
    <td><span class="required">*</span> <?php echo $entry_summary; ?></td>
    <td><textarea class="input-xxlarge" type="text" name="summary"><?php echo $summary; ?></textarea>
    <?php if ($error_summary) { ?>
        <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_summary; ?>
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
    <td><?php echo $entry_website; ?></td>
    <td><input class="input-xxlarge" type="text" name="website" value="<?php echo $website; ?>" /></td>
  </tr>
  <tr>
    <td><?php echo $entry_branch; ?></td>
    <td><select name="branch_id">
        <?php foreach ( $branches as $branch ){ ?>
        <option <?php if ( $branch['id'] == $branch_id){ ?>selected="selected"<?php } ?> value="<?php echo $branch['id']; ?>"><?php echo $branch['name']; ?></option>
        <?php } ?>
      </select></td>
  </tr>
  <tr>
    <td><?php echo $entry_type; ?></td>
    <td><select name="type">
        <?php foreach ( $types as $type ){ ?>
        <option <?php if ( $type['id'] == $type_id){ ?>selected="selected"<?php } ?> value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
        <?php } ?>
      </select></td>
  </tr>
  <tr>
    <td><?php echo $entry_status; ?></td>
    <td><select name="status">
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
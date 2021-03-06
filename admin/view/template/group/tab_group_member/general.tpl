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
  <tr>
    <td><?php echo $entry_action; ?></td>
    <td>
      <table class="table table-striped">
        <tr>
          <th><?php echo $column_action; ?></th>
        </tr>
        <?php foreach ( $actions as $action ) { ?>
        <tr>
          <td>
            <div class="controls">
              <label class="checkbox inline">
                <input type="checkbox" name="actions[]" value="<?php echo $action['id']; ?>" <?php if ($action['checked'] == true){ ?>checked="checked"<?php } ?> />
                <?php echo $action['name']; ?>
              </label>
            </div>
          </td>
        </tr>
        <?php } ?>
        <tr>
          <td>
            <div class="controls">
              <a class="btn inline btn-warning" onclick="$('.check-all-action').click();"><?php echo $button_select_all_action; ?></a>
              <input class="hidden check-all-action" type="checkbox" onclick="$('input[name*=\'actions\']').attr('checked', this.checked);" />
            </div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
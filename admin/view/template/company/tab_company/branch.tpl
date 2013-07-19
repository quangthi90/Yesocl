<table class="form">
  <tr>
    <td><?php echo $entry_branch; ?></td>
    <td>
      <table class="table table-striped">
        <tr>
          <th><?php echo $column_branch; ?></th>
        </tr>
        <?php foreach ( $branchs as $branch ) { ?>
        <tr>
          <td>
            <div class="controls">
              <label class="checkbox inline">
                <input type="checkbox" name="branchs[]" value="<?php echo $branch['id']; ?>" <?php if ($branch['checked'] == true){ ?>checked="checked"<?php } ?> />
                <?php echo $branch['name']; ?>
              </label>
            </div>
          </td>
        </tr>
        <?php } ?>
        <tr>
          <td>
            <div class="controls">
              <a class="btn inline btn-warning" onclick="$('.check-all-branch').click();"><?php echo $button_select_all_branch; ?></a>
              <input class="hidden check-all-branch" type="checkbox" onclick="$('input[name*=\'branchs\']').attr('checked', this.checked);" />
            </div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
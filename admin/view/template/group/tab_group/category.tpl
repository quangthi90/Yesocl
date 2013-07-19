<table class="form">
  <tr>
    <td><?php echo $entry_categories; ?></td>
    <td>
      <table class="table table-striped">
        <tr>
          <th><?php echo $column_category; ?></th>
        </tr>
        <?php foreach ( $categories as $category ) { ?>
        <tr class="category-info">
          <td>
            <div class="controls">
              <label class="checkbox inline">
                <input type="checkbox" name="categories[]" value="<?php echo $category['id']; ?>" <?php if ($category['checked'] == true){ ?>checked="checked"<?php } ?> />
                <?php echo $category['name']; ?>
              </label>
            </div>
          </td>
        </tr>
        <?php } ?>
        <tr class="btn-select-all">
          <td>
            <div class="controls">
              <a class="btn inline btn-warning" onclick="$('.check-all-category').click();"><?php echo $button_select_all_categories; ?></a>
              <input class="hidden check-all-category" type="checkbox" onclick="$('input[name*=\'categories\']').attr('checked', this.checked);" />
            </div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">    
    <div class="heading">
      <span><img src="view/image/admin_group.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
      	<a onclick="$('#form').submit();" class="btn btn-success"><?php echo $button_save; ?></a>
      	<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-danger"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
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
            <td><?php echo $entry_permission; ?></td>
            <td>
              <table class="table table-striped">
                <tr>
                  <th><?php echo $column_layout; ?></th>
                  <th><?php echo $column_action; ?></th>
                  <th><?php echo $column_checkall; ?></th>
                </tr>
                <?php foreach ( $layouts as $layout ) { ?>
                <tr>
                  <td><?php echo $layout['name']; ?></td>
                  <td>
                    <div class="controls">
                    <?php foreach ( $layout['actions'] as $action ) { ?>
                      <label class="checkbox inline">
                        <input type="checkbox" name="layouts[<?php echo $layout['id']; ?>][]" value="<?php echo $action['id']; ?>" <?php if ($action['checked'] == true){ ?>checked="checked"<?php } ?> />
                        <?php echo $action['name']; ?>
                      </label>
                    <?php } ?>
                    </div>
                  </td>
                  <td><input type="checkbox" onclick="$(this).parent().parent().find('input[name*=\'layouts\']').attr('checked', this.checked);" /></td>
                </tr>
                <?php } ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="controls"><a class="btn inline btn-warning" onclick="$('.check-all-action').click();"><?php echo $button_select_all_action; ?></a><input class="hidden check-all-action" type="checkbox" onclick="$('input[type*=\'checkbox\']').attr('checked', this.checked);" /></div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
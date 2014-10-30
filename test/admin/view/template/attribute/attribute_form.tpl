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
      <span><img src="view/image/attribute_group.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
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
            <td><?php echo $entry_required; ?></td>
            <td><select name="required">
                <?php if ($required) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_have_value; ?></td>
            <td><select name="haveValue">
                <?php if ($haveValue) { ?>
                <option value="1" selected="selected"><?php echo $text_true; ?></option>
                <option value="0"><?php echo $text_false; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_true; ?></option>
                <option value="0" selected="selected"><?php echo $text_false; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_group; ?></td>
            <td><select name="group">
                <?php foreach ( $groups as $group ){ ?>
                <option <?php if ( $group['id'] == $group_id){ ?>selected="selected"<?php } ?> value="<?php echo $group['id']; ?>"><?php echo $group['name']; ?></option>
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
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
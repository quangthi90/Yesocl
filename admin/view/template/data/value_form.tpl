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
      <span><img src="view/image/data_type.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
        <a onclick="$('#form').submit();" class="btn btn-success"><?php echo $button_save; ?></a>
        <a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-danger"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_type; ?></td>
            <td><select name="type"><?php foreach ($types as $type_data) { ?><option value="<?php echo $type_data['id']; ?>" <?php echo ($type == $type_data['id']) ? 'selected="selected"' : ''; ?>><?php echo $type_data['name']; ?></option><?php } ?></select>
            </td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_value; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="value" value="<?php echo $value; ?>" />
            <?php if ($error_value) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_value; ?>
        </div>
            <?php } ?></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
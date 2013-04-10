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
            <td><span class="required">*</span> <?php echo $entry_username; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="username" value="<?php echo $username; ?>" />
            <?php if ($error_username) { ?>
                <div class="alert alert-error">
                  <strong>Error!</strong> <?php echo $error_username; ?>
                </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_password; ?></td>
            <td><input class="input-xxlarge" required="required" type="password" name="password" value="<?php echo $password; ?>" />
            <?php if ($error_password) { ?>
                <div class="alert alert-error">
                  <strong>Error!</strong> <?php echo $error_password; ?>
                </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_confirm; ?></td>
            <td><input class="input-xxlarge" required="required" type="password" name="confirm" value="<?php echo $confirm; ?>" />
            <?php if ($error_confirm) { ?>
                <div class="alert alert-error">
                  <strong>Error!</strong> <?php echo $error_confirm; ?>
                </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_group; ?></td>
            <td><select name="group">
                <?php foreach ( $groups as $group ){ ?>
                <option <?php if ( $group['id'] == $group_id){ ?>selected="selected"<?php } ?> value="<?php echo $group['id']; ?>"><?php echo $group['name']; ?></option>
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td><?php echo $entry_status; ?></td>
            <td>
              <select name="status">
              <?php if ($status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
              <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
              <?php } ?>
              </select>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
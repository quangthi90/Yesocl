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
      <span><img src="view/image/branch.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
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
            <td><?php echo $entry_code; ?></td>
            <td><select class="input-large" name="code" >
              <?php foreach ($codes as $_code){ ?>
              <option value="<?php echo $_code ?>" <?php if ($code == $_code){ ?>selected="selected"<?php } ?>><?php echo $_code ?></option>
              <?php } ?>
            </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_logo; ?></td>
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
            <td><?php echo $entry_order; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="order" value="<?php echo $order; ?>" /></td>
          </tr>
          <tr>
            <td><?php echo $entry_status; ?></td>
            <td><select class="input-large" name="status" ><?php if ( $status ) { ?><option value="1" selected="selected" ><?php echo $text_enable; ?></option><option value="0" ><?php echo $text_disable; ?><?php }else { ?><option value="1" ><?php echo $text_enable; ?></option><option value="0" selected="selected" ><?php echo $text_disable; ?><?php } ?></select></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div> 
<?php echo $footer; ?>
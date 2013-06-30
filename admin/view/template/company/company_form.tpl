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
      <span><img src="view/image/user.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
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
            <td><span class="required">*</span> <?php echo $entry_owner; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="owner" value="<?php echo $owner; ?>" /><input name="user_id" type="hidden" value="<?php echo $user_id; ?>" />
            <?php if ($error_owner) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_owner; ?>
        </div>
            <?php } ?></td>
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
            <td><span class="required">*</span> <?php echo $entry_created; ?></td>
            <td><input required="required" class="input-medium date" type="text" name="created" value="<?php echo $created; ?>" /></td>
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
<script type="text/javascript"><!--//
    $('.date').datepicker();
//--></script>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
CKEDITOR.replace('description', {
  filebrowserBrowseUrl: 'index.php?route=common/filemanager',
  filebrowserImageBrowseUrl: 'index.php?route=common/filemanager',
  filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager',
  filebrowserUploadUrl: 'index.php?route=common/filemanager',
  filebrowserImageUploadUrl: 'index.php?route=common/filemanager',
  filebrowserFlashUploadUrl: 'index.php?route=common/filemanager'
});
//--></script>
<script type="text/javascript"><!--//
$('input[name=\'owner\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: '<?php echo $autocomplete_user; ?>&filter=' +  encodeURIComponent(request.term),
      dataType: 'json',
      success: function(json) {   
        response($.map(json, function(item) {
          return {
            label: item.primary,
            value: item.id
          }
        }));
      }
    });
  }, 
  select: function(event, ui) {
    $('input[name=\'owner\']').val(ui.item.label);
    $('input[name=\'user_id\']').val(ui.item.value);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script>
<?php echo $footer; ?>
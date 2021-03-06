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
      <span><img src="view/image/group_post.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
      	<a onclick="$('#form').submit();" class="btn btn-success"><?php echo $button_save; ?></a>
      	<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-danger"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_author; ?></td>
            <td><input type="text" class="input-xxlarge" required="required" name="author" value="<?php echo $author; ?>" /><input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <?php if ($error_author) { ?>
                <div class="alert alert-error">
                  <strong>Error!</strong> <?php echo $error_author; ?>
                </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_title; ?></td>
            <td><input type="text" class="input-xxlarge" required="required" name="title" value="<?php echo $title; ?>" />
            <?php if ($error_title) { ?>
              	<div class="alert alert-error">
        				  <strong>Error!</strong> <?php echo $error_title; ?>
        				</div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_content; ?></td>
            <td><textarea class="input-xxlarge" required="required" name="postcontent"><?php echo $content; ?></textarea>
            <?php if ($error_content) { ?>
              	<div class="alert alert-error">
        				  <strong>Error!</strong> <?php echo $error_content; ?>
        				</div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><?php echo $entry_category; ?></td>
            <td><select name="category_id">
              <?php foreach ( $categories as $category ) { ?>
                <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $category_id){ ?>selected="selected"<?php } ?>><?php echo $category['name']; ?></option>
              <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_thumb; ?></td>
            <td>
              <div class="thumb fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="<?php echo $img_thumb; ?>" style="width: 150px; height: 150px;" /></div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                <div>
                  <span class="btn btn-file"><span class="fileupload-new"><?php echo $text_select_image; ?></span><span class="fileupload-exists"><?php echo $text_change; ?></span><input name="thumb" type="file" /></span>
                  <a href="#" class="btn fileupload-exists" data-dismiss="fileupload" onclick="$('.thumb img').attr('src', '<?php echo $img_default; ?>');"><?php echo $text_remove; ?></a>
                </div>
              </div>
              <?php if ( $error_thumb ) { ?>
                <div class="alert alert-error">
                  <strong>Error!</strong> <?php echo $error_thumb; ?>
                </div>
              <?php } ?>
            </td>
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
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
CKEDITOR.replace('postcontent', {
  filebrowserBrowseUrl: 'index.php?route=common/filemanager',
  filebrowserImageBrowseUrl: 'index.php?route=common/filemanager',
  filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager',
  filebrowserUploadUrl: 'index.php?route=common/filemanager',
  filebrowserImageUploadUrl: 'index.php?route=common/filemanager',
  filebrowserFlashUploadUrl: 'index.php?route=common/filemanager'
});
//--></script> 
<script type="text/javascript"><!--//
$('input[name=\'author\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=user/user/searchUser&filter=' +  encodeURIComponent(request.term) + '&token=<?php echo $token; ?>',
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
    $('input[name=\'author\']').val(ui.item.label);
    $('input[name=\'user_id\']').val(ui.item.value);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script>
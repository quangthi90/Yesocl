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
            <td><span class="required">*</span> <?php echo $entry_author; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="author" value="<?php echo $author; ?>" /><input name="user_id" type="hidden" value="<?php echo $user_id; ?>" />
            <?php if ($error_author) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_author; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_content; ?></td>
            <td><textarea class="input-xxlarge" type="text" name="comment_content"><?php echo $content; ?></textarea>
            <?php if ($error_content) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_content; ?>
        </div>
            <?php } ?></td>
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
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
CKEDITOR.replace('comment_content', {
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
    $('input[name=\'author\']').val(ui.item.label);
    $('input[name=\'user_id\']').val(ui.item.value);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script>
<?php echo $footer; ?>
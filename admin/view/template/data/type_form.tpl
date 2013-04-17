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
        <a onclick="$('#form').submit();" class="save btn btn-success"><?php echo $button_save; ?></a>
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
            <td><span class="required">*</span> <?php echo $entry_code; ?></td>
            <td><input class="input-xxlarge" <?php if (!$code_edit) { ?>disabled="disabled"<?php } ?> required="required" type="text" name="code" value="<?php echo $code; ?>" />
            <?php if ($error_code) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_code; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><?php echo $entry_status; ?></td>
            <td><select name="status"><?php if ($status) { ?><option value="1" selected="selected" ><?php echo $text_enable; ?></option><option value="0" ><?php echo $text_disable; ?></option><?php  }else { ?><option value="1" ><?php echo $text_enable; ?></option><option value="0" selected="selected" ><?php echo $text_disable; ?></option><?php } ?></select></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
<script type="text/javascript"><!--//
$(function () {
$('body').on('blur', 'input[name=\'code\']', function(){
      $.ajax({
        url: '<?php echo $codeValidate; ?>&code=' + $('input[name=\'code\']').val(),
        dataType: 'html',
        beforeSend: function() {
          $('input[name=\'code\']').after('<span class="wait">&nbsp;<img src="view/image/loading.gif" alt="" /></span>');
        },    
        complete: function() {
          $('.wait').remove();
        },      
        success: function(output) {
          $('input[name=\'code\']').parent().find('.warning').remove();
          $('input[name=\'code\']').parent().find('.success').remove();
          
          if (output == 'false'){
            $('input[name=\'code\']').after('<div class="warning"><?php echo $error_exist_code; ?></div>');
          }else {
            $('input[name=\'code\']').after('<div class="success"><?php echo $text_valid_code; ?></div>');
          }
        }
      });
    });
});
//--></script>
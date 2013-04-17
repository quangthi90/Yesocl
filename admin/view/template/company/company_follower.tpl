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
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <span><img src="view/image/follower.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
	      <a onclick="location = '<?php echo $back; ?>'" class="btn"><?php echo $button_back; ?> <i class="icon-arrow-left"></i></a>
	      <a onclick="$('form').submit();" class="btn btn-danger"><?php echo $button_delete; ?> <i class="icon-trash"></i></a>
	  </div>
    </div>
    <div class="content">
      <form method="post" action="<?php echo $delete; ?>" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td></td>
              <td></td>
              <td class="right" ><input type="text" name="user" value="<?php echo $user; ?>" /><input type="hidden" name="user_id" value="<?php echo $user_id; ?>" /></td>
              <td><a onclick="$('form').attr('action', '<?php echo $insert; ?>').submit()" class="btn btn-success"><?php echo $button_insert; ?> <i class="icon-plus"></i></a></td>
            </tr>
            <tr>
              <td><input type="checkbox"  onclick="$('input[name*=\'id\']').attr('checked', this.checked);" /></td>
              <td><?php echo $column_fullname; ?></td>
              <td><?php echo $column_email; ?></td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            <?php if ( $followers ) { ?>
            <?php foreach ( $followers as $follower ) { ?>
            <tr>
              <td><input name="id[]" type="checkbox" value="<?php echo $follower['id']; ?>"/></td>
              <td><?php echo $follower['fullname']; ?></td>
              <td><?php echo $follower['email']; ?></td>
              <td></td>
            </tr>
            <?php } ?>
            <?php }?>
            <?php if ( !$followers ) { ?>
            <tr class="center">
              <td colspan="4"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--//
$('input[name=\'user\']').autocomplete({
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
    $('input[name=\'user\']').val(ui.item.label);
    $('input[name=\'user_id\']').val(ui.item.value);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script>
<?php echo $footer; ?>
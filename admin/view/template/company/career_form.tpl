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
      <span><img src="view/image/company_career.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
      	<a onclick="$('#form').submit();" class="btn btn-success"><?php echo $button_save; ?></a>
      	<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-danger"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      	<table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_user; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="user" value="<?php echo $user; ?>" /><input name="user_id" type="hidden" value="<?php echo $user_id; ?>" />
            <?php if ($error_user) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_user; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_position; ?></td>
            <td><select class="input-xxlarge" name="position">
              <?php foreach ($positions as $position_info) { ?>
                <option value="<?php echo $position_info['id']; ?>" <?php if ( $position_info['id'] == $position ) { ?>selected="selected"<?php } ?>><?php echo $position_info['name']; ?></option>
              <?php } ?>
            </select>
            <?php if ($error_position) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_position; ?>
        </div>
            <?php } ?></td>
          </tr>
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
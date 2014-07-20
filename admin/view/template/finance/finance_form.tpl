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
      <span><img src="view/image/finance.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
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
            <td><span class="required">*</span> <?php echo $entry_group; ?></td>
            <td><select class="input-large" name="group" >
            <?php foreach ($groups as $group) { ?>
              <option value="<?php echo $group['id']; ?>"><?php echo $group['name']; ?></option>
            <?php } ?>
            </select></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_parent; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="parent" value="<?php echo $parent; ?>" />
            <?php if ($error_parent) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_parent; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_order; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="order" value="<?php echo $order; ?>" />
            <?php if ($error_order) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_order; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><?php echo $entry_status; ?></td>
            <td><select class="input-large" name="status" >
              <option value="true"><?php echo $text_enabled; ?></option>
              <option value="false" <?php if ( $status == false ) { ?>selected="selected"<?php } ?>><?php echo $text_disabled; ?></option>
            </select></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
<script type="text/javascript"><!--
$('input[name=\'parent\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: '<?php echo $autocomplete_finance; ?>&filter_name=' +  encodeURIComponent(request.term),
      dataType: 'json',
      success: function(json) {   
        response($.map(json, function(item) {
          return {
            label: item.name,
            value: item.id
          }
        }));
      }
    });
  }, 
  select: function(event, ui) {
    $('input[name=\'parent\']').val(ui.item.label);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script>
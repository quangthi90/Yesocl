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
      <span><img src="view/image/finance_function.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
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
            <td><input class="input-xxlarge" required="required" type="text" name="owner" value="<?php echo $owner; ?>" />
              <input type="hidden" name="owner_id" value="<?php echo $owner_id; ?>"/>
            <?php if ($error_owner) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_owner; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_function; ?></td>
            <td><input type="text" name="function" value="<?php echo $function; ?>">
              <?php if ($error_function) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_function; ?>
        </div>
            <?php } ?></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
<script type="text/javascript"><!--//
$('input[name=\'owner\']').autocomplete({
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
    $('input[name=\'owner\']').val(ui.item.label);
    $('input[name=\'owner_id\']').val(ui.item.value);

    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script>
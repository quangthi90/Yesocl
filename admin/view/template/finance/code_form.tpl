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
      <span><img src="view/image/finance_code.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
      	<a onclick="$('#form').submit();" class="btn btn-success"><?php echo $button_save; ?></a>
      	<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-danger"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      	<table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_code; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="code" value="<?php echo $code; ?>" />
            <?php if ($error_code) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_code; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_finance; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="finance" value="<?php echo $finance; ?>" />
              <input type="hidden" name="finance_id" value="<?php echo $finance_id; ?>"/>
            <?php if ($error_finance) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_finance; ?>
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
<script type="text/javascript"><!--//
$('input[name=\'finance\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=finance/finance/search&filter_name=' +  encodeURIComponent(request.term) + '&token=<?php echo $token; ?>',
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
    $('input[name=\'finance\']').val(ui.item.label);
    $('input[name=\'finance_id\']').val(ui.item.value);

    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script>
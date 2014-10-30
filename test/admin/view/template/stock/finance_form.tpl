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
      <span><img src="view/image/stock_finance.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
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
            <td><input class="input-xxlarge" required="required" type="text" name="finance_name" value="<?php echo $finance_name; ?>" /><input type="hidden" name="finance_id" value="<?php echo $finance_id; ?>" />
            <?php if ($error_finance_name) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_finance_name; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_values; ?></td>
            <td>
              <table id="values">
                <?php foreach ($values as $datetime => $value) { ?>
                <tr class="value-item">
                  <td>
                    <select class="datetime">
                      <?php foreach ($dates as $date) { 
                        if ($datetime == $date['year'] . '-' . $date['quarter']){
                          $sDatetime = $date['year'] . '-' . $date['quarter'];
                        }
                      ?>
                      <option <?php if ($datetime == $date['year'] . '-' . $date['quarter']){ ?>selected="selected"<?php } ?> value="<?php echo $date['year']; ?>-<?php echo $date['quarter']; ?>">
                        <?php 
                        if ( $date['quarter'] != 0 ) echo $text_quarter . ' ' . $date['quarter']; 
                        echo ' ' . $text_year . ' ' . $date['year']; 
                        ?>
                      </option>
                      <?php } ?>
                    </select>
                  </td>
                  <td><input class="value" type="text" name="values[<?php echo $sDatetime; ?>]" value="<?php echo $value; ?>" placeholder="<?php echo $text_value; ?>" /></td>
                </tr>
                <?php } ?>
                <tr id="tr-add-value">
                  <td><button id="add-value-template" class="btn btn-success" type="button"><?php echo $button_add; ?></button></td>
                </tr>
              </table>
            </td>
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
$('input[name=\'finance_name\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=finance/finance/search&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
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
    $('input[name=\'finance_name\']').val(ui.item.label);
    $('input[name=\'finance_id\']').val(ui.item.value);
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script>
<script type="text/javascript">
  $('#add-value-template').on('click', function(){
    $(this).parents('tr#tr-add-value').before('<tr class="value-item"><td><select class="datetime"><?php foreach ($dates as $date){ ?><option value="<?php echo $date["year"] . "-" . $date["quarter"]; ?>"><?php if ($date["quarter"] != 0) echo $text_quarter . " " . $date["quarter"]; echo " " . $text_year . " " . $date["year"]; } ?></option></select></td><td><input class="value" type="text" name="values[<?php if (count($dates) > 0) echo $dates[0]["year"] . "-" . $dates[0]["quarter"]; ?>]" placeholder="<?php echo $text_value; ?>" /></td></tr>');
    return false;
  });
</script>
<script type="text/javascript">
  $('#values').on('change', 'select.datetime', function(){
    $(this).parents('tr.value-item').find('.value').attr('name', 'values[' + $(this).val() + ']');
  });
</script>
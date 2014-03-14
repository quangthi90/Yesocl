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
      <span><img src="view/image/stock.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
	      <a onclick="location = '<?php echo $insert; ?>'" class="btn btn-success"><?php echo $button_insert; ?> <i class="icon-plus"></i></a>
	      <a onclick="$('form').submit();" class="btn btn-danger"><?php echo $button_delete; ?> <i class="icon-trash"></i></a>
	  </div>
    </div>
    <div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td><input type="checkbox"  onclick="$('input[name*=\'id\']').attr('checked', this.checked);" /></td>
              <td><?php echo $column_name; ?></td>
              <td><?php echo $column_code; ?></td>
              <td><?php echo $column_market; ?></td>
              <td><?php echo $column_status; ?></td>
              <td><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <tr class="filter">
              <td></td>
              <td><input type="text" name="name" id="name" /></td>
              <td><input type="text" name="code" id="code" /></td>
              <td><select class="input-large" name="market_id" id="market_id">
              <option value="none"><?php echo $text_none; ?></option>
              <?php foreach ( $markets as $market ) { ?>
              <option value="<?php echo $market['id']; ?>"><?php echo $market['name']; ?></option>
              <?php } ?>
            </select></td>
              <td><select class="input-large" name="status" id="status">
              <option value="none"><?php echo $text_none; ?></option>
              <option value="true"><?php echo $text_enabled; ?></option>
              <option value="false"><?php echo $text_disabled; ?></option>
            </select></td>
              <td align="right"><a onclick="filter();" class="btn btn-primary"><?php echo $button_filter; ?></a></td>
            </tr>
            <?php if ( $stocks ) { ?>
            <?php foreach ( $stocks as $stock ) { ?>
            <tr>
              <td><input name="id[]" type="checkbox" value="<?php echo $stock['id']; ?>"/></td>
              <td><?php echo $stock['name']; ?></td>
              <td><?php echo $stock['code']; ?></td>
              <td><?php echo $stock['market']; ?></td>
              <td><?php echo $stock['status']; ?></td>
              <td class="right"><?php foreach ( $stock['action'] as $action ) { ?>
               	<a class="btn btn-primary" href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?> <i class="<?php echo $action['icon']; ?>"></i></a>
                <?php } ?></td>
            </tr>
            <?php } ?>
            <?php }?>
            <?php if ( !$stocks ) { ?>
            <tr class="center">
              <td colspan="6"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
function filter() {
  url = 'index.php?route=data/value&token=<?php echo $token; ?>';

  var filter_type_name = $('input[name=\'filter_type_name\']').attr('value');
  
  if (filter_type_name) {
    url += '&filter_type_name=' + encodeURIComponent(filter_type_name);
  }
  
  var filter_type = $('input[name=\'filter_type\']').attr('value');
  
  if (filter_type) {
    url += '&filter_type=' + encodeURIComponent(filter_type);
  }

  var filter_name = $('input[name=\'filter_name\']').attr('value');
  
  if (filter_name) {
    url += '&filter_name=' + encodeURIComponent(filter_name);
  } 
  
  var filter_value = $('input[name=\'filter_value\']').attr('value');
  
  if (filter_value) {
    url += '&filter_value=' + encodeURIComponent(filter_value);
  } 

  location = url;
}
//--></script>
<script type="text/javascript"><!--
$('input[id=\'name\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=stock/stock/search&token=<?php echo $token; ?>&name=' +  encodeURIComponent(request.term),
      dataType: 'json',
      success: function(json) {   
        response($.map(json, function(item) {
          return {
            label: item.name,
            value: item.name
          }
        }));
      }
    });
  }, 
  select: function(event, ui) {
    $('input[id=\'name\']').val(ui.item.value);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script>
<script type="text/javascript"><!--
$('input[id=\'code\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=stock/stock/search&token=<?php echo $token; ?>&code=' +  encodeURIComponent(request.term),
      dataType: 'json',
      success: function(json) {   
        response($.map(json, function(item) {
          return {
            label: item.code,
            value: item.code
          }
        }));
      }
    });
  }, 
  select: function(event, ui) {
    $('input[id=\'code\']').val(ui.item.value);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script> 
<?php echo $footer; ?>
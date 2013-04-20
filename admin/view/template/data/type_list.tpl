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
      <span><img src="view/image/user_group.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
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
              <td><input type="checkbox"/  onclick="$('input[name*=\'id\']').attr('checked', this.checked);" ></td>
              <td><?php if ($sort == 'name') { ?>
                <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_name; ?>"><?php echo $column_name; ?></a>
                <?php } ?></td>
              <td><?php if ($sort == 'code') { ?>
                <a href="<?php echo $sort_code; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_code; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_code; ?>"><?php echo $column_code; ?></a>
                <?php } ?></td>
              <td><?php if ($sort == 'status') { ?>
                <a href="<?php echo $sort_status; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_status; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_status; ?>"><?php echo $column_status; ?></a>
                <?php } ?></td>
              <td><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <tr class="filter">
              <td></td>
              <td><input type="text" name="filter_name" value="<?php echo $filter_name; ?>" /></td>
              <td><input type="text" name="filter_code" value="<?php echo $filter_code; ?>" /></td>
              <td><select name="status"><option></option><option value="1" <?php if ($filter_stauts) { ?>selected="selected"<?php } ?> ><?php echo $text_enable; ?></option><option value="0" <?php if (!$filter_stauts) { ?>selected="selected"<?php } ?> ><?php echo $text_disable; ?></option></select></td>
              <td align="right"><a onclick="filter();" class="btn btn-primary"><?php echo $button_filter; ?></a></td>
            </tr>
            <?php if ($types) { ?>
            <?php foreach ($types as $type) { ?>
            <tr>
              <td><input name="id[]" type="checkbox" value="<?php echo $type['id']; ?>" onclick="$(this).attr('checked', 'checked');" <?php if ( $type['hasvalues'] ) { ?>hasvalues="1"<?php } ?> /></td>
              <td><?php echo $type['name']; ?></td>
              <td><?php echo $type['code']; ?></td>
              <td><?php echo ($type['status']) ? $text_enable : $text_disable; ?></td>
              <td class="right"><?php foreach ($type['action'] as $action) { ?>
                <a class="btn btn-primary" href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?> <i class="<?php echo $action['icon']; ?>"></i></a>
                <?php } ?></td>
            </tr>
            <?php } ?>
            <?php }?>
            <?php if (!$types) { ?>
            <tr class="center">
              <td colspan="5"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
  </div>
</div>
<?php echo $footer; ?>
<script type="text/javascript"><!--
function filter() {
  url = 'index.php?route=data/type';
  
  var filter_name = $('input[name=\'filter_name\']').attr('value');
  
  if (filter_name) {
    url += '&filter_name=' + encodeURIComponent(filter_name);
  }

  var filter_code = $('input[name=\'filter_code\']').attr('value');
  
  if (filter_code) {
    url += '&filter_code=' + encodeURIComponent(filter_code);
  }

  location = url;
}
//--></script> 
<script type="text/javascript"><!--
$('#form input').keydown(function(e) {
  if (e.keyCode == 13) {
    filter();
  }
});
//--></script> 
<script type="text/javascript"><!--
$('input[name=\'filter_name\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: '<?php echo $autocomplete_type; ?>&filter_name=' +  encodeURIComponent(request.term),
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
    $('input[name=\'filter_name\']').val(ui.item.label);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script> 
<script type="text/javascript"><!--
$('input[name=\'filter_code\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: '<?php echo $autocomplete_type; ?>&filter_code=' +  encodeURIComponent(request.term),
      dataType: 'json',
      success: function(json) {   
        response($.map(json, function(item) {
          return {
            label: item.code,
            value: item.id
          }
        }));
      }
    });
  }, 
  select: function(event, ui) {
    $('input[name=\'filter_code\']').val(ui.item.label);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script> 
<script type="text/javascript"><!--//
$('#form').on('submit', function(){
  if ( $('input[checked=\'checked\'][hasvalues=\'1\']').length > 0 ) {
    alert('<?php echo $text_has_values; ?>');
  }
});
//--></script>
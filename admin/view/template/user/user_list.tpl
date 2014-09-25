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
      <span><img src="view/image/user.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
        <a onclick="location = '<?php echo $export; ?>'" class="btn btn-primary btn-export"><?php echo $button_export; ?> <i class="icon-circle-arrow-up"></i></a>
	      <a onclick="location = '<?php echo $insert; ?>'" class="btn btn-success"><?php echo $button_insert; ?> <i class="icon-plus"></i></a>
	      <a onclick="$('form').submit();" class="btn btn-danger"><?php echo $button_delete; ?> <i class="icon-trash"></i></a>
	  </div>
    </div>
    <div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td><input type="checkbox" onclick="$('input[name*=\'id\']').attr('checked', this.checked);" /></td>
              <td><?php echo $text_username; ?></td>
              <td><?php echo $text_email; ?></td>
              <td><?php echo $text_group; ?></td>
              <td style="width:50px;"><?php echo $text_status; ?></td>
              <td><?php echo $text_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <tr class="filter">
              <td></td>
              <td><input type="text" id="filter_username" name="filter_username" value="<?php echo $filter_username; ?>" /></td>
              <td><input type="text" id="filter_email" name="filter_email" value="<?php echo $filter_email; ?>" /></td>
              <td>
                <select id="filter_group" name="filter_group">
                  <option value="">--None--</option>
                  <option value="1" <?php if ($filter_group==1) { ?>selected="selected"<?php } ?> ><?php echo $text_default; ?></option>
                  <option value="2" <?php if ($filter_status==2) { ?>selected="selected"<?php } ?> ><?php echo $text_findAllDocumentGroup; ?></option>
                </select>
              </td>
              <td><select id="status" name="status">
                <option value="">--None--</option>
                <option value="1" <?php if ($filter_status==1) { ?>selected="selected"<?php } ?> ><?php echo $text_enabled; ?></option>
                <option value="2" <?php if ($filter_status==2) { ?>selected="selected"<?php } ?> ><?php echo $text_disabled; ?></option></select></td>
              <td align="right"><a onclick="filter();" class="btn btn-primary"><?php echo $button_filter; ?></a></td>
            </tr>
            <?php if ($users) { ?>
            <?php foreach ($users as $user) { ?>
            <tr>
              <td><input name="id[]" type="checkbox" value="<?php echo $user['id']; ?>"/></td>
              <td><?php echo $user['username']; ?></td>
              <td><?php echo $user['email']; ?></td>
              <td><?php echo $user['group']; ?></td>
              <td><?php echo $user['status']; ?></td>
              <td class="right"><?php foreach ($user['action'] as $action) { ?>
               	<a class="btn btn-primary" href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?> <i class="<?php echo $action['icon']; ?>"></i></a>
                <?php } ?></td>
            </tr>
            <?php } ?>
            <?php }?>
            <?php if (!$users) { ?>
            <tr class="center">
              <td colspan="10"><?php echo $text_no_results; ?></td>
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
  url = 'index.php?route=user/user/search&token=<?php echo $token; ?>';
  
  var filter_username = $('input[name=\'filter_username\']').attr('value');
  
  if (filter_username) {
    url += '&filter_username=' + encodeURIComponent(filter_username);
  }
  
  var filter_email = $('input[name=\'filter_email\']').attr('value');

  if (filter_email) {
    url += '&filter_email=' + encodeURIComponent(filter_email);
  }

  var filter_group = $('input[name=\'filter_group\']').attr('value');
  
  if (filter_group) {
    url += '&filter_group=' + encodeURIComponent(filter_group);
  }

  alert(url);
  window.location = url;
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
$('input[name=\'filter_username\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=user/user/search&token=<?php echo $token; ?>&filter_username=' +  encodeURIComponent(request.term),
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
    $('input[name=\'filter_username\']').val(ui.item.label);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script> 
<script type="text/javascript"><!--
$('input[name=\'filter_email\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=user/user/search&token=<?php echo $token; ?>&filter_email=' +  encodeURIComponent(request.term),
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
    $('input[name=\'filter_email\']').val(ui.item.label);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script> 
<script type="text/javascript"><!--
$('input[name=\'filter_group\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=user/user/search&token=<?php echo $token; ?>&filter_group=' +  encodeURIComponent(request.term),
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
    $('input[name=\'filter_group\']').val(ui.item.label);
            
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

<!--Export-->
<script type="text/javascript">
  $('.btn-export').on('click', function () {
    if ( $('#from').val() > $('#to').val() ){
      alert('from year must least than to year');
      return false;
    }
    window.location.href = $(this).attr('data-href') + '&from=' + $('#from').val() + '&to=' + $('#to').val();
  });
</script>
<?php echo $footer; ?>
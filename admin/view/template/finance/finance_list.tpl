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
      <span><img src="view/image/finance.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
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
              <td><?php echo $column_group; ?></td>
              <td><?php echo $column_parent; ?></td>
              <td><?php echo $column_order; ?></td>
              <td><?php echo $column_status; ?></td>
              <td><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <tr class="filter">
              <td></td>
              <td><input type="text" name="filter_name" value="<?php echo $filter_name; ?>" /></td>
              <td><input type="text" name="filter_group" value="<?php echo $filter_group; ?>" /><input type="hidden" name="filter_group_id" value="<?php echo $filter_group_id; ?>" /></td>
              <td align="left"></td>
              <td align="right"></td>
              <td><select name="filter_status">
                  <option value="*"></option>
                  <?php if ($filter_status) { ?>
                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <?php } ?>
                  <?php if (!is_null($filter_status) && !$filter_status) { ?>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
                  <option value="0"><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select></td>
              <td align="right"><a onclick="filter();" class="button"><?php echo $button_filter; ?></a></td>
            </tr>
            <?php if ( $finances ) { ?>
            <?php foreach ( $finances as $finance ) { ?>
            <tr>
              <td><input name="id[]" type="checkbox" value="<?php echo $finance['id']; ?>"/></td>
              <td><?php echo $finance['name']; ?></td>
              <td><?php echo $finance['group']; ?></td>
              <td><?php echo $finance['parent']; ?></td>
              <td><?php echo $finance['order']; ?></td>
              <td><?php echo $finance['status']; ?></td>
              <td class="right"><?php foreach ( $finance['action'] as $action ) { ?>
               	<a class="btn btn-primary" href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?> <i class="<?php echo $action['icon']; ?>"></i></a>
                <?php } ?></td>
            </tr>
            <?php } ?>
            <?php }?>
            <?php if ( !$finances ) { ?>
            <tr class="center">
              <td colspan="9"><?php echo $text_no_results; ?></td>
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
    url = 'index.php?route=finance/finance&token=<?php echo $token; ?>';

    var filter_name = $('input[name=\'filter_name\']').attr('value');

    if (filter_name) {
      url += '&filter_name=' + encodeURIComponent(filter_name);
    }

    var filter_group = $('input[name=\'filter_group\']').attr('value');

    if (filter_group) {
      url += '&filter_group=' + encodeURIComponent(filter_group);
    }

    var filter_group_id = $('input[name=\'filter_group_id\']').attr('value');

    if (filter_group_id) {
      url += '&filter_group_id=' + encodeURIComponent(filter_group_id);
    }

    var filter_status = $('select[name=\'filter_status\']').attr('value');

    if (filter_status != '*') {
      url += '&filter_status=' + encodeURIComponent(filter_status);
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
  delay: 500,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=finance/finance/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
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

$('input[name=\'filter_group\']').autocomplete({
  delay: 500,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=finance/group/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
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
    $('input[name=\'filter_group\']').val(ui.item.label);
    $('input[name=\'filter_group_id\']').val(ui.item.value);

    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script>
<?php echo $footer; ?>
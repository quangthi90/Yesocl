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
      <span><img src="view/image/group.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
      	<a onclick="$('#form').submit();" class="btn btn-success"><?php echo $button_save; ?></a>
      	<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-danger"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo $tab_general; ?></a></li>
          <li><a href="#tab-category" data-toggle="tab"><?php echo $tab_category; ?></a></li>
        </ul>
        <div class="tab-content">
          <!-- General tab -->
          <div class="tab-pane active" id="tab-general">
            <?php include 'tab_group/general.tpl'; ?>
          </div>
        
          <!-- Member tab -->
          <div class="tab-pane" id="tab-category">
            <?php include 'tab_group/category.tpl'; ?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--//
$('input[name=\'author\']').autocomplete({
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
		$('input[name=\'author\']').val(ui.item.label);
    $('input[name=\'user_id\']').val(ui.item.value);
						
		return false;
	},
	focus: function(event, ui) {
      	return false;
   	}
});
//--></script>
<script type="text/javascript">
$('select[name=\'branch_id\']').on('change', function(){
  $.ajax({
    url: 'index.php?route=branch/branch/getCategory&branch_id=' +  $(this).val() + '&token=<?php echo $token; ?>',
    dataType: 'json',
    success: function(items) {   
      $('.category-info').remove();

      var catHtml = '';
      for ( var i = 0; i < items.length; i++ ){
        catHtml += '<tr class="category-info">';
        catHtml +=   '<td>';
        catHtml +=     '<div class="controls">';
        catHtml +=       '<label class="checkbox inline">';
        catHtml +=       '<input type="checkbox" name="categories[]" value="' + items[i].id + '" />' + items[i].name + '</label>';
        catHtml +=     '</div>';
        catHtml +=   '</td>';
        catHtml += '</tr>';
      }

      $('.btn-select-all').before(catHtml);
    }
  });
});
</script>
<?php echo $footer; ?>
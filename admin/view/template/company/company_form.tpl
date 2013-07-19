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
      <span><img src="view/image/user.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
      	<a onclick="$('#form').submit();" class="btn btn-success"><?php echo $button_save; ?></a>
      	<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-danger"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo $tab_general; ?></a></li>
          <li><a href="#tab-email" data-toggle="tab"><?php echo $tab_branch; ?></a></li>
        </ul>
        <div class="tab-content">
          <!-- General tab -->
          <div class="tab-pane active" id="tab-general">
            <?php include 'tab_company/general.tpl'; ?>
          </div>
        
          <!-- Member tab -->
          <div class="tab-pane" id="tab-email">
            <?php include 'tab_company/branch.tpl'; ?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--//
    $('.date').datepicker();
//--></script>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
CKEDITOR.replace('description', {
  filebrowserBrowseUrl: 'index.php?route=common/filemanager',
  filebrowserImageBrowseUrl: 'index.php?route=common/filemanager',
  filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager',
  filebrowserUploadUrl: 'index.php?route=common/filemanager',
  filebrowserImageUploadUrl: 'index.php?route=common/filemanager',
  filebrowserFlashUploadUrl: 'index.php?route=common/filemanager'
});
//--></script>
<script type="text/javascript"><!--//
$('input[name=\'owner\']').autocomplete({
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
    $('input[name=\'owner\']').val(ui.item.label);
    $('input[name=\'user_id\']').val(ui.item.value);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script>
<?php echo $footer; ?>
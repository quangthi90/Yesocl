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
      <span><img src="view/image/company_position.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
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
            <td><?php echo $entry_branch; ?></td>
            <td>
              <div><input class="autocomplete_branch" type="text" value="" /></div>
              <ul>
                <?php $i = 0; ?>
                <?php foreach ($branchs as $key => $branch) { ?>
                  <li><input type="hidden" name="branchs[<?php echo $i; ?>][id]" value="<?php echo $branch['id']; ?>" /><input type="hidden" name="branchs[<?php echo $i; ?>][name]" value="<?php echo $branch['name']; ?>" /><span><?php echo $branch['name']; ?></span><a class="btn-remove-branch btn btn-danger"><i class="icon-trash"></i></a></li>
                  <?php $i++; ?>
                <?php } ?>
              </ul>
            </td>
          </tr>
          <tr>
            <td><?php echo $entry_status; ?></td>
            <td><select class="input-large" name="status" ><?php if ( $status ) { ?><option value="1" selected="selected" ><?php echo $text_enable; ?></option><option value="0" ><?php echo $text_disable; ?><?php }else { ?><option value="1" ><?php echo $text_enable; ?></option><option value="0" selected="selected" ><?php echo $text_disable; ?><?php } ?></select></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
<script type="text/javascript"><!--//
var count_branch = <?php echo count( $branchs ) ; ?>;

$(function () {

  $('input.autocomplete_branch').autocomplete({
     delay: 0,
     source: function(request, response) {
       $.ajax({
         url: '<?php echo $autocomplete_branch; ?>&filter_name=' +  encodeURIComponent(request.term),
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
      if ( $('input[value=\'' + ui.item.value + '\']').length == 0 ) {
       $(this).parent().parent().find('ul').append('<li><input type="hidden" name="branchs[' + count_branch + '][id]" value="' + ui.item.value + '" /><input type="hidden" name="branchs[' + count_branch + '][name]" value="' + ui.item.label + '" /><span>' + ui.item.label + '</span><a class="btn-remove-branch btn btn-danger"><i class="icon-trash"></i></a></li>');
        count_branch++;
      }else {
        alert('Branch is exist');
      }
       return false;
     },
     focus: function(event, ui) {
        return false;
        }
  });

  $('body').on('click', '.btn-remove-branch', function() {
    $(this).parent().remove();
  });
});
//--></script>
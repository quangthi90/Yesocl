		<table class="form">
		  <tr>
		  	<td style="width: 40%;"><b><?php echo $text_title; ?></b></td>
		  	<td><b><?php echo $text_url; ?></b></td>
		  	<td><b><?php echo $text_delete; ?></b></td>
		  </tr>
		  <?php foreach ($websites as $website) { ?>
		  <tr>
            <td><select class="input-medium" name="title-type"><?php foreach($title_types as $title_type) { ?><option value="<?php echo $title_type['code']; ?>" <?php if ($website['title'] == $title_type['code']) { ?><?php $title_selected = true; ?>selected="selected"<?php }else { $title_selected = false; } ?>><?php echo $title_type['text']; ?></option><?php } ?></select>  <input class="title input-medium" <?php if ( $title_selected ) { ?>style="display: none;"<?php } ?> type="text" name="user[websites][<?php echo $key; ?>][title]" value="<?php echo $website['title']; ?>" /></td>
            <td><input class="url input-large" type="text" name="user[websites][<?php echo $key; ?>][url]" value="<?php echo $website['url']; ?>" />
            	<?php if ( isset( $error_website[$key]['url'] ) ) { ?>
                          <div class="warning"><?php echo $error_website[$key]['url']; ?></div>
                          <?php } ?>
                      </td>
            <td><a class="btn-remove-website btn btn-danger"><i class="icon-trash"></i></a></td>
          </tr>
		  <?php } ?>
          <tr class="index-add-website"></tr>
		</table>
		
<a class="btn-add-website btn btn-success"><?php echo $button_add_website; ?><i class="icon-plus"></i></a>

<script>
	var website_length = <?php echo count( $websites ); ?>;
	$(document).ready(function(){
		$('#tab-website').on('click', '.btn-add-website', function(){

			var html = '<tr>';
			html += '<td><select class="input-medium" name="title-type"><?php foreach($title_types as $title_type) { ?><option value="<?php echo $title_type['code']; ?>"><?php echo $title_type['text']; ?></option><?php } ?></select>  <input class="title input-medium" style="display: none;" type="text" name="user[websites][' + website_length + '][title]" value="" /></td>';
            html += '<td><input class="url input-large" type="text" name="user[websites][' + website_length + '][url]" value="" /></td>';
            html += '<td><a class="btn-remove-website btn btn-danger"><i class="icon-trash"></i></a></td>';
            html += '</tr>';

			$('.index-add-website').before( html );

			website_length++; 
		});

		$('#tab-website').on('click', '.btn-remove-website', function(){
			$(this).parent().parent().remove();
		});

		$('#tab-website').on('change', 'select[name=\'title-type\']', function() {
			if ($(this).val() == 'other') {
				$(this).parent().find('.title').val('');
				$(this).parent().find('.title:hidden').toggle();
			}else {
				$(this).parent().find('.title').val($(this).val());
				$(this).parent().find('.title').css('display', 'none');
			}
		});

	$('#tab-website').on('blur', 'input.url', function(){
      var curr = $(this);

      curr.parent().find('.warning').remove();
      if ( !curr.val() ) {
        curr.after('<div class="warning"><?php echo $error_url; ?></div>');
      }
    });
	});
</script>
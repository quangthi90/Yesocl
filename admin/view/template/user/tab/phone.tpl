		<table class="form">
		  <tr>
		  	<td><b><?php echo $text_type; ?></b></td>
		  	<td style="width: 40%;"><b><?php echo $text_phone; ?></b></td>
		  	<td><b><?php echo $text_visible; ?></b></td>
		  	<td><b><?php echo $text_delete; ?></b></td>
		  </tr>
		  <?php foreach ($phones as $key => $phone) { ?>
		  <tr>
            <td><select class="input-small" name="user[phones][<?php echo $key; ?>][type]" ><?php foreach ($phone_types as $phone_type) { ?><option value="<?php echo $phone_type['code']; ?>" <?php if ($phone['type'] == $phone_type['code']) { ?>selected="selected"<?php } ?>><?php echo $phone_type['text']; ?></option><?php } ?></select></td>
            <td><input class="input-medium" type="text" name="user[phones][<?php echo $key; ?>][phone]" value="<?php echo $phone['phone']; ?>" />
            	<?php if ( isset( $error_phone[$key]['phone'] ) ) { ?>
                          <div class="warning"><?php echo $error_phone[$key]['phone']; ?></div>
                          <?php } ?>
            </td>
            <td><select class="visible input-medium" name="user[phones][<?php echo $key; ?>][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>" <?php if ($phone['visible'] == $visible_type['code']) { ?>selected="selected"<?php } ?>><?php echo $visible_type['text']; ?></option><?php } ?></select></td>
            <td><a class="btn-remove-phone btn btn-danger"><i class="icon-trash"></i></a></td>
          </tr>
		  <?php } ?>
          <tr class="index-add-phone"></tr>
		</table>
		
<a class="btn-add-phone btn btn-success"><?php echo $button_add_phone; ?><i class="icon-plus"></i></a>

<script>
	var phone_length = <?php echo count($phones); ?>;
	$(document).ready(function(){
		$('#tab-phone').on('click', '.btn-add-phone', function(){

			var html = '<tr>';
            html += '<td><select class="input-small" name="user[phones][' + phone_length + '][type]" ><?php foreach ($phone_types as $phone_type) { ?><option value="<?php echo $phone_type['code']; ?>"><?php echo $phone_type['text']; ?></option><?php } ?></select></td>';
            html += '<td><input class="phone input-medium" type="text" name="user[phones][' + phone_length + '][phone]" value="" /></td>';
            html += '<td><select class="visible input-medium" name="user[phones][' + phone_length + '][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>"><?php echo $visible_type['text']; ?></option><?php } ?></select></td>';
            html += '<td><a class="btn-remove-phone btn btn-danger"><i class="icon-trash"></i></a></td>';
            html += '</tr>';

			$('.index-add-phone').before( html );

			phone_length++; 
		});

		$('#tab-phone').on('click', '.btn-remove-phone', function(){
			$(this).parent().parent().remove();
		});

	$('#tab-phone').on('blur', 'input.phone', function(){
      var curr = $(this);

      curr.parent().find('.warning').remove();
      if ( !curr.val() ) {
        curr.after('<div class="warning"><?php echo $text_error_phone; ?></div>');
      }
    });
	});
</script>
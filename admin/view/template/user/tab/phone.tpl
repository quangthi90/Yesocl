		<table class="form">
		  <tr>
		  	<td><b><?php echo $text_type; ?></b></td>
		  	<td style="width: 40%;"><b><?php echo $text_phone; ?></b></td>
		  	<td><b><?php echo $text_visible; ?></b></td>
		  	<td><b><?php echo $text_delete; ?></b></td>
		  </tr>
		  <tr>
            <td><select class="input-small" name="user[phone][0][type]" ><?php foreach ($phone_types as $phone_type) { ?><option value="<?php echo $phone_type['code']; ?>"><?php echo $phone_type['text']; ?></option><?php } ?></select></td>
            <td><input class="input-medium" type="text" name="user[phone][0][phone]" value="" /></td>
            <td><select class="visible input-medium" name="user[phone][0][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>"><?php echo $visible_type['text']; ?></option><?php } ?></select></td>
            <td><a class="btn-remove-phone btn btn-danger"><i class="icon-trash"></i></a></td>
          </tr>
          <tr class="index-add-phone"></tr>
		</table>
		
<a class="btn-add-phone btn btn-success"><?php echo $button_add_phone; ?><i class="icon-plus"></i></a>

<script>
	var phone_length = 1;
	$(document).ready(function(){
		$('#tab-phone').on('click', '.btn-add-phone', function(){

			var html = '<tr>';
            html += '<td><select class="input-small" name="user[phone][' + phone_length + '][type]" ><?php foreach ($phone_types as $phone_type) { ?><option value="<?php echo $phone_type['code']; ?>"><?php echo $phone_type['text']; ?></option><?php } ?></select></td>';
            html += '<td><input class="input-medium" type="text" name="user[phone][' + phone_length + '][phone]" value="" /></td>';
            html += '<td><select class="visible input-medium" name="user[phone][' + phone_length + '][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>"><?php echo $visible_type['text']; ?></option><?php } ?></select></td>';
            html += '<td><a class="btn-remove-phone btn btn-danger"><i class="icon-trash"></i></a></td>';
            html += '</tr>';

			$('.index-add-phone').before( html );

			phone_length++; 
		});

		$('#tab-phone').on('click', '.btn-remove-phone', function(){
			$(this).parent().parent().remove();
		});
	});
</script>
		<table class="form">
		  <tr>
		  	<td><b><?php echo $text_name; ?></b></td>
		  	<td><b><?php echo $text_value; ?></b></td>
		  	<td><b><?php echo $text_visible; ?></b></td>
		  	<td><b><?php echo $text_delete; ?></b></td>
		  </tr>
		  <tr>
            <td><input class="name input-medium" type="text" name="user[former][0][name]" value="" /></td>
            <td><input class="value input-medium" type="text" name="user[former][0][value]" value="" /></td>
            <td><select class="visible input-medium" name="user[former][0][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>"><?php echo $visible_type['text']; ?></option><?php } ?></select></td>
            <td><a class="btn-remove-former btn btn-danger"><i class="icon-trash"></i></a></td>
          </tr>
          <tr class="index-add-former"></tr>
		</table>
		
<a class="btn-add-former btn btn-success"><?php echo $button_add_former; ?><i class="icon-plus"></i></a>

<script>
	var former_length = 1;
	$(document).ready(function(){
		$('#tab-former').on('click', '.btn-add-former', function(){

			var html = '<tr>';
            html += '<td><input class="name input-medium" type="text" name="user[former][' + former_length + '][name]" value="" /></td>';
            html += '<td><input class="value input-medium" type="text" name="user[former][' + former_length + '][value]" value="" /></td>';
            html += '<td><select class="visible input-medium" name="user[former][' + former_length + '][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>"><?php echo $visible_type['text']; ?></option><?php } ?></select></td>';
            html += '<td><a class="btn-remove-former btn btn-danger"><i class="icon-trash"></i></a></td>';
            html += '</tr>';

			$('.index-add-former').before( html );

			former_length++; 
		});

		$('#tab-former').on('click', '.btn-remove-former', function(){
			$(this).parent().parent().remove();
		});
	});
</script>
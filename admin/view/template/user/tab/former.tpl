		<table class="form">
		  <tr>
		  	<td><b><?php echo $text_name; ?></b></td>
		  	<td><b><?php echo $text_value; ?></b></td>
		  	<td><b><?php echo $text_visible; ?></b></td>
		  	<td><b><?php echo $text_delete; ?></b></td>
		  </tr>
		  <?php foreach ($formers as $key => $former) { ?>
		  <tr>
            <td><input class="name input-medium" type="text" name="user[formers][<?php echo $key; ?>][name]" value="<?php echo $former['name']; ?>" /></td>
            <td><input class="value input-medium" type="text" name="user[formers][<?php echo $key; ?>][value]" value="<?php echo $former['value']; ?>" /></td>
            <td><select class="visible input-medium" name="user[formers][<?php echo $key; ?>][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>" <?php if ( $former['visible'] == $visible_type['code'] ) { ?>selected="selected"<?php } ?>><?php echo $visible_type['text']; ?></option><?php } ?></select></td>
            <td><a class="btn-remove-former btn btn-danger"><i class="icon-trash"></i></a></td>
          </tr>
		  <?php } ?>
          <tr class="index-add-former"></tr>
		</table>
		
<a class="btn-add-former btn btn-success"><?php echo $button_add_former; ?><i class="icon-plus"></i></a>

<script>
	var former_length = <?php echo count( $formers ); ?>;
	$(document).ready(function(){
		$('#tab-former').on('click', '.btn-add-former', function(){

			var html = '<tr>';
            html += '<td><input class="name input-medium" type="text" name="user[formers][' + former_length + '][name]" value="" /></td>';
            html += '<td><input class="value input-medium" type="text" name="user[formers][' + former_length + '][value]" value="" /></td>';
            html += '<td><select class="visible input-medium" name="user[formers][' + former_length + '][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>"><?php echo $visible_type['text']; ?></option><?php } ?></select></td>';
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
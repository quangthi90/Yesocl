		<table class="form">
		  <tr>
		  	<td><b><?php echo $text_type; ?></b></td>
		  	<td style="width: 40%;"><b><?php echo $text_im; ?></b></td>
		  	<td><b><?php echo $text_visible; ?></b></td>
		  	<td><b><?php echo $text_delete; ?></b></td>
		  </tr>
		  <tr>
            <td><select class="input-small" name="user[im][0][type]" ><?php foreach ($im_types as $im_type) { ?><option value="<?php echo $im_type['code']; ?>"><?php echo $im_type['text']; ?></option><?php } ?></select></td>
            <td><input class="input-medium" type="text" name="user[im][0][im]" value="" /></td>
            <td><select class="visible input-medium" name="user[im][0][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>"><?php echo $visible_type['text']; ?></option><?php } ?></select></td>
            <td><a class="btn-remove-im btn btn-danger"><i class="icon-trash"></i></a></td>
          </tr>
          <tr class="index-add-im"></tr>
		</table>
		
<a class="btn-add-im btn btn-success"><?php echo $button_add_im; ?><i class="icon-plus"></i></a>

<script>
	var im_length = 1;
	$(document).ready(function(){
		$('#tab-im').on('click', '.btn-add-im', function(){

			var html = '<tr>'
            html += '<td><select class="input-small" name="user[im][' + im_length + '][type]" ><?php foreach ($im_types as $im_type) { ?><option value="<?php echo $im_type['code']; ?>"><?php echo $im_type['text']; ?></option><?php } ?></select></td>'
            html += '<td><input class="input-medium" type="text" name="user[im][' + im_length + '][im]" value="" /></td>'
            html += '<td><select class="visible input-medium" name="user[im][' + im_length + '][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>"><?php echo $visible_type['text']; ?></option><?php } ?></select></td>'
            html += '<td><a class="btn-remove-im btn btn-danger"><i class="icon-trash"></i></a></td>'
            html += '</tr>'

			$('.index-add-im').before( html );

			im_length++; 
		});

		$('#tab-im').on('click', '.btn-remove-im', function(){
			$(this).parent().parent().remove();
		});
	});
</script>
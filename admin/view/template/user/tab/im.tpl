		<table class="form">
		  <tr>
		  	<td><b><?php echo $text_type; ?></b></td>
		  	<td style="width: 40%;"><b><?php echo $text_im; ?></b></td>
		  	<td><b><?php echo $text_visible; ?></b></td>
		  	<td><b><?php echo $text_delete; ?></b></td>
		  </tr>
		  <?php foreach ($ims as $key => $im) { ?>
		  <tr>
            <td><select class="input-small" name="user[ims][<?php echo $key; ?>][type]" ><?php foreach ($im_types as $im_type) { ?><option value="<?php echo $im_type['code']; ?>" <?php if($im['type'] == $im_type['code']) { ?>selected="selected"<?php } ?>><?php echo $im_type['text']; ?></option><?php } ?></select></td>
            <td><input class="input-medium" type="text" name="user[ims][<?php echo $key; ?>][im]" value="<?php echo $im['im']; ?>" /></td>
            <td><select class="visible input-medium" name="user[ims][<?php echo $key; ?>][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>" <?php if($im['visible'] == $visible_type['code']) { ?>selected="selected"<?php } ?>><?php echo $visible_type['text']; ?></option><?php } ?></select></td>
            <td><a class="btn-remove-im btn btn-danger"><i class="icon-trash"></i></a></td>
          </tr>
		  <?php } ?>
          <tr class="index-add-im"></tr>
		</table>
		
<a class="btn-add-im btn btn-success"><?php echo $button_add_im; ?><i class="icon-plus"></i></a>

<script>
	var im_length = <?php echo count($ims); ?>;
	$(document).ready(function(){
		$('#tab-im').on('click', '.btn-add-im', function(){

			var html = '<tr>'
            html += '<td><select class="input-small" name="user[ims][' + im_length + '][type]" ><?php foreach ($im_types as $im_type) { ?><option value="<?php echo $im_type['code']; ?>"><?php echo $im_type['text']; ?></option><?php } ?></select></td>'
            html += '<td><input class="input-medium" type="text" name="user[ims][' + im_length + '][im]" value="" /></td>'
            html += '<td><select class="visible input-medium" name="user[ims][' + im_length + '][visible]"><?php foreach ($visible_types as $visible_type) { ?><option value="<?php echo $visible_type['code']; ?>"><?php echo $visible_type['text']; ?></option><?php } ?></select></td>'
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
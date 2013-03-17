			<?php if ($error_email) { ?>
              	<div class="alert alert-error">
				  <strong>Error!</strong> <?php echo $error_email; ?>
				</div>
            <?php } ?>
		<table class="form">
		  <tr>
		  	<td style="width: 60%;"><b><?php echo $text_email; ?></b></td>
		  	<td><b><?php echo $text_primary; ?></b></td>
		  	<td><b><?php echo $text_delete; ?></b></td>
		  </tr>
		  <?php foreach ( $emails as $key => $email ){ ?>
		  <tr>
            <td>
            	<input class="email input-xxlarge" type="text" name="user[emails][<?php echo $key; ?>][email]" value="<?php echo $email['email']; ?>" />
            	<input class="primary input-xxlarge" type="hidden" name="user[emails][<?php echo $key; ?>][primary]" value="<?php echo $email['primary']; ?>" />
            </td>
            <td>
            	<a class="btn-lost-primary btn btn-success disabled <?php if ( $email['primary'] !== true ){ ?>hide<?php } ?>"><i class="icon-ok"></i></a>
            	<a class="btn-set-primary btn btn-danger <?php if ( $email['primary'] === true ){ ?>hide<?php } ?>"><i class="icon-minus"></i></a>
            </td>
            <td>
            	<a class="btn-remove-email btn btn-danger <?php if ( $email['primary'] === true ){ ?>hide<?php } ?>"><i class="icon-trash"></i></a>
            </td>
          </tr>
          <?php } ?>
          <tr class="index-add-email"></tr>
		</table>
		
<a class="btn-add-email btn btn-success"><?php echo $button_add_email; ?><i class="icon-plus"></i></a>

<script>
	var exist_primary = <?php echo count($emails) > 0 ? 1 : 0; ?>;
	var email_length = <?php echo count($emails); ?>;
	$(document).ready(function(){
		$('#tab-email').on('click', '.btn-add-email', function(){
			var html = '<tr>';
			html += '<td>';
			html += '<input class="email input-xxlarge" required="required" type="text" name="user[emails][' + email_length + '][email]" />';
			html += '<input class="primary input-xxlarge" type="hidden" name="user[emails][' + email_length + '][primary]" />';
			html += '</td>';
			html += '<td>';
			html += '<a class="btn-set-primary btn btn-danger"><i class="icon-minus"></i></a>';
			html += '<a class="btn-lost-primary btn btn-success disabled hide"><i class="icon-ok"></i></a>';
			html += '</td>';
			html += '<td>';
			html += '<a class="btn-remove-email btn btn-danger"><i class="icon-trash"></i></a>';
			html += '</td>';
			html += '</tr>';

			$('.index-add-email').before( html );

			email_length++; 
		});

		$('#tab-email').on('click', '.btn-remove-email', function(){
			$(this).parent().parent().remove();
		});

		$('#tab-email').on('click', '.btn-set-primary', function(){
			if ( $(this).parent().parent().find('input').val() == '' ){
				alert('<?php echo $error_email_empty; ?>');
				return false;
			}
			
			exist_primary = 1;
			
			var btn_remove = $(this).parent().parent().find('.btn-remove-email');

			$('#tab-email').find('.btn-lost-primary').hide();
			$('#tab-email').find('.btn-set-primary').show();
			$('#tab-email').find('.btn-remove-email').show();
			
			$(this).hide();
			$(this).parent().find('.btn-lost-primary').show();
			btn_remove.hide();

			$('.primary').attr({
				value: false
			});
			$(this).parent().parent().find('input.primary').attr({
				value: true
			});
		});

		$('#form').on('submit', function(){
			if ( exist_primary == 0 ){
				alert('<?php echo $error_primary_email; ?>');
				return false;
			}
		});

		$('#tab-email').on('blur', 'input.input-xxlarge', function(){
			var curr = $(this);
			$.ajax({
				url: '<?php echo $emailValidate; ?>&email=' + $(this).val(),
				dataType: 'html',
				beforeSend: function() {
					curr.after('<span class="wait">&nbsp;<img src="view/image/loading.gif" alt="" /></span>');
				},		
				complete: function() {
					$('.wait').remove();
				},			
				success: function(output) {
					curr.parent().find('.warning').remove();
					
					if (output == 'false'){
						curr.after('<div class="warning"><?php echo $error_exist_email; ?></div>');
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		});
	});
</script>
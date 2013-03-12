		<table class="form">
			<tr>
				<td>
				<div class="row-fluid">
					<div class="span4">
						<div class="span3"><strong>Company:</strong></div>
						<div class="span9"><input class="company input-medium" type="text" name="user[background][experience][0][company]" value="" /></div>
					</div>
					<div class="span4">
						<div class="span3">Current:</div>
						<div class="span9"><a class="btn-lost-current btn btn-success disabled hide"><i class="icon-ok"></i></a><a class="btn-set-current btn btn-danger"><i class="icon-minus"></i></a><input class="current" type="hidden" name="user[background][experience][0][current]" value="true" /></div>
					</div>
					<div class="span1 offset3"><a class="btn-remove-experience btn btn-danger"><i class="icon-trash"></i></a></div>
				</div>
				<div class="row-fluid">
          			<div class="span4">
          				<div class="span3">Title:</div>
          				<div class="span9"><input class="title input-medium" type="text" name="user[background][experience][0][title]" value="" /></div>
          			</div>
          			<div class="span4">
          				<div class="span3">Location:</div>
          				<div class="span9"><input class="localtion input-medium" type="text" name="user[background][experience][0][localtion]" value="" /></div>
          			</div>
          		</div>
          		<div class="row-fluid">
          			<div class="span4">
          				<div class="span3">Time Period:</div>
          				<div class="span9"><input class="started input-small" type="text" name="user[background][experience][0][started]" value="" /> to <input class="ended input-small" type="text" name="user[background][experience][0][ended]" value="" /></div>
          			</div>
          		</div>
          		<div class="row-fluid">
          			<div class="span4">
          				<div class="span3">Description:</div>
          				<div class="span9"><input class="description input-xxlarge" type="text" name="user[background][experience][0][description]" value="" /></div>
          			</div>
          		</div>
				</td>
			</tr>
          	<tr class="index-add-experience"></tr>
		</table>
<a class="btn-add-experience btn btn-success" >Add Experience<i class="icon-plus"></i></a>

<script>
	var exist_current = 0;
	var experience_length = 1;
	$(document).ready(function(){
		$('#tab-experience').on('click', '.btn-add-experience', function(){

			var html = '<tr>';
			html += 	'<td>';
			html += 	'<div class="row-fluid">';
			html += 		'<div class="span4">';
			html += 			'<div class="span3"><strong>Company:</strong></div>';
			html += 			'<div class="span9"><input class="experience input-medium" type="text" name="user[background][experience][' + experience_length + '][company]" value="" /></div>';
			html += 		'</div>';
			html += 		'<div class="span4">';
			html += 			'<div class="span3">Current:</div>';
			html += 			'<div class="span9"><a class="btn-lost-current btn btn-success disabled hide"><i class="icon-ok"></i></a><a class="btn-set-current btn btn-danger"><i class="icon-minus"></i></a><input class="current" type="hidden" name="user[background][experience][' + experience_length + '][current]" value="true" /></div>';
			html += 		'</div>';
			html += 		'<div class="span1 offset3"><a class="btn-remove-experience btn btn-danger"><i class="icon-trash"></i></a></div>';
			html += 	'</div>';
			html += 	'<div class="row-fluid">';
          	html += 		'<div class="span4">';
          	html += 			'<div class="span3">Title:</div>';
          	html += 			'<div class="span9"><input class="title input-medium" type="text" name="user[background][experience][' + experience_length + '][title]" value="" /></div>';
          	html += 		'</div>';
          	html += 		'<div class="span4">';
          	html += 			'<div class="span3">Location:</div>';
          	html += 			'<div class="span9"><input class="localtion input-medium" type="text" name="user[background][experience][' + experience_length + '][localtion]" value="" /></div>';
          	html += 		'</div>';
          	html += 	'</div>';
          	html += 	'<div class="row-fluid">';
          	html += 		'<div class="span4">';
          	html += 			'<div class="span3">Time Period:</div>';
          	html += 			'<div class="span9"><input class="started input-small" type="text" name="user[background][experience][' + experience_length + '][started]" value="" /> to <input class="ended input-small" type="text" name="user[background][experience][' + experience_length + '][ended]" value="" /></div>';
          	html += 		'</div>';
          	html += 	'</div>';
          	html += 	'<div class="row-fluid">';
          	html += 		'<div class="span4">';
          	html += 			'<div class="span3">Description:</div>';
          	html += 			'<div class="span9"><input class="description input-xxlarge" type="text" name="user[background][experience][' + experience_length + '][description]" value="" /></div>';
          	html += 		'</div>';
          	html += 	'</div>';
			html += 	'</td>';
			html += '</tr>';

			$('.index-add-experience').before( html );

			experience_length++; 
		});

		$('#tab-experience').on('click', '.btn-remove-experience', function(){
			$(this).parent().parent().parent().parent().remove();
		});

		$('#tab-experience').on('click', '.btn-set-current', function(){
			if ( $(this).parent().parent().find('input').val() == '' ){
				alert('Error Empty Experience');
				return false;
			}
			
			exist_current = 1;
			
			var btn_remove = $(this).parent().parent().parent().parent().find('.btn-remove-experience');

			$('#tab-experience').find('.btn-lost-current').hide();
			$('#tab-experience').find('.btn-set-current').show();
			$('#tab-experience').find('.btn-remove-experience').show();
			
			$(this).hide();
			$(this).parent().parent().find('.btn-lost-current').show();
			btn_remove.hide();

			$('.current').attr({
				value: false
			});
			$(this).parent().parent().find('input.current').attr({
				value: true
			});
		});

		$('#form').on('submit', function(){
			if ( exist_current == 0 ){
				alert('Error Current Experience');
				return false;
			}
		});

	});
</script>
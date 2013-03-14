		<table class="form">
			<tr>
				<td>
				<div class="row-fluid">
					<div class="span2"><strong><?php echo $entry_school; ?></strong></div>
					<div class="span9"><input class="school input-medium" type="text" name="user[background][education][0][school]" value="" /></div>
					<div class="span1"><a class="btn-remove-education btn btn-danger"><i class="icon-trash"></i></a></div>
				</div>
          		<div class="row-fluid">
          			<div class="span2"><?php echo $entry_date_attended; ?></div>
          			<div class="span10"><input class="started input-small" type="text" name="user[background][education][0][started]" value="" /> to <input class="ended input-small" type="text" name="user[background][education][0][ended]" value="" /></div>
          		</div>
				<div class="row-fluid">
          			<div class="span2"><?php echo $entry_degree; ?></div>
          			<div class="span10"><input class="degree input-medium" type="text" name="user[background][education][0][degree]" value="" /></div>
          		</div>
          		<div class="row-fluid">
          			<div class="span2"><?php echo $entry_field_of_study; ?></div>
          			<div class="span10"><input class="fieldofstudy input-medium" type="text" name="user[background][education][0][fieldofstudy]" value="" /></div>
          		</div>
          		<div class="row-fluid">
          			<div class="span2"><?php echo $entry_grace; ?></div>
          			<div class="span10"><input class="grace input-medium" type="text" name="user[background][education][0][grace]" value="" /></div>
          		</div>
          		<div class="row-fluid">
          			<div class="span2"><?php echo $entry_societies; ?></div>
          			<div class="span10"><input class="societies input-xxlarge" type="text" name="user[background][education][0][societies]" value="" /></div>
          		</div>
          		<div class="row-fluid">
          			<div class="span2"><?php echo $entry_description; ?></div>
          			<div class="span10"><input class="description input-xxlarge" type="text" name="user[background][education][0][description]" value="" /></div>
          		</div>
				</td>
			</tr>
          	<tr class="index-add-education"></tr>
		</table>
<a class="btn-add-education btn btn-success" ><?php echo $button_add_education; ?><i class="icon-plus"></i></a>

<script>
	var education_length = 1;
	$(document).ready(function(){
		$('#tab-education').on('click', '.btn-add-education', function(){

			var html = '<tr>';
			html +=	'<td>';
			html +=	'<div class="row-fluid">';
			html +=		'<div class="span2"><strong><?php echo $entry_school; ?></strong></div>';
			html +=		'<div class="span9"><input class="school input-medium" type="text" name="user[background][education][' + education_length + '][school]" value="" /></div>';
			html +=		'<div class="span1"><a class="btn-remove-education btn btn-danger"><i class="icon-trash"></i></a></div>';
			html +=	'</div>';
          	html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_date_attended; ?></div>';
          	html +=		'<div class="span10"><input class="started input-small" type="text" name="user[background][education][' + education_length + '][started]" value="" /> to <input class="ended input-small" type="text" name="user[background][education][' + education_length + '][ended]" value="" /></div>';
          	html +=	'</div>';
			html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_degree; ?></div>';
          	html +=		'<div class="span10"><input class="degree input-medium" type="text" name="user[background][education][' + education_length + '][degree]" value="" /></div>';
          	html +=	'</div>';
          	html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_field_of_study; ?></div>';
          	html +=		'<div class="span10"><input class="fieldofstudy input-medium" type="text" name="user[background][education][' + education_length + '][fieldofstudy]" value="" /></div>';
          	html +=	'</div>';
          	html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_grace; ?></div>';
          	html +=		'<div class="span10"><input class="grace input-medium" type="text" name="user[background][education][' + education_length + '][grace]" value="" /></div>';
          	html +=	'</div>';
          	html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_societies; ?></div>';
          	html +=		'<div class="span10"><input class="societies input-xxlarge" type="text" name="user[background][education][' + education_length + '][societies]" value="" /></div>';
          	html +=	'</div>';
          	html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_description; ?></div>';
          	html +=		'<div class="span10"><input class="description input-xxlarge" type="text" name="user[background][education][' + education_length + '][description]" value="" /></div>';
          	html +=	'</div>';
			html +=	'</td>';
			html +='</tr>';

			$('.index-add-education').before( html );

			education_length++; 
		});

		$('#tab-education').on('click', '.btn-remove-education', function(){
			$(this).parent().parent().parent().parent().remove();
		});
	});
</script>
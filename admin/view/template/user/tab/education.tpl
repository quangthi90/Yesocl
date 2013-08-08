		<table class="form">
               <?php foreach ($educations as $key => $education) { ?>
               <tr>
                    <td>
                    <div class="row-fluid">
                         <div class="span2"><strong><?php echo $entry_school; ?></strong></div>
                         <div class="span9"><input datalist="school" class="datalist school input-xxlarge" type="text" name="background[educations][<?php echo $key; ?>][school]" value="<?php echo $education['school']; ?>" />
                          <?php if ( isset( $error_education[$key]['school'] ) ) { ?>
                          <div class="warning"><?php echo $error_education[$key]['school']; ?></div>
                          <?php } ?>
                         </div>
                         <div class="span1"><a class="btn-remove-education btn btn-danger"><i class="icon-trash"></i></a></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_date_attended; ?></div>
                         <div class="span10">
                          <?php $cur_year = date('Y'); ?>
                          <select class="started input-small" name="background[educations][<?php echo $key; ?>][started]" >
                          <?php for ($i = $cur_year ; $i > $cur_year - 100; $i--) { ?>
                            <option value="<?php echo $i; ?>" <?php if ($i == $education['started']) { ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                          </select> 
                          <?php echo $text_to; ?> 
                          <select class="ended input-small" name="background[educations][<?php echo $key; ?>][ended]" >
                          <?php for ($i = $cur_year ; $i > $cur_year - 100; $i--) { ?>
                            <option value="<?php echo $i; ?>" <?php if ($i == $education['ended']) { ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                          </select>
                          </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_degree; ?></div>
                         <div class="span10"><input datalist="degree" class="datalist degree input-xxlarge" type="text" name="background[educations][<?php echo $key; ?>][degree]" value="<?php echo $education['degree']; ?>" /></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_field_of_study; ?></div>
                         <div class="span10"><input datalist="fieldofstudy" class="datalist fieldofstudy input-xxlarge" type="text" name="background[educations][<?php echo $key; ?>][fieldofstudy]" value="<?php echo $education['fieldofstudy']; ?>" /></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_grace; ?></div>
                         <div class="span10"><input class="grace input-xxlarge" type="text" name="background[educations][<?php echo $key; ?>][grace]" value="<?php echo $education['grace']; ?>" /></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_societies; ?></div>
                         <div class="span10"><textarea class="societies input-xxlarge" type="text" name="background[educations][<?php echo $key; ?>][societies]"><?php echo $education['societies']; ?></textarea></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_description; ?></div>
                         <div class="span10"><textarea class="description input-xxlarge" type="text" name="background[educations][<?php echo $key; ?>][description]"><?php echo $education['description']; ?></textarea></div>
                    </div>
                    </td>
               </tr>
               <?php } ?>
          	<tr class="index-add-education"></tr>
		</table>
<a class="btn-add-education btn btn-success" ><?php echo $button_add_education; ?><i class="icon-plus"></i></a>

<script><!--//
	var education_length = <?php echo count( $educations ); ?>;
	$(document).ready(function(){
		$('#tab-education').on('click', '.btn-add-education', function(){

			var html = '<tr>';
			html +=	'<td>';
			html +=	'<div class="row-fluid">';
			html +=		'<div class="span2"><strong><?php echo $entry_school; ?></strong></div>';
			html +=		'<div class="span9"><input datalist="<?php echo $code_school; ?>" class="datalist school input-medium" type="text" name="background[educations][' + education_length + '][school]" value="" /><input name="background[educations][' + education_length + '][school_id]" value="0" type="hidden" /></div>';
			html +=		'<div class="span1"><a class="btn-remove-education btn btn-danger"><i class="icon-trash"></i></a></div>';
			html +=	'</div>';
          	html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_date_attended; ?></div>';
            html +=              '<div class="span10">';
                          <?php $cur_year = date('Y'); ?>
            html +=              '<select class="started input-small" name="background[educations][' + education_length + '][started]" >';
                          <?php for ($i = $cur_year ; $i > $cur_year - 100; $i--) { ?>
            html +=                '<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>';
                          <?php } ?>
            html +=              '</select>';
            html +=              '<?php echo $text_to; ?>';
            html +=              '<select class="ended input-small" name="background[educations][' + education_length + '][ended]" >';
                          <?php for ($i = $cur_year ; $i > $cur_year - 100; $i--) { ?>
            html +=                '<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>';
                          <?php } ?>
            html +=              '</select>';
            html +=              '</div>';
          	html +=	'</div>';
			html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_degree; ?></div>';
          	html +=		'<div class="span10"><input datalist="<?php echo $code_degree; ?>" class="datalist degree input-medium" type="text" name="background[educations][' + education_length + '][degree]" value="" /><input name="background[educations][' + education_length + '][degree_id]" value="0" type="hidden" /></div>';
          	html +=	'</div>';
          	html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_field_of_study; ?></div>';
          	html +=		'<div class="span10"><input datalist="<?php echo $code_fieldofstudy; ?>" class="datalist fieldofstudy input-medium" type="text" name="background[educations][' + education_length + '][fieldofstudy]" value="" /><input name="background[educations][' + education_length + '][fieldofstudy_id]" value="0" type="hidden" /></div>';
          	html +=	'</div>';
          	html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_grace; ?></div>';
          	html +=		'<div class="span10"><input class="grace input-medium" type="text" name="background[educations][' + education_length + '][grace]" value="" /></div>';
          	html +=	'</div>';
          	html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_societies; ?></div>';
          	html +=		'<div class="span10"><input class="societies input-xxlarge" type="text" name="background[educations][' + education_length + '][societies]" value="" /></div>';
          	html +=	'</div>';
          	html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_description; ?></div>';
          	html +=		'<div class="span10"><input class="description input-xxlarge" type="text" name="background[educations][' + education_length + '][description]" value="" /></div>';
          	html +=	'</div>';
			html +=	'</td>';
			html +='</tr>';

			$('.index-add-education').before( html );

			education_length++; 


$('input.datalist').autocomplete({
   delay: 0,
   search: function( event, ui ) {
    type = $(this).attr('datalist');
   },
   source: function(request, response) {
     $.ajax({
       url: '<?php echo $autocomplete_value; ?>&filter_type_code=' + encodeURIComponent(type) + '&filter_name=' +  encodeURIComponent(request.term),
       dataType: 'json',
       success: function(json) {   
         response($.map(json, function(item) {
           return {
             label: item.name,
             value: item.id
           }
         }));
       }
     });
   }, 
   select: function(event, ui) {
     $(this).val(ui.item.label);
     $(this).next().val( ui.item.value );       
     return false;
   },
   focus: function(event, ui) {
      return false;
      }
});

		});

		$('#tab-education').on('click', '.btn-remove-education', function(){
			$(this).parent().parent().parent().parent().remove();
		});

    $('#tab-education').on('blur', 'input.school', function(){
      var curr = $(this);

      curr.parent().find('.warning').remove();
      if ( !curr.val() ) {
        curr.after('<div class="warning"><?php echo $error_school; ?></div>');
      }
    });
	});
//--></script>
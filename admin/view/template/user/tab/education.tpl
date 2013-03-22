		<table class="form">
               <?php foreach ($educations as $key => $education) { ?>
               <tr>
                    <td>
                    <div class="row-fluid">
                         <div class="span2"><strong><?php echo $entry_school; ?></strong></div>
                         <div class="span9"><input class="school input-medium" type="text" name="background[educations][<?php echo $key; ?>][school]" value="<?php echo $education['school']; ?>" /></div>
                         <div class="span1"><a class="btn-remove-education btn btn-danger"><i class="icon-trash"></i></a></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_date_attended; ?></div>
                         <div class="span10"><input class="started input-small" type="text" name="background[educations][<?php echo $key; ?>][started]" value="<?php echo $education['started']; ?>" /> to <input class="ended input-small" type="text" name="background[educations][<?php echo $key; ?>][ended]" value="<?php echo $education['ended']; ?>" /></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_degree; ?></div>
                         <div class="span10"><input class="degree input-medium" type="text" name="background[educations][<?php echo $key; ?>][degree]" value="<?php echo $education['degree']; ?>" /></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_field_of_study; ?></div>
                         <div class="span10"><input class="fieldofstudy input-medium" type="text" name="background[educations][<?php echo $key; ?>][fieldofstudy]" value="<?php echo $education['fieldofstudy']; ?>" /></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_grace; ?></div>
                         <div class="span10"><input class="grace input-medium" type="text" name="background[educations][<?php echo $key; ?>][grace]" value="<?php echo $education['grace']; ?>" /></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_societies; ?></div>
                         <div class="span10"><input class="societies input-xxlarge" type="text" name="background[educations][<?php echo $key; ?>][societies]" value="<?php echo $education['societies']; ?>" /></div>
                    </div>
                    <div class="row-fluid">
                         <div class="span2"><?php echo $entry_description; ?></div>
                         <div class="span10"><input class="description input-xxlarge" type="text" name="background[educations][<?php echo $key; ?>][description]" value="<?php echo $education['description']; ?>" /></div>
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
			html +=		'<div class="span9"><input class="school input-medium" type="text" name="background[educations][' + education_length + '][school]" value="" /></div>';
			html +=		'<div class="span1"><a class="btn-remove-education btn btn-danger"><i class="icon-trash"></i></a></div>';
			html +=	'</div>';
          	html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_date_attended; ?></div>';
          	html +=		'<div class="span10"><input class="started input-small" type="text" name="background[educations][' + education_length + '][started]" value="" /> to <input class="ended input-small" type="text" name="background[educations][' + education_length + '][ended]" value="" /></div>';
          	html +=	'</div>';
			html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_degree; ?></div>';
          	html +=		'<div class="span10"><input class="degree input-medium" type="text" name="background[educations][' + education_length + '][degree]" value="" /></div>';
          	html +=	'</div>';
          	html +=	'<div class="row-fluid">';
          	html +=		'<div class="span2"><?php echo $entry_field_of_study; ?></div>';
          	html +=		'<div class="span10"><input class="fieldofstudy input-medium" type="text" name="background[educations][' + education_length + '][fieldofstudy]" value="" /></div>';
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


$('input.school').autocomplete({
   delay: 0,
   source: function(request, response) {
     $.ajax({
       url: 'index.php?route=data/value/autocomplete&filter_type=514af76a913db48c05000010&filter_name=' +  encodeURIComponent(request.term),
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
            
     return false;
   },
   focus: function(event, ui) {
      return false;
      }
});

$('input.fieldofstudy').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=data/value/autocomplete&filter_type=514af7a3913db48c05000013&filter_name=' +  encodeURIComponent(request.term),
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
            
    return false;
  },
  focus: function(event, ui) {
     return false;
     }
});

$('input.degree').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=data/value/autocomplete&filter_type=514af771913db48c05000011&filter_name=' +  encodeURIComponent(request.term),
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
	});
//--></script>
<script type="text/javascript"><!--//
$('input.school').autocomplete({
   delay: 0,
   source: function(request, response) {
     $.ajax({
       url: 'index.php?route=data/value/autocomplete&filter_type=514af76a913db48c05000010&filter_name=' +  encodeURIComponent(request.term),
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
            
     return false;
   },
   focus: function(event, ui) {
      return false;
      }
});

$('input.fieldofstudy').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=data/value/autocomplete&filter_type=514af7a3913db48c05000013&filter_name=' +  encodeURIComponent(request.term),
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
            
    return false;
  },
  focus: function(event, ui) {
     return false;
     }
});

$('input.degree').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=data/value/autocomplete&filter_type=514af771913db48c05000011&filter_name=' +  encodeURIComponent(request.term),
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
            
    return false;
  },
  focus: function(event, ui) {
     return false;
     }
});
//--></script>
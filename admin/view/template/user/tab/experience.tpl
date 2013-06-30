		<table class="form">
			<?php foreach ($experiencies as $key => $experience) { ?>
			<tr>
				<td algin="middle">
				<div class="row-fluid">
					<div class="span4">
						<div class="span3"><strong><?php echo $entry_company; ?></strong></div>
						<div class="span9"><input class="company input-medium" type="text" name="background[experiencies][<?php echo $key; ?>][company]" value="<?php echo $experience['company']; ?>" /><input type="hidden" class="company_id" name="background[experiencies][<?php echo $key; ?>][company_id]" value="" />

                          <?php if ( isset( $error_experience[$key]['company'] ) ) { ?>
                          <div class="warning"><?php echo $error_experience[$key]['company']; ?></div>
                          <?php } ?>
            </div>
					</div>
					<div class="span4">
						<div class="span3"><?php echo $entry_current; ?></div>
						<div class="span9"><?php if ( $experience['current'] ) { ?><a class="btn-lost-current btn btn-success"><i class="icon-ok"></i></a><a class="btn-set-current btn btn-danger hide"><i class="icon-minus"></i></a><?php }else { ?><a class="btn-lost-current btn btn-success hide"><i class="icon-ok"></i></a><a class="btn-set-current btn btn-danger"><i class="icon-minus"></i></a><?php } ?><input class="current" type="hidden" name="background[experiencies][<?php echo $key; ?>][current]" value="<?php echo $experience['current']; ?>" /></div>
					</div>
					<div class="span1 offset3"><a class="btn-remove-experience btn btn-danger"><i class="icon-trash"></i></a></div>
				</div>
				<div class="row-fluid">
          			<div class="span4">
          				<div class="span3"><?php echo $entry_title; ?></div>
          				<div class="span9"><input class="title input-medium" type="text" name="background[experiencies][<?php echo $key; ?>][title]" value="<?php echo $experience['title']; ?>" /></div>
          			</div>
          			<div class="span4">
          				<div class="span3"><?php echo $entry_location; ?></div>
          				<div class="span9"><input class="location input-medium" type="text" name="background[experiencies][<?php echo $key; ?>][location]" value="<?php echo $experience['location']; ?>" /><input required="required" type="hidden" name="background[experiencies][<?php echo $key; ?>][city_id]" value="<?php echo $experience['city_id']; ?>" /></div>
          			</div>
          		</div>
          		<div class="row-fluid">
          			<div class="span1">
          				<div class="span12"><?php echo $entry_time_period; ?></div>
          			</div>
                <div class="span8">
                    <?php $cur_year = date('Y'); ?>
                    <?php echo $text_month; ?>
                    <select class="started-month input-small" name="background[experiencies][<?php echo $key; ?>][started][month]" >
                    <?php for ($i = 1 ; $i < 13; $i++) { ?>
                              <option value="<?php echo $i; ?>" <?php if ($i == $experience['started']['month']) { ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                          </select>
                          <?php echo $text_year; ?>
                          <select class="started-year input-small" name="background[experiencies][<?php echo $key; ?>][started][year]" >
                          <?php for ($i = $cur_year ; $i > $cur_year - 100; $i--) { ?>
                              <option value="<?php echo $i; ?>" <?php if ($i == $experience['started']['year']) { ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                          </select>
                          <?php echo $text_to; ?>
                          <?php echo $text_month; ?>
                          <select class="ended-month input-small" name="background[experiencies][<?php echo $key; ?>][ended][month]" >
                    <?php for ($i = 1 ; $i < 13; $i++) { ?>
                              <option value="<?php echo $i; ?>" <?php if ($i == $experience['ended']['month']) { ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                          </select>
                          <?php echo $text_year; ?>
                          <select class="ended-year input-small" name="background[experiencies][<?php echo $key; ?>][ended][year]" >
                          <?php for ($i = $cur_year ; $i > $cur_year - 100; $i--) { ?>
                              <option value="<?php echo $i; ?>" <?php if ($i == $experience['ended']['year']) { ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                          </select>
                        </div>
          		</div>
          		<div class="row-fluid">
          			<div class="span4">
          				<div class="span3"><?php echo $entry_description; ?></div>
          				<div class="span9"><input class="description input-xxlarge" type="text" name="background[experiencies][<?php echo $key; ?>][description]" value="<?php echo $experience['description']; ?>" /></div>
          			</div>
          		</div>
				</td>
			</tr>
			<?php } ?>
          	<tr class="index-add-experience"></tr>
		</table>
<a class="btn-add-experience btn btn-success" ><?php echo $button_add_experience; ?><i class="icon-plus"></i></a>
<script type="text/javascript"><!--//
  function buildAutocompleteCompany() {
    $('input.company').autocomplete({
   delay: 0,
   source: function(request, response) {
     $.ajax({
       url: '<?php echo $autocomplete_company; ?>&filter_name=' +  encodeURIComponent(request.term),
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
        $(this).next().val(ui.item.value);    
     return false;
   },
   focus: function(event, ui) {
      return false;
      }
});
  }
//--></script>
<script type="text/javascript"><!--
  function buildAutocompleteLocation() {
    $('input.location').autocomplete({
      delay: 0,
      source: function(request, response) {
        var url = '<?php echo $autocomplete_location; ?>&filter_location=';

        $.ajax({
          url: url +  encodeURIComponent(request.term),
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
      focus: function(event, ui) {
        $(this).val(ui.item.label);
        return false;
        }, 
      select: function(event, ui) {
        $(this).val(ui.item.label);
        $(this).next().val(ui.item.value);  
        return false;
      }
    });
  }
//--></script> 
<script>
	var exist_current = <?php echo (count( $experiencies )) ? 1 : 0; ?>;
	var experience_length = <?php echo count( $experiencies ); ?>;
	$(document).ready(function(){
    buildAutocompleteCompany();
    buildAutocompleteLocation();

		$('#tab-experience').on('click', '.btn-add-experience', function(){

			var html = '<tr>';
			html += 	'<td>';
			html += 	'<div class="row-fluid">';
			html += 		'<div class="span4">';
			html += 			'<div class="span3"><strong><?php echo $entry_company; ?></strong></div>';
			html += 			'<div class="span9"><input class="company input-medium" type="text" name="background[experiencies][' + experience_length + '][company]" value="" /><input type="hidden" class="company_id" name="background[experiencies][' + experience_length + '][company_id]" value="0" /></div>';
			html += 		'</div>';
			html += 		'<div class="span4">';
			html += 			'<div class="span3"><?php echo $entry_current; ?></div>';
			html += 			'<div class="span9"><a class="btn-lost-current btn btn-success"><i class="icon-ok"></i></a><a class="btn-set-current btn btn-danger hide"><i class="icon-minus"></i></a><input class="current" type="hidden" name="background[experiencies][' + experience_length + '][current]" value="1" /></div>';
			html += 		'</div>';
			html += 		'<div class="span1 offset3"><a class="btn-remove-experience btn btn-danger"><i class="icon-trash"></i></a></div>';
			html += 	'</div>';
			html += 	'<div class="row-fluid">';
          	html += 		'<div class="span4">';
          	html += 			'<div class="span3"><?php echo $entry_title; ?></div>';
          	html += 			'<div class="span9"><input class="title input-medium" type="text" name="background[experiencies][' + experience_length + '][title]" value="" /></div>';
          	html += 		'</div>';
          	html += 		'<div class="span4">';
          	html += 			'<div class="span3"><?php echo $entry_location; ?></div>';
          	html += 			'<div class="span9"><input class="location input-medium" type="text" name="background[experiencies][' + experience_length + '][location]" value="" /><input required="required" type="hidden" name="background[experiencies][' + experience_length + '][city_id]" value="" /></div>';
          	html += 		'</div>';
          	html += 	'</div>';
          	html += 	'<div class="row-fluid">';
          	html += 		'<div class="span1">';
          	html += 			'<div class="span12"><?php echo $entry_time_period; ?></div>';
            html +=     '</div>';
          	html += '<div class="span8">';
          					<?php $cur_year = date('Y'); ?>
          	html +=				'<?php echo $text_month; ?>';
          	html +=				'<select class="started-month input-small" name="background[experiencies][' + experience_length + '][started][month]" >';
          					<?php for ($i = 1 ; $i < 13; $i++) { ?>
            html +=              		'<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>';
                         	<?php } ?>
            html +=             	'</select>';
            html +=             	'<?php echo $text_year; ?>';
            html +=             	'<select class="started-year input-small" name="background[experiencies][' + experience_length + '][started][year]" >';
                         	<?php for ($i = $cur_year ; $i > $cur_year - 100; $i--) { ?>
            html +=              		'<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>';
                         	<?php } ?>
            html +=             	'</select>';
            html +=             	'<?php echo $text_to; ?>';
            html +=             	'<?php echo $text_month; ?>';
            html +=             	'<select class="ended-month input-small" name="background[experiencies][' + experience_length + '][ended][month]" >';
          					<?php for ($i = 1 ; $i < 13; $i++) { ?>
            html +=              		'<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>';
                         	<?php } ?>
            html +=             	'</select>';
            html +=             	'<?php echo $text_year; ?>';
            html +=             	'<select class="ended-year input-small" name="background[experiencies][' + experience_length + '][ended][year]" >';
                         	<?php for ($i = $cur_year ; $i > $cur_year - 100; $i--) { ?>
            html +=              		'<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>';
                         	<?php } ?>
            html +=             	'</select>';
            html +=            '</div>';
          	html += 	'</div>';
          	html += 	'<div class="row-fluid">';
          	html += 		'<div class="span4">';
          	html += 			'<div class="span3"><?php echo $entry_description; ?></div>';
          	html += 			'<div class="span9"><input class="description input-xxlarge" type="text" name="background[experiencies][' + experience_length + '][description]" value="" /></div>';
          	html += 		'</div>';
          	html += 	'</div>';
			html += 	'</td>';
			html += '</tr>';

			$('.index-add-experience').before( html );

			experience_length++; 

      buildAutocompleteCompany();
      buildAutocompleteLocation();
		});

		$('#tab-experience').on('click', '.btn-remove-experience', function(){
			$(this).parent().parent().parent().parent().remove();
		});

		$('#tab-experience').on('click', '.btn-set-current', function(){
      if ( $(this).parent().parent().parent().find('input.company').val() == '' ){
        alert('<?php echo $error_experience_empty; ?>');
        return false;
      }
			
			$(this).hide();
			$(this).parent().parent().find('.btn-lost-current').show();
			$(this).parent().parent().find('input.current').attr({
				value: 1
			});
		});

    $('#tab-experience').on('click', '.btn-lost-current', function(){
      if ( $(this).parent().parent().parent().find('input.company').val() == '' ){
        alert('<?php echo $error_experience_empty; ?>');
        return false;
      }
      
      $(this).hide();
      $(this).parent().parent().find('.btn-set-current').show();
      $(this).parent().parent().find('input.current').attr({
        value: 0
      });
    });

    $('#tab-experience').on('blur', 'input.company', function(){
      var curr = $(this);

      curr.parent().find('.warning').remove();
      if ( !curr.val() ) {
        curr.after('<div class="warning"><?php echo $error_company; ?></div>');
      }
    });
	});
</script>
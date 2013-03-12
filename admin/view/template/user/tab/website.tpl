		<table class="form">
		  <tr>
		  	<td style="width: 40%;"><b>Title</b></td>
		  	<td><b>Url</b></td>
		  	<td><b>Delete</b></td>
		  </tr>
		  <tr>
            <td><select class="input-medium" name="title-type"><option value="personal">Personal Website</option><option value="company">Company Website</option><option value="other">Other...</option></select>  <input class="title input-medium" style="display: none;" type="text" name="user[websites][0][title]" value="" /></td>
            <td><input class="url input-large" type="text" name="user[websites][0][url]" value="" /></td>
            <td><a class="btn-remove-website btn btn-danger"><i class="icon-trash"></i></a></td>
          </tr>
          <tr class="index-add-website"></tr>
		</table>
		
<a class="btn-add-website btn btn-success">Add Website<i class="icon-plus"></i></a>

<script>
	var website_length = 1;
	$(document).ready(function(){
		$('#tab-website').on('click', '.btn-add-website', function(){

			var html = '<tr>';
			html += '<td><select class="input-medium" name="title-type"><option value="personal">Personal Website</option><option value="company">Company Website</option><option value="other">Other...</option></select><input class="title input-medium" style="display: none;" type="text" name="user[websites][0][title]" value="" /></td>';
            html += '<td><input class="url input-large" type="text" name="user[websites][0][url]" value="" /></td>';
            html += '<td><a class="btn-remove-website btn btn-danger"><i class="icon-trash"></i></a></td>';
            html += '</tr>';

			$('.index-add-website').before( html );

			website_length++; 
		});

		$('#tab-website').on('click', '.btn-remove-website', function(){
			$(this).parent().parent().remove();
		});

		$('#tab-website').on('change', 'select[name=\'title-type\']', function() {
			if ($(this).val() == 'other') {
				$(this).parent().find('.title:hidden').toggle();
			}else {
				$(this).parent().find('.title').val($(this).val());
				$(this).parent().find('.title').css('display', 'none');
			}
		});
	});
</script>
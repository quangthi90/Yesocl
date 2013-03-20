		<table class="form">
		  <tr>
		  	<td><b>Name</b></td>
		  	<td><b>Value</b></td>
		  	<td><b>Visible</b></td>
		  	<td><b>Delete</b></td>
		  </tr>
		  <tr>
            <td><input class="name input-medium" type="text" name="user[former][0][name]" value="" /></td>
            <td><input class="value input-medium" type="text" name="user[former][0][value]" value="" /></td>
            <td><select class="visible input-medium" name="user[former][0][visible]"><option value="myfollow">My Follow</option><option value="mywork">My Network</option><option value="everyone">Every One</option></select></td>
            <td><a class="btn-remove-former btn btn-danger"><i class="icon-trash"></i></a></td>
          </tr>
          <tr class="index-add-former"></tr>
		</table>
		
<a class="btn-add-former btn btn-success">Add Former<i class="icon-plus"></i></a>

<script>
	var former_length = 1;
	$(document).ready(function(){
		$('#tab-former').on('click', '.btn-add-former', function(){

			var html = '<tr>';
            html += '<td><input class="name input-medium" type="text" name="user[former][0][name]" value="" /></td>';
            html += '<td><input class="value input-medium" type="text" name="user[former][0][value]" value="" /></td>';
            html += '<td><select class="visible input-medium" name="user[former][0][visible]"><option value="myfollow">My Follow</option><option value="mywork">My Network</option><option value="everyone">Every One</option></select></td>';
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
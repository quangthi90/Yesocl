<table class="table table-hover" id="table-member">
  <tr>
    <td><?php echo $entry_find_member; ?></td>
    <td colspan="3">
      <div class="input-append">
        <input type="text" id="appendedInput" class="find-member" />
        <span class="add-on btn" id="add-member"><i class="icon-plus"></i></span>
        <input type="hidden" id="member-id" />
      </div>
  </tr>
  <tr>
    <th><?php echo $column_username; ?></th>
    <th><?php echo $column_fullname; ?></th>
    <th><?php echo $column_email; ?></th>
    <th><?php echo $column_action; ?></th>
  </tr>
  <?php foreach ($members as $member) { ?>
  <tr>
    <td><?php echo $member['username']; ?></td>
    <td><?php echo $member['fullname']; ?></td>
    <td><?php echo $member['email']; ?></td>
    <td><a class="btn btn-danger btn-del-member"><?php echo $button_delete; ?></a></td>
  </tr>
  <?php } ?>
</table>
<script type="text/javascript">
$('.find-member').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=user/user/searchUser&filter=' +  encodeURIComponent(request.term) + '&token=<?php echo $token; ?>',
      dataType: 'json',
      success: function(json) {   
        response($.map(json, function(item) {
          return {
            label: item.primary,
            value: item.id,
            username: item.username,
            fullname: item.fullname
          }
        }));
      }
    });
  }, 
  select: function(event, ui) {
    $('.find-member').val(ui.item.label);
    $('#member-id').val(ui.item.value);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
</script>
<script type="text/javascript">
$('#add-member').on('click', function(){
  $.ajax({
    url: 'index.php?route=user/user/getUser&token=<?php echo $token; ?>',
    dataType: 'json',
    type: 'post',
    data: {user_id: $('#member-id').val()},
    success: function(json) {   
      var trHtml = '<tr>';
      trHtml += '<td>' + json.username + '</td>';
      trHtml += '<td>' + json.fullname + '</td>';
      trHtml += '<td>' + json.email + '</td>';
      trHtml += '<td><a class="btn btn-danger btn-del-member"><?php echo $button_delete; ?></a><input name="members[' + json.id + ']" type="hidden" value="' + json.id + '" /></td>';
      trHtml += '</tr>';
      $('#table-member').append(trHtml);

      $('.find-member').val('');
    }
  });
});
</script>
<script type="text/javascript">
$('#table-member').on('click', '.btn-del-member', function(){
  $(this).parent().parent().remove();
});
</script>
<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <span><img src="view/image/member.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
        <form action="<?php echo $insert; ?>" method="post" class="pull-left" style="margin-right: 10px;">
          <div class="input-append">
            <input type="text" id="appendedInput" class="find-member" />
            <span class="add-on btn" id="add-member" onclick="$(this).parents('form').submit();"><i class="icon-plus"></i></span>
            <input type="hidden" id="member-id" name="member_id" />
          </div>
        </form>
        <a onclick="$('#form').submit();" class="btn btn-danger"><?php echo $button_delete; ?> <i class="icon-trash"></i></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td><input type="checkbox"  onclick="$('input[name*=\'id\']').attr('checked', this.checked);" /></td>
              <td><?php echo $column_username; ?></td>
              <td><?php echo $column_fullname; ?></td>
              <td><?php echo $column_email; ?></td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($members as $member) { ?>
            <tr>
              <td><input name="id[]" type="checkbox" value="<?php echo $member['id']; ?>"/></td>
              <td><?php echo $member['username']; ?></td>
              <td><?php echo $member['fullname']; ?></td>
              <td><?php echo $member['email']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
    </div>
</div>
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
<?php echo $footer; ?>
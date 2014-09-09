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
      <span><img src="view/image/finance_export.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
	      <span><?php echo $text_from; ?></span><select id="from" style="height: 20px;">
          <?php foreach ( $dates as $date ) { ?>
          <option value="<?php echo $date; ?>"><?php echo $date; ?></option>
          <?php } ?>
        </select>
        <span><?php echo $text_to; ?></span><select id="to" style="height: 20px;">
          <?php foreach ( $dates as $date ) { ?>
          <option value="<?php echo $date; ?>"><?php echo $date; ?></option>
          <?php } ?>
        </select>
	  </div>
    </div>
    <div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td><input type="checkbox"  onclick="$('input[name*=\'id\']').attr('checked', this.checked);" /></td>
              <td><?php echo $column_name; ?></td>
              <td><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <?php if ( $exports ) { ?>
            <?php foreach ( $exports as $export ) { ?>
            <tr>
              <td><input name="id[]" type="checkbox" value="<?php echo $export['id']; ?>"/></td>
              <td><?php echo $export['name']; ?></td>
              <td class="right">
               	<a class="btn btn-primary btn-export" data-href="<?php echo $export['href']; ?>"><?php echo $export['text']; ?> <i class="<?php echo $export['icon']; ?>"></i></a>
              </td>
            </tr>
            <?php } ?>
            <?php }?>
            <?php if ( !$exports ) { ?>
            <tr class="center">
              <td colspan="3"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('.btn-export').on('click', function () {
    if ( $('#from').val() > $('#to').val() ){
      alert('from year must least than to year');
      return false;
    }
    window.location.href = $(this).attr('data-href') + '&from=' + $('#from').val() + '&to=' + $('#to').val();
  });
</script>
<?php echo $footer; ?>
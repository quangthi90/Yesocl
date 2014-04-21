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
      <span><img src="view/image/stock_exchange.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
        <a onclick="location = '<?php echo $back; ?>'" class="btn"><i class="icon-arrow-left"></i> <?php echo $button_back; ?></a>
	      <a onclick="location = '<?php echo $insert; ?>'" class="btn btn-success"><?php echo $button_insert; ?> <i class="icon-plus"></i></a>
	      <a onclick="$('form').submit();" class="btn btn-danger"><?php echo $button_delete; ?> <i class="icon-trash"></i></a>
	  </div>
    </div>
    <div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr class="center">
              <td><input type="checkbox"  onclick="$('input[name*=\'id\']').attr('checked', this.checked);" /></td>
              <td><?php echo $column_high; ?></td>
              <td><?php echo $column_low; ?></td>
              <td><?php echo $column_open; ?></td>
              <td><?php echo $column_close; ?></td>
              <td><?php echo $column_volume; ?></td>
              <td><?php echo $column_created; ?></td>
              <td><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <?php if ( $exchanges ) { ?>
            <?php foreach ( $exchanges as $exchange ) { ?>
            <tr class="right">
              <td class="center"><input name="id[]" type="checkbox" value="<?php echo $exchange['id']; ?>"/></td>
              <td><?php echo $exchange['high_price']; ?></td>
              <td><?php echo $exchange['low_price']; ?></td>
              <td><?php echo $exchange['open_price']; ?></td>
              <td><?php echo $exchange['close_price']; ?></td>
              <td><?php echo $exchange['volume']; ?></td>
              <td class="center"><?php echo $exchange['created']; ?></td>
              <td class="right"><?php foreach ( $exchange['action'] as $action ) { ?>
               	<a class="btn btn-primary" href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?> <i class="<?php echo $action['icon']; ?>"></i></a>
                <?php } ?></td>
            </tr>
            <?php } ?>
            <?php }?>
            <?php if ( !$exchanges ) { ?>
            <tr class="center">
              <td colspan="8"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
  </div>
</div>
<?php echo $footer; ?>
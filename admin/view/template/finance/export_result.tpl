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
      <span><img src="view/image/finance_link.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
	      <a class="btn" href="<?php echo $back; ?>"><i class="icon-arrow-left"></i> <?php echo $button_back; ?></a>
	  </div>
    </div>
    <div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td><?php echo $column_name; ?></td>
              <td><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <?php if ( $links ) { ?>
            <?php foreach ( $links as $link ) { ?>
            <tr>
              <td><?php echo $link['name']; ?></td>
              <td class="right">
               	<a class="btn btn-primary" href="<?php echo $link['href']; ?>"><?php echo $link['text']; ?> <i class="<?php echo $link['icon']; ?>"></i></a>
              </td>
            </tr>
            <?php } ?>
            <?php }?>
            <?php if ( !$links ) { ?>
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
<?php echo $footer; ?>
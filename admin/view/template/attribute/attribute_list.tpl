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
      <span><img src="view/image/attribute.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
	      <a onclick="location = '<?php echo $insert; ?>'" class="btn btn-success"><?php echo $button_insert; ?> <i class="icon-plus"></i></a>
	      <a onclick="$('form').submit();" class="btn btn-danger"><?php echo $button_delete; ?> <i class="icon-trash"></i></a>
	  </div>
    </div>
    <div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td><input type="checkbox" onclick="$('input[name*=\'id\']').attr('checked', this.checked);" /></td>
              <td><?php echo $text_attribute; ?></td>
              <td><?php echo $text_group; ?></td>
              <td><?php echo $text_type; ?></td>
              <td><?php echo $text_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <?php if ($attributes) { ?>
            <?php foreach ($attributes as $attribute) { ?>
            <tr>
              <td><input name="id[]" type="checkbox" value="<?php echo $attribute['id']; ?>"/></td>
              <td><?php echo $attribute['name']; ?></td>
              <td><?php echo $attribute['group']; ?></td>
              <td><?php echo $attribute['type']; ?></td>
              <td class="right"><?php foreach ($attribute['action'] as $action) { ?>
               	<a class="btn btn-primary" href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?> <i class="<?php echo $action['icon']; ?>"></i></a>
                <?php } ?></td>
            </tr>
            <?php } ?>
            <?php }?>
            <?php if (!$attributes) { ?>
            <tr class="center">
              <td colspan="10"><?php echo $text_no_results; ?></td>
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
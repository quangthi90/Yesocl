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
      <span><img src="view/image/company_career.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
      	<a class="btn" href="<?php echo $back; ?>"><i class="icon-arrow-left"></i> <?php echo $button_back; ?></a>
	      <a onclick="location = '<?php echo $insert; ?>'" class="btn btn-success"><?php echo $button_insert; ?> <i class="icon-plus"></i></a>
	      <a onclick="$('form').submit();" class="btn btn-danger"><?php echo $button_delete; ?> <i class="icon-trash"></i></a>
	  </div>
    </div>
    <div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td><input type="checkbox"  onclick="$('input[name*=\'id\']').attr('checked', this.checked);" /></td>
              <td><?php echo $column_user; ?></td>
              <td><?php echo $column_position; ?></td>
              <td><?php echo $column_updated; ?></td>
              <td><?php echo $column_joined; ?></td>
              <td><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <?php if ($careers) { ?>
            <?php foreach ($careers as $career) { ?>
            <tr>
              <td><input name="id[]" type="checkbox" value="<?php echo $career['id']; ?>"/></td>
              <td><?php echo $career['user']; ?></td>
              <td><?php echo $career['position']; ?></td>
              <td><?php echo $career['updated']; ?></td>
              <td><?php echo $career['joined']; ?></td>
              <td class="right"><?php foreach ($career['action'] as $action) { ?>
               	<a class="btn btn-primary" href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?> <i class="<?php echo $action['icon']; ?>"></i></a>
                <?php } ?></td>
            </tr>
            <?php } ?>
            <?php }?>
            <?php if (!$careers) { ?>
            <tr class="center">
              <td colspan="6"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
      <div class="pagination"></div>
    </div>
  </div>
</div>
<?php echo $footer; ?>
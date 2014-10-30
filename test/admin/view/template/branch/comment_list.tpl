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
      <span><img src="view/image/comment_post.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
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
              <td style="max-width: 400px;"><?php echo $text_content; ?></td>
              <td><?php echo $text_author; ?></td>
              <td><?php echo $text_created; ?></td>
              <td><?php echo $text_status; ?></td>
              <td><?php echo $text_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <?php if ($comments) { ?>
            <?php foreach ($comments as $comment) { ?>
            <tr>
              <td><input name="id[]" type="checkbox" value="<?php echo $comment['id']; ?>"/></td>
              <td><?php echo $comment['content']; ?></td>
              <td><?php echo $comment['author']; ?></td>
              <td><?php echo $comment['created']; ?></td>
              <td><?php echo $comment['status']; ?></td>
              <td class="right"><?php foreach ($comment['action'] as $action) { ?>
               	<a class="btn btn-primary" href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?> <i class="<?php echo $action['icon']; ?>"></i></a>
                <?php } ?></td>
            </tr>
            <?php } ?>
            <?php }?>
            <?php if (!$comments) { ?>
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
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
  <div class="box">    
    <div class="heading">
      <span><img src="view/image/stock_exchange.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
      	<a onclick="$('#form').submit();" class="btn btn-success"><?php echo $button_save; ?></a>
      	<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-danger"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      	<table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_high; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="high" value="<?php echo $high; ?>" />
            <?php if ($error_high) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_high; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_low; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="low"  value="<?php echo $low; ?>" />
            <?php if ($error_low) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_low; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_open; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="open"  value="<?php echo $open; ?>" />
            <?php if ($error_open) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_open; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_close; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="close"  value="<?php echo $close; ?>" />
            <?php if ($error_close) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_close; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_volume; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="volume"  value="<?php echo $volume; ?>" />
            <?php if ($error_volume) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_volume; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_created; ?></td>
            <td><input required="required" class="input-medium date" type="text" name="created" value="<?php echo $created; ?>" />
            <?php if ($error_created) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_created; ?>
        </div>
            <?php } ?></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--//
    $('.date').datepicker();
//--></script>
<?php echo $footer; ?>
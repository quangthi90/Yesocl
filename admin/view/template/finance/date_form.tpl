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
      <span><img src="view/image/finance_date.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
      	<a onclick="$('#form').submit();" class="btn btn-success"><?php echo $button_save; ?></a>
      	<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-danger"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      	<table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_quarter; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="quarter" value="<?php echo $quarter; ?>" />
            <?php if ($error_quarter) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_quarter; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_year; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="year" value="<?php echo $year; ?>" />
            <?php if ($error_year) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_year; ?>
        </div>
            <?php } ?></td>
          </tr>
          <tr>
            <td><?php echo $entry_status; ?></td>
            <td><select class="input-large" name="status" >
              <option value="true"><?php echo $text_enabled; ?></option>
              <option value="false" <?php if ( $status == false ) { ?>selected="selected"<?php } ?>><?php echo $text_disabled; ?></option>
            </select></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
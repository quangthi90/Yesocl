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
      <span><img src="view/image/user.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
      	<a onclick="$('#form').submit();" class="btn btn-success"><?php echo $button_save; ?></a>
      	<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-danger"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      	<ul class="nav nav-tabs">
		    <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo $tab_general; ?></a></li>
		    <li><a href="#tab-email" data-toggle="tab"><?php echo $tab_email; ?></a></li>
		    <li><a href="#tab-info" data-toggle="tab"><?php echo $tab_information; ?></a></li>
	    </ul>
	    <div class="tab-content">
	    	<!-- General tab -->
		    <div class="tab-pane active" id="tab-general">
		    	<?php include 'tab/general.tpl'; ?>
		    </div>
		    
		    <!-- Email tab -->
	    	<div class="tab-pane" id="tab-email">
	    		<?php include 'tab/email.tpl'; ?>
	    	</div>
		    
		    <!-- Information tab -->
	    	<div class="tab-pane" id="tab-info">
	    		<?php include 'tab/information.tpl'; ?>
	    	</div>
	    </div>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
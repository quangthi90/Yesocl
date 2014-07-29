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
      <span><img src="view/image/finance_function.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
      	<a onclick="$('#form').submit();" class="btn btn-success"><?php echo $button_save; ?></a>
      	<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-danger"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      	<table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_name; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="name" value="<?php echo $name; ?>" />
            <?php if ($error_name) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_name; ?>
        </div>
            <?php } ?></td>
          </tr>
          <style type="text/css">
            ul.multti-select-box {
              float: left;
              background-color: #fff;
              border: 1px solid #ccc;
              webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
              -moz-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
              box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
              -webkit-transition: border linear .2s,box-shadow linear .2s;
              -moz-transition: border linear .2s,box-shadow linear .2s;
              -o-transition: border linear .2s,box-shadow linear .2s;
              transition: border linear .2s,box-shadow linear .2s;
              display: inline-block;
              height: 20px;
              padding: 4px 6px;
              margin: 0;
              margin-bottom: 10px;
              font-size: 14px;
              line-height: 20px;
              color: #555;
              vertical-align: middle;
              -webkit-border-radius: 4px;
              -moz-border-radius: 4px;
              border-radius: 4px;
              list-style: none;
            }
            ul.multti-select-box li {
              float: left;
              border: 1px gray solid;
              border-radius: 4px;
              margin-left: 2px;
            }
            ul.multti-select-box li:first-child {
              margin-left: 0;
            }
          </style>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_function; ?></td>
            <td>
              <input type="hidden" name="function" value="<?php echo $function; ?>">
              <ul class="multti-select-box input-xxlarge">
                <li>+</li>
                <li>a</li>
                <li>b</li>
              </ul>
              <?php if ($error_function) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_function; ?>
        </div>
            <?php } ?>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
<script type="text/javascript"><!--//
//--></script>
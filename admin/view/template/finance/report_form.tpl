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
          <tr>
            <td colspan="2">
              <h4 class="pull-left"><span class="required">*</span> <?php echo $entry_dates; ?></h4>
              <div class="pull-right form-inline">
                Năm: <select><option>2010</option><option>2011</option><option>2012</option></select>
                Quý: <select><option>1</option><option>2</option><option>3</option></select>
                <button class="btn btn-primary"><i class="icon-plus"></i></button>
                <input name="dates" type="hidden" value="" />
              </div>
              <?php if ($error_dates ) { ?>
              <div class="alert alert-error pull-left" style="width: 95%;">
          <strong>Error!</strong> <?php echo $error_dates; ?>
        </div>
              <?php } ?>
              <div class="pull-left" style="width: 95%;">
                <span class="label label-info" style="margin-right: 5px; margin-bottom: 5px;">Info Info Info Info <a style="color: red;"><i class="icon-remove"></i></a></span>
                <span class="label label-info" style="margin-right: 5px; margin-bottom: 5px;">Info Info Info Info <a style="color: red;"><i class="icon-remove"></i></a></span>
                <span class="label label-info" style="margin-right: 5px; margin-bottom: 5px;">Info Info Info Info <a style="color: red;"><i class="icon-remove"></i></a></span>
                <span class="label label-info" style="margin-right: 5px; margin-bottom: 5px;">Info Info Info Info <a style="color: red;"><i class="icon-remove"></i></a></span>
                <span class="label label-info" style="margin-right: 5px; margin-bottom: 5px;">Info Info Info Info <a style="color: red;"><i class="icon-remove"></i></a></span>
                <span class="label label-info" style="margin-right: 5px; margin-bottom: 5px;">Info Info Info Info <a style="color: red;"><i class="icon-remove"></i></a></span>
                <span class="label label-info" style="margin-right: 5px; margin-bottom: 5px;">Info Info Info Info <a style="color: red;"><i class="icon-remove"></i></a></span>
                <span class="label label-info" style="margin-right: 5px; margin-bottom: 5px;">Info Info Info Info <a style="color: red;"><i class="icon-remove"></i></a></span>
                <span class="label label-info" style="margin-right: 5px; margin-bottom: 5px;">Info Info Info Info <a style="color: red;"><i class="icon-remove"></i></a></span>
                <span class="label label-info" style="margin-right: 5px; margin-bottom: 5px;">Info Info Info Info <a style="color: red;"><i class="icon-remove"></i></a></span>
                <span class="label label-info" style="margin-right: 5px; margin-bottom: 5px;">Info Info Info Info <a style="color: red;"><i class="icon-remove"></i></a></span>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <h4><span class="required">*</span> <?php echo $entry_functions; ?></h4>
              <?php if ($error_functions ) { ?>
              <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_functions; ?>
        </div>
              <?php } ?>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th><?php echo $column_name; ?></th>
                    <th><?php echo $column_function; ?></th>
                    <th><?php echo $column_action; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>AAA</td>
                    <td>BBB</td>
                    <td><a class="btn btn-danger"><i class="icon-trash"></i></a>
                      <input name="functions[0][name]" type="hidden" value="" />
                      <input name="functions[0][function]" type="hidden" value="" />
                    </td>
                  </tr>
                  <tr>
                    <td>AAA</td>
                    <td>BBB</td>
                    <td><a class="btn btn-danger"><i class="icon-trash"></i></a>
                      <input name="functions[1][name]" type="hidden" value="" />
                      <input name="functions[1][function]" type="hidden" value="" />
                    </td>
                  </tr>
                  <tr>
                    <td>AAA</td>
                    <td>BBB</td>
                    <td><a class="btn btn-danger"><i class="icon-trash"></i></a>
                      <input name="functions[2][name]" type="hidden" value="" />
                      <input name="functions[2][function]" type="hidden" value="" />
                    </td>
                  </tr>
                  <!-- <tr>
                    <td colspan="3"><?php echo $text_no_results; ?></td>
                  </tr> -->
                </tbody>
                <tfoot>
                  <tr>
                    <td><input type="text" value="" placeholder="<?php echo $text_enter_function_name; ?>" /></td>
                    <td><input type="text" value="" placeholder="<?php echo $text_search_function; ?>" /></td>
                    <td><button class="btn btn-primary"><i class="icon-plus"></i> <?php echo $button_add_function; ?></button></td>
                  </tr>
                </tfoot>
              </table>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
<script type="text/javascript"><!--//
  $(function () {

  });
//--></script>
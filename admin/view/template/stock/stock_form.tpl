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
      <span><img src="view/image/stock.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
      <div class="buttons">
        <a onclick="$('#form').submit();" class="btn btn-success"><?php echo $button_save; ?></a>
        <a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-danger"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-basic" data-toggle="tab"><?php echo $tab_basic; ?></a></li>
          <li><a href="#tab-fund" data-toggle="tab"><?php echo $tab_fund; ?></a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab-basic">
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
              <?php if ($is_edit == false){ ?>
              <tr>
                <td><span class="required">*</span> <?php echo $entry_code; ?></td>
                <td><input class="input-xxlarge" type="text" name="code"  value="<?php echo $code; ?>" />
                <?php if ($error_code) { ?>
                    <div class="alert alert-error">
              <strong>Error!</strong> <?php echo $error_code; ?>
            </div>
                <?php } ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td><?php echo $entry_market; ?></td>
                <td><select class="input-large" name="market_id">
                <?php foreach ( $markets as $market ) { ?>
                  <option value="<?php echo $market['id']; ?>" <?php if ( $market['id'] == $market_id ) { ?>selected="selected"<?php } ?>><?php echo $market['name']; ?></option>
                <?php } ?>
                </select></td>
              <tr>
                <td><?php echo $entry_status; ?></td>
                <td><select class="input-large" name="status" >
                  <option value="true"><?php echo $text_enabled; ?></option>
                  <option value="false" <?php if ( $status == false ) { ?>selected="selected"<?php } ?>><?php echo $text_disabled; ?></option>
                </select></td>
              </tr>
            </table>
          </div>
          <div class="tab-pane" id="tab-fund">
            <table class="form" id="table-funds">
              <tr>
                <th><?php echo $text_fund; ?></th>
                <?php foreach ($all_funds as $_fund){ ?>
                <th><?php echo $_fund['name']; ?></th>
                <?php } ?>
                <th></th>
              </tr>
              <?php foreach ($funds as $fund_name => $fund){ ?>
              <tr>
                <td><input class="fund-name" type="text" value="<?php echo $fund_name; ?>" /></td>
              <?php foreach ($fund as $type => $value) { ?>
                <td>
                <?php switch($type){ 
                  
                  case $fund_types['text']: 
                ?>
                  <input class="fund-detail" data-fund="$type" name="funds[<?php echo $fund_name; ?>][<?php echo $type; ?>]" value="<?php echo $value ?>" />
                <?php break; 
                  
                  case $fund_types['rating']: 
                ?>
                  <select class="fund-detail" name="funds[<?php echo $fund_name; ?>][<?php echo $type; ?>]"  data-fund="<?php echo $type ?>">
                  <?php for ($i = 1; $i < 6; $i++){ ?>
                    <option value="<?php echo $i; ?>" <?php if ($i == $value){ ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
                  <?php } ?>
                  </select>
                <?php break; 
                  
                  case $fund_types['percent']: 
                ?>
                  <div class="input-append">
                    <input class="fund-detail" class="span2" name="funds[<?php echo $fund_name; ?>][<?php echo $type; ?>]" type="text" data-fund="<?php echo $type ?>" value="<?php echo $value ?>">
                    <span class="add-on">%</span>
                  </div>
                <?php break; 
                  
                  case $fund_types['buying']: 
                ?>
                  <select class="fund-detail" name="funds[<?php echo $fund_name; ?>][<?php echo $type; ?>]" data-fund="<?php echo $type ?>">
                    <option value="buying" <?php if ($value == 'buying'){ ?>selected="selected"<?php } ?>>buying</option>
                    <option value="selling" <?php if ($value == 'selling'){ ?>selected="selected"<?php } ?>>selling</option>
                  </select>
                <?php break; ?>
                <?php } ?>
                </td>
              <?php } ?>
                <td><a class="btn btn-danger" onclick="$(this).parents(\'tr\').remove();"><?php echo $text_remove; ?> <i class="icon-trash"></i></a></td>
              </tr>  
              <?php } ?>
            </table>
            <a class="btn btn-success" onclick="addFund();"><?php echo $text_add; ?> <i class="icon-plus"></i></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  var types = JSON.parse('<?php echo json_encode($all_funds); ?>');
</script>
<script type="text/javascript">
  var html_funds = {
    <?php echo $fund_types['text'] ?>: '<input class="fund-detail" data-fund="<?php echo $fund_types["text"] ?>" name="" />',
    
    <?php echo $fund_types['rating'] ?>: '<select class="fund-detail" name=""  data-fund="<?php echo $fund_types["rating"] ?>"><?php for ($i = 1; $i < 6; $i++){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select>',
    
    <?php echo $fund_types['percent'] ?>: '<div class="input-append"><input class="fund-detail" class="span2" name="" type="text" data-fund="<?php echo $fund_types["percent"] ?>"><span class="add-on">%</span></div>',
    
    <?php echo $fund_types['buying'] ?>: '<select class="fund-detail" name="" data-fund="<?php echo $fund_types["buying"] ?>"><option value="buying">buying</option><option value="selling">selling</option></select>',
  };
  function addFund(){
    var htmlOutput = '<tr><td><input class="fund-name" type="text" /></td>';
    for ( var key in types ){
      htmlOutput += '<td>';
      htmlOutput += html_funds[types[key].type];
      htmlOutput += '</td>';
    }
    htmlOutput += '<td><a class="btn btn-danger" onclick="$(this).parents(\'tr\').remove();">Remove <i class="icon-trash"></i></a></td></tr>';
    $('#table-funds').append(htmlOutput);
  }
  $('#table-funds').on('blur', 'input.fund-name', function(){
    var $name = $(this);
    var $tr = $(this).parents('tr');
    $tr.find('.fund-detail').each(function(){
      $(this).attr('name', 'funds[' + $name.val() + '][' + $(this).data('fund') + ']' );
    });
  });
</script>
<?php echo $footer; ?>
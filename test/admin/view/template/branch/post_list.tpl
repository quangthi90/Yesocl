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
      <span><img src="view/image/company_post.png" alt="<?php echo $heading_title; ?>" /> <?php echo $heading_title; ?></span>
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
              <td><?php echo $column_thumbl ?></td>
              <td><?php echo $column_post; ?></td>
              <td><?php echo $column_category; ?></td>
              <td><?php echo $column_author; ?></td>
              <td><?php echo $column_created; ?></td>
              <td><?php echo $column_status; ?></td>
              <td><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <tr class="filter">
              <td></td>
              <td></td>
              <td><input type="text" name="filter_title" value="<?php echo $filter_title; ?>" /></td>
              <td>
                <select name="filter_category">
                  <option value=""><?php echo $text_none; ?></option>
                  <?php foreach( $categories as $category ){ ?>
                  <option value="<?php echo $category['id']; ?>" <?php if ( $filter_category == $category['id'] ){ ?>selected="selected"<?php } ?>><?php echo $category['name']; ?></option>
                  <?php } ?>
                </select>
              </td>
              <td></td>
              <td></td>
              <td>
                <select name="filter_status">
                  <option value=""><?php echo $text_none; ?></option>
                  <option value="true" <?php if ( $filter_status == 'true' ){ ?>selected="selected"<?php } ?>><?php echo $text_enabled; ?></option>
                  <option value="false" <?php if ( $filter_status == 'false' ){ ?>selected="selected"<?php } ?>><?php echo $text_disabled; ?></option>
                </select>
              </td>
              <td align="right"><a onclick="filter();" class="btn btn-primary"><?php echo $button_filter; ?></a></td>
            </tr>
            <?php if ($posts) { ?>
            <?php foreach ($posts as $post) { ?>
            <tr>
              <td><input name="id[]" type="checkbox" value="<?php echo $post['id']; ?>"/></td>
              <td><div class="thumbnail" style="width: 80px; height: 80px;"><img src="<?php echo $post['thumb']; ?>" /></div></td>
              <td><?php echo $post['title']; ?></td>
              <td><?php echo $post['category']; ?></td>
              <td><?php echo $post['author']; ?></td>
              <td><?php echo $post['created']; ?></td>
              <td><?php echo $post['status']; ?></td>
              <td class="right"><?php foreach ($post['action'] as $action) { ?>
               	<a class="btn btn-primary" href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?> <i class="<?php echo $action['icon']; ?>"></i></a>
                <?php } ?></td>
            </tr>
            <?php } ?>
            <?php }?>
            <?php if (!$posts) { ?>
            <tr class="center">
              <td colspan="8"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
function filter() {
  url = 'index.php?route=branch/post&branch_id=<?php echo $branch_id ?>&token=<?php echo $token; ?>';
  
  var filter_title = $('input[name=\'filter_title\']').attr('value');
  
  if (filter_title) {
    url += '&filter_title=' + encodeURIComponent(filter_title);
  }

  var filter_category = $('[name=\'filter_category\']').attr('value');
  
  if (filter_category) {
    url += '&filter_category=' + encodeURIComponent(filter_category);
  } 
  
  var filter_status = $('[name=\'filter_status\']').attr('value');
  
  if (filter_status) {
    url += '&filter_status=' + encodeURIComponent(filter_status);
  } 

  location = url;
}
//--></script>
<script type="text/javascript"><!--
$('input[name=\'filter_title\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: '<?php echo $autocomplete_name; ?>&filter_title=' +  encodeURIComponent(request.term),
      dataType: 'json',
      success: function(json) {   
        response($.map(json, function(item) {
          return {
            label: item.name,
            value: item.id
          }
        }));
      }
    });
  }, 
  select: function(event, ui) {
    $('input[name=\'filter_type_name\']').val(ui.item.label);
    $('input[name=\'filter_type\']').val(ui.item.value);
            
    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script>
<?php echo $footer; ?>
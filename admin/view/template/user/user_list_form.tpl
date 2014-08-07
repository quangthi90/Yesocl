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
          <?php if ( !(isset($disabledCode) && $disabledCode) ) { ?>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_code; ?></td>
            <td><input class="input-xxlarge" required="required" type="text" name="code" value="<?php echo $code; ?>" />
            <?php if ($error_code) { ?>
                <div class="alert alert-error">
          <strong>Error!</strong> <?php echo $error_code; ?>
        </div>
            <?php } ?></td>
          </tr>
          <?php } ?>
          <tr>
            <td><?php echo $entry_description; ?></td>
            <td><textarea class="input-xxlarge" type="text" name="description"><?php echo $description; ?></textarea></td>
          </tr>
          <tr>
            <td><?php echo $entry_status; ?></td>
            <td><select name="status">
                <?php if ($status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td colspan="2">
              <h4><?php echo $entry_users; ?></h4>
              <div class="users-control-error alert alert-error<?php if ( !$error_users ) echo ' hidden'; ?>">
          <strong>Error!</strong> <?php echo $text_error_users; ?>
        </div>
              <table class="table table-striped users-control">
                <thead>
                  <tr>
                    <th><?php echo $column_user; ?></th>
                    <th><?php echo $column_action; ?></th>
                  </tr>
                </thead>
                <tbody class="users-html-output">
                  <?php if ($users) { ?>
                  <?php foreach ($users as $key => $user) { ?>
                  <tr class="users-html-item">
                    <td><?php echo $user['name']; ?></td>
                    <td><a class="btn btn-danger users-html-remove" data-key="<?php echo $user['id']; ?>"><i class="icon-trash"></i></a>
                      <input name="users[<?php echo $key; ?>][name]" type="hidden" value="<?php echo $user['name']; ?>" />
                      <input name="users[<?php echo $key; ?>][id]" type="hidden" value="<?php echo $user['id']; ?>" />
                    </td>
                  </tr>
                  <?php } ?>
                  <?php }else { ?>
                  <tr class="users-no-result">
                    <td colspan="2"><?php echo $text_no_results; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td><input class="input-xxlarge" name="user" type="text" value="" placeholder="<?php echo $text_search_user; ?>" /><input name="user_id" type="hidden" value="" /></td>
                    <td><a class="btn btn-primary users-add-user"><i class="icon-plus"></i> <?php echo $button_add_user; ?></a></td>
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
$('input[name=\'user\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=user/user/searchUser&filter=' +  encodeURIComponent(request.term) + '&token=<?php echo $token; ?>',
      dataType: 'json',
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item.primary,
            value: item.id
          }
        }));
      }
    });
  },
  select: function(event, ui) {
    $('input[name=\'user\']').val(ui.item.label);
    $('input[name=\'user_id\']').val(ui.item.value);

    return false;
  },
  focus: function(event, ui) {
        return false;
    }
});
//--></script>
<script type="text/javascript"><!--//
  $(function () {
    // First, checks if it isn't implemented yet.
    if (!String.prototype.format) {
      String.prototype.format = function() {
        var args = arguments;
        return this.replace(/{(\d+)}/g, function(match, number) {
          return typeof args[number] != 'undefined'
            ? args[number]
            : match
          ;
        });
      };
    }

    // FUNCTION CONTROL
    var UsersControl = function ( $el, json ) {
      // PROPERTIES
      var that = this;
      this.$el = $el;
      this.$htmlOutput = $el.find('.users-html-output');

      this.data = json;
      this.htmlFormat = '<tr class="users-html-item"><td>{0}</td><td><a class="btn btn-danger users-html-remove" data-key="{1}"><i class="icon-trash"></i></a><input name="users[{2}][name]" type="hidden" value="{0}" /><input name="users[{2}][id]" type="hidden" value="{1}" /></td></tr>';
      this.noResultFormat = '<tr class="users-no-result"><td colspan="2"><?php echo $text_no_results; ?></td></tr>';

      // PRIVATE FUNCTIONS
      function _init() {
        that.$el.find('.users-add-user').click(function(event) {
          /* Act on the event */
          if ( _validateUser() ) {
            _addUser();
            _refreshHtmlOutput();
          }else {
            _showError();
          }
        });

        $('.users-html-remove').live('click', function(event) {
          event.preventDefault();
          /* Act on the event */
          $(this).parents('.users-html-item').eq(0).remove();
          _removeUser( $(this).data('key') );
          _refreshHtmlOutput();
        });
      }

      function _validateUser() {
        $('.users-control-error.alert-error').addClass('hidden');

        if ( that.$el.find('[name=\'user\']').val() == '' ) {
          return false;
        }

        if ( that.$el.find('[name=\'user_id\']').val() == '' ) {
          return false;
        }

        var isExist = false;
        $.each(that.data, function(index, val) {
           /* iterate through array or object */
          if ( val.id == that.$el.find('[name=\'user_id\']').val() ) {
            isExist = true;
            return false;
          }
        });

        if ( isExist ) {
          return false;
        }

        return true;
      }

      function _addUser() {
        that.$htmlOutput.append( that.htmlFormat.format( that.$el.find('[name=\'user\']').val(), that.$el.find('[name=\'user_id\']').val(), that.data.length ) );

        that.data.push({
          'name':that.$el.find('[name=\'user\']').val(),
          'id':that.$el.find('[name=\'user_id\']').val(),
        });

        that.$el.find('[name=\'user\']').val('');
        that.$el.find('[name=\'user_id\']').val('');
      }

      function _showError() {
        $('.users-control-error.alert-error').removeClass('hidden');
      }

      function _refreshHtmlOutput() {
        that.$el.find('.users-no-result').remove();
        if ( !that.data.length && !that.$el.find('.users-no-result').length ) {
          that.$htmlOutput.append( that.noResultFormat );
        }
      }

      function _removeUser( iKey ) {
        var key = -1;
        $.each(that.data, function(index, val) {
          if ( val.id == iKey ) {
            key = index;
          }
        });

        if ( key != -1 ) {
          that.data.splice(key, 1);
        }
      }

      // EVENTS
      _init();
    }
      // PUBLIC FUNCTIONS

    var usersCtrl = new UsersControl( $('.users-control'), <?php echo json_encode($users); ?>);
  });
//--></script>
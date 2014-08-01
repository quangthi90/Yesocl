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
          <tr class="dates-control">
            <td colspan="2">
              <h4 class="pull-left"><span class="required">*</span> <?php echo $entry_dates; ?></h4>
              <div class="pull-right form-inline">
                <?php echo $entry_year; ?> <select name="date_year">
                <?php for ($i=0; $i < 100; $i++) { ?>
                  <option value="<?php echo $year - $i; ?>"><?php echo $year - $i; ?></option>
                <?php } ?>
                </select>
                <?php echo $entry_quarter; ?> <select name="date_quarter"><option value="0"><?php echo $text_none; ?></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                </select>
                <a class="btn btn-primary btn-add-date"><i class="icon-plus"></i></a>
                <input name="dates" type="hidden" value="<?php echo $dates; ?>" />
              </div>
              <div class="alert alert-error pull-left error-dates<?php if (!$error_dates) echo ' hidden'; ?>" style="width: 95%; margin-bottom: 5px;">
          <strong>Error!</strong> <?php echo $text_error_dates; ?>
        </div>
              <div class="alert alert-error pull-left hidden error-exist-date" style="width: 95%; margin-bottom: 5px;">
          <strong>Error!</strong> <?php echo $text_error_exist_date; ?>
        </div>
              <div class="pull-left dates-html-output" style="width: 95%;">
                <?php foreach ($aDates as $key => $value) { ?>
                <span class="label label-info dates-html-item" style="margin-right: 5px; margin-bottom: 5px;"><?php echo $value['label']; ?> <a class="dates-html-remove" style="color: red;" data-key="<?php echo $key; ?>"><i class="icon-remove"></i></a></span>
                <?php } ?>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <h4><span class="required">*</span> <?php echo $entry_functions; ?></h4>
              <div class="alert alert-error<?php if ( !$error_functions ) echo ' hidden'; ?>">
          <strong>Error!</strong> <?php echo $text_error_functions; ?>
        </div>
              <table class="table table-striped functions-control">
                <thead>
                  <tr>
                    <th><?php echo $column_name; ?></th>
                    <th><?php echo $column_function; ?></th>
                    <th><?php echo $column_action; ?></th>
                  </tr>
                </thead>
                <tbody class="functions-html-output">
                  <?php if ($functions) { ?>
                  <?php foreach ($functions as $key => $function) { ?>
                  <tr class="functions-html-item">
                    <td><?php echo $function['name']; ?></td>
                    <td><?php echo $function['function']; ?></td>
                    <td><a class="btn btn-danger functions-html-remove" data-key="<?php echo $function['id']; ?>"><i class="icon-trash"></i></a>
                      <input name="functions[0][name]" type="hidden" value="<?php echo $function['name']; ?>" />
                      <input name="functions[0][function]" type="hidden" value="<?php echo $function['function']; ?>" />
                      <input name="functions[0][id]" type="hidden" value="<?php echo $function['function_id']; ?>" />
                    </td>
                  </tr>
                  <?php } ?>
                  <?php }else { ?>
                  <tr class="functions-no-result">
                    <td colspan="3"><?php echo $text_no_results; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td><input name="function_name" type="text" value="" placeholder="<?php echo $text_enter_function_name; ?>" /></td>
                    <td><input name="function" type="text" value="" placeholder="<?php echo $text_search_function; ?>" /><input name="function_id" type="hidden" value="" /></td>
                    <td><a class="btn btn-primary functions-add-function"><i class="icon-plus"></i> <?php echo $button_add_function; ?></a></td>
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
$('input[name=\'function\']').autocomplete({
  delay: 0,
  source: function(request, response) {
    $.ajax({
      url: 'index.php?route=finance/function/search&filter_name=' +  encodeURIComponent(request.term) + '&token=<?php echo $token; ?>',
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
    $('input[name=\'function\']').val(ui.item.label);
    $('input[name=\'function_id\']').val(ui.item.value);

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

    // DATES CONTROL
    var DatesControl = function ( $el, json ) {
      // PROPERTIES
      var that = this;
      this.$el = $el;
      this.$strOutput = $el.find('[name=\'dates\']');
      this.$htmlOutput = $el.find('div.dates-html-output');

      this.data = typeof(json) == 'undefined' ? [] : json;
      this.labelAFormat = '<?php echo $text_year; ?> {0}';
      this.labelBFormat = '<?php echo $text_quarter; ?> {1} <?php echo $text_year; ?> {0}';
      this.valueFormat  = '{0}-{1}';
      this.htmlFormat  = '<span class="label label-info" style="margin-right: 5px; margin-bottom: 5px;">{1} <a class="dates-html-remove" style="color: red;" data-key="{0}"><i class="icon-remove"></i></a></span>';

      // PRIVATE FUNCTIONS
      function _init() {
        that.$el.find('.btn-add-date').click(function () {
          if ( !$(this).hasClass('disabled') ) {
            $(this).addClass('disabled');

            if ( _validateDate() ) {
              _addDate();
              _transferToInput();
            }else {
              _showError();
            }

            $(this).removeClass('disabled');
          }
        });

        $('.dates-html-remove').live('click', function(event) {
          event.preventDefault();
          /* Act on the event */
          _removeDate( $(this).data('key') );
          _transferToInput();
        });
      }

      function _validateDate() {
        that.$el.find('div.alert-error').addClass('hidden');
        if ( that.$el.find('[name=\'date_year\']').val() == '' ) {
          return false;
        }

        return true;
      }

      function _addDate() {
        if ( _isExistDate( that.valueFormat.format( that.$el.find('[name=\'date_year\']').val(), that.$el.find('[name=\'date_quarter\']').val() ) ) ) {
          that.$el.find('div.alert-error.error-exist-date').removeClass('hidden');
        }else {
          if ( that.$el.find('[name=\'date_quarter\']').val() == '0' ) {
            that.data.push( {
              'label':that.labelAFormat.format( that.$el.find('[name=\'date_year\']').val(), that.$el.find('[name=\'date_quarter\']').val() ),
              'value':that.valueFormat.format( that.$el.find('[name=\'date_year\']').val(), that.$el.find('[name=\'date_quarter\']').val() ),
            } );
          }else {
            that.data.push( {
              'label':that.labelBFormat.format( that.$el.find('[name=\'date_year\']').val(), that.$el.find('[name=\'date_quarter\']').val() ),
              'value':that.valueFormat.format( that.$el.find('[name=\'date_year\']').val(), that.$el.find('[name=\'date_quarter\']').val() ),
            } );
          }
        }
      }

      function _isExistDate( value ) {
        var bool = false;
        $.each( that.data, function(index, val) {
          if (value == val.value) {
            bool = true;
            return bool;
          }
        });

        return bool;
      }

      function _showError() {
        that.$el.find('div.alert-error.error-dates').removeClass('hidden');
      }

      function _getStrDates() {
        var str = '';
        $.each(that.data, function(index, val) {
          if (str == '') {
            str += val.value + ' (' + val.label + ')';
          }else {
            str += ', ' + val.value + ' (' + val.label + ')';
          }
        });

        return str;
      }

      function _getHtmlDates() {
        var output = '';
        $.each(that.data, function(index, val) {
          if (output == '') {
            output += that.htmlFormat.format( index, val.label );
          }else {
            output += that.htmlFormat.format( index, val.label );
          }
        });

        return output;
      }

      function _transferToInput() {
        that.$strOutput.val(_getStrDates());
        that.$htmlOutput.html(_getHtmlDates());
      }

      function _removeDate( key ) {
        that.$el.find('div.alert-error').addClass('hidden');
        that.data.splice(key, 1);
      }

      // EVENTS
      _init();
    }
      // PUBLIC FUNCTIONS

    // FUNCTION CONTROL
    var FunctionsControl = function ( $el, json ) {
      // PROPERTIES
      var that = this;
      this.$el = $el;
      this.$htmlOutput = $el.find('.functions-html-output');

      this.data = json;
      this.htmlFormat = '<tr class="functions-html-item"><td>{0}</td><td>{1}</td><td><a class="btn btn-danger functions-html-remove" data-key="{2}"><i class="icon-trash"></i></a><input name="functions[{3}][name]" type="hidden" value="{0}" /><input name="functions[{3}][function]" type="hidden" value="{1}" /><input name="functions[{3}][id]" type="hidden" value="{2}" /></td></tr>';
      this.noResultFormat = '<tr class="functions-no-result"><td colspan="3"><?php echo $text_no_results; ?></td></tr>';

      // PRIVATE FUNCTIONS
      function _init() {
        that.$el.find('.functions-add-function').click(function(event) {
          /* Act on the event */
          if ( _validateFunction() ) {
            _addFunction();
            _refreshHtmlOutput();
          }else {
            _showError();
          }
        });

        $('.functions-html-remove').live('click', function(event) {
          event.preventDefault();
          /* Act on the event */
          $(this).parents('.functions-html-item').eq(0).remove();
          _removeFunction( $(this).data('key') );
          _refreshHtmlOutput();
        });
      }

      function _validateFunction() {
        that.$el.find('.alert-error').addClass('hidden');

        if ( that.$el.find('[name=\'function_name\']').val() == '' ) {
          return false;
        }

        if ( that.$el.find('[name=\'function\']').val() == '' ) {
          return false;
        }

        if ( that.$el.find('[name=\'function_id\']').val() == '' ) {
          return false;
        }

        return true;
      }

      function _addFunction() {
        that.$htmlOutput.append( that.htmlFormat.format( that.$el.find('[name=\'function_name\']').val(), that.$el.find('[name=\'function\']').val(), that.$el.find('[name=\'function_id\']').val(), that.data.length ) );

        that.data.push({
          'name':that.$el.find('[name=\'function_name\']').val(),
          'function':that.$el.find('[name=\'function\']').val(),
          'function_id':that.$el.find('[name=\'function_id\']').val(),
        });

        that.$el.find('[name=\'function_name\']').val('');
        that.$el.find('[name=\'function\']').val('');
        that.$el.find('[name=\'function_id\']').val('');
      }

      function _showError() {
        that.$el.find('.alert-error').removeClass('hidden');
      }

      function _refreshHtmlOutput() {
        that.$el.find('.functions-no-result').remove();
        if ( !that.data.length && !that.$el.find('.functions-no-result').length ) {
          that.$htmlOutput.append( that.noResultFormat );
        }
      }

      function _removeFunction( iKey ) {
        var key = -1;
        $.each(that.data, function(index, val) {
          if ( val.function_id == iKey ) {
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

    var datesCtrl = new DatesControl( $('.dates-control'), <?php echo json_encode($aDates); ?>);
    var functionsCtrl = new FunctionsControl( $('.functions-control'), <?php echo json_encode($functions); ?>);
  });
//--></script>
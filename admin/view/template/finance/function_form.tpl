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
              cursor: text;
            }
            ul.multti-select-box li {
              float: left;
              border-radius: 4px;
              margin-left: 2px;
              position: relative;
              padding: 3px 5px 2px 5px;
              border: 1px solid #aaa;
              background-color: #e4e4e4;
              background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(20%, #f4f4f4), color-stop(50%, #f0f0f0), color-stop(52%, #e8e8e8), color-stop(100%, #eeeeee));
              background-image: -webkit-linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
              background-image: -moz-linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
              background-image: -o-linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
              background-image: linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
              background-clip: padding-box;
              box-shadow: 0 0 2px white inset, 0 1px 0 rgba(0, 0, 0, 0.05);
              color: #333;
              line-height: 13px;
              cursor: default;
              list-style: none;
            }
            ul.multti-select-box li:first-child {
              margin-left: 0;
            }
            div.caculator {
              float: left;
            }
            div.caculator ul {
              width: 255px;
              float: left;
              margin: 0px;
              list-style: none;
            }
            div.caculator ul li {
              float: left;
              margin-left: 3px;
              margin-bottom: 3px;
            }
            div.caculator ul li.first {
              margin-left: 0;
            }
            div.caculator ul li a.btn {
              width: 14px;
              text-align: center;
              line-height: 24px;
            }
            div.caculator ul li input {
              line-height: 24px;
            }
            div.caculator ul li.double a.btn {
              width: 57px;
            }
            div.caculator ul li.quadruple input {
              width: 198px;
              height: 24px;
              margin-bottom: 0;
            }
            div.caculator ul li a.btn .icon-plus:before, div.caculator ul li a.btn .icon-arrow-left:before {
              content: '';
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
              <div class="caculator input-xxlarge">
                <ul>
                  <li class="first"><a class="btn">7</a></li>
                  <li><a class="btn">8</a></li>
                  <li><a class="btn">9</a></li>
                  <li><a class="btn">+</a></li>
                  <li><a class="btn">-</a></li>
                  <li><a class="btn">(</a></li>
                  <li class="first"><a class="btn">4</a></li>
                  <li><a class="btn">5</a></li>
                  <li><a class="btn">6</a></li>
                  <li><a class="btn">*</a></li>
                  <li><a class="btn">/</a></li>
                  <li><a class="btn">)</a></li>
                  <li class="first"><a class="btn">1</a></li>
                  <li><a class="btn">2</a></li>
                  <li><a class="btn">3</a></li>
                  <li class="double"><a class="btn">0</a></li>
                  <li><a class="btn"><i class="icon-arrow-left"></i></a></li>
                  <li class="first quadruple"><input type="text" value=""/></li>
                  <li><a class="btn"><i class="icon-plus"></i></a></li>
                </ul>
              </div>
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
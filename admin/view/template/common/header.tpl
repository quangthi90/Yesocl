<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" xml:lang="<?php echo $lang; ?>">
<head>
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php } ?>
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<link rel="stylesheet" type="text/css" href="view/stylesheet/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/bootstrap-responsive.min.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/fortAwesome/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/uniform.default.css" />
<?php foreach ($styles as $style) { ?>
<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<script type="text/javascript" src="view/javascript/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
<script type="text/javascript" src="view/javascript/jquery/tabs.js"></script>
<script type="text/javascript" src="view/javascript/jquery/superfish/js/superfish.js"></script>
<script type="text/javascript" src="view/javascript/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="view/javascript/bootstrap/jquery.uniform.min.js"></script>
<?php foreach ($scripts as $script) { ?>
<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>
<script type="text/javascript">
//-----------------------------------------
// Confirm Actions (delete, uninstall)
//-----------------------------------------
$(document).ready(function(){
    // Confirm Delete
    $('#form').submit(function(){
        if ($(this).attr('action').indexOf('delete',1) != -1) {
            if (!confirm('<?php echo $text_confirm; ?>')) {
                return false;
            }
        }
    });
    	
    // Confirm Uninstall
    $('a').click(function(){
        if ($(this).attr('href') != null && $(this).attr('href').indexOf('uninstall', 1) != -1) {
            if (!confirm('<?php echo $text_confirm; ?>')) {
                return false;
            }
        }
    });
});
</script>
</head>
<body>
<div id="container">
<div id="header">
  <div class="div1">
    <div class="div2"><img src="view/image/logo.png" title="<?php echo $heading_title; ?>" onclick="location = '<?php echo $home; ?>'" /></div>
    <?php if ($logged) { ?>
    <div class="div3"><img src="view/image/lock.png" alt="" style="position: relative; top: 3px;" />&nbsp;<?php echo $logged; ?></div>
    <?php } ?>
  
  </div>
  <?php if ($logged) { ?>
  <div id="menu">
    <ul class="left" style="display: none;">
      <li id="user"><a class="top"><?php echo $text_users; ?></a>
      	<ul>
      		<li><a class="parent"><?php echo $text_group_manage; ?></a>
      			<ul>
      				<li><a href="<?php echo $group_type; ?>"><?php echo $text_group_type; ?></a></li>
      				<li><a href="<?php echo $group; ?>"><?php echo $text_group; ?></a></li>
      			</ul>
      		</li>
      		<li><a class="parent"><?php echo $text_user_manage; ?></a>
      			<ul>
      				<li><a href="<?php echo $user_group; ?>"><?php echo $text_user_group; ?></a></li>
      				<li><a href="<?php echo $user; ?>"><?php echo $text_user; ?></a></li>
              <li><a href="<?php echo $social_network; ?>"><?php echo $text_social_network; ?></a></li>
      			</ul>
      		</li>
          <li><a href="<?php echo $user_list; ?>"><?php echo $text_user_list; ?></a></li>
      	</ul>
      </li>
      <!--li id="attribute"><a class="top"><?php echo $text_attributes; ?></a>
      </li-->
      <li id="company"><a class="top"><?php echo $text_companies; ?></a>
        <ul>
          <li><a href="<?php echo $company; ?>"><?php echo $text_company; ?></a></li>
          <li><a href="<?php echo $company_group; ?>"><?php echo $text_company_group; ?></a></li>
        </ul>
      </li>
      <li id="company"><a class="top"><?php echo $text_stocks; ?></a>
        <ul>
          <li><a href="<?php echo $stock_market; ?>"><?php echo $text_market; ?></a></li>
          <li><a href="<?php echo $stock; ?>"><?php echo $text_stock; ?></a></li>
          <li><a class="parent"><?php echo $text_import; ?></a>
            <ul>
              <li><a href="<?php echo $stock_import; ?>"><?php echo $text_stock; ?></a></li>
              <li><a href="<?php echo $trading_import; ?>"><?php echo $text_trading; ?></a></li>
            </ul>
          </li>
          <li><a class="parent"><?php echo $text_setting; ?></a>
            <ul>
              <li><a href="<?php echo $stock_fund; ?>"><?php echo $text_fund; ?></a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li id="finance"><a class="top"><?php echo $text_finances; ?></a>
        <ul>
          <li><a class="parent"><?php echo $text_finances; ?></a>
            <ul>
              <li><a href="<?php echo $finance; ?>"><?php echo $text_finance; ?></a></li>
              <li><a href="<?php echo $finance_group; ?>"><?php echo $text_fi_group; ?></a></li>
              <li><a href="<?php echo $finance_import; ?>"><?php echo $text_import; ?></a></li>
              <li><a href="<?php echo $finance_code; ?>"><?php echo $text_code; ?></a></li>
              <li><a href="<?php echo $finance_function; ?>"><?php echo $text_function; ?></a></li>
              <li><a href="<?php echo $finance_report; ?>"><?php echo $text_report; ?></a></li>
              <li><a href="<?php echo $finance_export; ?>"><?php echo $text_export; ?></a></li>
            </ul>
          </li>
          <li><a href="<?php echo $finance_date; ?>"><?php echo $text_date; ?></a></li>
        </ul>
      </li>
      <li id="company"><a class="top"><?php echo $text_branches; ?></a>
        <ul>
          <li><a href="<?php echo $branch; ?>"><?php echo $text_branch; ?></a></li>
          <li><a href="<?php echo $branch_position; ?>"><?php echo $text_position; ?></a></li>
          <li><a href="<?php echo $branch_category; ?>"><?php echo $text_category; ?></a></li>
        </ul>
      </li>
      <li id="datalist"><a class="top"><?php echo $text_data_list; ?></a>
        <ul>
          <li><a href="<?php echo $type; ?>"><?php echo $text_type; ?></a></li>
          <li><a href="<?php echo $value; ?>"><?php echo $text_value; ?></a></li>
        </ul>
      </li>
      <!--li id="attribute"><a class="top"><?php echo $text_attributes; ?></a>
      	<ul>
      		<li><a href="<?php echo $attribute; ?>"><?php echo $text_attribute; ?></a></li>
      		<li><a href="<?php echo $attribute_group; ?>"><?php echo $text_attribute_group; ?></a></li>
      		<li><a href="<?php echo $attribute_type; ?>"><?php echo $text_attribute_type; ?></a></li>
      	</ul>
      </li-->
      <li id="system"><a class="top"><?php echo $text_system; ?></a>
        <ul>
          <li><a class="parent"><?php echo $text_design; ?></a>
            <ul>
              <li><a href="<?php echo $layout; ?>"><?php echo $text_layout; ?></a></li>
              <li><a href="<?php echo $action; ?>"><?php echo $text_action; ?></a></li>
            </ul>
          </li>
          <li><a class="parent"><?php echo $text_admin; ?></a>
            <ul>
              <li><a href="<?php echo $admin; ?>"><?php echo $text_admin_user; ?></a></li>
              <li><a href="<?php echo $admin_group; ?>"><?php echo $text_admin_group; ?></a></li>
            </ul>
          </li>
          <li><a class="parent"><?php echo $text_localisation; ?></a>
            <ul>
              <li><a href="<?php echo $country; ?>"><?php echo $text_country; ?></a></li>
              <li><a href="<?php echo $city; ?>"><?php echo $text_city; ?></a></li>
              <li><a href="<?php echo $district; ?>"><?php echo $text_district; ?></a></li>
              <li><a href="<?php echo $ward; ?>"><?php echo $text_ward; ?></a></li>
              <li><a href="<?php echo $street; ?>"><?php echo $text_street; ?></a></li>
            </ul>
          </li>
          <li><a class="parent"><?php echo $text_setting; ?></a>
            <ul>
              <li><a class="parent"><?php echo $text_group; ?></a>
                <ul>
                  <li><a href="<?php echo $group_action; ?>"><?php echo $text_action; ?></a></li>
                </ul>
              </li>
              <li><a class="parent"><?php echo $text_company; ?></a>
                <ul>
                  <li><a href="<?php echo $company_action; ?>"><?php echo $text_action; ?></a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="right">
      <li id="store"><a class="top" href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
    </ul>
    <script type="text/javascript"><!--
$(document).ready(function() {
	$('#menu > ul').superfish({
		hoverClass	 : 'sfHover',
		pathClass	 : 'overideThisToUse',
		delay		 : 0,
		animation	 : {height: 'show'},
		speed		 : 'normal',
		autoArrows   : false,
		dropShadows  : false, 
		disableHI	 : false, /* set to true to disable hoverIntent detection */
		onInit		 : function(){},
		onBeforeShow : function(){},
		onShow		 : function(){},
		onHide		 : function(){}
	});
	
	$('#menu > ul').css('display', 'block');
});
 
function getURLVar(urlVarName) {
	var urlHalves = String(document.location).toLowerCase().split('?');
	var urlVarValue = '';
	
	if (urlHalves[1]) {
		var urlVars = urlHalves[1].split('&');

		for (var i = 0; i <= (urlVars.length); i++) {
			if (urlVars[i]) {
				var urlVarPair = urlVars[i].split('=');
				
				if (urlVarPair[0] && urlVarPair[0] == urlVarName.toLowerCase()) {
					urlVarValue = urlVarPair[1];
				}
			}
		}
	}
	
	return urlVarValue;
} 

$(document).ready(function() {
	route = getURLVar('route');
	
	if (!route) {
		$('#dashboard').addClass('selected');
	} else {
		part = route.split('/');
		
		url = part[0];
		
		if (part[1]) {
			url += '/' + part[1];
		}
		
		$('a[href*=\'' + url + '\']').parents('li[id]').addClass('selected');
	}
});
//--></script> 
  </div>
  <?php } ?>
</div>

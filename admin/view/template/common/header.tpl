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
<?php foreach ($styles as $style) { ?>
<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<script type="text/javascript" src="view/javascript/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
<script type="text/javascript" src="view/javascript/jquery/tabs.js"></script>
<script type="text/javascript" src="view/javascript/jquery/superfish/js/superfish.js"></script>
<script type="text/javascript" src="view/javascript/bootstrap/bootstrap.min.js"></script>
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
    
  
  </div>
  <?php //if ($logged) { ?>
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
      			</ul>
      		</li>
      	</ul>
      </li>
      <li id="datalist"><a class="top"><?php echo $text_data_list; ?></a>
        <ul>
          <li><a href="<?php echo $type; ?>"><?php echo $text_type; ?></a></li>
          <li><a href="<?php echo $value; ?>"><?php echo $text_value; ?></a></li>
        </ul>
      </li>
      <li id="attribute"><a class="top"><?php echo $text_attributes; ?></a>
      	<ul>
      		<li><a href="<?php echo $attribute; ?>"><?php echo $text_attribute; ?></a></li>
      		<li><a href="<?php echo $attribute_group; ?>"><?php echo $text_attribute_group; ?></a></li>
      		<li><a href="<?php echo $attribute_type; ?>"><?php echo $text_attribute_type; ?></a></li>
      	</ul>
      </li>
      <li id="system"><a class="top"><?php echo $text_system; ?></a>
        <ul>
          <li><a class="parent"><?php echo $text_localisation; ?></a>
            <ul>
              <li><a href="<?php echo $country; ?>"><?php echo $text_country; ?></a></li>
              <li><a href="<?php echo $city; ?>"><?php echo $text_city; ?></a></li>
              <li><a href="<?php echo $district; ?>"><?php echo $text_district; ?></a></li>
              <li><a href="<?php echo $ward; ?>"><?php echo $text_ward; ?></a></li>
              <li><a href="<?php echo $street; ?>"><?php echo $text_street; ?></a></li>
            </ul>
          </li>
        </ul>
      </li>
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
  <?php //} ?>
</div>

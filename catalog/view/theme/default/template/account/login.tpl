<!DOCTYPE html>
<html>
  <head>    
    <title> Sign In | Yesocl - Social Network</title>
    <base href="{{ base }}" />
    
    <!-- Icon -->
    <link rel="shortcut icon" href="image/template/favicon.png">
    
    <!-- Library css -->
    <link href="catalog/view/theme/default/stylesheet/libs/bootstrap.css" rel="stylesheet" media="screen" />
    <link href="catalog/view/theme/default/stylesheet/libs/bootstrap-responsive.min.css" rel="stylesheet" media="screen" />
    <link href="catalog/view/theme/default/stylesheet/libs/fortAwesome/css/font-awesome.css" rel="stylesheet" media="screen" />
    <!-- Common css -->
    <link href="catalog/view/theme/default/stylesheet/common/yes.css" rel="stylesheet" media="screen" />
    <link href="catalog/view/theme/default/stylesheet/login.css" rel="stylesheet" media="screen" />
  </head>
  <body>
      <div id="y-login-header">
        <div>
            <img src="image/template/logo.png" alt="Yesocl" class="logo" />
            <h3 class="welcome">Welcome to Yesocl.com !</h3>
        </div>        
    </div>    
    <div id="y-frm-login">
        <div class="frm-title"> Sign In <strong>YESOCL.com</strong>
        </div>
        <div class="frm-content">            
            <form action="#">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user icon-2x"></i></span>
                    <input class="span3" id="username" type="text" placeholder="Email">
                    <div class="yes-warning">Field is required</div>
                </div>
                <br />
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock icon-2x"></i></span>
                    <input class="span3" id="password" type="text" placeholder="Password">
                    <div class="yes-warning"></div>
                </div>
                <div class="checkbox-container">
                    <input id="remember" name="remember" type="checkbox" /> 
                    <label for="remember">Remember me</label>
                </div>                
                <div class="btns">
                     <button class="btn btn-yes">Sign In</button>   
                </div>
            </form>     
        </div>
        <div class="frm-footer">
            <ul>
                <li>Don't have an account ? <a href="#">Sign Up</a><br></li>
                <li>Remind ! <a href="#">Password</a></li>
            </ul>
        </div>
    </div>
    <div id="y-footer">
        <div class="row-fluid">
            <div class="copyright span4">
                Copyright © 2012 - <strong>YESOCL.com</strong>
            </div>
            <div class="links-footer span5">
                <a href="#">Mobile Version</a> - <a href="#">Create Group</a> - <a href="#">Create Profiles</a>
                - <a href="#">Careers</a> - <a href="#">User privacy</a> - <a href="#">Term</a>
                - <a href="#">Help</a>
            </div>
            <div class="language-selection span3">
                <form action="#" class="form-inline">
                <div class="input-prepend">
                    <span class="add-on">Language </span>
                    <select name="lang-code" id="select1">
                        <option selected="selected">English</option>
                        <option>Viet Nam</option>
                        <option>Japanese</option>
                    </select>
                </div>
                </form>
            </div>
        </div>
    </div>
      <!-- Library Script -->
      <script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.8.3.min.js"></script>      
      <script type="text/javascript" src="catalog/view/javascript/common.js"></script>   
  </body>
</html>
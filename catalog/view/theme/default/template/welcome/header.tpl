<div id="y-header" class="outer-30">
    <div class="row-fluid">
        <div id="y-logo" class="span3">
            <a href="{{ action.home }}"><img src="image/template/logo.png" style="width:160px;" /></a>
        </div>
        <div class="span4">
            <div class="row-fluid" id="y-welcome-menu">
                <div class="span4">
                    <a href="#">Yestock</a>
                </div>
                <div class="span4">
                    <a href="#">Why Yesocl ?</a>
                </div>
                <div class="span4">
                    <a href="#">About Us</a>
                </div>
            </div>
        </div>
        <div class="span5 y-welcome-login">
            <form action="{{ action.login }}" method="post" class="row-fluid login-form" data-url="{{ action.login_page }}">
                <div class="span5">
                    <div class="row-fluid">
                        <input required="required" name="email" type="email" placeholder="Email"  class="span12 input-welcome" tabindex="1" />
                    </div>
                    <div class="row-fluid text-welcome-login-bottom">
                        <label>
                            <input type="checkbox" name="remember" value="true"> Remember me
                        </label>
                    </div>
                </div>
                <div class="span5">
                    <div class="row-fluid">
                        <input required="required" name="password" type="password" placeholder="Password" class="span12 input-welcome" tabindex="2" />
                    </div>
                    <div class="row-fluid text-welcome-login-bottom">
                        <a href="{{ action.forgot_pass }}">Forgot password!</a>
                        <a href="{{ action.connect_face }}" class="btn btn-success">Connect facebook</a>
                    </div>
                </div>
                <div class="span2 button-login-welcome">
                    <button type="submit" class="btn btn-success btn-login" tabindex="3">Sign in</button>
                </div>
            </form>
        </div> 
    </div>             
</div>
<div class="line-shadow"></div>
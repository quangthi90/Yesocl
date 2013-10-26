<div id="y-header" class="outer-30">
    <div class="row-fluid">
        <div id="y-logo" class="span3">
            <a href="{{ path('WelcomePage') }}"><img src="{{ asset_img('template/logo.png') }}" style="width:160px;" /></a>
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
            <div class="row-fluid">
                <div class="span8">
                    <div class="login-social">
                        <ul>
                            <li>
                                <a href="{{ action.connect_face }}">
                                    <i class="icon-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-google-plus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="span4">
                    <a href="#" class="btn btn-success" id="login-invoke"><i class="icon-unlock-alt"></i> Login</a>  
                </div>
            </div>
        </div> 
    </div>             
</div>
<div class="line-shadow"></div>
<div id="login-form-container" style="display: none;">
    <form action="{{ path('AjaxLogin') }}" method="post" class="row-fluid login-form" data-url="{{ path('Login') }}">
        <div class="span5">
            <div class="row-fluid">
                <input required="required" name="email" type="email" placeholder="Email"  class="span12 input-welcome" tabindex="1" autocomplete="off" />
            </div>
            <div class="row-fluid text-welcome-login-bottom">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
        </div>
        <div class="span5">
            <div class="row-fluid">
                <input required="required" name="password" type="password" placeholder="Password" class="span12 input-welcome" tabindex="2" autocomplete="off" />
            </div>
            <div class="row-fluid text-welcome-login-bottom">
                <a href="{{ path('LostPass') }}">Forgot password!</a>
            </div>
        </div>
        <div class="span2 button-login-welcome">
            <button type="submit" class="btn btn-success btn-login" tabindex="3">Sign in</button>
        </div>
    </form>
</div>
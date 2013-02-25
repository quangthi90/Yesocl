{% extends '@template/default/template/common/master.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    {{ parent() }}
    <link href="catalog/view/javascript/jquery/datepicker/datepicker.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block javascript %}
    {{ parent() }}
    <script type="text/javascript" src="catalog/view/javascript/jquery/datepicker/datepicker.js"></script>    
    <script type="text/javascript">
        jQuery(document).ready(function () {
            //Scale Intro Image:
            scaleIntro();
            //Date Picker:
            $('.y-date').datepicker();          
            //Join clicked:
            $('a.link-join').click(function(e){
                e.preventDefault();     
                var ele = $(this).children('span:first-child');
                $('#overlay').fadeIn(function(){                    
                    $('#intro-bg').css('margin','0');                   
                    $('#y-frm-login').animate(
                        {
                            right : '50px'
                        },600
                    );                  
                });
            });         
            //if close button is clicked
            $('.y-frm .close').click(function (e) {
                //Cancel the link behavior
                e.preventDefault();             
                closeLoginForm();
            });                 
            //if overlay is clicked
            $('#overlay').click(function () {
                closeLoginForm();
            }); 
            $(window).resize(function () {                
                scaleIntro();   
            });             
        });     
        //Close Form:
        function closeLoginForm(){              
            $('#y-frm-login').animate(
                {
                    right : '-9990px'
                },500,  
                function(){
                    $('#overlay').fadeOut(300, function(){
                        $('#intro-bg').css('margin','0px auto');
                    });                                             
                }                   
            );
        }           
        //Scale img Intro
        function scaleIntro(){
            var h = $(window).height();
            var header = $('#y-header').height();
            var footer = $('#y-footer').height();
            var content = h - header - footer;          
            $('#intro-bg').height(content);
            $('#intro-bg').width(content*760/630);      
        }
    </script>
{% endblock %}

{% block head %}
    {{ parent() }}
{% endblock %}

{% block content %}
        <div id="y-content" class="y-sub-container-1">
            <div id="intro-bg">
                <img src="catalog/view/theme/default/image/intro-2-bg.png" alt="" width="100%" height="100%" />
                <a href="#" class="link-join"><span>Join</span></a>
            </div>
            <div id="y-frm-login" class="y-frm">
                <a href="#" class="close">Close</a>
                <div class="frm-title">
                    Join <strong>YESOCL.com</strong>
                </div>
                <div class="frm-content">
                    <form action="#" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label" for="reg-first-name">First Name</label>
                            <div class="controls">
                                <input type="text" id="reg-first-name" placeholder="Please enter your first name" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="reg-last-name">Last Name</label>
                            <div class="controls">
                                <input type="text" id="reg-last-name" placeholder="Please enter your last name" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="reg-email">Email</label>
                            <div class="controls">
                                <input type="text" id="reg-email" placeholder="Please enter your email" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="reg-password">
                                Password</label>
                            <div class="controls">
                                <input type="password" id="reg-password" placeholder="Please enter your password" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="reg-re-password">
                                Re-type Password</label>
                            <div class="controls">
                                <input type="password" id="reg-re-password" placeholder="Please re-enter your password" />
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label" for="reg-birthay">
                                Birthday</label>
                            <div class="controls">
                                <input type="text" class="y-date" id="reg-birthay" data-datepicker-format="mm/dd/yyyy"  placeholder="Please enter your birthday" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="reg-sex">
                                Sex</label>
                            <div class="controls">
                                <select id="reg-sex">
                                    <option>-- Select sex --</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Unknow</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label class="checkbox">
                                    <input type="checkbox" name="lg-remember" />Remember me</label>
                                <button type="submit" class="btn btn-ystandard">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
{% endblock %}
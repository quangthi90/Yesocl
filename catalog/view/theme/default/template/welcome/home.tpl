{% extends '@template/default/template/welcome/layout.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/welcome.css" rel="stylesheet" media="screen" />    
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
    <div id="intro-bg">    	
		<img src="image/template/intro-2-bg.png" />  
    </div>    
</div>
<div id="y-frm-login" class="y-frm">
    <a href="#" class="close">X</a>
    <div class="frm-title">
        Join <strong>YESOCL.com</strong>
    </div>
    <div class="frm-content">
    	<form action="#">
    		<div class="controls controls-row">
    			<input type="text" class="span2" id="reg-first-name" placeholder="First Name" />
    			<input type="text" class="span2"  id="reg-last-name" placeholder="Last Name" />
    		</div>
    		<div class="controls">
    			<input type="text" class="input-block-level" id="reg-email" placeholder="E-mail" />
    		</div>
    		<div class="controls controls-row">
    			<input type="password" class="span2"  id="password" placeholder="Password" />
    			<input type="password" class="span2"  id="reg-password" placeholder="Re-type Password" />
    		</div>
    		<div class="controls" style="margin-bottom: 10px;">
                <input type="hidden" id="reg-birthay" />
                <div class="input-prepend">
                	<span class="add-on" style= "height: 18px;">Birthday</span>
                	<select class="birthday" id="reg-birthay-day">
	                    <option>-- Day --</option>
	                    <option>1</option>
	                    <option>2</option>
	                    <option>3</option>
	                    <option>4</option>
	                    <option>5</option>
	                    <option>6</option>
	                    <option>7</option>
	                    <option>8</option>
	                    <option>9</option>
	                    <option>10</option>
	                    <option>11</option>
	                    <option>12</option>
	                    <option>...</option>
	                </select>
	                <select class="birthday" id="reg-birthay-month">
	                    <option>-- Month --</option>
	                    <option>1</option>
	                    <option>2</option>
	                    <option>3</option>
	                    <option>4</option>
	                    <option>5</option>
	                    <option>6</option>
	                    <option>7</option>
	                    <option>8</option>
	                    <option>9</option>
	                    <option>10</option>
	                    <option>11</option>
	                    <option>12</option>
	                </select>
	                <select class="birthday" id="reg-birthay-year">
	                    <option>-- Year --</option>
	                    <option>2011</option>
	                    <option>2012</option>
	                    <option>2013</option>
	                </select>
                </div>                
            </div>
            <div class="controls">
            	<div class="input-prepend">
                	<span class="add-on" style= "height: 18px;width: 48px;">Sex</span>
	                <select id="reg-sex" style="width: 312px;">
	                    <option>-- Select sex --</option>
	                    <option>Male</option>
	                    <option>Female</option>
	                    <option>Unknow</option>
	                </select>
            	</div>
            </div>
            <div class="controls">
                <label class="checkbox"><input type="checkbox" name="lg-remember" />I agree Yesocl's policy</label>
                <br>
                <button type="submit" class="btn btn-ystandard">Sign up</button>
            </div>
    	</form>
    </div>
</div>
{% endblock %}

{% block javascript %}
    <script type="text/javascript">
        jQuery(document).ready(function () {
        	//Join clicked:
			$('#intro-bg img').click(function(e){
				$('#overlay').fadeIn(function(){					
					$('#intro-bg').css('text-align','left');					
					$('#y-frm-login').animate(
						{
							right : '50px'
						},600
					);					
				});
			});			
			//if close button is clicked
			$('.y-frm .close').click(function (e) {
				closeLoginForm();
			});					
			//if overlay is clicked
			$('#overlay').click(function () {
				closeLoginForm();
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
						$('#intro-bg').css('text-align','center');	
					});												
				}					
			);
		}		
    </script>
{% endblock %}
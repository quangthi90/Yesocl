{% extends '@template/default/template/welcome/layout.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/welcome.css" rel="stylesheet" media="screen" />
    <link href="catalog/view/javascript/jquery/datepicker/datepicker.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1 row-fluid">
    <div id="intro-bg" class="span4 offset4">
        <img src="image/template/intro-2-bg.png" />        
    </div>    
</div>
{% endblock %}

{% block javascript %}
    <script type="text/javascript" src="catalog/view/javascript/jquery/datepicker/datepicker.js"></script>    
    <script type="text/javascript">
        
    </script>
{% endblock %}
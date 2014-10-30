<div id="scroll-footer">
    <a href="#" class="btn-link-circle medium" id="auto-scroll-left" title="Scroll Left" style="display: none;">
      <i class="icon-arrow-left"></i>
    </a>
</div>
<div id="y-footer">
    <div id="yes-info">
        <div class="copyright">
            Copyright &copy; 2013 - <strong>YESOCL.com</strong>
        </div> 
        <div class="language-wrapper dropup js-language">
          <a href="#" class="language-item selected dropdown-toggle js-language-label" data-toggle="dropdown">
            <img src="">
            <span> </span>
            <i class="icon-caret-up"></i>
          </a>
          {% set language_code = get_cookie('language') %}
          <ul class="dropdown-menu js-language-btn">
            <li>
              <a href="#" data-selected="{% if language_code == 'en-US' %}true{% else %}false{% endif %}" data-code="en-US" class="language-item"><img src="image/flags/england.png"> <span>{% trans %}English{% endtrans %}</span></a>
            </li>
            <li>
              <a href="#" data-selected="{% if language_code == 'vi_VN' or get_cookie('language') == '' %}true{% else %}false{% endif %}" data-code="vi_VN" class="language-item"><img src="image/flags/vn.png"> <span>{% trans %}Vietnamese{% endtrans %}</span></a>
            </li>
            {#<li>
              <a href="#" data-selected="{% if language_code == 'zh' %}true{% else %}false{% endif %}" data-code="zh" class="language-item"><img src="image/flags/cn.png"> <span>Chinese</span></a>
            </li>#}
          </ul>
        </div> 
        <div class="links-footer">
          <ul>
            <li><a href="#">Create Group</a></li>
            <li><a href="#">User privacy</a></li>
            <li><a href="#">Term</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About us</a></li>
          </ul>            
        </div>              
    </div>    
</div>
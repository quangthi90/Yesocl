{% extends '@template/default/template/common/layout.tpl' %}
{% use '@template/default/template/common/html_block.tpl' %}

{% block title %}{% trans %}About{% endtrans %}{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('home.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
	<div id="y-content">
		<div id="y-main-content" class="about-page" style="overflow-y: auto;">
            <div class="row">
                <div class="span12">
                    <div class="front-page">
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="content-block" style="background-color: #56C2A9;padding: 40px;height: 468px;color: #FFF;">
                                    <p style="font-size: 20px;height: 160px;">
                                        <a class="system-link" href="#">YESOCL.COM </a>là mạng xã hội để trao đổi thông tin tài chính – nơi liên kết nhà đầu tư và doanh nghiệp.
                                    </p>
                                    <p>
                                        Chúng tôi không ngần ngại chia sẻ thông tin về thị trường chứng khoán và tin tức quan trọng  xoay quanh thị trường. Chúng tôi tạo ra cộng đồng tài chính để nhà đầu tư nêu quan điểm cá nhân. Chúng tôi tạo ra kênh truyền thông để doanh nghiệp minh bạch thông tin.
                                    </p>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="content-block" style="text-align: center;">
                                    <h1 style=""><a class="system-link" href="#" style="color: #009B77;">YESOCL.COM</a>
                                    </h1>
                                    <h3 style="color: #009B77;">Say yes to connect business</h3>
                                    <h3>Mạng xã hội tài chính tại Việt Nam</h3>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="content-block">
                                    <p style="text-align: right; font-size: 23px; line-height: 35px;">
                                        Tin tức
                                    <br>
                                        Chứng Khoán
                                    <br>
                                        Phân Tích Đầu Tư
                                    <br>
                                        Tin Doanh Nghiệp
                                    </p>
                                    <p style="background-image: url(image/template/about-1.jpg); background-repeat:no-repeat; background-position: 100% top;width: 100%; min-height: 300px;"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span12">
                    <div class="content-page">
                    	<p style="background-image:url(image/template/about-2.jpg); background-repeat:no-repeat; width: 100%; min-height: 200px;"></p>
                    	<div class="content-block">
                    		<h3 class="content-block-title">Thương Hiệu Cá Nhân</h3>
                    		<p>
                    			Tại mạng xã hội <a class="system-link" href="#">Yesocl.com</a> – bạn chỉ mất 3 phút thực hiện đăng nhập và tự bản thân tạo nên page cá nhân, có hơn hàng ngàn lượt truy cập mỗi ngày. Hãy để <a class="system-link" href="#">Yesocl.com</a> truyền tải hình ảnh của bạn đến với cộng đồng tài chính:
                    		</p>
                    		<ul>
                    			<li>
                    				<strong>Kỹ năng của bạn</strong>: Năng lực, học vấn, kinh nghiệm chuyên môn.
                    			</li>
                    			<li>
                    				<strong>Sự đam mê</strong>: Sự đam mê và cá nhân là điểm mấu chốt tạo nên thương hiệu mạnh.
                    			</li>
                    			<li>
                    				<strong>Thế mạnh</strong>: Thế mạnh để tạo sự thành công.
                    			</li>
                    		</ul>
                    	</div>
                    	<div class="content-block">
                    		<h3 class="content-block-title">Mở Rộng Các Mối Quan Hệ</h3>
                    		<ul>
                    			<li>
                    				<strong>Người ảnh hưởng</strong>: Theo dõi các chuyên gia đầu ngành để học hỏi và tạo mối quan hệ.
                    			</li>
                    			<li>
                    				<strong>Cộng đồng</strong>: Chủ động tham gia vào các thảo luận trong cộng đồng tài chính của Yesocl.
                    			</li>
                    			<li>
                    				<strong>Offline</strong>: Tham dự các sự kiện Offline tại Yesocl.com
                    			</li>
                    		</ul>
                    	</div>
                    	<div class="content-block">
                    		<h3 class="content-block-title">Chia Sẻ & Theo Dõi</h3>
                    		<ul>
                    			<li>
                    				<strong>Tin tức</strong>: Cập nhập và chia sẻ quan điểm các bài viết mới nhất tại Yesocl.
                    			</li>
                    			<li>
                    				<strong>Sự phê bình</strong>: Lắng nghe và ứng xử các phê bình một cách chuyên nghiệp. 
                    			</li>
                    			<li>
                    				<strong>Theo dõi</strong>: Theo dõi và ghi nhận lại các hoạt động về tạo dựng thương hiệu của bạn.
                    			</li>
                    		</ul>
                    	</div>
                    	<div class="content-block">
                    		<h3 class="content-block-title">Tầm nhìn Yesocl – mạng xã hội  tài chính Việt Nam </h3>
                    		<ul>
                    			<li>
                    				Là kênh  hội tụ những con người đam mê tài chính, có trách nhiệm gia tăng giá trị cá nhân và giá trị đầu tư.
                    			</li>
                    			<li>
                    				Là kênh hội tụ doanh nghiệp Việt Nam, có trách nhiệm gia tăng thương hiệu và minh bạch thông tin.
                    			</li>
                    			<li>
                    				Là kênh thông tin và chia sẻ tin tức có ảnh hưởng về thị trường tài chính luôn được cập nhập liên tục
                    			</li>
                    		</ul>
                    	</div>
                    	<div class="content-block">
                    		<h2>Sứ mệnh  Yesocl – mạng xã hội tài chính Việt Nam - nơi tinh hoa của sự chia sẻ được kết nối bởi cộng đồng tài chính.</h2>
                    	</div>
                    	<div class="content-block">
                    		<h3 class="content-block-title">Giá trị cốt lõi</h3>
                    		<ul>
                    			<li>
                    				Sức mạnh  của cộng đồng tài chính.
                    			</li>
                    			<li>
                    				Gia tăng giá trị cho người khác.
                    			</li>
                    			<li>
                    				Tôi chịu trách nhiệm  về  lời nói của tôi.
                    			</li>
                    		</ul>
                    	</div>
                    	<div class="content-block">
                    		<h3 class="content-block-title">Liên Hệ</h3>
                    		<h4>YESOCL.COM - Mạng xã hội tài chính tại Việt Nam</h4>
                    		<h5><a href="www.yesocl.com">www.yesocl.com</a></h5>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
	</div>
{% endblock %}

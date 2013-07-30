{% block post_common_form_status %}
	<form class="form-status" data-url="{{ action.status }}">
		<div class="post post_new feed">
			<div class="row-fluid txt_editor">
				<textarea class="post_input" style="resize: none;" placeholder="What's in your mind ..."></textarea>
			</div>			 
			<div class="post_tool">
				<div class="row-fluid">
					<div class="span8 post_new_control">
						<a href="#" title="Chèn hình">
							<i class="icon-camera"></i>
						</a>
					</div>
					<div class="span4 text-right">
						<button type="button" id="post_new" class="btn btn-success btn-status">Post</button>
					</div>
				</div>
			</div>	
		</div>		
		<div class="popupable" id="post_advance" style="width: 900px; height: 550px; top: 50px; left: 100px;background-color: #fff;display:none;">
			<a href="#" class="b-close" title="Close"><i class="icon-remove"></i></a>
			<div class="y-dlg">
			    <div class="dlg-title">
			        <i class="icon-yes"></i> Compose your post  
			    </div>
			    <div class="dlg-content">
			    	<div class="alert alert-error top-warning hidden">Warning!!</div>
			    	<textarea class="y-editor" style="height: 100px;" placeholder="What's in your mind ..."></textarea>
			    </div>
			    <div class="dlg-footer">
			    	<div class="controls">
		                <button type="submit" class="btn btn-success btn-reg">Post</button>
		            </div>
			    </div>
			</div>
	</form>	
{% endblock %}

{% block post_common_form_status_javascript %}
<script type="text/javascript" src="catalog/view/javascript/status.js"></script>
<script type="text/javascript" src="catalog/view/javascript/libs/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	$('#post_new').click(function() {
		$('#post_advance').bPopup( 
			{
				follow: [false, false],
				modalClose: false,
				speed: 500,
            	transition: 'slideDown',
            	modalColor : '#55ef13',
            	opacity: '0.3'
			}
		);
	});
	
</script>
{% endblock %}
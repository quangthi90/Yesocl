{% use '@template/default/template/post/common/post_editor.tpl' %}
{% block post_common_form_status %}
	<form class="form-status" data-url="{{ action.status }}">
		<div class="post_new">
			<div class="row-fluid txt_editor">
				<textarea class="post_input" style="resize: none;" placeholder="What's in your mind ..."></textarea>
			</div>			 
			<div class="post_tool">
				<div class="row-fluid">
					<div class="span8 post_new_control">
						<a href="#" title="Insert images" id="insert-new-img">
							<i class="icon-camera icon-2x"></i>
							<input type="file" data-no-uniform="true" name="img-attach" class="img-attach" title="Choose image to upload" />
						</a>
						<a href="#" title="Advance post" id="post_new_adv">
							<i class="icon-external-link-sign icon-2x"></i>
						</a>
					</div>
					<div class="span4 text-right">
						<button type="button" class="btn btn-yes btn-status">Post</button>
					</div>
				</div>
 			</div>	
		</div>
	</form>		
	<div class="popupable" id="post_advance" style="width: 900px; height: 550px; top: 40px; left: 100px;background-color: #fff;display:none;">
		<a href="#" class="b-close"><i class="icon-remove"></i></a>
		<div class="y-dlg">
			<form autocomplete="off">
				<div class="dlg-title">
			        <i class="icon-yes"></i> Compose your post  
			    </div>
			    <div class="dlg-content">
			    	<div class="alert alert-error top-warning hidden">Warning!!</div>
			    	<div class="control-group">
			    		<label for="title" class="control-label">Title</label>
			    		<div class="controls">
			    			<input style="width: 845px;" placeholder="Your title" type="text" name="title" id="title">
			    		</div>
		    		</div>
		    		<div class="control-group">
		    			<label class="control-label">Content</label>
				    	{{block('post_common_post_editor')}}
				    	<div class="y-editor" id="post-adv-editor">
				    		Your content ...
				    	</div>
			    	</div>
			    	<div class="control-group captcha">
			    		<label for="captcha" class="control-label">Captcha check</label><div class="controls">
			    		<img class="captcha-img" src="http://www.captcha.net/duo_logo.png" 
			    			/>
		    			<input class="captchainput" placeholder="Insert captcha..." type="text" name="captcha" id="captcha" >
		    			</div>
	    			</div>
			    </div>
			    <div class="dlg-footer">
			    	<div class="controls">
			    		<button type="reset" class="btn btn-yes btn-reset">Reset</button>
		                <button type="submit" class="btn btn-yes">Post</button>
		            </div>
			    </div>
			</form>			    
		</div>
	</div>
{% endblock %}

{% block post_common_form_status_javascript %}
<script type="text/javascript" src="{{ asset_js('libs/jquery.hotkeys.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/bootstrap-wysiwyg.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('status.js') }}"></script>
<script type="text/javascript">	    
	$('#post_new_adv').click(function() {
		$('#post_advance').bPopup( 
			{
				follow: [false, false],				
				speed: 300,
            	transition: 'slideDown',
            	modalColor : '#000',
            	opacity: '0.5'
			}
		);		
	});	
	$('button.btn-reset').click(function() {
		var form = $(this).parents('form').first(); 
		if(form.length > 0) {
			var editor = form.find('.y-editor');
			editor.html('');
			editor.focus();
		}
	});
</script>
{% endblock %}
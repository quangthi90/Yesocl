{% block template_advance_post_item_single_user %}
	<div class="mfp-hide y-dlg-container" id="js-advance-post" data-focus-type="input[type='text']">
		<div class="y-dlg">
			<form autocomplete="off" class="form-status full-post">
				<div class="dlg-title">
			        <i class="icon-yes"></i> 
			        <span data-bind="text: is_edit() ? '{% trans %}Edit Post{% endtrans %}' : '{% trans %}New Post{% endtrans %}'">
			        
			        </span>
			    </div>
			    <div class="dlg-content">
			    	<div class="dlg-column upload-container fl" style="width:28%;">
			    		<label class="control-label">{% trans %}Choose an image for new post{% endtrans %}</label>
			    		<input type="hidden" name="img-url" class="img-url" value="" />
			    		<div class="img-previewer-container" placeholder="{% trans %}Drag an image here{% endtrans %}">
			    		<!-- ko if: !image() -->
			    			<p class="drop-zone-show">{% trans %}Drag an image here{% endtrans %}</p>
			    		<!-- /ko -->
			    		<!-- ko if: image() -->
			    			<img class="img-uploaded" data-bind="attr: {src: image}">
							<span class="close"><i class="icon-remove"></i></span>
			    		<!-- /ko -->
			    		</div>
			    		<div class="y-progress">
							<div class="bar" style="width: 0%;"></div>
						</div>
			    		<div class="drag-img-upload">			    			
			    			<a href="#" class="btn btn-yes" onclick="$('#img-upload-adv').click() ; return false;">
			    				<span><i class="icon-upload"></i> {% trans %}Choose image{% endtrans %}</span>
			    			</a>
			    			<input type="file" data-no-uniform="true" id="img-upload-adv"  class="img-upload" title="Choose image to upload" name="files[]" data-url="{{ path('UploadFile') }}" />
			    		</div>
					</div>
					<div class="dlg-column fr" style="width:68%;">
						<div class="alert alert-error top-warning hidden">{% trans %}Warning{% endtrans %}!!</div>
				    	<div class="control-group">
				    		<label for="title" class="control-label">{% trans %}Title{% endtrans %}</label>
				    		<div class="controls">
				    			<input placeholder="Your title" type="text" name="title" id="title" style="width: 98%;" data-bind="attr: {value: title}" />
				    		</div>
			    		</div>
			    		<div class="control-group">
			    			<label class="control-label">{% trans %}Content{% endtrans %}</label>
					    	<div class="y-editor" id="post-adv-editor" data-bind="text: content"></div>
				    	</div>
					</div>
			    </div>
			    <div class="dlg-footer">
			    	<div class="controls">
			    		<a href="#" class="btn btn-yes js-post-submit-btn">{% trans %}Submit{% endtrans %}</a>
			    		<button type="reset" class="btn btn-yes js-post-reset-btn">{% trans %}Reset{% endtrans %}</button>
		            </div>
			    </div>		
			</form>
		</div>
	</div>
{% endblock %}
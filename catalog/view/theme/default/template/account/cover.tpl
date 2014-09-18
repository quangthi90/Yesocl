{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}{% trans %}Change cover{% endtrans %}{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('libs/jquery.jcrop.min.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
  <div id="y-main-content">
    <div class="y-frm" id="y-frm-cover">
        <div class="frm-title">{% trans %}Change cover{% endtrans %}</div>
        <div class="alert alert-success {% if success is not defined %}hidden{% endif %}">{{ success }}</div>
        <div class="alert alert-error {% if warning is not defined %}hidden{% endif %}">{{ warning }}</div>
        <div class="frm-content">            
            <div class="cover-step upload-container" id="cover-choose-image">
                <input type="hidden" name="img-url" class="img-url" value="" />
                <div class="img-previewer-container" placeholder="Drag an photo here">
                    <p class="drop-zone-show">
                        <span>Drag an image here or </span>
                        <span class="drag-img-upload">
                            <a href="" class="btn btn-yes btn-upload" onclick="$('#cover-upload-img').trigger('click'); return false;">
                                <span><i class="icon-upload"></i> Choose image</span>
                            </a>
                            <input type="file" data-no-uniform="true" class="hidden img-upload" id="cover-upload-img" name="files[]" data-url="{{ path('UploadFile') }}" />
                        </span>
                    </p>
                </div>
                <div class="y-progress">
                    <div class="bar" style="width: 0%;"></div>
                </div>                
            </div>
            <div class="cover-step image-cropper" id="cover-edit-image">
                <div class="uploaded-image">
                    <img id="uploaded-image">                    
                </div>
                <div class="previewed-image">
                    <label>Preview cover</label>
                    <div class="previewed-image-container">
                        <div class="none-image"></div>
                        <img id="previewed-image">
                    </div>
                    <div class="preview-tools">
                        <a href="#" class="preview-tool-item" id="make-circle-btn" title="Make circle"><i class="icon-circle-blank"></i></a>
                        <a href="#" class="preview-tool-item" id="make-clear-btn"  title="Clear"><i class="icon-eraser"></i></a>
                    </div>  
                </div>
                <div class="image-buttons">
                    <a href="#" class="btn btn-yes" data-has-image="false" data- id="cover-save">Save cover</a>
                    <a href="#" class="btn btn-yes" id="cover-re-choose-image">Choose another image</a>
                    <a href="#" class="btn btn-yes">Cancel</a>
                </div>
            </div>
        </div>
        <div class="frm-footer">            
        </div>
    </div>
  </div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.ui.widget.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.load-image.min.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.canvas-to-blob.min.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.iframe-transport.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload-process.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload-image.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload-validate.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/jquery.jcrop.min.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('cover.js') }}"></script> 
<!-- avatar.js -->
{% endblock %}
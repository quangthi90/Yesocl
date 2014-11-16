{% extends '@template/default/template/layout/basic/master.tpl' %}

{% block title %}{% trans %}Change Avatar{% endtrans %}{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css_old('common/yes.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset_css_old('libs/jquery.jcrop.min.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div class="y-frm" id="y-frm-avatar">
    <div class="frm-title">{% trans %}Change avatar{% endtrans %}</div>
    <div class="alert alert-success {% if success is not defined %}hidden{% endif %}">{{ success }}</div>
    <div class="alert alert-error {% if warning is not defined %}hidden{% endif %}">{{ warning }}</div>
    <div class="frm-content" style="border-bottom: none;">            
        <div class="avatar-step upload-container" id="avatar-choose-image">
            <input type="hidden" name="img-url" class="img-url" value="" />
            <div class="img-previewer-container" placeholder="Drag an photo here">
                <p class="drop-zone-show">
                    <span>Drag an image here or </span>
                    <span class="drag-img-upload">
                        <a href="" class="btn btn-yes btn-upload" onclick="$('#avatar-upload-img').trigger('click'); return false;">
                            <span><i class="icon-upload"></i> Choose image</span>
                        </a>
                        <input type="file" data-no-uniform="true" class="hidden img-upload" id="avatar-upload-img" name="files[]" data-url="{{ path('UploadFile') }}" />
                    </span>
                </p>
            </div>
            <div class="y-progress">
                <div class="bar" style="width: 0%;"></div>
            </div>                
        </div>
        <div class="avatar-step image-cropper" id="avatar-edit-image">
            <div class="uploaded-image">
                <img id="uploaded-image">                    
            </div>
            <div class="previewed-image">
                <label>Preview avatar</label>
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
                <a href="#" class="btn btn-yes" data-has-image="false" data- id="avatar-save">Save avatar</a>
                <a href="#" class="btn btn-yes" id="avatar-re-choose-image">Choose another image</a>
                <a href="#" class="btn btn-yes">Cancel</a>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript" src="{{ asset_js_old('libs/upload/jquery.ui.widget.js') }}"></script>
<script type="text/javascript" src="{{ asset_js_old('libs/upload/jquery.load-image.min.js') }}"></script>
<script type="text/javascript" src="{{ asset_js_old('libs/upload/jquery.canvas-to-blob.min.js') }}"></script>
<script type="text/javascript" src="{{ asset_js_old('libs/upload/jquery.iframe-transport.js') }}"></script>
<script type="text/javascript" src="{{ asset_js_old('libs/upload/jquery.fileupload.js') }}"></script>
<script type="text/javascript" src="{{ asset_js_old('libs/upload/jquery.fileupload-process.js') }}"></script>
<script type="text/javascript" src="{{ asset_js_old('libs/upload/jquery.fileupload-image.js') }}"></script>
<script type="text/javascript" src="{{ asset_js_old('libs/upload/jquery.fileupload-validate.js') }}"></script>
<script type="text/javascript" src="{{ asset_js_old('libs/jquery.jcrop.min.js') }}"></script>
<script type="text/javascript" src="{{ asset_js_old('avatar.js') }}"></script>
{% endblock %}
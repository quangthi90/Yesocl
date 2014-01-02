{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}Change Avatar - Yesocl Network{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('libs/jquery.jcrop.min.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
  <div id="y-main-content">
    <div class="y-frm" id="y-frm-avatar">
        <div class="frm-title"> Change avatar</div>
        <div class="alert alert-success {% if success is not defined %}hidden{% endif %}">{{ success }}</div>
        <div class="alert alert-error {% if warning is not defined %}hidden{% endif %}">{{ warning }}</div>
        <div class="frm-content">            
            <div class="avatar-step upload-container" id="avatar-choose-image">
                <input type="hidden" name="img-url" class="img-url" value="" />
                <div class="img-previewer-container" placeholder="Drag an photo here">
                    <p class="drop-zone-show">Drag an image here</p>
                </div>
                <div class="y-progress">
                    <div class="bar" style="width: 0%;"></div>
                </div>
                <div class="drag-img-upload">                           
                    <a href="#" class="btn btn-yes btn-upload">
                        <span><i class="icon-upload"></i> Choose image</span>
                        <input type="file" data-no-uniform="true" class="img-upload" title="Choose image to upload" name="files[]" data-url="{{ path('UploadFile') }}" />
                    </a>
                </div>
            </div>
            <div class="avatar-step image-cropper" id="avatar-edit-image">
                <input type="hidden" name="edited-img-url" class="edited-img-url" value="" />
                <div class="uploaded-image">
                    <img id="uploaded-image">                    
                </div>
                <div class="previewed-image">
                    <label>Preview avatar</label>
                    <div class="none-image" id="avatar-none-image"></div>
                    <img id="previewed-image">
                </div>
                <div class="image-buttons">
                    <a href="#" class="btn btn-yes" id="avatar-save">Save avatar</a>
                    <a href="#" class="btn btn-yes" id="avatar-re-choose-image">Choose another image</a>
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
<script type="text/javascript" src="{{ asset_js('avatar.js') }}"></script>
{% endblock %}
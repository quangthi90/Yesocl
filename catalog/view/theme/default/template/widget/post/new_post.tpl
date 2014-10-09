{% block new_post_stylesheet %}
{% endblock %}
{% block new_post_block %}    
    <div data-bind="with: NewPost" id="new-post-widget" class="new-post-widget">
        <div class="widget new-post-widget-container">
            <div class="border-bottom" data-bind="with: newPost">
                <textarea data-bind="value: content, css: { 'disabled' : $parent.isPosting() }, valueUpdate: 'afterkeydown', autoSize: content" placeholder="Share something ..." class="form-control rounded-none border-none resize-ver animated new-post-content"></textarea>
            </div>
            <div class="btn-toolbar" role="toolbar">
                <div class="btn-group btn-group-sm">
                    <a class="btn btn-nobg"><i class="fa fa-picture-o"></i> Image</a>
                    <a class="btn btn-nobg"><i class="fa fa-link"></i> Link</a>                                      
                </div>
                <div class="btn-group btn-group-sm pull-right">
                    <a class="btn btn-primary" data-bind="click: addPost, css: { 'disabled' : !canPost() }">Share</a>
                </div>
            </div>
        </div>
    </div>
    {#
    <form action="{{ path('UploadFile') }}" class="dropzone hidden" id="my-awesome-dropzone">
        <input type="file" title="Choose image to upload" name="files[]" data-url="{{ path('UploadFile') }}" />
    </form>  
    #}  
{% endblock 
%}
{% block new_post_javascript %}
{% endblock %}
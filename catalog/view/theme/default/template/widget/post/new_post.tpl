{% block new_post_stylesheet %}
{% endblock %}
{% block new_post_block %}    
    <div data-bind="with: NewPost" id="new-post-widget" class="new-post-widget">
        <div class="widget new-post-widget-container">
            <div class="border-bottom" data-bind="with: newPost">
                <!-- ko if: $parent.hasTitle() -->   
                <div class="">
                    <input type="text" data-bind="value: title, css: { 'disabled' : $parent.isPosting() }, valueUpdate: 'afterkeydown', hasFocus: $parent.isFocusingTitle()" class="form-control" placeholder="Enter a title ..." />
                </div>
                <!-- /ko -->
                <textarea spellcheck="false" data-bind="css: { 'disabled' : $parent.isPosting() }, valueUpdate: 'afterkeydown', autoSize: content, mention: content" placeholder="Share something ..." class="form-control rounded-none border-none resize-ver animated new-post-content"></textarea>
            </div>
            <div class="btn-toolbar" role="toolbar">
                <div class="btn-group btn-group-sm">
                    <a class="btn btn-nobg" title="Add a title" data-bind="click: toggleTitle, css: { 'active' : hasTitle() }"><i class="fa fa-plus-square"></i> Title</a>
                    <a class="btn btn-nobg" title="Add images" data-bind="click: toggleImage, css: { 'active' : activeImageUploading() }"><i class="fa fa-plus-square"></i> Image</a>                    
                </div>
                <div class="btn-group btn-group-sm pull-right">
                    <a class="btn btn-primary" data-bind="click: addPost, css: { 'disabled' : !canPost() }">Share</a>
                </div>
            </div>
        </div>        
        <!-- ko if: hasImage() -->        
        <div class="dropzone new-post-part" id="newpost-dropzone" data-bind="uploader: images, uploadOptions: uploadOptions">
        </div>
        <!-- /ko -->
    </div>
{% endblock 
%}
{% block new_post_javascript %}
{% endblock %}
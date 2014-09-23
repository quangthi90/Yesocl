{% block cover_block %}
<div class="timeline-cover">
    <div class="y-progress">
        <div class="bar" style="width: 0%;"></div>
    </div>   
    <div class="cover">
        <button id="btsave_cover">save</button>
        <button id="btdrag_cover">drag</button>
        
        <div class="cover-step upload-container" id="cover-choose-image">
        <input type="hidden" name="img-url" class="img-url" value="" />
        <div class="img-previewer-container" placeholder="Drag an photo here">
            <p class="drop-zone-show">
                <span>Drag an image here or </span>
                <span class="drag-img-upload">
                    <a href="" class="btn btn-yes btn-upload" onclick="$('#cover-upload-img').trigger('click'); return false;">
                        <span><i class="icon-upload"></i> Choose image</span>
                    </a>
                    <input type="file" data-no-uniform="true" class="hidden img-upload" id="cover-upload-img" name="files[]" data-url="{{ path('UploadFile') }}" id="user_cover" />
                     <div class="image-buttons">
                          <a href="#" class="btn btn-yes" data-has-image="false" data- id="cover-save">Save cover</a>
                     </div>
                </span>
            </p>
        </div>
        <div class="top">
            <img src="{{ asset_css('platform/images/photodune-2755655-party-time-s.jpg') }}" id="cover"/>
        </div>
        <div id="position_img"></div>

        <script type="text/javascript">
            $('#btsave_cover').click(function(){
                $('#cover').draggable( "disable" );
                a = $('#cover').dragncrop('getPosition');
                $('#position_img').text ("Position offset: "+ a.offset);
            })

            $('#btdrag_cover').click(function(){
                $('#cover').dragncrop();
                $('#cover').draggable();
                $('#cover').draggable( "enable" );
            })
        </script>
        <ul class="list-unstyled">
            <li class="active"><a href="index.html?lang=en"><i class="fa fa-fw fa-clock-o"></i> <span>Timeline</span></a></li>
            <li><a href="about_1.html?lang=en"><i class="fa fa-fw fa-user"></i> <span>About</span></a></li>
            <li><a href="media_1.html?lang=en"><i class="fa fa-fw icon-photo-camera"></i> <span>Photos</span> <small>(102)</small></a></li>
            <li><a href="contacts_1.html?lang=en"><i class="fa fa-fw icon-group"></i><span> Friends </span><small>(19)</small></a></li>
            <li><a href="messages.html?lang=en"><i class="fa fa-fw icon-envelope-fill-1"></i> <span>Messages</span> <small>(2 new)</small></a></li>
        </ul>
    </div>
</div>
{% endblock %}
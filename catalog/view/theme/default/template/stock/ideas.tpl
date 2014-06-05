{% extends '@template/default/template/common/layout.tpl' %}
{% use '@template/default/template/stock/common/block_news.tpl' %}
{% use '@template/default/template/common/ko_template_block.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}
{% block stylesheet %}    
{{ block('common_ko_template_style') }}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal stock-page" style="min-width: inherit; display: inline-block;">
    	{% set news_title = 'Ideas'|trans %}
        {% set news_href = '#' %}
        {{ block('stock_common_block_news') }}
        {{ block('common_ko_template_comment') }}
        {{ block('common_ko_template_user_box') }}
    </div>
</div>
{% endblock %}

{% block javascript %}
	{{ block('stock_common_block_news_javascript') }}
	<script type="text/javascript" src="{{ asset_js('ko-vms.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var postType = "{{ post_type }}";
			var stockCode = "{{ stock_code }}";

			var newsOptions = {
				Id : "stock-news",
				canLoadMore: true,
				hasNewPost: true,
				validate: function(postData){
                    var validationMsgs = [];
                    //Validate here, return a collection of error if any
                    if(postData.content.length === 0) {
                        validationMsgs.push("Content is required");
                    }else {
                        var content = postData.content.replace(new RegExp("&nbsp;", 'g'), "");
                        content = content.replace(new RegExp("<br>", 'g'), "");
                        var temp = $("<div></div>");
                        temp.html(content);
                        if(temp.html().trim().length === 0){
                            validationMsgs.push("Content is required");
                        }
                    }
                    return validationMsgs;
                },
                urls : {
                    loadNews : { name: "ApiGetStockIdeas",  params: { stock_code : stockCode } },
                    postNews : { name: "ApiPostPost", params: { slug : stockCode, post_type: postType } },
                    updateNews : { name: "ApiPutPost", params: { post_type : postType } }
                }
			};
			var commentBoxOptions = {
				Id : "comment-box"
			};
			var userBoxOptions = {
			};

			var viewModel = {
				newsModel : new NewsViewModel(newsOptions),
				commentBoxModel : new CommentBoxViewModel(commentBoxOptions),
				userBoxModel : new UserBoxViewModel(userBoxOptions)
			};
			ko.applyBindings(viewModel, document.getElementById(YesGlobal.Configs.defaultBindingElement));
		});
	</script>
{% endblock %}
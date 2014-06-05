{% extends '@template/default/template/common/layout.tpl' %}
{% use '@template/default/template/stock/common/block_news.tpl' %}
{% use '@template/default/template/common/ko_template_block.tpl' %}

{% block title %}{{ branch.name }}|{% trans %}Branch Detail Page{% endtrans %}{% endblock %}

{% block stylesheet %}
{{ block('common_ko_template_style') }}
{% endblock %}

{% block body %}
    <div id="y-content">
        <div id="y-main-content" class="has-horizontal stock-page" style="min-width: inherit; display: inline-block;">
            {% set news_title = 'Post'|trans %}
            {% set news_href = '#' %}
            {{ block('branch_common_block_news') }}
            {{ block('common_ko_template_comment') }}
            {{ block('common_ko_template_user_box') }}
        </div>
    </div>
{% endblock %}

{% block template %}
{% endblock %}

{% block datascript %}
    {{ block('stock_common_block_news_javascript') }}
    <script type="text/javascript" src="{{ asset_js('ko-vms.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var categories = JSON.parse('{{ categories|json_encode()|raw }}');
            var validCategorySlug = function (slug) {
                if(slug === null) {
                    return "Category is required";
                }else {
                    var check = false;
                    $.each(categories, function(index, val) {
                        if (val.slug === slug) {
                            return check = true;
                        }
                    })
                    if (!check) {
                        return "Category is required";
                    }else {
                        return "";
                    }
                }
            }
            var postOptions = {
                Id : "branch-detail",
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
                    if(postData.description.length === 0) {
                        validationMsgs.push("Description is required");
                    }else {
                        var description = postData.description.replace(new RegExp("&nbsp;", 'g'), "");
                        description = description.replace(new RegExp("<br>", 'g'), "");
                        var temp = $("<div></div>");
                        temp.html(content);
                        if(temp.html().trim().length === 0){
                            validationMsgs.push("Description is required");
                        }
                    }
                    var validCategorySlugMsg = validCategorySlug(postData.category_slug);
                    if (validCategorySlugMsg != "") {
                        validationMsgs.push(validCategorySlugMsg);
                    }

                    return validationMsgs;
                },
                urls : {
                    loadNews : { name: "ApiGetLastBranchNews",  params: { branch_slug : '{{ branch_slug }}' } },
                    postNews : { name: "ApiPostPost", params: { post_type: '{{ post_type }}' } },
                    updateNews : { name: "ApiPutPost", params: { post_type : '{{ post_type }}' } }
                }
            };
            var commentBoxOptions = {
                Id : "comment-box"
            };
            var userBoxOptions = {
            };
            var branchOptions = {
                branchSlug: '{{ branch_slug }}',
            };

            var viewModel = {
                newsModel : new NewsViewModel(postOptions),
                commentBoxModel : new CommentBoxViewModel(commentBoxOptions),
                userBoxModel : new UserBoxViewModel(userBoxOptions),
                branchInforModel : new BranchInforModel(branchOptions),
            };
            ko.applyBindings(viewModel, document.getElementById('y-content'));
        });
    </script>
{% endblock %}

{% block javascript %}
{% endblock %}
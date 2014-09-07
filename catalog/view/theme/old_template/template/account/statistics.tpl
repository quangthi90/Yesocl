{% extends '@template/default/template/common/layout.tpl' %}
{% use '@template/default/template/post/common_ko/post_statistics.tpl' %}
{% use '@template/default/template/common/ko_template_block.tpl' %}
{% use '@template/default/template/account/common/profile_column.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}
{% block stylesheet %}    
{{ block('common_ko_template_style') }}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content">
        {{ block('account_common_profile_column') }}
        {{ block('post_common_ko_post_statistics') }}
        {{ block('common_ko_template_comment') }}
        {{ block('common_ko_template_user_box') }}
    </div>
</div>
{% endblock %}

{% block javascript %}
    {{ block('post_common_ko_post_statistics_javascript') }}
    <script type="text/javascript" src="{{ asset_js('ko-vms.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var currUser = JSON.parse('{{ current_user|json_encode()|raw }}');
            var postType = '{{ post_type }}';

            var statisticsOptions = {
                id : "posts-statistics",
                width: "1080px",
                canLoadMore: true,
                userCaching: true,
                clearCacheWhenReload: true,
                urls : {
                    loadNews : { name: "ApiGetPostStatistic",  params: { user_slug : currUser.slug, post_type: 'branch' } },
                    loadTimes : { name: "ApiGetPostStatisticTime", params: { user_slug : currUser.slug, post_type: 'branch' } }
                }
            };
            var commentBoxOptions = {
                Id : "comment-box"
            };
            var userBoxOptions = {
            };
            var wallUserColumnOptions = {
                wallUser : currUser
            };

            var viewModel = {
                postStatisticsModel : new PostStatisticsModel(statisticsOptions),
                commentBoxModel : new CommentBoxViewModel(commentBoxOptions),
                userBoxModel : new UserBoxViewModel(userBoxOptions),
                userInfoColumnModel : new UserInfoColumnViewModel(wallUserColumnOptions)
            };
            ko.applyBindings(viewModel, document.getElementById(YesGlobal.Configs.defaultBindingElement));
        });
    </script>
{% endblock %}
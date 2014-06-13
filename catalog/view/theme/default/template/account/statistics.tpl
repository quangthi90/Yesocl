{% extends '@template/default/template/common/layout.tpl' %}
{% use '@template/default/template/stock/common/block_news.tpl' %}
{% use '@template/default/template/common/ko_template_block.tpl' %}
{% use '@template/default/template/account/common/profile_column.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}
{% block stylesheet %}    
{{ block('common_ko_template_style') }}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal stock-page" style="min-width: inherit; display: inline-block;">
        {% set news_title = 'Post'|trans %}
        {% set news_href = '#' %}
        {{ block('account_common_profile_column') }}
    </div>
</div>
{% endblock %}

{% block javascript %}
    {{ block('stock_common_block_news_javascript') }}
    <script type="text/javascript" src="{{ asset_js('ko-vms.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var currUser = JSON.parse('{{ current_user|json_encode()|raw }}');
            var postType = '{{ post_type }}';

            var wallUserColumnOptions = {
                wallUser : currUser
            };

            var viewModel = {
                userInfoColumnModel : new UserInfoColumnViewModel(wallUserColumnOptions)
            };
            ko.applyBindings(viewModel, document.getElementById(YesGlobal.Configs.defaultBindingElement));
        });
    </script>
{% endblock %}
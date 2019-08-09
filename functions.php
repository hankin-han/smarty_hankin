<?php
add_filter( 'show_admin_bar', '__return_false' );
register_nav_menu('warp-nav', 'smarty-菜单');

/* 设置后台样式 */
function admin_my_css() {
    wp_enqueue_style( "admin-my", get_template_directory_uri() . "/static/css/admin-my.css" );
}
add_action('admin_head', 'admin_my_css');
/* 获取主题名称 */
function _the_theme_name()
{
    $current_theme = wp_get_theme();
    return $current_theme->get('Name');
}
/* 获取主题版本 */
function _the_theme_version()
{
    $current_theme = wp_get_theme();
    return $current_theme->get('Version');
}
/* 启用标题 */
function show_wp_title()
{
    global $page, $paged;
    wp_title('-', true, 'right');
    // 添加网站标题.
    bloginfo('name');
    // 为首页添加网站描述.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) {
        echo ' - ' . $site_description;
    }
    // 如果有必要，在标题上显示一个页面数.
    if ($paged >= 2 || $page >= 2) {
        echo ' - ' . sprintf('第%s页', max($paged, $page));
    }
}
/* 清除谷歌字体 */
function coolwp_remove_open_sans_from_wp_core()
{
    wp_deregister_style('open-sans');
    wp_register_style('open-sans', false);
    wp_enqueue_style('open-sans', '');
}
add_action('init', 'coolwp_remove_open_sans_from_wp_core');
/* 清除wp_head无用内容 */
function disable_emojis() {
    remove_action( 'wp_head', 'wp_generator' ); //移除WordPress版本
    remove_action( 'wp_head', 'rsd_link' ); //移除离线编辑器开放接口
    remove_action( 'wp_head', 'wlwmanifest_link' ); //移除离线编辑器开放接口
    remove_action( 'wp_head', 'index_rel_link' ); //去除本页唯一链接信息
    remove_action( 'wp_head', 'feed_links', 2 ); //移除feed
    remove_action( 'wp_head', 'feed_links_extra', 3 ); //移除feed
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 ); //移除wp-json链
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); //头部的JS代码
    remove_action( 'wp_head', 'wp_print_styles', 8 ); //emoji载入css
    remove_action( 'wp_head', 'rel_canonical' ); //rel=canonical
    add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 ); //头部加载DNS预获取（dns-prefetch）
}
add_action( 'init', 'disable_emojis' );
//移除WordPress头部加载DNS预获取（dns-prefetch）
function remove_dns_prefetch( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        return array_diff( wp_dependencies_unique_hosts(), $hints );
    }
    return $hints;
}

/* 获取和设置文章浏览数 */
 function getPostViews($postID) {
     $count_key = 'post_views_count';
     $count = get_post_meta($postID, $count_key, true);   
     if (is_single()) {
         if ($count == '') {
             add_post_meta($postID, $count_key, 1);
             return 1;
         } else {
             $count ++;
             update_post_meta($postID, $count_key, $count);
         }
     }
     return empty($count) ? 0 : $count;
 }
/* 开启文章形式 */
//文章形式
add_theme_support('post-formats', [
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'status',
    'audio',
    'chat',
]);
/* 把状态改为说说 */
function rename_post_formats($safe_text)
{
    if ($safe_text == '状态') return '说说';

    return $safe_text;
}

add_filter('esc_html', 'rename_post_formats');

add_theme_support('title-tag');
add_theme_support('post-thumbnails');


/**
 * WordPress 添加面包屑导航
 * https://www.wpdaxue.com/wordpress-add-a-breadcrumb.html
 */
function cmp_breadcrumbs()
{
    $delimiter = ' &nbsp;›&nbsp;'; // 分隔符
    $before = '<span class="current">'; // 在当前链接前插入
    $after = '</span>'; // 在当前链接后插入
    if (!is_home() && !is_front_page() || is_paged())
    {
        echo '<ol class="breadcrumb bg-white b-a" itemscope="">' . __('<i class="fa fa-home"> </i>', 'cmp');
        global $post;
        $homeLink = home_url() . '/';
        echo ' <a itemprop="breadcrumb" href="' . $homeLink . '">' . __('首页', 'cmp') . '</a> ' . $delimiter . ' ';
        if (is_category())
        { // 分类 存档
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0)
            {
                $cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
                echo $cat_code = str_replace('<a', '<a itemprop="breadcrumb"', $cat_code);
            }
            echo $before . '' . single_cat_title('', FALSE) . '' . $after;
        }
        elseif (is_day())
        { // 天 存档
            echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        }
        elseif (is_month())
        { // 月 存档
            echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        }
        elseif (is_year())
        { // 年 存档
            echo $before . get_the_time('Y') . $after;
        }
        elseif (is_single() && !is_attachment())
        { // 文章
            if (get_post_type() != 'post')
            { // 自定义文章类型
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                echo $before . '正文' . $after;
            }
            else
            { // 文章 post
                $cat = get_the_category();
                $cat = $cat[0];
                $cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $cat_code = str_replace('<a', '<a itemprop="breadcrumb"', $cat_code);
                echo $before . '正文' . $after;
            }
        }
        elseif (!is_single() && !is_page() && get_post_type() != 'post')
        {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        }
        elseif (is_attachment())
        { // 附件
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        }
        elseif (is_page() && !$post->post_parent)
        { // 页面
            echo $before . get_the_title() . $after;
        }
        elseif (is_page() && $post->post_parent)
        { // 父级页面
            $parent_id = $post->post_parent;
            $breadcrumbs = [];
            while ($parent_id)
            {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        }
        elseif (is_search())
        { // 搜索结果
            echo $before;
            printf(__('搜索结果: <font color="#adff2f" size="5">%s</font>', 'cmp'), get_search_query());
            echo $after;
        }
        elseif (is_tag())
        { //标签 存档
            echo $before;
            printf(__('<b>标签:</b> %s', 'cmp'), single_tag_title('', FALSE));
            echo $after;
        }
        elseif (is_author())
        { // 作者存档
            global $author;
            $userdata = get_userdata($author);
            echo $before;
            printf(__('Author Archives: %s', 'cmp'), $userdata->display_name);
            echo $after;
        }
        elseif (is_404())
        { // 404 页面
            echo $before;
            _e('Not Found', 'cmp');
            echo $after;
        }
        if (get_query_var('paged'))
        { // 分页
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo sprintf(__('( Page %s )', 'cmp'), get_query_var('paged'));
        }
        echo '</ol>';
    }
}
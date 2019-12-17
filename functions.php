<?php

//error_reporting( E_ALL&~E_NOTICE );
require_once dirname(__FILE__) . '/framework/cs-framework.php';
require_once dirname(__FILE__) . '/includes/wxShare.php';
require_once dirname(__FILE__) . '/includes/author-avatars.php';
$i_markdown_option = cs_get_option('i_markdown_option'); //markdown编辑器
if($i_markdown_option):
add_filter('use_block_editor_for_post', '__return_false'); // 禁止加载Gutenberg（古腾堡） 编辑器
remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' ); // 禁止前端加载样式文件
require_once dirname(__FILE__) . '/includes/wp-editormd/wp-editormd.php';
endif;

require_once dirname(__FILE__) . '/widgets.php';
require_once dirname(__FILE__) . '/includes/ajax-comment/main.php';

// -(or)-
define('CS_ACTIVE_FRAMEWORK', TRUE); // default true
define('CS_ACTIVE_METABOX', TRUE); // default true
define('CS_ACTIVE_TAXONOMY', FALSE); // default true
define('CS_ACTIVE_SHORTCODE', FALSE); // default true
define('CS_ACTIVE_CUSTOMIZE', FALSE); // default true

/*
 * 添加一个简单的菜单
 * 自行修改 'title' 和 'href' 的值
 */
function custom_adminbar_menu($meta = TRUE)
{
    global $wp_admin_bar;
    $i_markdown_option = cs_get_option('i_markdown_option'); //markdown编辑器
    if (!is_user_logged_in()) {return;}
    if (!is_super_admin() || !is_admin_bar_showing()) {return;}
    echo '<style>
#wp-admin-bar-version-help .version-help{height:20px;background:#ca4a1f;border-radius:20px;display:inline-block;font-weight:bold;padding:0px 10px;line-height:20px;}
#wp-admin-bar-version-help .version-help:hover{color:#fff!important;}
#wp-admin-bar-version-help .version-help:active{color:#fff!important;}</style>';

        $wp_admin_bar->add_menu([
            'id' => 'custom_menu',
            'title' => __('<i style="position: relative;top:7px;color:#9ea3a8" 
                class="wp-menu-image dashicons-before dashicons-admin-settings">
                </i>&nbsp;&nbsp;smarty_hankin 主题设置 <span style="border-radius:10px;padding:3px 6px;color:#fff;background:#1b81c2">v'._the_theme_version().'</span>'),
            'href' => '/wp-admin/admin.php?page=cs-framework',
            //'meta'  => array( 'target' => '_blank' )
        ]);
if($i_markdown_option):
        $wp_admin_bar->add_menu([
                'id' => 'markdown_edit',
                'title' => __('<i style="position: relative;top:5px;color:#9ea3a8" class="wp-menu-image dashicons-before dashicons-admin-generic"></i>&nbsp;&nbsp;Markdown 编辑器设置'),
                'href' => '/wp-admin/plugins.php?page=wp-editormd-settings',
                //    'meta'  => array( target => '_blank' )
            ]);
endif;
}
add_action('admin_bar_menu', 'custom_adminbar_menu', 71);

/* 
 * 移除工具条占位空白
 */  
function remove_adminbar_margin() {  
    $remove_adminbar_margin = '<style type="text/css">  
        html { margin-top: -28px !important; }  
        * html body { margin-top: -28px !important; }  
    </style>';  
    echo $remove_adminbar_margin;  
}  
/* 针对后台 */  
/*if ( is_admin() ) {  
    remove_action( 'init', '_wp_admin_bar_init' );  
    add_action( 'admin_head', 'remove_adminbar_margin' );  
}  */
/* 针对前台 */  
/*if ( !is_admin() ) {  
    remove_action( 'init', '_wp_admin_bar_init' );  
    add_action( 'wp_head', 'remove_adminbar_margin' );  
}*/



register_nav_menu('warp-nav', 'smarty_hankin-左侧菜单');
register_nav_menu('top-warp-nav', 'smarty_hankin-顶部菜单');

/* 设置登录样式*/
function wp_login_style() {
    $authorCard = new AuthorCard();
        $widget_cs_widget_author = reset(get_option('widget_cs_widget_author'));
        $advertising = $widget_cs_widget_author['advertising'];
    wp_enqueue_style( "wp-login", get_template_directory_uri() . "/assets/css/admin/wp-login.css?v=".time() );
    echo '<style>
        .login {
            background-image: url("'.get_template_directory_uri().'/assets/images/nav-bg/body-bg-'.rand(1,12).'.png");
        }
        #login h1 a {
            background: #ccc url("'.$advertising.'");
        }
    </style>';
}
add_action('login_enqueue_scripts', 'wp_login_style');
/* 设置后台样式*/
function wp_admin_style() {
    wp_enqueue_style( "wp-admin", get_template_directory_uri() . "/assets/css/admin/wp-admin.css" );
}
add_action('admin_head', 'wp_admin_style');


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
    $delimiter = ' &nbsp;&nbsp;›&nbsp;&nbsp;'; // 分隔符
    $before = '<span class="current">'; // 在当前链接前插入
    $after = '</span>'; // 在当前链接后插入
    if (!is_home() && !is_front_page() || is_paged())
    {
        echo '<ul class="breadcrumb" itemscope="">' . __('', 'cmp');
        global $post;
        $homeLink = home_url() . '/';
        echo '<a itemprop="breadcrumb" href="' . $homeLink . '">' . __('首页', 'cmp') . '</a> ' . $delimiter . ' ';
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
                echo $before . get_the_title() . $after;
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
            printf(__('搜索结果： <b style="color:#4680ff">%s</b>', 'cmp'), get_search_query());
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
            if (is_category() || is_day() || is_month() || is_year()  || is_tag() || is_author())
                echo sprintf(__('( Page %s )', 'cmp'), get_query_var('paged'));
        }
        echo '</ul>';
    }
}

// 获取信息
function getSystemInfo()
{
    global $wpdb;
    // 获取Mysql版本号
    $mysqlVersion = $wpdb->get_row('SELECT VERSION() as v', ARRAY_A);
    $mysqlVersion = $mysqlVersion ['v'];

    // 获取数据库大小
    $status = $wpdb->get_results('SHOW TABLE STATUS', ARRAY_A);
    $size = 0;
    foreach ($status as $row)
        $size += $row ["Data_length"] + $row ["Index_length"];

    $decimals = 2;
    $mbytes = number_format($size / (1024 * 1024), $decimals);

    // 获取上传大小
    if (@ini_get('file_uploads')) $fileupload = ini_get('upload_max_filesize');
    else $fileupload = '<font color="red">0</font>';

    $table = "<table class='wp-list-table widefat fixed striped'>";
    $table .= "<tbody>";
    $table .= "<tr><td>主题开发</td><td><b>唤醒-hankin<b></td></tr>";
    $table .= "<tr><td>QQ群</td><td><b>21310971<b></td></tr>";
    $table .= "<tr><td>服务器系统</td><td>" . php_uname('s') . "</td></tr>";
    $table .= "<tr><td>服务器软件</td><td>" . $_SERVER ['SERVER_SOFTWARE'] . "</td></tr>";
    $table .= "<tr><td>服务器 IP</td><td>" . $_SERVER ['SERVER_ADDR'] . "</td></tr>";
    $table .= "<tr><td>服务器时间</td><td>" . date("Y-m-d H:i:s") . "</td></tr>";
    $table .= "<tr><td>PHP版本号</td><td>" . PHP_VERSION . "</td></tr>";
    $table .= "<tr><td>上传许可</td><td>" . $fileupload . "</td></tr>";
    $table .= "<tr><td>MySQL 版本号</td><td>" . $mysqlVersion . "</td></tr>";
    $table .= "<tr><td>MySQL 库占用</td><td>" . $mbytes . "</td></tr>";
    $table .= "</tbody>";
    $table .= "</table>";

    return $table;
}

/**
 * 首页调用分页
 * @return string
 */
function homePage($query_string='')
{
    global $posts_per_page, $paged;

    $my_query = new WP_Query($query_string . "&posts_per_page=-1");
    $total_posts = $my_query->post_count;
    if (empty($paged)) $paged = 1;
    $prev = $paged - 1;
    $next = $paged + 1;
    $range = 4; // only edit this if you want to show more page-links
    $showitems = ($range * 2) + 1;

    $pages = ceil($total_posts / $posts_per_page);
    if (1 != $pages)
    {
        echo "<ol class='page-navigator'>";
        echo ($paged > 2 && $paged + $range + 1 > $pages && $showitems < $pages) ? "
<li><a href='" . get_pagenum_link(1) . "'>首页</a></li>" : "";
        echo ($paged > 1 && $showitems < $pages) ? "
<li><a href='" . get_pagenum_link($prev) . "'>上一页</a></li>" : "";

        for ($i = 1; $i <= $pages; $i++)
        {
            if (1 != $pages && (!($i >= $paged + $range + 1 ||
                        $i <= $paged - $range - 1) || $pages <= $showitems))
            {
                echo ($paged == $i) ? "<li class='current'><span>" . $i . "</span></li>" :
                    "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
            }
        }

        echo ($paged < $pages && $showitems < $pages) ?
            "<li><a href='" . get_pagenum_link($next) . "'>下一页</a></li>" : "";
        echo ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) ?
            "<li><a href='" . get_pagenum_link($pages) . "'>末页</a></li>" : "";
        echo "</ol>\n";
    }
}




/**
 * 数字分页函数
 * 因为wordpress默认仅仅提供简单分页
 * 所以要实现数字分页，需要自定义函数
 * @Param int $range            数字分页的宽度
 * @Return string|empty        输出分页的HTML代码
 */
function categoryPage($range = 4)
{
    global $paged, $wp_query;
    $max_page = '';
    if (!$max_page)
    {
        $max_page = $wp_query->max_num_pages;
    }
    if ($max_page > 1)
    {
        echo "<ol class='page-navigator'>";
        if (!$paged)
        {
            $paged = 1;
        }
        if ($paged != 1)
        {
            echo "<li><a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'>首页</a></li>";
        }

        echo ($paged > 1) ? "<li><a href='" . get_pagenum_link($paged-1) . "'>上一页</a></li>" : "";

        if ($max_page > $range)
        {
            if ($paged < $range)
            {
                for ($i = 1; $i <= ($range + 1); $i++)
                {
                    echo ($i == $paged) ? "<li class='current'>" : '<li>';
                    echo "<a href='" . get_pagenum_link($i) . "'>$i</a></li>";
                }
            }
            elseif ($paged >= ($max_page - ceil(($range / 2))))
            {
                for ($i = $max_page - $range; $i <= $max_page; $i++)
                {
                    echo ($i == $paged) ? "<li class='current'>" : '<li>';
                    echo "<a href='" . get_pagenum_link($i) . "'>$i</a></li>";
                }
            }
            elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2))))
            {
                for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++)
                {
                    echo ($i == $paged) ? "<li class='current'>" : '<li>';
                    echo "<a href='" . get_pagenum_link($i) . "'>$i</a></li>";
                }
            }
        }
        else
        {
            for ($i = 1; $i <= $max_page; $i++)
            {
                echo ($i == $paged) ? "<li class='current'>" : '<li>';
                echo "<a href='" . get_pagenum_link($i) . "'>$i</a></li>";
            }
        }

        echo ($paged < $max_page) ? "<li><a href='" . get_pagenum_link($paged+1) . "'>下一页</a></li>" : "";

        if ($paged != $max_page)
        {
            echo "<li><a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'>尾页</a><li>";
        }
        echo '<li><a><span>共 ' . $max_page . ' 页</span></a></a>';
        echo "</ol>\n";
    }
}

/* 获取默认封面 */
function getThumbnail()
{
    global $post;
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');

    if(!empty($large_image_url[0]))
    {
        return $large_image_url[0]."?version=".time();
    }

    return "//qiniu.hankin.cn/img".rand(0, 48).".png?version=".time();
}

/* 修改时间格式 */
function timeGo($ptime)
{
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if ($etime < 1)
    {
        return '刚刚';
    }
    $interval = [
        12 * 30 * 24 * 60 * 60 => '年前 ',
        30 * 24 * 60 * 60 => '个月前 ',
        7 * 24 * 60 * 60 => '周前 ',
        24 * 60 * 60 => '天前',
        60 * 60 => '小时前',
        60 => '分钟前',
        1 => '秒前',
    ];
    foreach ($interval as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);

            return $r . $str;
        }
    }

    return TRUE;
}


function qqMsg($qq)
{
    //$api = "https://r.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg?uins=";
    $api = "https://r.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg?uins=";

    $avatarApi = "https://q1.qlogo.cn/g?b=qq&s=5&nk=";

    $contents = file_get_contents($api.$qq);
    if($contents){
        $data = iconv("GBK","UTF-8",$contents);
        $pattern = '/portraitCallBack\((.*)\)/is';
        preg_match($pattern,$data,$result);
        $result = $result[1];
        $result = json_decode($result, true)[$qq];

        return [
            'nickname' => $result[6],
            'avatar' => $avatarApi.$qq,
        ];
    }
}

/**
* 根据 QQ号获取 昵称和头像
* http://www.hankin.cn/wp-admin/admin-ajax.php?action=get_ajax_qq&qq=315444473
*/
function get_ajax_qq() {
  // 输出响应
  header( "Content-Type: application/json" );

  $api = "https://r.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg?uins=";

  $avatarApi = "https://q1.qlogo.cn/g?b=qq&s=5&nk=";

  $qq = isset($_GET['qq']) ? trim($_GET['qq']) : '';

  if(!empty($qq) && is_numeric($qq) && strlen($qq) > 4 && strlen($qq) < 13)
  {
    $contents = file_get_contents($api.$qq);
    if($contents){
        $data = iconv("GBK","UTF-8",$contents);
        $pattern = '/portraitCallBack\((.*)\)/is';
        preg_match($pattern,$data,$result);
        $result = $result[1];
        $result = json_decode($result, true)[$qq];
        $nickname = $result[6];
        //$avatar = $result[0]; //被禁了
        $avatar = $avatarApi.$qq;
    }
    ajaxResult(200,'',["id"=> $qq,"name"=>$nickname,"avatar"=>$avatar]);
  }else{
    ajaxResult(1000,'QQ格式不正确',["id"=> "","name"=>"","avatar"=>""]);
  }
}
add_action( 'wp_ajax_nopriv_get_ajax_qq', 'get_ajax_qq' );
add_action( 'wp_ajax_get_ajax_qq', 'get_ajax_qq' );

function ajaxResult($resultCode, $message = NULL, $data = NULL){
    exit(json_encode([
        'result' => [
            'code' => $resultCode,
            'msg' => $message,
        ],
        'data' => $data,
    ]));
}

function lo_all_view(){ 
    global $wpdb;
    $count=0;
    $views= $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key='views'");
    foreach($views as $key=>$value){
        $meta_value=$value->meta_value;
        if($meta_value!=' '){
            $count+=(int)$meta_value;
        }
    }
    return $count;
}

//WordPress加速优化前台不加载多语言包
add_filter( 'locale', 'wpjam_locale' );   
function wpjam_locale($locale) {   
    $locale = ( is_admin() ) ? $locale : 'en_US';   
    return $locale;   
} 





/* 启用浏览数目 */
function getPostViews($postID)
{
    $count_key = 'views';
    $count = get_post_meta($postID, $count_key, true);
    if ($count=='') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'&nbsp;';
}

function setPostViews($postID,$count_key='views')
{
    $count = get_post_meta($postID, $count_key, true);

        if ($count=='') {
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        } else {
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
}



//后台显示浏览数目
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);
function posts_column_views($defaults)
{
    $defaults['post_views'] = __('浏览');
    return $defaults;
}
function posts_custom_column_views($column_name, $id)
{
    if ($column_name === 'post_views') {
        echo getPostViews(get_the_ID());
    }
}
/* 获取文章的评论人数 by zwwooooo | zww.me */
function getCommentsNumber($postid = 0, $which = 0)
{
    $comments = get_comments('status=approve&type=comment&post_id=' . $postid); //获取文章的所有评论
    if ($comments)
    {
        $i = 0;
        $j = 0;
        $commentusers = [];
        foreach ($comments as $comment)
        {
            ++$i;
            if ($i == 1)
            {
                $commentusers[] = $comment->comment_author_email;
                ++$j;
            }
            if (!in_array($comment->comment_author_email, $commentusers))
            {
                $commentusers[] = $comment->comment_author_email;
                ++$j;
            }
        }
        $output = [$j, $i];
        $which = ($which == 0) ? 0 : 1;

        return $output[$which]; //返回评论人数
    }

    return '0'; //没有评论返回0
}
function json_get_avatar_url( $avatar_html ) {

    // Strip the avatar url from the get_avatar img tag.
    preg_match('/src=["|\'](.+)[\&|"|\']/U', $avatar_html, $matches);

    if ( isset( $matches[1] ) && ! empty( $matches[1] ) ) {
        return esc_url_raw( $matches[1] );
    }

    return '';
}


/*
加载infinite scroll插件脚本
*/
function infinitescroll_js() {
    wp_register_script('infinite_scroll', 'https://cdn.bootcss.com/jquery-infinitescroll/2.0.2/jquery.infinitescroll.min.js', array('jquery'), null, true);
    if (!is_singular()) {
        wp_enqueue_script('infinite_scroll');
    }
}
add_action('wp_enqueue_scripts', 'infinitescroll_js');


/* 如果判断当前浏览页面为微信浏览器*/
function isWechat(){
    if(strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')){
        //判断微信浏览器为真
        return true;
    }
    //此处为假
    return false;
}


//评论自定义字段
function add_comment_meta_values($comment_id){
//地址
if(isset($_POST['hankin_avatar'])){
$hankin_avatar = wp_filter_nohtml_kses($_POST['hankin_avatar']);
add_comment_meta($comment_id,'hankin_avatar', $hankin_avatar,false);
}
// phone
if(isset($_POST['hankin_qq'])){
$hankin_qq = wp_filter_nohtml_kses($_POST['hankin_qq']);
add_comment_meta($comment_id,'hankin_qq', $hankin_qq,false);
}
// comolay
if(isset($_POST['hankin_username'])){
$hankin_username = wp_filter_nohtml_kses($_POST['hankin_username']);
add_comment_meta($comment_id,'hankin_username', $hankin_username,false);
}
}//end评论自定义字段
add_action ('comment_post','add_comment_meta_values',1);
//添加评论自定义字段标题
function add_comment_meta_title( $columns )
{
return array_merge( $columns, array(
'hankin_avatar'=>'头像',
'hankin_qq'=>'qq号',
'hankin_username'=>'昵称',
));
}//end添加评论自定义字段标题
add_filter('manage_edit-comments_columns','add_comment_meta_title');
//输出自定义字段值
function echo_comment_column_value( $column_name, $comment_ID )
{
    switch( $column_name ) {
        case "hankin_avatar" :

            $qq_url = get_comment_meta( $comment_ID, $column_name ,true);
            $qq_url = ($qq_url=='') ? get_template_directory_uri().'/assets/images/user/default-avatar.png' : $qq_url;
            echo '<img width="50" height="50" src='.$qq_url.'>';
            break;
            default :
            echo get_comment_meta( $comment_ID, $column_name ,true);
    }

    
}
add_filter('manage_comments_custom_column','echo_comment_column_value',10,2);



/* 文章点赞功能 */
function hankin_like(){
    global $wpdb,$post;
    $id = $_POST["um_id"];
    $action = $_POST["um_action"];
    if ( $action == 'like'){
    $bigfa_raters = get_post_meta($id,'hankin_like',true);
    $expire = time() + 99999999;
    $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
    setcookie('hankin_like_'.$id,$id,$expire,'/',$domain,false);
    if (!$bigfa_raters || !is_numeric($bigfa_raters)) {
        update_post_meta($id, 'hankin_like', 1);
    } 
    else {
            update_post_meta($id, 'hankin_like', ($bigfa_raters + 1));
        }

    echo get_post_meta($id,'hankin_like',true);

    } 
    die;
}

add_action('wp_ajax_nopriv_hankin_like', 'hankin_like');
add_action('wp_ajax_hankin_like', 'hankin_like');

// 获取点赞总数量
function count_post_meta($key){
    global $wpdb;
    $sql = "SELECT
    count(*) as total,
    SUM(meta_value) as count
FROM
    wp_postmeta 
WHERE
    `meta_key` = '".$key."'";
    $res = $wpdb->get_row($sql,ARRAY_A);
    return $res ? $res['count'] : 0;
}


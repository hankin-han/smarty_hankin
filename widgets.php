<?php

// 定义小工具的类 EfanBlogStat
class EfanBlogStat extends WP_Widget
{
    function EfanBlogStat()
    {
        // 定义小工具的构造函数
        $widget_ops = ['classname' => 'widget_blogstat', 'description' => '显示博客的统计信息'];
        parent::__construct(FALSE, 'smarty_hankin主题博客统计', $widget_ops);
    }

    function form($instance)
    {
        // 表单函数,控制后台显示
        // $instance 为之前保存过的数据
        // 如果之前没有数据的话,设置默认量
        $instance = wp_parse_args(
            (array)$instance,
            [
                'title' => '博客统计',
                'establish_time' => '2013-01-27',
            ]
        );

        $title = htmlspecialchars($instance['title']);
        $establish_time = htmlspecialchars($instance['establish_time']);

        // 表格布局输出表单
        $output = '<table>';
        $output .= '<tr><td>标题</td><td>';
        $output .= '<input id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $instance['title'] . '" />';
        $output .= '</td></tr><tr><td>建站日期：</td><td>';
        $output .= '<input id="' . $this->get_field_id('establish_time') . '" name="' . $this->get_field_name('establish_time') . '" type="text" value="' . $instance['establish_time'] . '" />';
        $output .= '</td></tr></table>';

        echo $output;
    }

    function update($new_instance, $old_instance)
    {
        // 更新数据的函数
        $instance = $old_instance;
        // 数据处理
        $instance['title'] = strip_tags(stripslashes($new_instance['title']));
        $instance['establish_time'] = strip_tags(stripslashes($new_instance['establish_time']));

        return $instance;
    }

    function widget($args, $instance)
    {
        extract($args); //展开数组
        $title = apply_filters('widget_title', empty($instance['title']) ? '&nbsp;' : $instance['title']);
        $establish_time = empty($instance['establish_time']) ? '2013-01-27' : $instance['establish_time'];
        echo $before_widget;
        echo $before_title . $title . $after_title;
        echo '<ul class="list-group">';
        // $this->efan_get_blogstat($establish_time, $instance);
        $this->efan_get_blogstat($establish_time);
        echo '</ul>';
        echo $after_widget;
    }

    function efan_get_blogstat($establish_time /*, $instance */)
    {
        // 相关数据的获取
        global $wpdb;
        $count_posts = wp_count_posts();
        $published_posts = $count_posts->publish;
        $draft_posts = $count_posts->draft;
        $comments_count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments");
        $time = floor((time() - strtotime($establish_time)) / 86400);
        $count_tags = wp_count_terms('post_tag');
        $count_pages = wp_count_posts('page');
        $page_posts = $count_pages->publish;
        $count_categories = wp_count_terms('category');
        $link = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->links WHERE link_visible = 'Y'");
        $users = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->users");
        $last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");
        $last = date('Y-n-j', strtotime($last[0]->MAX_m));
        // 显示数据
        $output = '<li class="list-group-item">日志总数：';
        $output .= $published_posts;
        $output .= ' 篇</li>';
        $output .= '<li class="list-group-item">评论数目：';
        $output .= $comments_count;
        $output .= ' 条</li>';
        $output .= '<li class="list-group-item">建站日期：';
        $output .= $establish_time;
        $output .= '</li>';
        $output .= '<li class="list-group-item">运行天数：';
        $output .= $time;
        $output .= ' 天</li>';
        $output .= '<li class="list-group-item">标签总数：';
        $output .= $count_tags;
        $output .= ' 个</li>';
        if (is_user_logged_in())
        {
            $output .= '<li class="list-group-item">草稿数目：';
            $output .= $draft_posts;
            $output .= ' 篇</li>';
            $output .= '<li class="list-group-item">页面总数：';
            $output .= $page_posts;
            $output .= ' 个</li>';
            $output .= '<li class="list-group-item">分类总数：';
            $output .= $count_categories;
            $output .= ' 个</li>';
            $output .= '<li class="list-group-item">友链总数：';
            $output .= $link;
            $output .= ' 个</li>';
        }
        if (get_option("users_can_register") == 1)
        {
            $output .= '<li class="list-group-item">用户总数：';
            $output .= $users;
            $output .= ' 个</li>';
        }
        $output .= '<li class="list-group-item">最后更新：';
        $output .= $last;
        $output .= '</li>';

        echo $output;
    }
}

//图像链接
class CS_Widget_Link extends WP_Widget {
        function __construct() {
            $widget_ops = array(
                'classname' => 'cs_widget_link',
                'description' => '图像链接小工具'
            );
            parent::__construct('cs_widget_link', 'smarty_hankin主题图像链接', $widget_ops);
        }
        function widget($args, $instance) {
            extract($args);
            echo $before_widget;
            if (!empty($instance['title'])) {
                echo $before_title . $instance['title'] . $after_title;
            }
            $NewTab = $instance['sure'];
            echo '<div class="textwidget">';
            echo '<a href="' . $instance['link'] . '"';
            if ($NewTab == true) {
                echo 'target="_black"';
            }
            echo '><img src="' . $instance['advertising'] . '" />';
            echo '</a>';
            echo '</div>';
            echo $after_widget;
        }
        function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['title'] = $new_instance['title'];
            $instance['advertising'] = $new_instance['advertising'];
            $instance['link'] = $new_instance['link'];
            $instance['sure'] = $new_instance['sure'];
            return $instance;
        }
        function form($instance) {
            $instance = wp_parse_args($instance, array(
                'title' => '图像链接',
                'advertising' => '',
                'link' => '',
                'sure' => '',
            ));
            $text_value = esc_attr($instance['title']);
            $text_field = array(
                'id' => $this->get_field_name('title') ,
                'name' => $this->get_field_name('title') ,
                'type' => 'text',
                'title' => '标题',
            );
            echo cs_add_element($text_field, $text_value);
            $upload_value = esc_attr($instance['advertising']);
            $upload_field = array(
                'id' => $this->get_field_name('advertising') ,
                'name' => $this->get_field_name('advertising') ,
                'type' => 'upload',
                'title' => '图像',
            );
            echo cs_add_element($upload_field, $upload_value);
            $link_value = esc_attr($instance['link']);
            $link_field = array(
                'id' => $this->get_field_name('link') ,
                'name' => $this->get_field_name('link') ,
                'type' => 'text',
                'title' => '链接',
                'attributes' => array(
                    'placeholder' => 'http://...'
                )
            );
            echo cs_add_element($link_field, $link_value);
            $switcher_value = esc_attr($instance['sure']);
            $switcher_field = array(
                'id' => $this->get_field_name('sure') ,
                'name' => $this->get_field_name('sure') ,
                'type' => 'switcher',
                'title' => '新标签打开',
            );
            echo cs_add_element($switcher_field, $switcher_value);
        }
}

//作者版块
class AuthorCard extends WP_Widget {
        function __construct() {
            $widget_ops = array(
                'classname' => 'cs_widget_author',
                'description' => '作者主页小工具'
            );
            parent::__construct('cs_widget_author', 'smarty_hankin主题作者主页', $widget_ops);
        }
        function widget($args, $instance) {
            extract($args);
            echo $before_widget;
        echo '<div id="author_card-5" class="card-sm widget Author_Card">';
        echo '    <div class="widget-author-cover">';
        echo '        <div class="media media-2x1">';
        echo '            <div class="media-content" style="background-image:url('.get_template_directory_uri().'/assets/images/default-cover.jpg)"></div>';
        echo '        </div>';
        echo '        <div class="widget-author-avatar">';
        echo '            <div class="flex-avatar mx-2 w-80 border border-white border-2">';
        echo '                <img src="' . $instance['advertising'] . '" style="width:80px;height:80px;" /></div>';
        echo '        </div>';
        echo '    </div>';
        echo '    <div class="widget-author-meta text-center p-4">';
        echo '        <div class="h6 mb-3 text-lg text-c-blue">'.the_author_meta('display_name',1).'</div>';
        echo '        <div class="desc text-xs mb-3 h-2x ">';
        echo            $instance['title'];
        echo '        </div>';
        echo '        <div class="row no-gutters text-center">';
        echo '            <a href="" class="col">';
        echo '                <span class="font-theme font-weight-bold text-md">'.get_the_author_posts().'</span><small class="d-block text-xs text-muted">文章</small>';
        echo '            </a>';
        echo '            <a href="" class="col">';
        echo '                <span class="font-theme font-weight-bold text-md">'.get_comments('count=true&comment_status=approved').'</span><small class="d-block text-xs text-muted">评论</small>';
        echo '            </a>';
        echo '            <a href="" class="col">';
        echo '                <span class="font-theme font-weight-bold text-md">'.lo_all_view().'</span><small class="d-block text-xs text-muted">浏览</small>';
        echo '            </a>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';

            echo $after_widget;
        }
        function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['advertising'] = $new_instance['advertising'];
            $instance['title'] = $new_instance['title'];
            return $instance;
        }
        function form($instance) {
            $instance = wp_parse_args($instance, array(
                'title' => '头像',
                'advertising' => '',
                'link' => '',
                'sure' => '',
            ));
            $upload_value = esc_attr($instance['advertising']);
            $upload_field = array(
                'id' => $this->get_field_name('advertising') ,
                'name' => $this->get_field_name('advertising') ,
                'type' => 'upload',
                'title' => '头像',
            );
            echo cs_add_element($upload_field, $upload_value);
            $text_value = esc_attr($instance['title']);
            $text_field = array(
                'id' => $this->get_field_name('title') ,
                'name' => $this->get_field_name('title') ,
                'type' => 'wysiwyg',
                'title' => '描述',
            );
            echo cs_add_element($text_field, $text_value);
        }
}

//随机列表
class RandLists extends WP_Widget {
        function __construct() {
            $widget_ops = array(
                'classname' => 'cs_widget_rand_list',
                'description' => '随机文章小工具'
            );
            parent::__construct('cs_widget_rand_list', 'smarty_hankin随机文章列表', $widget_ops);
        }
        function widget($args, $instance) {
            $args = array(
                'posts_per_page' => empty($instance['number']) ? 5 : $instance['number'], //每页显示10篇文章
                'orderby' => 'rand',
                'ignore_sticky_posts' => 1 //取消文章置顶
            );
            $query_posts = new WP_Query($args);
            $num = 0;
            extract($args);
            
        
            echo '<div id="recommended_posts">';
            echo '    <div id="recommended_posts_1" class="card card-sm widget Recommended_Posts">';
            echo '        <div class="card-header widget-header">';
            echo '            随机文章';
            echo '            <i class="bg-primary"></i>';
            echo '        </div>';
            echo '        <div class="card-body">';
            while ($query_posts->have_posts()){
                $query_posts->the_post();
                if($num == 0){
            echo '            <div class="list-rounded my-n2">';
            echo '                <div class="py-2">';
            echo '                    <div class="list-item list-overlay-content">';
            echo '                        <div class="media media-2x1">';
            echo '                            <a class="media-content" href="'.get_the_permalink().'" style="background-image:url('.getThumbnail().')">';
            echo '                                <span class="overlay"></span>';
            echo '                            </a>';
            echo '                        </div>';
            echo '                        <div class="list-content">';
            echo '                            <div class="list-body">';
            echo '                                <a href="'.get_the_permalink().'" class="list-title h-2x">'.get_the_title().'</a></div>';
            echo '                            <div class="list-footer">';
            echo '                                <div class="text-muted text-xs">';
            echo '                                    <time class="d-inline-block">'.timeGo(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))).'</time></div>';
            echo '                            </div>';
            echo '                        </div>';
            echo '                    </div>';
            echo '                </div>';
            echo '            </div>';
                }else{
            echo '            <div class="list-grid list-rounded">';
            echo '                <div class="list-item py-2">';
            echo '                    <div class="list-content py-0 mr-3">';
            echo '                        <div class="list-body">';
            echo '                            <a href="'.get_the_permalink().'" class="list-title h-2x">'.get_the_title().'</a></div>';
            echo '                        <div class="list-footer">';
            echo '                            <div class="text-muted text-xs">';
            echo '                                <time class="d-inline-block">'.timeGo(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))).'</time></div>';
            echo '                        </div>';
            echo '                    </div>';
            echo '                    <div class="media media-3x2 col-4">';
            echo '                        <a class="media-content" href="'.get_the_permalink().'" style="background-image:url('.getThumbnail().')"></a>';
            echo '                    </div>';
            echo '                </div>';
            echo '            </div>';
                }
            $num++;
            }
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
        function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['number'] = $new_instance['number'];
            return $instance;
        }
        function form($instance) {
            $instance = wp_parse_args($instance, array(
                'title' => '头像',
                'advertising' => '',
                'link' => '',
                'sure' => '',
            ));
            $text_value = esc_attr($instance['number']);
            $text_field = array(
                'id' => $this->get_field_name('number') ,
                'name' => $this->get_field_name('number') ,
                'type' => 'number',
                'title' => '文章数量',
            );
            echo cs_add_element($text_field, $text_value);
        }
}

function EfanBlogStat()
{
    // 注册小工具
    register_widget('EfanBlogStat');
    register_widget('CS_Widget_Link');
    register_widget('AuthorCard');
    register_widget('RandLists');
}

add_action('widgets_init', 'EfanBlogStat');

function home_sidebar(){
    register_sidebar([
          'id'=>'home_sidebar',
          'name' => '首页侧边栏',
          'description' => __('显示在首页侧边栏', 'home_sidebar') ,
          'before_widget' => '<div id="recommended_posts"><div class="card card-sm widget Recommended_Posts %2$s">',//侧边栏里的小工具的开头代码，可以在里边使用 %2$s 来调用小工具的 ID，实现给每个小工具添加不同的样式
        'after_widget' => '</div></div>',//侧边栏里的小工具的结尾代码
        'before_title' => '<div class="card-header widget-header">',//侧边栏里的小工具的标题的开头代码
        'after_title' => '<i class="bg-primary"></i></div>'//侧边栏里的小工具的标题的结尾代码
    ]);
}
add_action('widgets_init','home_sidebar');

function page_sidebar(){
    register_sidebar([
          'id' => 'page_sidebar',
          'name' => '内容页侧边栏',
          'description' => __('显示在内容页侧边栏', 'page_sidebar') ,
    ]);
}
add_action('widgets_init','page_sidebar');
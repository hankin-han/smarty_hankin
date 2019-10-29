<?php
$args = array(
    'posts_per_page' => 5, //每页显示10篇文章
    'orderby' => 'rand',
    'ignore_sticky_posts' => 1 //取消文章置顶
);
$query_posts = new WP_Query($args);
$num = 0;
?>

<div class="theiaStickySidebar animated fadeIn" style="padding-top: 0px; padding-bottom: 1px; position: relative; transform: none;">
    <?php if(is_dynamic_sidebar()) dynamic_sidebar('home_sidebar');?>
    <?php
    /*
    <div id="author_card-5" class="card card-sm widget Author_Card">        
        <div class="widget-author-cover">
            <div class="media media-2x1">
                <div class="media-content" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/images/default-cover.jpg')"></div>
            </div>
            <div class="widget-author-avatar">
                <div class="flex-avatar mx-2 w-80 border border-white border-2">
                    <?php echo get_avatar( get_the_author_meta( 'user_email' ),'80' ); ?></div>
            </div>
        </div>
        <div class="widget-author-meta text-center p-4">
            <div class="h6 mb-3 text-lg text-c-blue"><?= get_the_author_meta('display_name',1); ?></div>
            <div class="desc text-xs mb-3 h-2x ">
                smarty_hankin主题 持续为开发者开源！
                <a href="https://github.com/hankin-han/smarty_hankin"><img src="https://img.shields.io/badge/GitHub-10-yellow.svg?style=social&logo=github" alt='github'></img></a>
                <a href="https://gitee.com/theme-smarty/smarty_hankin"><img src="https://gitee.com/theme-smarty/smarty_hankin/badge/star.svg?theme=white" alt='gitee'></img></a>
            </div>
            <div class="row no-gutters text-center">
                <a href="" class="col">
                    <span class="font-theme font-weight-bold text-md"><?php the_author_posts(); ?></span><small class="d-block text-xs text-muted">文章</small>
                </a>
                <a href="" class="col">
                    <span class="font-theme font-weight-bold text-md"><?= get_comments('count=true&comment_status=approved');?></span><small class="d-block text-xs text-muted">评论</small>
                </a>
                <a href="" class="col">
                    <span class="font-theme font-weight-bold text-md"><?= lo_all_view();?></span><small class="d-block text-xs text-muted">浏览</small>
                </a>
            </div>
        </div>
    </div>
    */?>
    <div id="recommended_posts">
        <div id="recommended_posts_1" class="card card-sm widget Recommended_Posts">
            <div class="card-header widget-header">
                随机文章
                <i class="bg-primary"></i>
            </div>
            <div class="card-body">
                <?php while ($query_posts->have_posts()) : $query_posts->the_post();?>
                <?php if($num == 0):?>
                <div class="list-rounded my-n2">
                    <div class="py-2">
                        <div class="list-item list-overlay-content">
                            <div class="media media-2x1">
                                <a class="media-content" href="<?php the_permalink() ?>" style="background-image:url('<?= getThumbnail()?>')">
                                    <span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content">
                                <div class="list-body">
                                    <a href="<?php the_permalink() ?>" class="list-title h-2x"><?php the_title() ?></a></div>
                                <div class="list-footer">
                                    <div class="text-muted text-xs">
                                        <time class="d-inline-block"><?= timeGo(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))) ?></time></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else:?>
                <div class="list-grid list-rounded">
                    <div class="list-item py-2">
                        <div class="list-content py-0 mr-3">
                            <div class="list-body">
                                <a href="<?php the_permalink() ?>" class="list-title h-2x"><?php the_title() ?></a></div>
                            <div class="list-footer">
                                <div class="text-muted text-xs">
                                    <time class="d-inline-block"><?= timeGo(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))) ?></time></div>
                            </div>
                        </div>
                        <div class="media media-3x2 col-4">
                            <a class="media-content" href="<?php get_the_permalink() ?>" style="background-image:url('<?= getThumbnail()?>')"></a>
                        </div>
                    </div>
                </div>
                <?php endif;?>
                <?php $num++;?>
                <?php endwhile;?>
            </div>
        </div>
    </div>
</div>

  
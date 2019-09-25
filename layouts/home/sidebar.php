<?php
$postid = $post->ID;
$args = ['orderby' => 'rand', 'post__not_in' => [$post->ID], 'showposts' => 5];
$query_posts = new WP_Query();
$query_posts->query($args);
$num = 0;
?>

<div class="theiaStickySidebar animated fadeIn" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
    <div id="recommended_posts-14" class="card card-sm widget Recommended_Posts">
        <div class="card-header widget-header">
            随即文章
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
                                <a href="https://demo.nicetheme.xyz/panda-pro-style-one/4625.html" class="list-title h-2x"><?php the_title() ?></a></div>
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
    <div id="tag_cloud-2" class="card card-sm widget widget_tag_cloud">
       <div class="card-header widget-header">
        推荐话题
        <i class="bg-primary"></i>
       </div>
       <div class="tagcloud">
        <a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/apple" class="tag-cloud-link tag-link-987 tag-link-position-1" style="font-size: 8pt;" aria-label="Apple (1个项目)">Apple</a>
       </div> 
    </div>
</div>

  
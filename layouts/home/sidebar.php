<?php
$postid = $post->ID;
$args = ['orderby' => 'rand', 'post__not_in' => [$post->ID], 'showposts' => 5];
$query_posts = new WP_Query();
$query_posts->query($args);
$num = 0;
?>

<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
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
</div>

<div id="tag_cloud-2" class="card card-sm widget widget_tag_cloud"><div class="card-header widget-header">推荐话题<i class="bg-primary"></i></div><div class="tagcloud"><a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/apple" class="tag-cloud-link tag-link-987 tag-link-position-1" style="font-size: 8pt;" aria-label="Apple (1个项目)">Apple</a>
<a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/aripods" class="tag-cloud-link tag-link-980 tag-link-position-2" style="font-size: 8pt;" aria-label="Aripods (1个项目)">Aripods</a>
<a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/cupertino" class="tag-cloud-link tag-link-991 tag-link-position-3" style="font-size: 8pt;" aria-label="Cupertino (1个项目)">Cupertino</a>
<a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/%e4%ba%9a%e6%b4%b2%e5%b8%82%e5%9c%ba" class="tag-cloud-link tag-link-988 tag-link-position-4" style="font-size: 8pt;" aria-label="亚洲市场 (1个项目)">亚洲市场</a>
<a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/%e4%ba%ba%e4%ba%ba%e8%bd%a6" class="tag-cloud-link tag-link-985 tag-link-position-5" style="font-size: 8pt;" aria-label="人人车 (1个项目)">人人车</a>
<a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/%e5%8c%ba%e5%9d%97%e9%93%be" class="tag-cloud-link tag-link-982 tag-link-position-6" style="font-size: 8pt;" aria-label="区块链 (1个项目)">区块链</a>
<a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/%e5%8d%8e%e4%b8%ba" class="tag-cloud-link tag-link-981 tag-link-position-7" style="font-size: 8pt;" aria-label="华为 (1个项目)">华为</a>
<a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/%e5%90%88%e4%bd%9c%e4%bc%99%e4%bc%b4" class="tag-cloud-link tag-link-992 tag-link-position-8" style="font-size: 8pt;" aria-label="合作伙伴 (1个项目)">合作伙伴</a>
<a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/%e5%b7%a8%e5%a4%b4%e4%bc%81%e4%b8%9a" class="tag-cloud-link tag-link-983 tag-link-position-9" style="font-size: 8pt;" aria-label="巨头企业 (1个项目)">巨头企业</a>
<a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/%e7%89%b9%e6%ae%8a%e5%b7%a5%e5%85%b7" class="tag-cloud-link tag-link-990 tag-link-position-10" style="font-size: 8pt;" aria-label="特殊工具 (1个项目)">特殊工具</a>
<a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/%e7%ba%bd%e7%ba%a6%e6%97%b6%e6%8a%a5" class="tag-cloud-link tag-link-989 tag-link-position-11" style="font-size: 8pt;" aria-label="纽约时报 (1个项目)">纽约时报</a>
<a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/%e8%8b%b9%e6%9e%9c" class="tag-cloud-link tag-link-986 tag-link-position-12" style="font-size: 8pt;" aria-label="苹果 (1个项目)">苹果</a>
<a href="https://demo.nicetheme.xyz/panda-pro-style-one/tag/%e8%b5%84%e9%87%91%e9%93%be" class="tag-cloud-link tag-link-984 tag-link-position-13" style="font-size: 8pt;" aria-label="资金链 (1个项目)">资金链</a></div>
</div>
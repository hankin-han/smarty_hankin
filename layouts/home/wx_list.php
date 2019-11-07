<?php if(is_category()):?>
<div class="list-cover list-rounded mb-3 mb-md-4 animated fadeIn">
    <div class="list-item list-overlay-content overlay-hover bg-dark">
        <div class="media media-21x9">
            <div class="media-content" style="background-image:url('<?= getThumbnail()?>')"><div class="overlay"></div></div>
        </div>
        <div class="list-content p-3 p-md-4">
            <div class="list-body">
                <div class="d-flex align-items-center">
                    <div class="text-xl"><?php $category = get_the_category(); echo $category[0]->cat_name;?></div>
                    <div class="flex-fill"></div>
                    <div class="text-light"> <i class="text-xl iconfont icon-file-text-line mr-1"></i><span class="text-xs "><?php global $wp_query; $cat_ID = get_query_var('cat'); echo get_category($cat_ID)->count; ?> 篇文章</span></div>
                </div>
                <div class="border-top border-white mt-2 mt-md-3 pt-2 pt-md-3"><div class="text-sm h-2x"><?php echo $category[0]->slug;?></div> 
                <div class="border-theme bg-primary"></div>
                </div>                                  
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<main class="h-v-75">
    <div class="container" id="list-home">
<?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="row list-grouped">
            <div class="col-md-4 col-lg-12">
                <div class="list-item block">
                    <div class="media media-21x9">
                        <a class="media-content" href="<?php the_permalink() ?>" style="background-image:url(<?= getThumbnail()?>)"></a>
                    </div>
                    <div class="list-content">
                        <div class="list-body ">
                            <a href="<?php the_permalink() ?>" class="list-title text-md">
                                <?php 
                                    if(isset($_GET['s']) && !empty($_GET['s']))
                                    {
                                        echo str_replace($_GET['s'],"<font color='#4680ff'>".$_GET['s']."</font>",get_the_title());
                                    }else{
                                        echo get_the_title();
                                    }
                                ?>
                            </a>
                            <div class="list-desc text-xs text-muted h-2x mt-2" ><?php echo wp_trim_words(get_the_content(), 100); ?></div></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif;?>
<div class="pagenavi text-center"><?php next_posts_link('加载更多') ?></div>
</div>
</main>
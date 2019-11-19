<?php get_template_part( 'layouts/home/category' );?>
<main class="h-v-75">
    <div class="container" id="list-home">
<?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="list-box">
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
    </div>  
    <?php endwhile; ?>
<?php endif;?>
<div class="pagenavi text-center"><?php next_posts_link('加载更多') ?></div>
</div>
</main>
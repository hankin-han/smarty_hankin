<main class="container" id="main">
    <div class="row">
        <div class="col-md-8 no-gutter-xs">
            <div class="post-wrap">
                
                <?php if (have_posts()): ?>
                <?php while (have_posts()) : the_post(); ?>
                <?php if (has_post_format('aside')): ?>
                    <?php get_template_part( 'layouts/home/aside' );?>
                <?php endif; ?>
                <?php if (has_post_format('image')): ?>
                    <?php get_template_part( 'layouts/home/image' );?>
                <?php endif; ?>
                <?php if (has_post_format('status')): ?>
                    <?php get_template_part( 'layouts/home/status' );?>
                <?php endif; ?>
                <?php if (has_post_format('quote')): ?>
                    <?php get_template_part( 'layouts/home/quote' );?>
                <?php endif; ?>
                <?php endwhile; ?>
                <?php endif;?>
            </div>
            <div class="pagination">
                <span class="more d-inline-block"><?php next_posts_link(__('加载更多')); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <div>
            <?php get_template_part( 'layouts/home/sidebar' );?>
        </div>
    </div>
    <!-- cascade -->
    </div>
</main>

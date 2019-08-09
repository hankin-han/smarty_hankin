<main class="container" id="main">
    <div class="row">
        <div class="col-md-8 no-gutter-xs">
            <div class="list-ajax-nav author-list-ajax-nav list-ajax-index pb-3 pb-md-2 mb-2 mb-md-3" id="list-ajax-nav">
                <?php
                    $cats = get_categories( 
                        array(
                            'hide_empty' => 0
                        ) 
                    );
                ?>
            <ul>
                <li><button class="btn btn-sm current" data-cid="-2.1">推荐</button></li>
                <?php foreach($cats as $value):?>
                <li><button class="btn btn-sm btn-default" data-cid="<?= $value->cat_ID?>"><?= $value->name?></button></li>
                <?php endforeach;?>
            </ul>
            </div>
            <div class="post-wrap">
                <?php if (have_posts()): ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part( 'layouts/list/aside' );?>
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

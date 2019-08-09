<?php $category = get_the_category(); ?>
<div class="post post-type-status">
    <div class="post-title">
        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </div>
    <div class="post-meta-top">
    <a class="post-meta-categories" href="<?php echo get_category_link( $category[0]->term_id ) ?>">
        <i class="czs-bookmark"></i><?php echo $category[0]->cat_name; ?>    </a>
    <span class="post-meta-time">
         • <?= get_the_time('Y-m-d')?>    </span>
</div>
    <div class="post-body">
        <a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_content(), 66); ?></a>
    </div>
    <ul class="post-meta-bottom">
    <li class="post-meta-author">
         <a class="d-block" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" target="_blank">
                                        <?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
                                        <span class="d-inline-block"><?php the_author(); ?></span>
                                    </a>
    </li>
    <?php get_template_part( 'layouts/home/_view_comments_like' );?>
</ul>
</div>
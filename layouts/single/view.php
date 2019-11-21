<?php $category = get_the_category()[0] ?>
<?php if ( have_posts() ): ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="post card animated fadeIn ">
    <div class="card-body">
        <div class="post-header border-bottom border-light mb-4 pb-4">
            <div class="d-block text-sm mt-md-1 mb-2 mb-md-3">
                <a href="<?= get_category_link( $category->term_id )?>">
                    <span class="badge badge-primary"><?= $category->cat_name ?></span></a>
            </div>
            <h1 class="h3 mb-3"><?php the_title(); ?></h1>
            <div class="meta d-flex align-items-center text-xs text-muted">
                <div>
                    <time class="d-inline-block"><?= get_the_time('Y-m-d H:i:s')?></time></div>
                <div class="ml-auto text-sm">
                    <span class="mx-1">
                        <i class="text-md iconfont icon-eye-line mx-1"></i>
                        <small><?php setPostViews(get_the_ID());?><?= getPostViews(get_the_ID()); ?></small></span>
                    <a class="mx-1" href="#comments">
                        <i class="text-md iconfont icon-chat--line mx-1"></i>
                        <small><?= getCommentsNumber($post->ID); ?></small></a>
                    <a class="btn-like btn-link-like<?php if(isset($_COOKIE['hankin_like_'.$post->ID])) echo ' current';?>" href="javascript:;" data-action="like" data-id="<?php the_ID(); ?>">
                        <i class="text-md iconfont icon-thumb-up-line mx-1"></i>
                        <small class="like-count">
                            <?php if( get_post_meta($post->ID,'hankin_like',true) ){            
                                echo get_post_meta($post->ID,'hankin_like',true);
                             } else {
                                echo '0';
                             }?>
                        </small></a>
                </div>
            </div>
            <div class="border-theme bg-primary"></div>
        </div>
        <div class="post-content">
            <div class="nc-light-gallery">
                <?= the_content(); ?>
            </div>
        </div>
    </div>
    
</div>
<?php endwhile; ?>
<?php endif; ?>
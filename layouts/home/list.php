<?php get_template_part( 'layouts/home/category' );?>
<div class="list-home list-grid list-grid-padding div-black-745" id="list-home">
<?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="list-box">
    <div class="card list-item block card-plain">
        <div class="media media-3x2 col-4 col-md-4">
            <a class="media-content" href="<?php the_permalink() ?>" style="background-image:url('<?= getThumbnail()?>')"></a>
        </div>
        <div class="list-content">
            <div class="list-body">
                <a href="<?php the_permalink() ?>" class="list-title text-lg h-2x">
                    <?php if (is_sticky()): ?>
                        <span class="badge badge-primary">推荐</span>
                    <?php endif; ?>
                    <?php 
                    if(isset($_GET['s']) && !empty($_GET['s']))
                    {
                        echo str_replace($_GET['s'],"<font color='#4680ff'>".$_GET['s']."</font>",get_the_title());
                    }else{
                        echo get_the_title();
                    }
                    ?>
                </a>
                <div class="list-desc d-none d-md-block text-sm text-secondary my-3">
                    <div class="h-2x "><?php echo wp_trim_words(get_the_content(), 100); ?></div></div>
            </div>
            <div class="list-footer">
                <div class="d-flex flex-fill align-items-center text-muted text-xs">
                    <div class="d-none d-md-inline-block">
                       <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" target="_blank" class="flex-avatar w-20 ">
                        <?php echo get_avatar( get_the_author_meta( 'user_email' ),'20' ); ?>
                        </a>
                    </div>
                    <div class="d-inline-block ml-md-2">
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="由<?php the_author(); ?>发布" rel="author"><?= get_the_author_meta('display_name',1); ?></a>
                    </div>
                    <div class="d-inline-block mx-1 mx-md-2"><i class="text-primary">—</i></div>
                    <div class="d-inline-block"><?php 
                                            $category = get_the_category();
                                            if($category[0]){
                                            echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
                                        } ?></div>
                    <div class="flex-fill"></div>
                    <div><time class="mx-1"><?= timeGo(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))) ?></time></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php endwhile; ?>
<?php endif;?>
<div class="pagenavi text-center"><?php next_posts_link('加载更多') ?></div>
</div>
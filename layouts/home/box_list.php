<?php get_template_part( 'layouts/home/category' );?>
<div class="list-home list-grid list-grid-padding div-black-745" id="list-home">
    
    <?php 
    $args = ['showposts' => 9];
    query_posts($args);
    if (have_posts()): ?>
    <?php while (have_posts('showposts=4')) : the_post(); ?>
    <div class="list-box">
        <div class="col-md-6 float-left">
        <div class="list-item-column list-item block card-featured p-0">
        <div class="list-content p-0">
            <div class="media media-16x9">
                <a class="media-content" title="<?php echo get_the_title()?>" href="<?php the_permalink() ?>" style="background-image:url('<?= getThumbnail()?>');border-radius: 4px 4px 0 0;"></a>
            </div>
            <a href="<?php the_permalink() ?>" class="grid_author_avt">
                    <div class="grid_author_bggo avatar bg-cover" style="background-image: url(<?php echo json_get_avatar_url(get_avatar( get_the_author_meta( 'user_email' ),'30' )); ?>);"></div>

                </a>
            <div class="list-body pt-3 pl-3 pr-3">
                 <a class="list-title text-sm h-2x mb-2 mb-md-3" title="Facebook的增长故事：能不能给我点个赞？" href="https://pandapro.demo.nicetheme.xyz/4568">
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
            </div>
            
            <div class="mb-2 mb-md-3 pl-3 pr-3">
                <div class="d-flex flex-fill align-items-center text-muted text-xs">
                    <div class="d-inline-block ml-md-2">
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="由<?php the_author(); ?>发布" rel="author"><?= get_the_author_meta('display_name',1); ?></a></div>
                    <div class="d-inline-block mx-1 mx-md-2">
                        <i class="text-primary">—</i></div>
                    <div class="d-inline-block">
                        <?php 
                            $category = get_the_category();
                            if($category[0]){
                            echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
                        } ?></div>
                    <div class="flex-fill"></div>
                    <div>
                        <time class="mx-1"><?= timeGo(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))) ?></time></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
        <?php endwhile; ?>
<?php endif;?>
<div class="clearfix"></div>
<div class="pagenavi text-center clearfix"><?php next_posts_link('加载更多') ?></div>
</div>
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
<div class="list-home list-grid list-grid-padding div-black-745">
<?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="card list-item block card-plain ">
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
                    <div class="d-inline-block"><?php the_category('ID'); ?></div>
                    <div class="flex-fill"></div>
                    <div><time class="mx-1"><?= timeGo(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))) ?></time></div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
<?php endif;?>
<div class="text-center">
    <?php if(is_home()): ?>
        <?php homePage();?>
    <?php else:?>
        <?php categoryPage();?>
    <?php endif;?>
</div>
<?php
/*
    <!-- <div class="list-item list-item-column block card-featured">
        <div class="list-content p-0">
            <div class="list-body ">
                <a class="list-title text-lg h-2x mb-2 mb-md-3" href="https://demo.nicetheme.xyz/panda-pro-style-one/4575.html" target="_blank">YouTube到底应该变成什么样？谷歌还没想清楚</a>
                <div class="mb-2 mb-md-3">
                    <div class="d-flex flex-fill align-items-center text-muted text-xs">
                        <div class="d-none d-md-inline-block">
                            <a href="https://demo.nicetheme.xyz/panda-pro-style-one/author/suxing" target="_blank" class="flex-avatar w-20 ">
                                <img alt="" src="//gravatar.loli.net/avatar/afa39accf8700cbbe7b13e1d01aa5b17?s=20&amp;d=mm&amp;r=g" srcset="//gravatar.loli.net/avatar/afa39accf8700cbbe7b13e1d01aa5b17?s=40&amp;d=mm&amp;r=g 2x" class="avatar avatar-20 photo w-20" height="20" width="20"></a>
                        </div>
                        <div class="d-inline-block ml-md-2">
                            <a href="https://demo.nicetheme.xyz/panda-pro-style-one/author/suxing" title="由nicetheme发布" rel="author">nicetheme</a></div>
                        <div class="d-inline-block mx-1 mx-md-2">
                            <i class="text-primary">—</i></div>
                        <div class="d-inline-block">
                            <a href="https://demo.nicetheme.xyz/panda-pro-style-one/category/tech" target="_blank">科技</a></div>
                        <div class="flex-fill"></div>
                        <div>
                            <time class="mx-1">3月前</time></div>
                    </div>
                </div>
            </div>
            <div class="media media-21x9 mb-md-3">
                <a class="media-content" href="https://demo.nicetheme.xyz/panda-pro-style-one/4575.html" target="_blank" style="background-image:url('https://demo.nicetheme.xyz/panda-pro-style-one/wp-content/uploads/sites/25/2019/06/2019062005475216.jpg')"></a>
            </div>
            <div class="list-desc d-none d-md-block text-sm text-secondary">
                <div class="h-2x ">编者按：2006年11月,Google公司以16.5亿美元收购了YouTube,并把其当做一家子公司来经营。 ...</div></div>
        </div>
    </div> -->
    */?>
</div>
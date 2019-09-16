<div class="list-home list-grid list-grid-padding">
<?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="card list-item block card-plain ">
        <div class="media media-3x2 col-4 col-md-4">
            <a class="media-content" href="<?php the_permalink() ?>" style="background-image:url(<?= getThumbnail()?>)"></a>
        </div>
        <div class="list-content">
            <div class="list-body">
                <a href="<?php the_permalink() ?>" class="list-title text-lg h-2x">
                    <?php if (is_sticky()): ?>
                        <span class="badge badge-primary">推荐</span>
                    <?php endif; ?>
                    <?php the_title(); ?>
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
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="由<?php the_author(); ?>发布" rel="author"><?php the_author(); ?></a>
                    </div>
                    <div class="d-inline-block mx-1 mx-md-2"><i class="text-primary">—</i></div>
                    <div class="d-inline-block"><?php the_category('ID'); ?></div>
                    <div class="flex-fill"></div>
                    <div><time class="mx-1">3月前</time></div>
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
</div>
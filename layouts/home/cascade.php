<main class="container" id="main">
    <div class="row">
        <!-- cascade -->
        <div class="cascade-layout">
            <div class="post-wrap">
                <?php if (have_posts()): ?>
                <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-6 col-sm-6 col-lg-4 no-gutter-xs">
                    <div class="post post-style-card">
                        <a class="post-img img-response gradient-mask" href="<?php the_permalink() ?>"
                           style="background:#ccc url(<?php echo get_template_directory_uri(); ?>/static/images/A-<?= rand(1,13)?>.png)">
                        </a>
                        <div class="post-top">
                            <div class="post-title">
                                <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a>
                            </div>
                            <div class="post-top-meta mb-2">
                            <span class="post-category"><i class="fa fa-bookmark"></i>
                                        <?php if (has_post_format('aside')): ?>日志<?php endif; ?>
                                        <?php if (has_post_format('image')): ?>图像<?php endif; ?>
                                        <?php if (has_post_format('video')): ?>视频<?php endif; ?>
                                        <?php if (has_post_format('quote')): ?>引语<?php endif; ?>
                                        <?php if (has_post_format('link')): ?>链接<?php endif; ?>
                                        <?php if (has_post_format('gallery')): ?>相册<?php endif; ?>
                                        <?php if (has_post_format('status')): ?>说说<?php endif; ?>
                                        <?php if (has_post_format('audio')): ?>音频<?php endif; ?>
                                        <?php if (has_post_format('chat')): ?>聊天<?php endif; ?>
                            </span>
                                <span class="post-time"><?= get_the_time('Y-m-d G:i:s')?></span>
                            </div>
                        </div>
                        <div class="p-3">
                            <ul class="post-meta-bottom">
                                <li class="post-meta-author">
                                    <a class="d-block" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" target="_blank">
                                        <?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
                                        <span class="d-inline-block"><?php the_author(); ?></span>
                                    </a>
                                </li>
                                <li class="post-meta-view pull-right ">
                                    <i class="czs-eye-l"></i> 0</li>
                                <li class="post-meta-comments pull-right ">
                                    <i class="czs-comment-l"></i> <?php echo get_post($post->ID)->comment_count; ?></li>
                                <li class="post-meta-like pull-right ">
                                    <i class="czs-heart-l"></i>
                                    <span class="count"><?php echo getPostViews($postID);?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif;?>
            </div>
        </div>
        <div class="pagination">
            <span class="more d-inline-block"><?php next_posts_link(__('加载更多')); ?></span>
        </div>

    </div>
</main>
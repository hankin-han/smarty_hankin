<div class="post post-type-aside">
                    <div class="post-left pull-left">
                        <a class="post-img img-response d-block gradient-mask" href="<?php the_permalink() ?>"  style="background-image: url(http://heitang.chuangzaoshi.com/wp-content/uploads/2017/05/A-2.png)">
                        </a>
                    </div>
                    <div class="post-right">
                        <div class="post-title">
                            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                        </div>
                        <div class="post-meta-top">
                            <a class="post-meta-categories" href="<?php the_permalink() ?>">
                                <i class="czs-bookmark"></i>
                                创意    </a>
                            <span class="post-meta-time">
         • <?= get_the_time('Y-m-d')?>    </span>
                        </div>
                        <div class="post-body">
                            <a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_content(), 66); ?></a>
                        </div>
                        <ul class="post-meta-bottom">
                            <li class="post-meta-author">
                                <a class="d-block" href="http://heitang.chuangzaoshi.com/archives/author/geeker" target="_blank">
                                    <img alt='' src='http://heitang.chuangzaoshi.com/wp-content/uploads/2017/05/avatar_user_1_1494903592-96x96.png' srcset='http://heitang.chuangzaoshi.com/wp-content/uploads/2017/05/avatar_user_1_1494903592-96x96.png 2x' class='avatar avatar-96 photo' height='96' width='96' />            <span class="d-inline-block">geeker</span>
                                </a>
                            </li>
                            <li class="post-meta-view pull-right ">
                                <i class="czs-eye-l"></i> <?php echo getPostViews($postID);?>    </li>
                            <li class="post-meta-comments pull-right ">
                                <i class="czs-comment-l"></i> <?php echo get_post($post->ID)->comment_count; ?>    </li>
                            <li class="post-meta-like pull-right ">
                                <i class="czs-heart-l"></i>
                                <span class="count">
                            65                    </span>
                            </li>
                        </ul>
                    </div>
                </div>
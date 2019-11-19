<?php
if (post_password_required())
    return;
?>
<?php if (comments_open()) : ?>
<div id="comments" class="comments">
    <div class="card">
        <div class="mx-4 my-3">
        <i class="text-xl text-primary iconfont icon-message--line mr-2"></i>评论
        <small class="font-theme text-muted">(<?php echo number_format_i18n(get_comments_number()); ?>)</small></div>

        <div class="card-body">
            <p id="reply-title" class="comments-title"><?php comment_form_title('', '回复给 %s'); ?>
                <small>
                    <?php cancel_comment_reply_link(); ?>
                </small>
            </p>
            <?php if (get_option('comment_registration') && !$user_ID) : ?>
                <p>You must be <a
                            href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged
                        in</a> to post a comment.</p>
            <?php else : ?>
            <div id="respond" class="comment-respond mb-4">
                <form method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php#respond" id="commentform" class="comment-form">
                    <div class="comment-from-author">
                        <div class="comment-avatar-author d-flex flex-fill align-items-center text-sm mb-2">
                            <div class="flex-avatar w-32">
                            <?php if ($_COOKIE['hankin-username']) : ?>
                                <img src="<?= $_COOKIE['hankin-avatar'] ?>" class="avatar w-32" id="avatar_img">
                            <?php else:?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user/default-avatar.png" class="avatar w-32" id="avatar_img">
                            <?php endif;?>
                            </div>
                        </div>
                        <div class="comment-form-text">
                            <?php if ($_COOKIE['hankin-username']) : ?>
                                <p class="warning-text" style="margin-bottom:10px">欢迎您 <a href="javascript:void(0)" no-pjax id="clear-qq"><font color="#4680ff"><?= $_COOKIE['hankin-username']; ?></font> &nbsp;<i class="feather icon-edit"></i></a></p>
                            <div class="comment-form-info row row-sm" id="qqShow" style="<?php if($_COOKIE['hankin-username']):?>display:none<?php endif;?>">
                                <div class="col-12 col-md-4">
                                    <div class="form-group comment-form-author">
                                    <input class="form-control text-sm" id="author" placeholder="QQ号【可获取头像和昵称】" name="author" type="text" value="<?= $_COOKIE['hankin-qq']; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group comment-form-email">
                                        <input id="email" class="form-control text-sm" name="email" placeholder="自动获取" type="email" value="<?= $_COOKIE['hankin-qq'].'@qq.com'; ?>" readonly autocomplete="off"></div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group comment-form-url">
                                        <input class="form-control text-sm" placeholder="网址(可不填)" id="url" name="url" type="url" value=""></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="loader-comment" style="display: none;" id="comment-loader">
                                <div class="loader-track">
                                    <div class="loader-fill"></div>
                                </div>
                            </div>
                            <div class="comment-textarea mb-3">
                                <textarea id="comment" name="comment" class="form-control form-control-sm" rows="3"></textarea>
                            </div>
                            <div class="d-flex flex-fill align-items-center">
                                <div class="flex-fill"></div>
                                <div class="form-submit">
                                    <button type="submit" id="submit" class="btn btn-dark">发布评论</button>
                                    <?php comment_id_fields(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php endif; ?>
            <ul class="comment-list">
                <?php
                wp_list_comments([
                    'style' => 'ol',
                    'short_ping' => TRUE,
                    'avatar_size' => 40,
                    'type' => 'comment',
                    'callback' => 'simple_comment',
                ]);
                ?>
            </ul>
            <nav class="navigation comment-navigation u-textAlignCenter" data-fuck="<?php the_ID(); ?>">
                <?php paginate_comments_links('prev_next=0'); ?>
            </nav>
        </div>
    </div>
</div>
<?php endif?>
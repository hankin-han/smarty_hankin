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
                                <img src="https://demo.nicetheme.xyz/panda-pro-style-one/wp-content/themes/PandaPRO/images/default-avatar.png" class="avatar w-32"></div>
                        </div>
                        <div class="comment-form-text">
                            <?php if ($user_ID) : ?>
                                <p class="warning-text" style="margin-bottom:10px">以<a
                                    href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>身份登录
                            | <a class="link-logout" href="<?php echo wp_logout_url(get_permalink()); ?>">注销 »</a></p>
                            <div class="comment-textarea mb-3">
                                <textarea id="comment" name="comment" class="form-control form-control-sm" rows="3"></textarea>
                            </div>
                            <?php else : ?>
                            <div class="comment-textarea mb-3">
                                <textarea id="comment" name="comment" class="form-control form-control-sm" rows="3"></textarea>
                            </div>
                            <div class="comment-form-info row row-sm">
                                <div class="col">
                                    <div class="form-group comment-form-author">
                                        <input class="form-control text-sm" id="author" placeholder="昵称[必填]" name="author" type="text" value="<?php echo $comment_author; ?>" required="required"></div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group comment-form-email">
                                        <input id="email" class="form-control text-sm" name="email" placeholder="邮箱[必填]" type="email" value="<?php echo $comment_author_email; ?>" required="required"></div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group comment-form-url">
                                        <input class="form-control text-sm" placeholder="网址(可不填)" id="url" name="url" type="url" value="<?php echo $comment_author_url; ?>"></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="d-flex flex-fill align-items-center">
                                <!-- <div class="nice-checkbox text-muted text-xs">
                                <label for="nice-checkbox-comment">
                                <input type="checkbox" name="checkbox" id="nice-checkbox-comment" class="d-none">
                                <span class="nice-checkbox-text"></span>邮件通知我
                                </label>
                                </div> --> 
                                <div class="flex-fill"></div>
                                <div class="form-submit">
                                    <a rel="nofollow" id="cancel-comment-reply-link" style="display: none" href="javascript:;" class="btn btn-light mx-2">再想想</a>
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
<?php
define('AC_VERSION','2.0.0');

if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	wp_die('请升级到4.4以上版本');
}

if(!function_exists('fa_ajax_comment_scripts')) :

    function fa_ajax_comment_scripts(){
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
        wp_enqueue_style( 'ajax-comment', get_template_directory_uri() . '/includes/ajax-comment/app.css', array(), AC_VERSION );
        wp_enqueue_script( 'ajax-comment', get_template_directory_uri() . '/includes/ajax-comment/app.js', array( 'jquery' ), AC_VERSION , true );
        wp_localize_script( 'ajax-comment', 'ajaxcomment', array(
            'ajax_url'   => admin_url('admin-ajax.php'),
            'order' => get_option('comment_order'),
            'formpostion' => 'bottom', //默认为bottom，如果你的表单在顶部则设置为top。
        ) );
    }

endif;

if(!function_exists('fa_ajax_comment_err')) :

    function fa_ajax_comment_err($a) {
        header('HTTP/1.0 500 Internal Server Error');
        header('Content-Type: text/plain;charset=UTF-8');
        echo $a;
        exit;
    }

endif;

if(!function_exists('fa_ajax_comment_callback')) :

    function fa_ajax_comment_callback(){
        $comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
        if ( is_wp_error( $comment ) ) {
            $data = $comment->get_error_data();
            if ( ! empty( $data ) ) {
            	fa_ajax_comment_err($comment->get_error_message());
            } else {
                exit;
            }
        }
        $user = wp_get_current_user();
        do_action('set_comment_cookies', $comment, $user);
        $GLOBALS['comment'] = $comment; //根据你的评论结构自行修改，如使用默认主题则无需修改
        ?>
        <li class="comment odd alt thread-odd thread-alt depth-1" id="li-comment-<?php comment_ID(); ?>">
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body d-flex flex-fill ">
            <div class="comment-avatar-author vcard mr-2 mr-md-3 ">
                <div class="flex-avatar w-48">
                    <img src="<?= empty(get_comment_meta(get_comment_ID(),'hankin_avatar')[0]) ? get_template_directory_uri().'/assets/images/user/default-avatar.png' : get_comment_meta(get_comment_ID(),'hankin_avatar')[0] ?>" width="48" height="48">
                </div>
            </div>
            <div class="comment-text d-flex flex-fill flex-column">
                <div class="comment-info d-flex align-items-center mb-1">
                    <div class="comment-author text-sm">
                        <?php if(!get_comment_author_url()) : ?>
                            <?= get_comment_meta(get_comment_ID(),'hankin_username')[0] ?>
                            <?php else : ?>
                            <a href="<?= get_comment_author_url()?>" target="_blank" rel='nofollow'><?= get_comment_meta(get_comment_ID(),'hankin_username')[0] ?></a>
                        <?php endif; ?>
                        <?php if ($comment->comment_approved == '0') : ?>
                            <em>评论等待审核...</em><br />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="comment-content d-inline-block text-sm">
                    <?php comment_text(); ?>
                </div>
                <!-- .comment-content -->
                <div class="d-flex flex-fill text-xs text-muted pt-2">
                    <div>
                        <time class="comment-date"><?php echo timeGo(get_gmt_from_date(get_comment_time('Y-m-d G:i:s'))); ?></time></div>
                    <div class="flex-fill"></div>
                    <?php comment_reply_link(array_merge($args, ['reply_text' => '回复', 'depth' => $depth, 'max_depth' => $args['max_depth']])) ?>
                </div>
            </div>
            
        </article>
    </li>
        <?php die();
    }

endif;

global $wpdb;
$wpdb->update('wp_options',[
    'option_value' => 0
],[
    'option_name' => 'require_name_email'
]); 

add_action( 'wp_enqueue_scripts', 'fa_ajax_comment_scripts' );
add_action('wp_ajax_nopriv_ajax_comment', 'fa_ajax_comment_callback');
add_action('wp_ajax_ajax_comment', 'fa_ajax_comment_callback');

function simple_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li class="comment odd alt thread-odd thread-alt depth-1" id="li-comment-<?php comment_ID(); ?>">
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body d-flex flex-fill ">
            <div class="comment-avatar-author vcard mr-2 mr-md-3 ">
                <div class="flex-avatar w-48">
                    <img src="<?= empty(get_comment_meta(get_comment_ID(),'hankin_avatar')[0]) ? get_template_directory_uri().'/assets/images/user/default-avatar.png' : get_comment_meta(get_comment_ID(),'hankin_avatar')[0] ?>" width="48" height="48">
                </div>
            </div>
            <div class="comment-text d-flex flex-fill flex-column">
                <div class="comment-info d-flex align-items-center mb-1">
                    <div class="comment-author text-sm">
                        <?php if(!get_comment_author_url()) : ?>
                            <?= get_comment_meta(get_comment_ID(),'hankin_username')[0] ?>
                            <?php else : ?>
                            <a href="<?= get_comment_author_url()?>" target="_blank" rel='nofollow'><?= get_comment_meta(get_comment_ID(),'hankin_username')[0] ?></a>
                        <?php endif; ?>
                        <?php if ($comment->comment_approved == '0') : ?>
                            <em>评论等待审核...</em><br />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="comment-content d-inline-block text-sm">
                    <?php comment_text(); ?>
                </div>
                <!-- .comment-content -->
                <div class="d-flex flex-fill text-xs text-muted pt-2">
                    <div>
                        <time class="comment-date"><?php echo timeGo(get_gmt_from_date(get_comment_time('Y-m-d G:i:s'))); ?></time></div>
                    <div class="flex-fill"></div>
                    <?php comment_reply_link(array_merge($args, ['reply_text' => '回复', 'depth' => $depth, 'max_depth' => $args['max_depth']])) ?>
                </div>
            </div>
            
        </article>
    </li>
<?php
}
?>
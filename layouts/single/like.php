<?php
$i_dashang_check = cs_get_option('i_dashang_check');
?>
<?php if($i_dashang_check):?>
<div class="donate text-center">
    <p class="text-muted mt-3">如本文“对您有用”，欢迎随意打赏作者，让我们坚持创作！</p>
    <a class="btn btn-primary btn-like btn-link-like2<?php if(isset($_COOKIE['hankin_like_'.$post->ID])) echo ' current';?>" href="javascript:;" data-action="like" data-id="<?php the_ID(); ?>">
        <i class="text-md iconfont icon-thumb-up-line mx-1"></i>
        <small class="like-count">
            <?php if( get_post_meta($post->ID,'hankin_like',true) ){            
                echo get_post_meta($post->ID,'hankin_like',true);
             } else {
                echo '0';
             }?>
        </small>
    </a>
    <a class="btn btn-success mt-3 mb-3" data-toggle="modal" data-target="#gratuityModal" href="javascript:void(0);" onclick="return false;" title="如本文“对您有用”，欢迎随意打赏作者，让我们坚持创作！"><i class="text-md feather icon-award mx-1"></i>打赏</a>
</div>
<?php endif;?>

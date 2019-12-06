<?php
$i_dashang_check = cs_get_option('i_dashang_check');
?>
<?php if(!wp_is_mobile() && $i_dashang_check):?>
<div class="donate text-center">
    <p class="text-muted mt-3">如本文“对您有用”，欢迎随意打赏作者，让我们坚持创作！</p>
    <a class="btn btn-danger mt-3 mb-3" data-toggle="modal" data-target="#gratuityModal" href="javascript:void(0);" onclick="return false;" title="如本文“对您有用”，欢迎随意打赏作者，让我们坚持创作！"><i class="text-md iconfont icon-thumb-up-line mx-1"></i>赞赏</a>
</div>
<?php endif;?>

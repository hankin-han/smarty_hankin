<?php
$i_notice = cs_get_option('i_notice'); //自定义友情链接
?>
<?php if(is_home() && isset($i_notice) && !wp_is_mobile()):?>
<div class="notice breadcrumb" id="notice">
    <ul class="notice-list" style="margin-top: 0px;">
            <?php foreach($i_notice as $notice):?>
                <li><a href="<?= $notice['i_notice_link']?>" <?php if(isset($notice['i_notice_newtab'])):?>target="_blank"<?php endif;?> title="<?= $notice['i_notice_title']?>"><i class="feather icon-volume-2"></i><?= $notice['i_notice_title']?></a></li>
            <?php endforeach;?>     
    </ul>
</div>
<?php endif;?>
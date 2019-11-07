<?php if(is_home() && $i_notice):?>
<div class="notice breadcrumb" id="notice">
    <ul class="notice-list" style="margin-top: 0px;">
            <?php foreach($i_notice as $notice):?>
                <li><a href="<?= $notice['i_notice_link']?>" <?php if($notice['i_notice_newtab']):?>target="_blank"<?php endif;?> title="<?= $notice['i_notice_title']?>"><i class="feather icon-volume-2"></i><?= $notice['i_notice_title']?></a></li>
            <?php endforeach;?>     
    </ul>
</div>
<?php endif;?>
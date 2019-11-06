<?php
$i_notice = cs_get_option('i_notice'); //自定义友情链接
?>
<!-- [ Main Content ] start -->
<section class="pcoded-main-container" id="content">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-md-8">
                <?php if(is_home() && $i_notice):?>
                <div class="notice breadcrumb" id="notice">
                    <ul class="notice-list" style="margin-top: 0px;">
                            <?php foreach($i_notice as $notice):?>
                                <li><a href="<?= $notice['i_notice_link']?>" target="_blank" title="<?= $notice['i_notice_title']?>"><i class="feather icon-volume-2"></i><?= $notice['i_notice_title']?></a></li>
                            <?php endforeach;?>     
                    </ul>
                </div>
                <?php endif;?>
                <!-- [ breadcrumb ] start -->
                <?php cmp_breadcrumbs();?>
                <!-- [ breadcrumb ] end -->
                <!-- [ list ] start -->
                <?php if(isWechat()):?>
                <?php get_template_part( 'layouts/home/wx_list' );?>
                <?php else:?>
                <?php get_template_part( 'layouts/home/list' );?>    
                <?php endif;?>
                <!-- [ list ] end -->
            </div>
            <div class="col-md-4">
                <!-- [ sidebar ] start -->
               <?php get_sidebar(); ?>
               <!-- [ sidebar ] end -->
            </div>
        </div>
    </div>
    <!-- [ copyright ] start -->
    <?php get_template_part( 'layouts/footer/copyright' );?>
    <!-- [ copyright ] end -->  
</section>
<!-- [ Main Content ] end -->
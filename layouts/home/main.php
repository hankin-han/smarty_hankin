<!-- [ Main Content ] start -->
<section class="pcoded-main-container" id="content">
<?php if(is_home() && wp_is_mobile()): ?>
<style type="text/css">.swiper-container{border-radius: 0!important}#i_social,#i_social_hr{display: none;}.Author_Card{background:#fff;}.widget-author-avatar{top:-60px!important;}.swiper-container{height: 15rem!important}</style>
<div class="AuthorCardMobile">
    <?php 
        $authorCard = new AuthorCard();
        $widget_cs_widget_author = reset(get_option('widget_cs_widget_author'));
        $instance['title'] = $widget_cs_widget_author['title'];
        $instance['advertising'] = $widget_cs_widget_author['advertising'];
        $authorCard->widget([],$instance);
    ?>
</div>
<?php endif;?>
    <div class="pcoded-content">
        <div class="row">
            <div class="col-md-8">
                <!-- [ notice ] start -->
                <?php get_template_part( 'layouts/home/notice' );?>
                <!-- [ notice ] end -->
                <!-- [ breadcrumb ] start -->
                <?php cmp_breadcrumbs();?>
                <!-- [ breadcrumb ] end -->
                <!-- [ list ] start -->
                <?php get_template_part( 'layouts/home/category' );?>
                <?php if(isWechat()):?>
                    <?php get_template_part( 'layouts/home/wx_list' );?>
                <?php else:?>
                <?php get_template_part( 'layouts/home/list' );?>
                <?php get_template_part( 'layouts/home/box_grid' );?>
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
<!-- [ Main Content ] start -->
<section class="pcoded-main-container" id="content">
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
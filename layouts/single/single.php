<!-- [ Main Content ] start -->
<section class="pcoded-main-container" id="content">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-md-8">
                <!-- [ breadcrumb ] start -->
                <?php cmp_breadcrumbs();?>
                <!-- [ breadcrumb ] end -->
                <!-- [ single ] start -->
                <?php get_template_part( 'layouts/single/view' );?>
                <!-- [ single ] end -->
                <!-- [ comments ] start -->
                <?php comments_template(); ?>
                <!-- [ comments ] end -->
            </div>
            <div class="col-md-4">
                <!-- [ sidebar ] start -->
               <?php get_template_part( 'layouts/home/sidebar' );?>
               <!-- [ sidebar ] end -->
            </div>
        </div>
    </div>
</section>
<!-- [ Main Content ] end -->
<!-- [ Main Content ] start -->
<section class="pcoded-main-container" id="content">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-md-8">
                <!-- [ breadcrumb ] start -->
                <?php cmp_breadcrumbs();?>
                <!-- [ breadcrumb ] end -->
                <!-- [ list ] start -->
                <?php get_template_part( 'layouts/home/list' );?>
                <!-- [ list ] end -->
            </div>
            <div class="col-md-4">
                <!-- [ list ] start -->
               <?php get_template_part( 'layouts/home/sidebar' );?>
               <!-- [ list ] end -->
            </div>
        </div>
    </div>
</section>
<!-- [ Main Content ] end -->
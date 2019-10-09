<?php
/* 
Template Name: 通用
*/
?>
<?php get_header(); ?>
<!-- [ Main Content ] start -->
<section class="pcoded-main-container" id="content">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <?php get_template_part( 'layouts/home/breadcrumb' );?>
        <!-- [ breadcrumb ] end -->
        <div class="row">
            <div class="col-md-8">
                <!-- [ list ] start -->
                <?php get_template_part( 'layouts/single/view' );?>
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
<?php get_footer(); ?>
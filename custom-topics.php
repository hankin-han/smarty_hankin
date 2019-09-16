<?php
/* 
Template Name: 专题
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
            <div class="col-md-12">
                <!-- [ list ] start -->
                <?php get_template_part( 'layouts/home/list_topics' );?>
                <!-- [ list ] end -->
            </div>
        </div>
    </div>
</section>
<!-- [ Main Content ] end -->
<?php get_footer(); ?>
<?php get_header(); ?>
<?php if(empty($_COOKIE) || !isset($_COOKIE['layout_smarty'])):?>
    <?php get_template_part( 'layouts/page/dcolumn' );?>
<?php endif;?>
<?php if($_COOKIE['layout_smarty'] == 'dcolumn'):?>
    <?php get_template_part( 'layouts/page/dcolumn' );?>
<?php endif;?>
<?php if($_COOKIE['layout_smarty'] == 'cascade'):?>
    <?php get_template_part( 'layouts/page/cascade' );?>
<?php endif;?>
<?php get_footer(); ?>

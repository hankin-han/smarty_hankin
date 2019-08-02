<?php get_template_part( 'layouts/header/banner' );?>
<?php get_template_part( 'layouts/header/notice' );?>
<?php get_template_part( 'layouts/header/custom' );?>

<?php if(empty($_COOKIE) || !isset($_COOKIE['layout_smarty'])):?>
    <?php get_template_part( 'layouts/home/dcolumn' );?>
<?php endif;?>
<?php if($_COOKIE['layout_smarty'] == 'dcolumn'):?>
    <?php get_template_part( 'layouts/home/dcolumn' );?>
<?php endif;?>
<?php if($_COOKIE['layout_smarty'] == 'cascade'):?>
    <?php get_template_part( 'layouts/home/cascade' );?>
<?php endif;?>
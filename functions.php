<?php
add_filter( 'show_admin_bar', '__return_false' );
register_nav_menu('warp-nav', 'smarty-菜单');
function _the_theme_name()
{
    $current_theme = wp_get_theme();
    return $current_theme->get('Name');
}

function _the_theme_version()
{
    $current_theme = wp_get_theme();
    return $current_theme->get('Version');
}
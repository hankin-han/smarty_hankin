<?php
$i_seo_keywords = cs_get_option('i_seo_keywords'); //关键词
$i_seo_description = cs_get_option('i_seo_description'); //关键词
$i_css = cs_get_option('i_css'); //关键词
$i_theme_switch = cs_get_option('i_theme_switch');
$i_theme_background = cs_get_option('i_theme_background');
$i_theme_box_center = cs_get_option('i_theme_box_center');
$i_theme_blur_layouts = cs_get_option('i_theme_blur_layouts');
$i_theme_dark_layouts = cs_get_option('i_theme_dark_layouts');
?>
<!--
.----------------.  .----------------.  .-----------------. .----------------.  .----------------.  .-----------------.
| .--------------. || .--------------. || .--------------. || .--------------. || .--------------. || .--------------. |
| |  ____  ____  | || |      __      | || | ____  _____  | || |  ___  ____   | || |     _____    | || | ____  _____  | |
| | |_   ||   _| | || |     /  \     | || ||_   \|_   _| | || | |_  ||_  _|  | || |    |_   _|   | || ||_   \|_   _| | |
| |   | |__| |   | || |    / /\ \    | || |  |   \ | |   | || |   | |_/ /    | || |      | |     | || |  |   \ | |   | |
| |   |  __  |   | || |   / ____ \   | || |  | |\ \| |   | || |   |  __'.    | || |      | |     | || |  | |\ \| |   | |
| |  _| |  | |_  | || | _/ /    \ \_ | || | _| |_\   |_  | || |  _| |  \ \_  | || |     _| |_    | || | _| |_\   |_  | |
| | |____||____| | || ||____|  |____|| || ||_____|\____| | || | |____||____| | || |    |_____|   | || ||_____|\____| | |
| |              | || |              | || |              | || |              | || |              | || |              | |
| '--------------' || '--------------' || '--------------' || '--------------' || '--------------' || '--------------' |
'----------------'  '----------------'  '----------------'  '----------------'  '----------------'  '----------------'
唤醒-hankin
Blog：https://www.hankin.cn -->
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="keywords" content="<?= $i_seo_keywords?>">
<meta name="description" content="<?= $i_seo_description?>" />
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css?version=<?= time()?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css?version=<?= time()?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/monokai_sublime.min.css?version=<?= time()?>">
<?php if( ! empty( $i_css ) ){ echo '<style>'.$i_css.'</style>';}else{ echo' ';} ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
<link rel="icon" href="<?php echo home_url(); ?>/favicon.ico" type="image/x-icon">
<?php if($i_theme_dark_layouts):?>
<link rel="stylesheet" class="layout-css" id="layout-css" href="<?= get_template_directory_uri().'/assets/css/layout-dark.css'?>">
<?php else:?>
<link rel="stylesheet" class="layout-css" id="layout-css" href="<?= isset($_COOKIE['layout-css']) ? $_COOKIE['layout-css'] : ''?>">
<?php endif;?>
<?php if($i_theme_switch):?>
<link rel="stylesheet" class="layout-blur-css" id="layout-blur-css" href="<?= isset($_COOKIE['layout-blur-css']) ? $_COOKIE['layout-blur-css'] : ''?>">
<?php else:?>
	<link rel="stylesheet" class="layout-blur-css" id="layout-blur-css" href="<?= isset($i_theme_blur_layouts) ? get_template_directory_uri().'/assets/css/layout-blur-css.css' : ''?>">
<?php endif;?>
<link rel="stylesheet" class="rtl-css" id="rtl-css" href="">
</head>
<?php if($i_theme_switch):?>
<body class="<?= isset($_COOKIE['background']) ? $_COOKIE['background'] : 'background-blue'?>">
	<div class="<?= isset($_COOKIE['box-layout']) ? $_COOKIE['box-layout'] : 'container box-layout' ?>" id="body">
<?php else:?>
<body class="background-blue" style="background:url(<?= $i_theme_background;?>) no-repeat fixed center;background-size:cover;">
	<div class="<?= ($i_theme_box_center) ? 'container box-layout' : '' ?>" id="body">
<?php endif;?>
<!-- [ Pre-loader ] start -->
<div class="loader-bg" style="display: none">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
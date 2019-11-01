<?php
$i_seo_keywords = cs_get_option('i_seo_keywords'); //关键词
$i_seo_description = cs_get_option('i_seo_description'); //关键词
$i_css = cs_get_option('i_css'); //关键词
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
<link rel="stylesheet" class="layout-css" id="layout-css" href="<?= $_COOKIE['layout-css']?>">
<link rel="stylesheet" class="rtl-css" id="rtl-css" href="">
</head>
<body class="<?= ($_COOKIE['box-layout'] == '') ? 'container box-layout' :  $_COOKIE['box-layout'] ?> <?= ($_COOKIE['background'] == '') ? 'background-blue' : $_COOKIE['background']?>">
<!-- [ Pre-loader ] start -->
<div class="loader-bg" style="display: none">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
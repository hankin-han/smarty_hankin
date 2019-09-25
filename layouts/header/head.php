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
    <title><?php show_wp_title() ?></title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <?php wp_head(); ?>
    <link rel="icon" href="<?php echo home_url(); ?>/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css?version=<?= time()?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css?version=<?= time()?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/monokai_sublime.min.css?version=<?= time()?>">
    <link rel="stylesheet" class="layout-css" id="layout-css" href="">
    <link rel="stylesheet" class="rtl-css" id="rtl-css" href="">
</head>
<body class="container box-layout background-img-1">
<!-- [ Pre-loader ] start -->
<div class="loader-bg" style="display: none">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
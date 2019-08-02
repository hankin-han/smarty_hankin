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
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/static/css/smarty.css?version=<?= time()?>" />
    <link rel="stylesheet" type="text/css" id="owlcss-css" href="<?php echo get_template_directory_uri(); ?>/static/css/owl.carousel.min.css?version=<?= time()?>" />
    <title><?php show_wp_title() ?></title>
    <meta name="description" content="那个为梦想拼尽全力的你~" />
    <meta name="keywords" content="唤醒,唤醒-hankin,个人博客模板,主题分享,博客模板,个人网站模板,技术分享,功能开发,前端技术,后端技术" />
    <meta name="template" content="唤醒-hankin" />
    <link rel="icon" type="image/ico" href="">
</head>
<body <?php body_class(); ?>>
<script type="text/javascript">
    var carouselSwitcher = "1";
    var carouselType = "image";
    var carouselOpacity = "10";
    var carouselSpeed = 3000;
    var carouselAnimateSpeed = 600;
    var carouselAnimation = "slide";
    var carouselMouseSwitcher = "";
    var siteUrl = "<?php echo get_home_url(); ?>";
    var imgUrl = "<?php echo get_template_directory_uri(); ?>/static/images";
    var fancyboxSwitcher = "1";
    var isHomePage = "1";
    var pagType	= "more";
    var layoutType = "dcolumn";
    var themeUrl = "<?php echo get_template_directory_uri(); ?>";
</script>
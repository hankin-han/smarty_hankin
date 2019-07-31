<script>
    console.log("version：<?php echo _the_theme_name().'_v'._the_theme_version();?>");
    console.log("SQL 请求数：<?php echo get_num_queries();?>");
    console.log("页面生成耗时： <?php echo timer_stop(0,5);?>");
</script>
<?php wp_footer(); ?>
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
<script type='text/javascript' src='https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/static/js/owl.carousel.min.js?version=<?= time()?>'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/static/js/main.js?version=<?= time()?>'></script>
</body>
</html>
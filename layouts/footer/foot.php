
<!-- Required Js -->
<?php wp_footer(); ?>
<!--定义全局变量--> 
<script type="text/javascript"> 
window.ENCODE_URI_COMPONENT_TITLE = "唤醒-hankin - 那个为梦想拼尽全力的你~"; 
window.ENCODE_URI_COMPONENT_LINK = window.location.href; 
window.ENCODE_URI_COMPONENT_IMAGE = 'https://www.hankin.cn/wp-content/themes/hankin/screenshot.png'; 
window.ENCODE_URI_COMPONENT_DESC = 'wordpress 自适应主题，响应式主题，唤醒-hankin，个人博客模板，主题分享，博客模板，个人网站模板，技术分享，功能开发，前端技术，后端技术'; 
window.ENCODE_URI_COMPONENT_SITE = '唤醒-hankin，wordpress 自适应主题，响应式主题，个人博客模板，主题分享，博客模板，个人网站模板，技术分享，功能开发，前端技术，后端技术'; 
</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/bootstrap.min.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/menu-setting.min.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/highlight/clipboard.min.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/highlight/highlight.min.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/pjax.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/message.js?version=<?= time()?>"></script>
<!-- 分享插件 start-->
<div id="cz-leftside-share"></div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.share.min.js?version=<?= time()?>"></script>
<!-- 分享插件 end-->
<!-- 音乐播放器 -->
<!-- div class="aplayer-footer"><div class="ap-f" id="ap-f"></div></div>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/player/css/play.css">
<script src="<?php echo get_template_directory_uri(); ?>/assets/player/js/aplayer.min.js?version=<?= time()?>"></script-->
<script type="text/javascript">
    let style = 'color:#4680ff;font-size:14px; padding:2px;';
    console.log('version：'+'%c %s', style, '<?php echo _the_theme_name().'_v'._the_theme_version();?>');
    console.log('SQL 请求数：'+'%c %s', style, '<?php echo get_num_queries();?>');
    console.log('页面生成耗时： '+'%c %s', style, '<?php echo timer_stop(0,10);?>');
</script>
</body>
</html>
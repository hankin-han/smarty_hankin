<?php
$i_js = cs_get_option('i_js'); //js
$i_js_tongji = cs_get_option('i_js_tongji'); //统计
$i_seo_keywords = cs_get_option('i_seo_keywords'); //关键词
$i_seo_description = cs_get_option('i_seo_description'); //关键词
$i_appId = cs_get_option('i_appId'); //appid
$i_appSecret = cs_get_option('i_appSecret'); //appSecret
$i_theme_switch = cs_get_option('i_theme_switch'); //i_theme_switch
$i_music_check = cs_get_option('i_music_check'); //开启播放器
$i_music_auto_play = cs_get_option('i_music_auto_play'); //开启自动播放
$i_music_loop = cs_get_option('i_music_loop'); //音乐循环
$i_music_value = cs_get_option('i_music_value'); //音乐播放列表id
$i_slider = cs_get_option('i_slider'); //自定义幻灯片
?>
<!--定义全局变量--> 
<script type="text/javascript">
window.THEME_URL = '<?php echo get_template_directory_uri(); ?>'; 
window.ENCODE_URI_COMPONENT_TITLE = document.title; 
window.ENCODE_URI_COMPONENT_LINK = this.location.href; 
window.ENCODE_URI_COMPONENT_IMAGE = '<?php echo get_template_directory_uri(); ?>/screenshot.jpg';
window.ENCODE_URI_COMPONENT_DESC = '<?= $i_seo_description?>';
window.ENCODE_URI_COMPONENT_SITE = '<?= $i_seo_keywords?>';
<?php $wxJsData = getLocationSevice($i_appId,$i_appSecret);?>
window.APPID = '<?= $wxJsData['appId']?>';
window.TIMESTAMP = '<?= $wxJsData['timestamp']?>';
window.NONCESTR = '<?= $wxJsData['nonceStr']?>';
window.SIGNATURE = '<?= $wxJsData['signature']?>';
window.IS_PAGE_SINGLE = <?= (is_single() || is_page()) ? '1' : '0' ?>;
window.IS_SLIDER = <?= ($i_slider) ? '1' : '0' ?>;
</script>
<script type="text/javascript" src="//res2.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
<script type="text/javascript">
wxConfig = {
	title : document.title,
	desc : window.ENCODE_URI_COMPONENT_DESC,
	link : window.ENCODE_URI_COMPONENT_LINK,
	imgUrl : window.ENCODE_URI_COMPONENT_IMAGE,
};
</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/wxShare.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.cookie.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/popper.min.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/bootstrap.min.js?version=<?= time()?>"></script>
<?php if(!wp_is_mobile() && $i_theme_switch):?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/menu-setting.min.js?version=<?= time()?>"></script>
<?php endif;?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/highlight/clipboard.min.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/highlight/highlight.min.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/pjax.js?version=<?= time()?>"></script>
<!-- viewer start-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/viewer/viewer.min.css">
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/viewer/viewer.min.js"></script>
<!-- viewer start-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js?version=<?= time()?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/message.js?version=<?= time()?>"></script>
<?php if( ! empty( $i_js ) ){ echo '<script type="text/javascript">'.$i_js.'</script>';}else{ echo'';} ?>
<!-- 分享插件 start-->
<div id="cz-leftside-share"></div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.share.min.js?version=<?= time()?>"></script>
<!-- 分享插件 end-->
<?php if(!wp_is_mobile() && $i_music_check):?>
<script type="text/javascript">
	playerConfig = {
		autoplay : <?= $i_music_auto_play ? 'true' : 'false' ?>,
		loop : <?= $i_music_loop?>,
		ids : <?= $i_music_value?>,
	}
</script>
<!-- 音乐播放器 start-->
<div class="aplayer-footer"><div class="ap-f" id="ap-f"></div></div>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/player/css/play.css">
<script src="<?php echo get_template_directory_uri(); ?>/assets/player/js/aplayer.min.js?version=<?= time()?>"></script>
<!-- 音乐播放器 start-->
<?php endif;?>
<?php wp_footer(); ?>
<script type="text/javascript">
    let key_style = 'color: #fff; background: #5c5c5c; font-size: 12px;border-radius:2px 0 0 2px;padding:3px 6px;';
    let value_style = 'border-radius:0 2px 2px 0;padding:3px 6px;color:#fff;background:#1b81c2';
    console.log("%csmarty_hankin%c<?php echo 'v'._the_theme_version();?>", key_style, value_style);
    console.log("%c页面生成耗时%c<?php echo timer_stop(0,10);?>", key_style, value_style);
    console.log("%cSQL 请求数%c<?php echo get_num_queries();?>", key_style, value_style);
    console.log("%c作者博客%chttps://www.hankin.cn", key_style, value_style);
</script>
<!--网站统计代码 start-->
<?php if( ! empty( $i_js_tongji ) ){ echo '<script type="text/javascript">'.$i_js_tongji.'</script>';}else{ echo'';} ?>
<!--网站统计代码 end-->
<!-- [ modal ] start -->
 <?php get_template_part( 'layouts/footer/modal' );?>
<!-- [ modal ] end -->
</body>
</html>
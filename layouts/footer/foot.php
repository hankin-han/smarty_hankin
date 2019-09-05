<div class="aplayer-footer">
	<div class="ap-f" id="ap-f"></div>
</div>
<?php wp_footer(); ?>
<!-- Required Js -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.min.js?version=<?= time()?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor-all.min.js?version=<?= time()?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/ripple.js?version=<?= time()?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/pcoded.min.js?version=<?= time()?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/bootstrap.min.js?version=<?= time()?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/menu-setting.min.js?version=<?= time()?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.pjax.js?version=<?= time()?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js?version=<?= time()?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/player/css/play.css">
<script src="<?php echo get_template_directory_uri(); ?>/assets/player/js/aplayer.min.js?version=<?= time()?>"></script>
<script type="text/javascript">
    let style = 'color:#4680ff;font-size:14px; padding:2px;';
    console.log('version：'+'%c %s', style, '<?php echo _the_theme_name().'_v'._the_theme_version();?>');
    console.log('SQL 请求数：'+'%c %s', style, '<?php echo get_num_queries();?>');
    console.log('页面生成耗时： '+'%c %s', style, '<?php echo timer_stop(0,10);?>');
$(function(){
    $.ajax({
        url:"https://api.fczbl.vip/163/?type=playlist&id=9474056",
        success:function(e){
            var a = new APlayer({
                element:document.getElementById("ap-f"),
                autoplay:true,
                fixed:true,
                loop:"all",
                order:"list",
                listFolded:true,
                showlrc:3,
                theme:"#e6d0b2",
                listmaxheight:"200px",
                music:eval(e)
            });
            window.aplayers || (window.aplayers = []),
            window.aplayers.push(a)
        }
    })

})
/*
$(document).pjax('a[href^="http://test.www.hankin.cn/"]:not(a[target="_blank"], a[no-pjax])', {
	alert
    container: '#content',
    fragment: '#content',
    timeout: 8000
})*/





</script>
</body>
</html>
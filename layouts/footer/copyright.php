<?php
$i_avatar_beian = cs_get_option('i_avatar_beian'); //备案号
$i_avatar_option_footer = cs_get_option('i_avatar_option_footer'); //备案号
?>
<footer class="footer card py-3 py-lg-3">
    <div class="container">
        <div class="footer-copyright text-xs px-3">
			<div class="float-left">Copyright © <?= date("Y") ?> 
            <?php if($i_avatar_beian):?> 网站备案号： <a href="http://www.beian.miit.gov.cn/" target="_blank"><?= $i_avatar_beian ?></a><?php endif;?> 
            <?= $i_avatar_option_footer?></div>
            <?php /* 请尊重博主的劳动成果 你忍心删除我？ */ ?>
            <div class="float-right d-none"><a href="" title="" rel="home"><?php echo _the_theme_name()?> 主题</a>. Designed by <a href="http://www.hankin.cn" title="hankin" target="_blank">hankin</a></div>
		</div>
    </div>
</footer>
<div class="mobile-btn clearfix" style="display: none">
    <div class="menu">
        <div class="bt-name"><a href="<?= home_url();?>"><i class="feather icon-home"></i>主页</a></div>
    </div>
    <div class="menu" >
     <div class="bt-name"><i class="feather icon-file"></i>页面</div>
    <div class="sanjiao"></div>
    <div  class="new-sub">
        <ul>
            <?php wp_page_menu([
                'sort_column'  => 'menu_order, post_title',
                'menu_id'      => '',
                'menu_class'   => '',
                'container'    => false, //还没有过滤
                'echo'         => true,
                'link_before'  => '',
                'link_after'   => '',
                'before'       => '',
                'after'        => '',
                'item_spacing' => 'discard',
                'walker'       => '',
                'exclude_tree' => '1036', //排除sitemap
            ]); ?>
        </ul>
    </div>
    </div>
    <div class="menu">
        <div class="bt-name"><a href="javascript:;"><i class="feather icon-user"></i>博主</a></div>
        <div class="new-sub user-info">
            <div class="bg-dark-overlay pt-4 pt-md-5 bg-relative">
                <div class="bg" style="background-image: url(<?= json_get_avatar_url(get_avatar( get_the_author_meta( 'user_email' ),'80' )) ?>)"></div>
                    <div class="container-box">
                        <div class="d-flex flex-fill flex-column flex-md-row align-items-md-center py-md-5">
                            <div class="mb-3 mb-md-0">
                                <div class="flex-avatar mx-2 w-80 border border-white border-2 ">                
                                    <?php echo get_avatar( get_the_author_meta( 'user_email' ),'80' ); ?>
                                </div>
                                <div class="name text-lg text-left"><?= the_author_meta('display_name',1)?>
                                    <i class="cut"></i>
                                    <span class="badge badge-rank badge-primary text-xs mx-1">管理员</span></div>
                                <div class="desc text-sm mt-2 clear-lineheight text-left"><?= get_bloginfo ( 'description' )?></div>
                            </div>
                            <div class="text-white mx-md-4 flex-fill">
                                <div class="data text-lg mt-2 text-left clear-lineheight">
                                    <span class="mr-3">
                                        <a href="" class="">
                                            <span class="font-theme text-lg text-xl text-white"><?= get_the_author_posts() ?></span>
                                            <small class=" text-xs text-light mx-1">文章</small></a>
                                    </span>
                                    <span class="mr-3">
                                        <a href="" class="">
                                            <span class="font-theme text-lg text-xl text-white"><?= get_comments('count=true&comment_status=approved') ?></span>
                                            <small class=" text-xs text-light mx-1">评论</small></a>
                                    </span>
                                    <span class="mr-3">
                                        <a class="">
                                            <span class="font-theme text-lg text-xl text-white"><?= lo_all_view() ?></span>
                                            <small class=" text-xs text-light mx-1">浏览</small></a>
                                    </span>
                                </div>
                                <div style="margin-top:.2rem;padding-bottom: .2rem;border-bottom: solid .01rem rgba(255,255,255,.15);"></div>
                            </div>
                    </div>
                </div>
                <div class="user-tab clearfix">
                    <div class="tab-list">
                        <div class="tab-name"><a class="active" href="<?= home_url();?>">测试</a></div>
                    </div>
                    <div class="tab-list">
                        <div class="tab-name"><a href="<?= home_url();?>">测试</a></div>
                    </div>
                </div>
                <div class="user-tab-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
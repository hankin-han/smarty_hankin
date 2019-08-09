<style>
    .post-categories{display: inline-block;line-height: 1;}
    .post-categories li{float:left;}
</style>
<main class="container pt-xs-6" id="pjax-content">
    <div class="row">
    <?php cmp_breadcrumbs()?>
	<div class="col-md-8">
		<div class="row" id="main">
								<article class="article " id="post-20">
                                                    <div class="article-img">
                                <img src="http://heitang.chuangzaoshi.com/wp-content/uploads/2017/05/B-3.png">
                            </div>
                        						<div class="article-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
						<div class="article-meta">
							<span class="article-meta-time"><?php the_time('Y-m-d') ?></span>
							<i class="czs-bookmark"></i>
							<?php echo get_the_category_list('','','');?>&nbsp;
                            <i class="czs-heart-l"></i>
                            <span class="count">
                                                                    62                                                            </span>&nbsp;
                            <i class="czs-comment-l"></i>
							<a href="<?php the_permalink(); ?>#comments" class="article-meta-comment">
                           <?php echo get_post($post->ID)->comment_count; ?>
                           </a>                            
                           <i class="czs-eye-l"></i> <?php echo getPostViews($postID);?>&nbsp;
                            <!-- user edit -->
                            <?php edit_post_link('[编辑文章]'); ?>
                            <?php echo get_the_tag_list('<div class="article-meta-tags">','','</div>');?>
						</div>
						<div class="article-body">
						<?php while( have_posts() ): the_post(); ?>
						    <?php the_content();?>
					   <?php endwhile; ?>
						</div>
                        <!-- advertisement -->
                                                                                    <div class="article-advertisement">
                                                                    </div>
                                                                            <!-- copyright -->
                                                    <p class="article-copyright">
                                转载原创文章请注明，转载自:
                                <a href="http://heitang.chuangzaoshi.com">
                                    黑糖主题                                </a> -
                                <a href="http://heitang.chuangzaoshi.com/archives/20">
                                    黑糖丨特色的[专题首推]板块，让分类更漂亮优雅！                                </a>
                                (http://heitang.chuangzaoshi.com/archives/20)
                            </p>
                        						                            <div class="article-support">
                                <div class="article-support-title">
                                    「如果你觉得对你有用，欢迎点击下方按钮对我打赏」                                </div>
                                <div class="article-support-img">
                                    <div class="article-support-zhifubao">
                                        <img src="http://heitang.chuangzaoshi.com/wp-content/uploads/2018/01/wechat_qrcode.png">
                                        <div class="article-support-img-title">
                                            支付宝支付
                                        </div>
                                    </div>
                                    <div class="article-support-wechat">
                                        <img src="http://heitang.chuangzaoshi.com/wp-content/uploads/2018/01/wechat_qrcode.png">
                                        <div class="article-support-img-title">
                                            微信支付
                                        </div>
                                    </div>
                                </div>
                                <div class="article-support-button">
                                    <a class="btn">赞赏</a>
                                </div>
                            </div>
                                                <!-- like -->
                                                    <div class="article-like">
                                <a href="javascript:;" data-action="ding" data-id="20" class="favorite">
                                                                            <i class="czs-heart-l"></i>
                                                                        <span class="count">
									                                        62                                    								</span>
                                </a>
                            </div>
                                                <!-- share -->
                            <div class="article-share">
        <span class="article-share-title">
            分享到:
        </span>
        <span class="bdsharebuttonbox d-inline-block bdshare-button-style0-16" data-bd-bind="1564645698112">
            <a href="#" class="bds_weixin czs-weixin" data-cmd="weixin" title="分享到微信"></a>
            <a href="#" class="bds_tsina czs-weibo" data-cmd="tsina" title="分享到新浪微博"></a>
            <a href="#" class="bds_sqq czs-qq" data-cmd="sqq" title="分享到QQ"></a>
            <a href="#" class="bds_more czs-add" data-cmd="more"></a>
        </span>
        <script>
            window._bd_share_config={
                "common":{
                    "bdSnsKey":{},
                    "bdText":"",
                    "bdMini":"1",
                    "bdMiniList":false,
                    "bdPic":"",
                    "bdStyle":"0"
                },
                "share":{
                    bdCustomStyle: themeUrl + '/assets/css/share.css'
                }
            };
            with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src=themeUrl + '/assets/js/bdshare/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
        </script>
    </div>
					</article>
											<section id="post-link">
				<div class="md-6 post-link-previous">
					上一篇: <a href="http://heitang.chuangzaoshi.com/archives/18" rel="prev">黑糖丨支持多种视频播放，尊享愉悦的视听！</a>				</div>
				<div class="md-6 post-link-next">
					下一篇: <a href="http://heitang.chuangzaoshi.com/archives/22" rel="next">黑糖丨主题的介绍和购买！</a>				</div>
			</section>
			<div class="comments">
		<div id="respond" class="comment-respond">
		<h3 id="reply-title" class="comment-reply-title">留言 <small><a rel="nofollow" id="cancel-comment-reply-link" href="/archives/20#respond" style="display:none;">取消回复</a></small></h3>			<form action="http://heitang.chuangzaoshi.com/wp-comments-post.php" method="post" id="commentform" class="comment-form">
				<p class="comment-form-comment"><label for="comment">评论</label> <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p><p class="comment-form-author"><input id="author" name="author" placeholder="昵称" type="text" value="" size="30"></p>
<p class="comment-form-email"><input id="email" name="email" placeholder="邮箱" type="text" value="" size="30"></p>
<p class="comment-form-url"><input id="url" name="url" placeholder="网址" type="text" value="" size="30"></p>
<p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="确定"> <input type="hidden" name="comment_post_ID" value="20" id="comment_post_ID">
<input type="hidden" name="comment_parent" id="comment_parent" value="0">
</p>			</form>
			</div><!-- #respond -->
		<div class="comments-title">
		写下你的评论吧	</div>
	<ul class="comments-list">
			</ul>
	</div>		</div>
	</div>
	<div class="col-md-4 ">
		<div class="row" style="padding-left: 30px;">
			<aside id="sidebar">
	<div class="sidebar-wrap">
                                                <div class="affix" style="width: 340px;">
                                    </div>
                <div class="sidebar-article">
                            
        <div class="widget widget-profile-elegant">
            <div class="widget-profile-avatar">
                <img alt="" src="http://heitang.chuangzaoshi.com/wp-content/uploads/2017/05/avatar_user_1_1494903592-60x60.png" srcset="http://heitang.chuangzaoshi.com/wp-content/uploads/2017/05/avatar_user_1_1494903592.png 2x" class="avatar avatar-60 photo" height="60" width="60">            </div>
            <div class="widget-profile-user text-center f-bold">
                <a href="http://chuangzaoshi.com/" target="_blank">
                    geeker                </a>
            </div>
            <div class="widget-profile-description text-center mb-4">
                            </div>
            <div class="widget-profile-role mb-6"><span>管理员</span></div>            <div class="widget-profile-footer text-center">
                <a class="col-6 py-3 d-block" href="http://heitang.chuangzaoshi.com/archives/author/geeker" style="border-right: 1px solid #eee;">
                    <i class="czs-doc-file-l"></i>作品
                </a>
                <a class="col-6 py-3 d-block" target="_blank" href="http://chuangzaoshi.com/">
                    <i class="czs-network-l"></i>网站
                </a>
            </div>
        </div>
    <div id="widget-tagcloud-3" class="widget widget-tagcloud">        <div class="widget-title"><span>标签云</span></div>
        <div class="tagcloud">
            <a href="http://heitang.chuangzaoshi.com/archives/tag/ai" class="tag-cloud-link tag-link-6 tag-link-position-1" style="font-size: 8pt;" aria-label="AI智能 (6个项目)">AI智能</a>
<a href="http://heitang.chuangzaoshi.com/archives/tag/apple" class="tag-cloud-link tag-link-7 tag-link-position-2" style="font-size: 8pt;" aria-label="Apple (6个项目)">Apple</a>
<a href="http://heitang.chuangzaoshi.com/archives/tag/uikit" class="tag-cloud-link tag-link-8 tag-link-position-3" style="font-size: 8pt;" aria-label="UIkit (6个项目)">UIkit</a>
<a href="http://heitang.chuangzaoshi.com/archives/tag/creator" class="tag-cloud-link tag-link-9 tag-link-position-4" style="font-size: 19.565217391304pt;" aria-label="创意工作者 (10个项目)">创意工作者</a>
<a href="http://heitang.chuangzaoshi.com/archives/tag/business" class="tag-cloud-link tag-link-10 tag-link-position-5" style="font-size: 19.565217391304pt;" aria-label="商业 (10个项目)">商业</a>
<a href="http://heitang.chuangzaoshi.com/archives/tag/app" class="tag-cloud-link tag-link-11 tag-link-position-6" style="font-size: 17.130434782609pt;" aria-label="应用 (9个项目)">应用</a>
<a href="http://heitang.chuangzaoshi.com/archives/tag/plugin" class="tag-cloud-link tag-link-12 tag-link-position-7" style="font-size: 17.130434782609pt;" aria-label="插件 (9个项目)">插件</a>
<a href="http://heitang.chuangzaoshi.com/archives/tag/res" class="tag-cloud-link tag-link-13 tag-link-position-8" style="font-size: 8pt;" aria-label="模板素材 (6个项目)">模板素材</a>
<a href="http://heitang.chuangzaoshi.com/archives/tag/game" class="tag-cloud-link tag-link-14 tag-link-position-9" style="font-size: 8pt;" aria-label="游戏 (6个项目)">游戏</a>
<a href="http://heitang.chuangzaoshi.com/archives/tag/vr" class="tag-cloud-link tag-link-15 tag-link-position-10" style="font-size: 8pt;" aria-label="虚拟现实 (6个项目)">虚拟现实</a>
<a href="http://heitang.chuangzaoshi.com/archives/tag/blackcandy" class="tag-cloud-link tag-link-16 tag-link-position-11" style="font-size: 22pt;" aria-label="黑糖主题 (11个项目)">黑糖主题</a>            <a class="tagcloud-more" href="http://heitang.chuangzaoshi.com/tags" title="更多标签">更多</a>
        </div>
    </div><div id="widget-hotpost-4" class="widget widget-hotpost">        <div class="widget-title"><span>热门文章</span></div>
        <ul class="widget-hotpost-brief">
                                                                                    <li>
                            <a href="http://heitang.chuangzaoshi.com/archives/30">
                                密码保护：黑糖丨用户手册：安装和使用建议                            </a>
                            <div class="widget-hotpost-brief-time">
                                2017.05.15                            </div>
                        </li>
                                                                                <li>
                            <a href="http://heitang.chuangzaoshi.com/archives/22">
                                黑糖丨主题的介绍和购买！                            </a>
                            <div class="widget-hotpost-brief-time">
                                2017.05.15                            </div>
                        </li>
                                                                                <li>
                            <a href="http://heitang.chuangzaoshi.com/archives/28">
                                黑糖丨主题版本更新                            </a>
                            <div class="widget-hotpost-brief-time">
                                2017.05.15                            </div>
                        </li>
                                                                                <li>
                            <a href="http://heitang.chuangzaoshi.com/archives/20">
                                黑糖丨特色的[专题首推]板块，让分类更漂亮优雅！                            </a>
                            <div class="widget-hotpost-brief-time">
                                2017.05.15                            </div>
                        </li>
                                                                                <li>
                            <a href="http://heitang.chuangzaoshi.com/archives/26">
                                创造狮丨主题用户购买须知和服务条款                            </a>
                            <div class="widget-hotpost-brief-time">
                                2017.05.15                            </div>
                        </li>
                                                        </ul>
</div>        <div class="widget widget-follow">
        <table>
            <tbody>
            <tr>
                <td class="follow-wechat">
                    <i class="czs-weixin"></i>
                    <div class="follow-wechat-popup">
                        <img src="http://heitang.chuangzaoshi.com/wp-content/uploads/2018/01/wechat_qrcode.png " alt="wechat">
                    </div>
                </td>
                <td class="follow-weibo">
                    <a target="blank" href="">
                        <i class="czs-weibo"></i>
                    </a>
                </td>
                <td class="follow-qq">
                    <a target="_blank" href="tencent://AddContact/?fromId=50&amp;fromSubId=1&amp;subcmd=all&amp;uin=164903112">
                        <i class="czs-qq"></i>
                    </a>
                </td>
                <td class="follow-rss">
                    <a target="_blank" href="/feed/atom"><i class="czs-rss"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
                    </div>
                    	</div>
</aside>

		</div>
	</div>
	</div>
</main>
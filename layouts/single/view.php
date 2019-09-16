<?php $category = get_the_category()[0] ?>
<?php if ( have_posts() ): ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="post card">
    <div class="card-body">
        <div class="post-header border-bottom border-light mb-4 pb-4">
            <div class="d-block text-sm mt-md-1 mb-2 mb-md-3">
                <a href="<?= get_category_link( $category->term_id )?>">
                    <span class="badge badge-primary"><?= $category->cat_name ?></span></a>
            </div>
            <h1 class="h3 mb-3"><?php the_title(); ?></h1>
            <div class="meta d-flex align-items-center text-xs text-muted">
                <div>
                    <time class="d-inline-block"><?= get_the_time('Y-m-d H:i:s')?></time></div>
                <div class="ml-auto text-sm">
                    <span class="mx-1">
                        <i class="text-md iconfont icon-eye-line mx-1"></i>
                        <small>624</small></span>
                    <a class="mx-1" href="#comments">
                        <i class="text-md iconfont icon-chat--line mx-1"></i>
                        <small>3</small></a>
                    <a class="btn-like btn-link-like  mx-1" href="javascript:;" data-action="like" data-id="4621">
                        <i class="text-md iconfont icon-thumb-up-line mx-1"></i>
                        <small class="like-count">19</small></a>
                </div>
            </div>
            <div class="border-theme bg-primary"></div>
        </div>
        <div class="post-content">
            <div class="nc-light-gallery">
                <?= the_content(); ?>
            </div>
        </div>
    </div>
    <div class="card-footer pt-0 border-0">
        <div class="d-flex align-items-center justify-content-between  justify-content-md-start text-center text-md-left py-2">
            <a href="javascript:;" class=" btn-like btn-link-like mr-md-4" data-action="like" data-id="4621">
                <i class="text-xl iconfont icon-thumb-up-line mx-1"></i>
                <small class="font-theme like-count text-md">19</small></a>
            <a href="#comments" class="mr-md-4">
                <i class="text-xl iconfont icon-message--line"></i>
                <small class="font-theme text-md">3</small></a>
            <a href="javascript:;" class="plus-power-popup mr-md-4">
                <i class="text-xl iconfont icon-exchange-dollar-fill"></i>
            </a>
            <div id="plus-power-popup-wrap">
                <div class="popup-inner">
                    <div class="content p-4">
                        <div class="plus-power-tabcontent">
                            <div class="item-qrcode">
                                <img src="https://demo.nicetheme.xyz/panda-pro-style-one/wp-content/uploads/sites/25/2019/06/2019062006104080.png" alt="nicetheme"></div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:;" class="btn-bigger-cover" id="btn-bigger-cover" data-id="4621">
                <span>
                    <i class="text-xl iconfont icon-article-line"></i>
                </span>
            </a>
            <div class="d-none d-md-flex flex-md-fill"></div>
            <div class="content-share">
                <a href="javascript:;" role="button" class="link-post-share mx-2">
                    <i class="text-xl iconfont icon-share-box-fill"></i>
                    <i class="text-xl iconfont icon-close-fill"></i>
                </a>
                <div class="nice-dropdown">
                    <div class="dropdown-inner">
                        <div class="row no-gutters">
                            <div class="col">
                                <a href="//service.weibo.com/share/share.php?url=https%3A%2F%2Fdemo.nicetheme.xyz%2Fpanda-pro-style-one%2F4621.html&amp;type=button&amp;language=zh_cn&amp;title=%E3%80%90%E7%94%B5%E5%95%86%E6%B7%B7%E6%88%98618%EF%BC%9A%E6%95%B0%E5%AD%97%E7%8B%82%E6%AC%A2%E8%83%8C%E5%90%8E%EF%BC%8C%E6%88%96%E7%8E%B0%E2%80%9C%E6%B0%B4%E9%80%86%E2%80%9D%E9%9A%90%E5%BF%A7%E3%80%91%E7%BC%96%E8%80%85%E6%8C%89%EF%BC%9A%E6%9C%AC%E6%96%87%E6%9D%A5%E8%87%AA%E5%BE%AE%E4%BF%A1%E5%85%AC%E4%BC%97%E5%8F%B7%E2%80%9CiFeng%E7%A7%91%E6%8A%80%E2%80%9D%EF%BC%88ID%EF%BC%9Aifeng_tech%EF%BC%89%EF%BC%8C%E4%BD%9C%E8%80%85+%E5%AD%99%E6%B4%AA%EF%BC%8C%E7%BC%96%E8%BE%91+%E4%BA%8E%E6%B5%A9%E3%80%8236%E6%B0%AA%E7%BB%8F%E6%8E%88%E6%9D%83%E8%BD%AC%E8%BD%BD%E3%80%82%0A%E6%95%B0%E5%AD%97%E7%8B%82%E6%AC%A2%E8%83%8C%E5%90%8E%EF%BC%8C%E7%94%B5%E5%95%86%E8%A1%8C%E4%B8%9A%E6%88%96%E5%B7%B2%E9%99%B7%E5%85%A5%E9%9B%86%E4%BD%93%E7%84%A6%E8%99%91%E3%80%82%0A...&amp;searchPic=true" target="_blank" class="item-share weibo ">
                                    <span>
                                        <i class="text-lg iconfont icon-weibo-fill"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="col">
                                <a href="javascript:" class="item-share weixin single-popup" data-img="https://demo.nicetheme.xyz/panda-pro-style-one/wp-content/themes/PandaPRO/modules/qrcode.php?data=https%3A%2F%2Fdemo.nicetheme.xyz%2Fpanda-pro-style-one%2F4621.html" data-title="微信扫一扫 分享朋友圈" data-desc="在微信中请长按二维码">
                                    <span>
                                        <i class="text-lg iconfont icon-wechat-fill"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="col">
                                <a href="https://connect.qq.com/widget/shareqq/index.html?url=https%3A%2F%2Fdemo.nicetheme.xyz%2Fpanda-pro-style-one%2F4621.html&amp;title=%E7%94%B5%E5%95%86%E6%B7%B7%E6%88%98618%EF%BC%9A%E6%95%B0%E5%AD%97%E7%8B%82%E6%AC%A2%E8%83%8C%E5%90%8E%EF%BC%8C%E6%88%96%E7%8E%B0%E2%80%9C%E6%B0%B4%E9%80%86%E2%80%9D%E9%9A%90%E5%BF%A7&amp;summary=%E7%BC%96%E8%80%85%E6%8C%89%EF%BC%9A%E6%9C%AC%E6%96%87%E6%9D%A5%E8%87%AA%E5%BE%AE%E4%BF%A1%E5%85%AC%E4%BC%97%E5%8F%B7%E2%80%9CiFeng%E7%A7%91%E6%8A%80%E2%80%9D%EF%BC%88ID%EF%BC%9Aifeng_tech%EF%BC%89%EF%BC%8C%E4%BD%9C%E8%80%85+%E5%AD%99%E6%B4%AA%EF%BC%8C%E7%BC%96%E8%BE%91+%E4%BA%8E%E6%B5%A9%E3%80%8236%E6%B0%AA%E7%BB%8F%E6%8E%88%E6%9D%83%E8%BD%AC%E8%BD%BD%E3%80%82%0A%E6%95%B0%E5%AD%97%E7%8B%82%E6%AC%A2%E8%83%8C%E5%90%8E%EF%BC%8C%E7%94%B5%E5%95%86%E8%A1%8C%E4%B8%9A%E6%88%96%E5%B7%B2%E9%99%B7%E5%85%A5%E9%9B%86%E4%BD%93%E7%84%A6%E8%99%91%E3%80%82%0A..." target="_blank" class="item-share qq">
                                    <span>
                                        <i class="text-lg iconfont icon-qq-fill"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="col">
                                <a href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fdemo.nicetheme.xyz%2Fpanda-pro-style-one%2F4621.html" target="_blank" class="item-share facebook ">
                                    <span>
                                        <i class="text-lg iconfont icon-facebook"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="col">
                                <a href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fdemo.nicetheme.xyz%2Fpanda-pro-style-one%2F4621.html" target="_blank" class="item-share twitter">
                                    <span>
                                        <i class="text-lg iconfont icon-twitter"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="col">
                                <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fdemo.nicetheme.xyz%2Fpanda-pro-style-one%2F4621.html&amp;title=%E7%94%B5%E5%95%86%E6%B7%B7%E6%88%98618%EF%BC%9A%E6%95%B0%E5%AD%97%E7%8B%82%E6%AC%A2%E8%83%8C%E5%90%8E%EF%BC%8C%E6%88%96%E7%8E%B0%E2%80%9C%E6%B0%B4%E9%80%86%E2%80%9D%E9%9A%90%E5%BF%A7&amp;summary=%E7%BC%96%E8%80%85%E6%8C%89%EF%BC%9A%E6%9C%AC%E6%96%87%E6%9D%A5%E8%87%AA%E5%BE%AE%E4%BF%A1%E5%85%AC%E4%BC%97%E5%8F%B7%E2%80%9CiFeng%E7%A7%91%E6%8A%80%E2%80%9D%EF%BC%88ID%EF%BC%9Aifeng_tech%EF%BC%89%EF%BC%8C%E4%BD%9C%E8%80%85+%E5%AD%99%E6%B4%AA%EF%BC%8C%E7%BC%96%E8%BE%91+%E4%BA%8E%E6%B5%A9%E3%80%8236%E6%B0%AA%E7%BB%8F%E6%8E%88%E6%9D%83%E8%BD%AC%E8%BD%BD%E3%80%82%0A%E6%95%B0%E5%AD%97%E7%8B%82%E6%AC%A2%E8%83%8C%E5%90%8E%EF%BC%8C%E7%94%B5%E5%95%86%E8%A1%8C%E4%B8%9A%E6%88%96%E5%B7%B2%E9%99%B7%E5%85%A5%E9%9B%86%E4%BD%93%E7%84%A6%E8%99%91%E3%80%82%0A..." target="_blank" class="item-share linkedin">
                                    <span>
                                        <i class="text-lg iconfont icon-linkedin"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php endif; ?>
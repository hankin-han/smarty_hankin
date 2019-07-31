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
</head>
<body <?php body_class(); ?>>
<header id="header">
    <nav class="container">
        <div class="logo hidden-sm">
            <a href="http://heitang.chuangzaoshi.com" class="d-block">
                <img src="http://heitang.chuangzaoshi.com/wp-content/uploads/2018/10/logo.png" alt="">
            </a>
        </div>
        <div class="mobile-logo show-sm">
            <a href="http://heitang.chuangzaoshi.com" class="d-inline-block">
                <img src="http://heitang.chuangzaoshi.com/wp-content/uploads/2018/10/logo_mobile.png" alt="">
            </a>
        </div>
        <div class="header-menu-wrap clear">
            <ul id="menu-%e5%af%bc%e8%88%aa%e8%8f%9c%e5%8d%95" class="header-menu"><li id="menu-item-51" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-51"><a href="#" class="">发现</a>
                    <ul class="sub-menu child-menu depth_0 " style="transform: scale3d(0, 0, 0); opacity: 0;">
                        <li id="menu-item-54" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-54"><a href="http://heitang.chuangzaoshi.com/archives/category/hardware"><i class="czs-microchip"></i>智能硬件</a></li>
                        <li id="menu-item-83" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-83"><a href="http://heitang.chuangzaoshi.com/%e5%bd%92%e6%a1%a3"><i class="czs-cup"></i>最新资讯</a></li>
                    </ul>
                </li>
                <li id="menu-item-52" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-52"><a href="http://heitang.chuangzaoshi.com/archives/category/creativity">创意</a></li>
                <li id="menu-item-53" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-53"><a href="http://heitang.chuangzaoshi.com/archives/category/tech">科技</a></li>
                <li id="menu-item-55" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-55"><a target="_blank" rel="noopener noreferrer" href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w4004-16446430693.2.UlBMf3&amp;id=545478492569"><i class="czs-buy"></i>购买主题</a></li>
                <li id="menu-item-56" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-56"><a href="#" class="">安装</a>
                    <ul class="sub-menu child-menu depth_0 " style="transform: scale3d(0, 0, 0); opacity: 0;">
                        <li id="menu-item-57" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-57"><a href="http://heitang.chuangzaoshi.com/archives/30"><i class="czs-read-l"></i>黑糖手册</a></li>
                        <li id="menu-item-58" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-58"><a target="_blank" rel="noopener noreferrer" href="http://chuangzaoshi.com/icon/"><i class="czs-caomei"></i>草莓图标</a></li>
                    </ul>
                </li>
                <li id="menu-item-59" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-59"><a target="_blank" rel="noopener noreferrer" href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w4004-16446430693.8.qLdiUC&amp;id=550291436260"><i class="czs-diamond-l"></i>主题订制</a></li>
                <li id="menu-item-296" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-296"><a target="_blank" rel="noopener noreferrer" href="#" class=""><i class="czs-gift-l"></i>更多模板</a>
                    <ul class="sub-menu child-menu depth_0 " style="transform: scale3d(0, 0, 0); opacity: 0;">
                        <li id="menu-item-558" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-558"><a target="_blank" rel="noopener noreferrer" href="http://heige.chuangzaoshi.com/">黑格导航</a></li>
                        <li id="menu-item-557" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-557"><a target="_blank" rel="noopener noreferrer" href="http://heijing.chuangzaoshi.com/">黑镜主题</a></li>
                    </ul>
                </li>
            </ul>        </div>
        <div class="admin-login hidden-sm">
            <a href="http://heitang.chuangzaoshi.com/wp-admin" target="_blank" class="btn-line btn-line-geek">
                登录                                    </a>
        </div>
        <div class="search-button cursor-pointer">
            <i class="czs-search-l"></i>
            <span class="d-inline-block transition opacity-0"><i class="czs-close-l"></i></span>
        </div>
        <div class="menu-button">
            <div class="nav-bar">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
    <div class="menu-wrap">
        <div class="mobile-menu">
            <ul id="menu-%e5%af%bc%e8%88%aa%e8%8f%9c%e5%8d%95-1" class="mobile-menu-nav"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-51"><a href="#">发现</a>
                    <ul class="sub-menu child-menu depth_0 ">
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-54"><a href="http://heitang.chuangzaoshi.com/archives/category/hardware"><i class="czs-microchip"></i>智能硬件</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-83"><a href="http://heitang.chuangzaoshi.com/%e5%bd%92%e6%a1%a3"><i class="czs-cup"></i>最新资讯</a></li>
                    </ul>
                </li>
                <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-52"><a href="http://heitang.chuangzaoshi.com/archives/category/creativity">创意</a></li>
                <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-53"><a href="http://heitang.chuangzaoshi.com/archives/category/tech">科技</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-55"><a target="_blank" rel="noopener noreferrer" href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w4004-16446430693.2.UlBMf3&amp;id=545478492569"><i class="czs-buy"></i>购买主题</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-56"><a href="#">安装</a>
                    <ul class="sub-menu child-menu depth_0 ">
                        <li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-57"><a href="http://heitang.chuangzaoshi.com/archives/30"><i class="czs-read-l"></i>黑糖手册</a></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-58"><a target="_blank" rel="noopener noreferrer" href="http://chuangzaoshi.com/icon/"><i class="czs-caomei"></i>草莓图标</a></li>
                    </ul>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-59"><a target="_blank" rel="noopener noreferrer" href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w4004-16446430693.8.qLdiUC&amp;id=550291436260"><i class="czs-diamond-l"></i>主题订制</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-296"><a target="_blank" rel="noopener noreferrer" href="#"><i class="czs-gift-l"></i>更多模板</a>
                    <ul class="sub-menu child-menu depth_0 ">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-558"><a target="_blank" rel="noopener noreferrer" href="http://heige.chuangzaoshi.com/">黑格导航</a></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-557"><a target="_blank" rel="noopener noreferrer" href="http://heijing.chuangzaoshi.com/">黑镜主题</a></li>
                    </ul>
                </li>
            </ul>		</div>
        <div class="mobile-admin-login text-center mt-3">
            <a href="http://heitang.chuangzaoshi.com/wp-admin" target="_blank" class="btn-line btn-line-geek">
                登录									</a>
        </div>
    </div>
</header>
    

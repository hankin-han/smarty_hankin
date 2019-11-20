<?php
$i_avatar_logo = cs_get_option('i_avatar_logo'); //自定义友情链接
?>
<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="<?= home_url()?>" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <?php if(empty($i_avatar_logo)):?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo2.png" alt="" class="logo">
            <?php else:?>
            <img src="<?php echo $i_avatar_logo?>" alt="" class="logo" width="68" height="auto">
            <?php endif;?>
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <?php
            if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('top-warp-nav') ) {
                wp_nav_menu(
                    ['container' => false,
                        'theme_location' => 'top-warp-nav',
                        'depth'=>2,
                        //'items_wrap' => '%3$s',
                        //'menu_class' => 'pcoded-submenu',
                        'menu_class' => 'navbar-nav top-navbar-nav',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ]);
            } else {
                //echo '<li><a href="/wp-admin/nav-menus.php" target="_blank">请到[后台->外观->菜单]中设置菜单。</a></li>';
            }
            ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                <form class="search-bar" id="searchform" method="get" role="search" action="<?= home_url()?>">
                    <input type="text" name="s" class="form-control border-0 shadow-none" placeholder="请输入关键词搜索" />
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </form>
            </li>
        </ul>

        <!--<ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notifications</h6>
                            <div class="float-right">
                                <a href="#!" class="m-r-10">mark as read</a>
                                <a href="#!">clear all</a>
                            </div>
                        </div>
                        <ul class="noti-body">
                            <li class="n-title">
                                <p class="m-b-0">NEW</p>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="<?php echo get_template_directory_uri(); ?>/assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                                        <p>New ticket Added</p>
                                    </div>
                                </div>
                            </li>
                            <li class="n-title">
                                <p class="m-b-0">EARLIER</p>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="<?php echo get_template_directory_uri(); ?>/assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
                                        <p>Prchace New Theme and make payment</p>
                                    </div>
                                </div>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="<?php echo get_template_directory_uri(); ?>/assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
                                        <p>currently login</p>
                                    </div>
                                </div>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="<?php echo get_template_directory_uri(); ?>/assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                        <p>Prchace New Theme and make payment</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="noti-footer">
                            <a href="#!">show all</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                            <span>John Doe</span>
                            <a href="auth-signin.html" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                            <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                            <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>-->
    </div>


</header>
<!-- [ Header ] end -->
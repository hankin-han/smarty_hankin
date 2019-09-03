<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menu-light menupos-fixed">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="<?php echo get_template_directory_uri(); ?>/assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details">hankin  <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="" id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="user-profile.html" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
                        <li class="list-inline-item"><a href="email_inbox.html"><i class="feather icon-mail" data-toggle="tooltip" title="Messages"></i><small class="badge badge-pill badge-primary">5</small></a></li>
                        <li class="list-inline-item"><a href="auth-signin.html" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>导航</label>
                </li>
            </ul>
            <?php
            if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('warp-nav') ) {
                wp_nav_menu(
                    ['container' => false,
                        'theme_location' => 'warp-nav',
                        'depth'=>2,
                        //'items_wrap' => '%3$s',
                        //'menu_class' => 'pcoded-submenu',
                        'menu_class' => 'nav pcoded-inner-navbar',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ]);
            } else {
                echo '<li><a href="/wp-admin/nav-menus.php">请到[后台->外观->菜单]中设置菜单。</a></li>';
            }
            ?>
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>分类</label>
                </li>
            </ul>
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>页面</label>
                </li>
            </ul>
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>友链</label>
                </li>
            </ul>

            <div class="card text-center">
                <div class="card-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="feather icon-sunset f-40"></i>
                    <h6 class="mt-3">Help?</h6>
                    <p>Please contact us on our email for need any support</p>
                    <a href="#!" target="_blank" class="btn btn-primary btn-sm text-white m-0">Support</a>
                </div>
            </div>

        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
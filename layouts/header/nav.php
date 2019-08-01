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
            <ul id="menu-%e5%af%bc%e8%88%aa%e8%8f%9c%e5%8d%95" class="header-menu">
                <?php
                if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('warp-nav') ) {
                    wp_nav_menu( array( 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'warp-nav', 'depth'=>2 ) );
                } else {
                    echo '<li><a href="/wp-admin/nav-menus.php">请到[后台->外观->菜单]中设置菜单。</a></li>';
                }
                ?>
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
            <ul id="menu-%e5%af%bc%e8%88%aa%e8%8f%9c%e5%8d%95-1" class="mobile-menu-nav">
                <?php
                if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('warp-nav') ) {
                    wp_nav_menu( array( 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'warp-nav', 'depth'=>2 ) );
                } else {
                    echo '<li><a href="/wp-admin/nav-menus.php">请到[后台->外观->菜单]中设置菜单。</a></li>';
                }
                ?>
            </ul>		</div>
        <div class="mobile-admin-login text-center mt-3">
            <a href="/wp-admin" target="_blank" class="btn-line btn-line-geek">
                登录									</a>
        </div>
    </div>
</header>
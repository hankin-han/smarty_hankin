<?php
$i_links = cs_get_option('i_links'); //自定义友情链接
?>
<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar <?= ($_COOKIE['menu'] == '') ? 'menu-light' : $_COOKIE['menu']?> <?= $_COOKIE['menupos']?>">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <div class="" style="display: none">
                <div class="main-menu-header">
                    <img class="img-radius" src="<?php echo get_template_directory_uri(); ?>/assets/images/user/avatar.png" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details">hankin  <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
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
                echo '<li><a href="/wp-admin/nav-menus.php" target="_blank">请到[后台->外观->菜单]中设置菜单。</a></li>';
            }
            ?>
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>组成</label>
                </li>
            </ul>
            <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" no-pjax class="nav-link pcoded-submenu-click">
                            <span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">分类</span></a>
                        <ul class="pcoded-submenu" data="off">
                            <?php
                                $args=array(
                                    'orderby' => 'name',
                                    'order' => 'ESC'
                                );
                                $categories=get_categories($args);
                                ?>
                                <?php foreach($categories as $category):?>
                                    <li><a href="<?= get_category_link( $category->term_id )?>" title="<?= $category->name ?>">
                                            <span><?= $category->name ?></span>
                                        </a>
                                    </li>
                                <?php endforeach;?>
                        </ul>
                    </li>
            </ul>
            <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" no-pjax class="nav-link pcoded-submenu-click">
                        <span class="pcoded-micon"><i class="feather icon-file"></i></span><span class="pcoded-mtext">页面</span></a>
                        <ul class="pcoded-submenu" data="off">
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
                    </li>
            </ul>
            <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" no-pjax class="nav-link pcoded-submenu-click">
                        <span class="pcoded-micon"><i class="feather icon-link"></i></span><span class="pcoded-mtext">友链</span></a>
                        <ul class="pcoded-submenu" data="off">
                            <?php if($i_links):?>
                            <?php foreach($i_links as $link):?>
                                <li><a href="<?= $link['i_links_link']?>" target="_blank" title="<?= $link['i_links_title']?>" alt="<?= $link['i_links_descript']?>">
                                        <span><?= $link['i_links_title']?></span></a>
                                </li>
                            <?php endforeach;?>
                            <?php else: ?>
                            <?php echo '<li><a href="/wp-admin/admin.php?page=cs-framework" target="_blank">请到[后台->主题设置->友情链接]中设置。</a></li>';?>
                            <?php endif;?>
                        </ul>
                    </li>
            </ul>

            <div class="card text-center" style="display: none;">
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
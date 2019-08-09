<div class="notice mb-6 py-3">
    <div class="container">
        <div class="notice-wrap">
            <i class="czs-volume-l notice-icon"></i>
            <ul>
                <li class="notice-item">
                    <a target="blank" href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w4004-16446430693.2.UlBMf3&id=545478492569" title="黑糖主题→ 官网淘宝店下单购买！">
                        黑糖主题→ 官网淘宝店下单购买！                                </a>
                </li>
                <li class="notice-item">
                    <a target="blank" href="http://heitang.chuangzaoshi.com/archives/26" title="黑糖丨主题用户购买须知">
                        黑糖丨主题用户购买须知                                </a>
                </li>
            </ul>
            <?php if(is_home()):?>
            <div class="layout-type pull-right">
                显示模式：
                <?php if(empty($_COOKIE) || !isset($_COOKIE['layout_smarty'])):?>
                    <i data-type="dcolumn" class="czs-layout-list mr-1 active"></i>
                    <i data-type="cascade" class="czs-layout-grid"></i>
                <?php endif;?>
                <?php if($_COOKIE['layout_smarty'] == 'dcolumn'):?>
                    <i data-type="dcolumn" class="czs-layout-list mr-1 active"></i>
                    <i data-type="cascade" class="czs-layout-grid"></i>
                <?php endif;?>
                <?php if($_COOKIE['layout_smarty'] == 'cascade'):?>
                    <i data-type="dcolumn" class="czs-layout-list mr-1"></i>
                    <i data-type="cascade" class="czs-layout-grid active"></i>
                <?php endif;?>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>
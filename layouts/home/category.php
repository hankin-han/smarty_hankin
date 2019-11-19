<?php if(is_category()):?>
<div class="list-cover list-rounded mb-3 mb-md-4 animated fadeIn">
    <div class="list-item list-overlay-content overlay-hover bg-dark">
        <div class="media media-5x1">
            <div class="media-content" style="background-image:url('<?= getThumbnail()?>')"><div class="overlay"></div></div>
        </div>
        <div class="list-content p-3 p-md-4">
            <div class="list-body">
                <div class="d-flex align-items-center">
                    <div class="text-xl"><?php $category = get_the_category(); echo $category[0]->cat_name;?></div>
                    <div class="flex-fill"></div>
                    <div class="text-light"> <i class="text-xl iconfont icon-file-text-line mr-1"></i><span class="text-xs "><?php global $wp_query; $cat_ID = get_query_var('cat'); echo get_category($cat_ID)->count; ?> 篇文章</span></div>
                </div>
                <div class="border-top border-white mt-2 mt-md-3 pt-2 pt-md-3"><div class="text-sm h-2x"><?php echo $category[0]->slug;?></div> 
                <div class="border-theme bg-primary"></div>
                </div>                                  
            </div>
        </div>
    </div>
</div>
<?php endif;?>
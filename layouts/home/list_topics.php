<?php
    $args = ['orderby' => 'name','order' => 'ESC'];
    $categories = get_categories($args);
?>
<main class="h-v-75">
    <div class="container">
        <div class="row list-grouped">
            <?php foreach($categories as $category):?>
            <div class="col-md-4">
                <div class="list-item block">
                    <div class="media media-21x9">
                        <a class="media-content" href="<?= get_category_link( $category->term_id )?>" style="background-image:url(<?= getThumbnail()?>)"></a>
                        <div class="media-overlay overlay-top p-3">
                            <small>
                                <i class="text-xl iconfont icon-file-text-line"></i>
                            </small>
                            <span class="h1 font-theme"><?=  get_category($category->term_id)->count?></span></div>
                    </div>
                    <div class="list-content">
                        <div class="list-body ">
                            <a href="<?= get_category_link( $category->term_id )?>" class="list-title text-md"><?= $category->name ?></a>
                            <div class="list-desc text-xs text-muted h-2x mt-2"><?= $category->category_description ?></div></div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</main>
<?php
   $args=array(
        'orderby' => 'name',
        'order' => 'ASC'
    );
    $categories=get_categories($args);
?>
<div class="container ps-r mb-10 hidden-xs mt-6">
    <div class="custom-carousel">
        <?php foreach($categories as $k => $category):?>
        <a href="<?php echo get_category_link( $category->term_id ) ?>" class="mask-animate d-block carousel-item" 
            style="background: url(<?= get_template_directory_uri(); ?>/static/images/A-<?= rand(1,5)?>.png); background-repeat: no-repeat; background-size: cover; background-position: center top">
            <div class="text-center custom-carousel-info vertical-middle">
                <div class="mb-1"><?= $category->count ?> 篇 </div>
                <div class="mb-3 custom-carousel-info-description"><?= $category->description ?></div>
                <div class="custom-carousel-info-name btn-line"><?= $category->name ?></div>
            </div>
        </a>
    <?php endforeach;?>
    
    </div>
</div>

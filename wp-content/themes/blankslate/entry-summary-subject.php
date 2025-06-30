<div class="item">
    <div class="text">
        <div class="l-text-flex">
            <h2 class="entry-title">
                <?php the_title(); ?>
            </h2>
            
            <div class="description">
                <?php the_excerpt(); ?>
            </div>
        </div>
        <div class="r-arrow-flex">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg" alt="View Project" class="arrow">
        </div>
    </div>
</div>
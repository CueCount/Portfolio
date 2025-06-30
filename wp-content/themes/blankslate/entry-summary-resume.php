<div class="item">
    <div class="text">
        <div class="l-text-flex">
            <h3 class="entry-title">
                <?php the_title(); ?>
            </h3>

            <?php the_excerpt(); ?>

            <div class="cat">
                <?php $categories = get_the_category();
                if ( ! empty( $categories ) ) {foreach ( $categories as $category ) {echo '<li class="tag pill pink">' . esc_html( $category->name ) . '</li> ';}}?>
            </div>
        </div>
        <div class="r-arrow-flex">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg" alt="View Project" class="arrow">
        </div>
    </div>
</div>
<div class="item">
    <?php if (has_post_thumbnail()) : ?>
        <div class="entry-summary-image">
            <?php the_post_thumbnail('full', ['class' => 'featured-img']); ?>
        </div>
    <?php endif; ?>

    <div class="text">
        <div class="l-text-flex">
            <h3 class="entry-title">
                <?php the_title(); ?>
            </h3>

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
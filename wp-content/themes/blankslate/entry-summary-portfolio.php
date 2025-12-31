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
        </div>
        <div class="r-arrow-flex">
            <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" role="img">
                <path d="M9 18l6-6-6-6" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>
</div>
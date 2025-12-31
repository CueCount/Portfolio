<a href="<?php the_permalink(); ?>" class="item-link">
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
            <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" role="img">
                <path d="M9 18l6-6-6-6" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>
</div>
</a>
<?php get_header(); ?>

<div class="container-content top-container-overlap">
    <!-- Mobile-only carousel (default behavior) -->
    <div class="carousel" data-cols="2">
        <div class="carousel-wrapper">
            <?php 
            $args = array('post_type' => 'subject','posts_per_page' => -1, );
            $review_query = new WP_Query($args);
            if ($review_query->have_posts()) : 
                while ($review_query->have_posts()) : $review_query->the_post(); ?>
                    <div class="carousel-item">
                        <?php get_template_part( 'entry-summary-subject' ); ?>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No resume items found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container-content">
    <!-- REVIEWS: Always carousel (desktop + mobile) with arrows and dots -->
    <div class="carousel" data-cols="1" data-mobile-only="false">
        <div class="carousel-wrapper">
            <?php 
            $args = array('post_type' => 'review-item', 'posts_per_page' => -1, );
            $review_query = new WP_Query($args);
            if ($review_query->have_posts()) : 
                while ($review_query->have_posts()) : $review_query->the_post();?>
                    <div class="carousel-item carousel-item-review">
                        <?php get_template_part( 'entry-summary-review' ); ?>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No resume items found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container-content">
    <!-- Mobile-only carousel (default behavior) -->
    <div class="carousel" data-cols="3" data-mobile-only="false">
        <div class="carousel-wrapper">
            <?php 
            $args = array('posts_per_page' => -1, );
            $review_query = new WP_Query($args);
            if ($review_query->have_posts()) : 
                while ($review_query->have_posts()) : $review_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="carousel-item">
                        <?php get_template_part( 'entry-summary-portfolio' ); ?>
                    </a>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No resume items found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container-content">
    <!-- Mobile-only carousel (default behavior) -->
    <div class="carousel l-content-float" data-cols="1">
        <div class="carousel-wrapper">
            <?php 
            $args = array('post_type' => 'resume-item', 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'ASC', );
            $resume_query = new WP_Query($args);
            if ($resume_query->have_posts()) : ?>
                <?php while ($resume_query->have_posts()) : $resume_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="carousel-item">
                        <?php get_template_part( 'entry-summary-resume' ); ?>
                    </a>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No resume items found.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="carousel r-sidebar-float" data-cols="1">
        <div class="carousel-wrapper">
            <?php 
            $args = array('post_type' => 'skill', 'posts_per_page' => -1, );
            $review_query = new WP_Query($args);
            if ($review_query->have_posts()) : 
                while ($review_query->have_posts()) : $review_query->the_post(); ?>
                <div class="skill-item">
                    <h3 class="entry-title">
                        <?php the_title(); ?>
                    </h3>
                    <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" role="img">
                        <path d="M9 18l6-6-6-6" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No resume items found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php 
get_footer();
<?php get_header(); ?>

<div class="container-content top-container-overlap">
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
    <div class="carousel" data-cols="2">
        <div class="carousel-wrapper">
            <?php 
            $args = array('post_type' => 'review-item', 'posts_per_page' => -1, );
            $review_query = new WP_Query($args);
            if ($review_query->have_posts()) : 
                while ($review_query->have_posts()) : $review_query->the_post();?>
                    <div class="carousel-item-review">
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

<div class="container-header">
    <h2 class="pink">Case Studies</h2>
</div>

<div class="container-content">
    <div class="carousel" data-cols="3">
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

<div class="container-header">
    <h2 class="pink">Resume</h2>
</div>

<div class="container-content">
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
                <div class="item">
                    <div class="text">
                        <h3 class="entry-title">
                            <?php the_title(); ?>
                        </h3>
                    </div>
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
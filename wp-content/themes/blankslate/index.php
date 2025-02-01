<?php get_header(); ?>

<div class="container-content">
    <div class="carousel">
        <div class="carousel-wrapper">
        <?php 
        $args = array(
            'post_type'      => 'reveiw-item', // Custom Post Type
            'posts_per_page' => -1, // Retrieve all posts
            'orderby'        => 'date', // Order by date (newest first)
            'order'          => 'DESC', // Newest to oldest
        );
        $review_query = new WP_Query($args);
        if ($review_query->have_posts()) : 
            while ($review_query->have_posts()) : $review_query->the_post();?>`

            <div class="review">
                <p><?php the_excerpt(); ?></p>
                <p><?php the_title(); ?></p>
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
    <div class="container-header">
        <h2 class="pink">Explore Case Studies</h2>
    
        <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="cat-filter">
            <select name="category" class="pink-dark-background white">
                <option value="" class="tag white">All Categories</option>
                <?php
                $categories = get_categories();
                foreach ($categories as $category) {
                    echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
                }
                ?>
            </select>
            <button type="submit" class="cta-filter tag white">Filter</button>
        </form>
    </div>

    <div class="container-article">
        <div class="case-studies">
            <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                get_template_part( 'entry' );
            endwhile; endif;
            ?>
        </div>
    </div>
</div>

<?php 
get_footer();
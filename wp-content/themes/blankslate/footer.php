
<footer id="footer" role="contentinfo" class="container-content">
    <div class="container-header">
        <h2 class="pink">Resume</h2>
    </div>
    
    <div class="resume">
        <?php 
        $args = array(
            'post_type'      => 'resume-item', // Custom Post Type
            'posts_per_page' => -1, // Retrieve all posts
            'orderby'        => 'date', // Order by date (newest first)
            'order'          => 'DESC', // Newest to oldest
        );

        $resume_query = new WP_Query($args);

        if ($resume_query->have_posts()) : ?>
            <?php while ($resume_query->have_posts()) : $resume_query->the_post(); ?>
                <div class="resume-item">
                    <div class="resume-item-title">
                        <h2><?php the_title(); ?></h2>
                        <h3><?php the_excerpt(); ?></h3>
                    </div>
                    <span class="cat">
                        <?php $categories = get_the_category(); $post_tags = get_the_tags();
                        if (!empty($categories)) : 
                            foreach ($categories as $category) {echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="tag pill pink">' . esc_html($category->name) . '</a> ';}
                        endif; 
                        if ($post_tags) {
                            foreach ($post_tags as $tag) {echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="tag pill pink">' . esc_html($tag->name) . '</a> ';}
                        } ?>
                    </span>
                    <p><?php the_content(); ?></p>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>No resume items found.</p>
        <?php endif; ?>
    </div>
    <div id="copyright" class="tag">&copy; <?php echo esc_html( date_i18n( __( 'Y', 'blankslate' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?></div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
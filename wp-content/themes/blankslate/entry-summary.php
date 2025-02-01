<div class="entry-summary left-border">
        <div class="entry-summmary-image">
            <?php 
            $content = get_the_content();
            $matches = array();
            preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/', $content, $matches);
            $images = array_slice($matches[1], 0, 3);
            if (!empty($images)) :
                foreach ($images as $image_src) :
                    echo '<div class="img" style="background-image: url(' . esc_url($image_src) . ');background-size:cover;"></div>';
                endforeach;
            endif; ?>
        </div>

        <div class="text">
            <h2 class="entry-title">
                <?php the_title(); ?>
            </h2>

            <div class="cat">
                <?php $categories = get_the_category();
                if ( ! empty( $categories ) ) {foreach ( $categories as $category ) {echo '<li class="tag pill pink">' . esc_html( $category->name ) . '</li> ';}}?>
                <?php $tags = get_the_tags();
                if ( ! empty( $tags ) ) {foreach ( $tags as $tag ) {echo '<li class="tag pill pink">' . esc_html( $tag->name ) . '</li> ';}}?>
            </div>
            
            <div class="description">
                <?php the_excerpt(); ?>
            </div>
        </div>

        <div class="cta">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="button tag white">View Case Study</a>
        </div>
</div>
<header id="header" role="banner" class="container-fullWidth entry-header" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');background-size:cover;">

    <div class="container-content">
        <div class="container-text-01">
            <p class="small tag pink">
                James Mocko, Data Engineer, Sophisticated Visual Storyteller
            </p>
            <div class="highlight pink-background white">
                <h1><?php the_title(); ?></h1>
            </div>

            <div class="highlight-bottom-text">
                <span class="cat">
                    <?php $categories = get_the_category(); $post_tags = get_the_tags();
                    if (!empty($categories)) : 
                        foreach ($categories as $category) {echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="tag pill pink">' . esc_html($category->name) . '</a> ';}
                    endif; 
                    if ($post_tags) {
                        foreach ($post_tags as $tag) {echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="tag pill pink">' . esc_html($tag->name) . '</a> ';}
                    } ?>
                </span>

                <?php if (get_post_meta(get_the_ID(), 'subtitle', true)) : ?>
                    <h3 class="entry-subtitle">
                        <?php echo esc_html(get_post_meta(get_the_ID(), 'subtitle', true)); ?>
                    </h3>
                <?php endif; ?>

            </div>
        </div>
    </div>
</header>